<?php

namespace App\Containers\StudentSection\Zadanie\Actions;

use App\Containers\TeacherSection\Course\Models\Course;
use App\Containers\Zadanie\Models\Zadanie;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;

class GetAllZadaniesAction extends Action
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

        if (request()->filled('filter')) {
            $filter = request()->get('filter');

            if ($filter == 'new') {
                $zadanies = $zadanies->filter(function($item){
                    return $item->statusTitle == 'Новое';
                });
            }

            if ($filter == 'on_checked') {
                $zadanies = $zadanies->filter(function($item){
                    return $item->statusTitle == 'На проверке';
                });
            }

            if ($filter == 'done') {
                $zadanies = $zadanies->filter(function($item){
                    return $item->statusTitle == 'Зачтено';
                });
            }

            if ($filter == 'undone') {
                $zadanies = $zadanies->filter(function($item){
                    return $item->statusTitle == 'Не зачтено';
                });
            }
        }

        if (request()->filled('section') && request()->get('section') !== 'all') {
            $section_id = request()->get('section');

            $zadanies = $zadanies->filter(function ($item) use ($section_id) {
                return $item->section_id == $section_id;
            });
        }

        return $zadanies->values();
    }
}
