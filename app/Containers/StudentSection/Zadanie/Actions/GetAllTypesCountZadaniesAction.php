<?php

namespace App\Containers\StudentSection\Zadanie\Actions;

use App\Containers\TeacherSection\Course\Models\Course;
use App\Ship\Parents\Actions\Action;

class GetAllTypesCountZadaniesAction extends Action
{
    public function run($course_id)
    {
        $course = Course::where('id', $course_id)
            ->with([
                'sections' => function ($query) {
                    $query->where('is_visible', 1)->with(['zadanies' => function ($query) {
                        $query->where('is_visible', 1)->with(['responseStudents' => function ($query) {
                            $query->where('user_id', \Auth::id())->with('responseTeacher');
                        }]);
                    }]);
                }])->first();


        $zadanies = $course?->sections?->pluck('zadanies')?->collapse();

        if (is_null($zadanies)) {
            return collect();
        }

        $result['all'] = $zadanies->count();

        $zadanies = $zadanies->map(function($item){
            $statusTitle = '';
            $statusStyle = '';

            if ($item->responseStudents->isEmpty()) {
                $statusTitle = 'Новое';
                $statusStyle = 'table-info';
            } else if ($item->responseStudents->isNotEmpty() && is_null($item->responseStudents->first()->responseTeacher)) {
                $statusTitle = 'На проверке';
                $statusStyle = 'table-warning';
            } else if (
                $item->responseStudents->isNotEmpty() &&
                $item->responseStudents->first()->responseTeacher->first()->is_credited === 0
            ) {
                $statusTitle = 'Не зачтено';
                $statusStyle = 'table-danger';
            } else if (
                $item->responseStudents->isNotEmpty() &&
                $item->responseStudents->first()->responseTeacher->first()->is_credited === 1
            ) {
                $statusTitle = 'Зачтено';
                $statusStyle = 'table-success';
            }

            $item->statusTitle = $statusTitle;
            $item->statusStyle = $statusStyle;
            return $item;
        });

        $countNew = $zadanies->filter(function($item){
            return $item->statusTitle == 'Новое';
        })->count();

        $countOnChecked = $zadanies->filter(function($item){
            return $item->statusTitle == 'На проверке';
        })->count();

        $countDone = $zadanies->filter(function($item){
            return $item->statusTitle == 'Зачтено';
        })->count();

        $result['new'] = $countNew;
        $result['on_checked'] = $countOnChecked;
        $result['done'] = $countDone;

        return $result;
    }
}
