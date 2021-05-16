<?php

namespace App\Containers\StudentSection\Course\Actions;

use App\Containers\TeacherSection\Course\Data\Repositories\CourseRepository;
use App\Ship\Parents\Actions\Action;
use App\Ship\Parents\Requests\Request;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\TeacherSection\Course\Models\Course;

class FindCourseByIdAction extends Action
{
    public function run(int $course_id)
    {
        $course = Course::select([
            'id',
            'user_id',
            'title',
            'characteristic',
            'little_description',
            'target',
            'list_literature',
            'is_visible',
            'created_at',
            'updated_at'])
            ->where('id', $course_id)
            ->with([
                'sections' => function ($query) {
                    $query->where('is_visible', 1);
                },
                'sections.files',
                'sections.links',
                'sections.zadanies' => function ($query) {
                    $query->where('is_visible', 1)->with(['responseStudents' => function ($query) {
                        $query->where('user_id', \Auth::id())->with('responseTeacher');
                    }]);
                }
            ])->first();

        if (!is_null($course) && $course->sections->isNotEmpty() && $course->sections->pluck('zadanies')->isNotEmpty()) {
            foreach ($course->sections as $section) {
                $section->zadanies = $section->zadanies->map(function($item){
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
            }
        }

        return $course;
    }
}
