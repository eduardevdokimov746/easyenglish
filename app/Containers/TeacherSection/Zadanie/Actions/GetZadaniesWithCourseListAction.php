<?php

namespace App\Containers\TeacherSection\Zadanie\Actions;

use App\Containers\TeacherSection\Course\Models\Course;
use App\Ship\Parents\Actions\Action;

class GetZadaniesWithCourseListAction extends Action
{
    public function run($user_id)
    {
        $courses = Course::where('user_id', $user_id)
            ->withCount(['zadanies'])
            ->with(['zadanies.responseStudents' => function ($query) {
                $query->doesntHave('responseTeacher');
            }])->get();




        $courses = $courses->map(function($item){
            $item->countNewResponse = $item->zadanies->pluck('responseStudents')->collapse()->count();
            $item->lastAddResponse = $item->zadanies->pluck('responseStudents')->collapse()->sortByDesc('updated_at')->first();
            $item->lastAddZadanie = $item->zadanies->sortByDesc('created_at')->first();

            $item->lastAddResponse =
                $item->zadanies()
                    ->with('responseStudents')
                    ->get()
                    ->pluck('responseStudents')
                    ->collapse()
                    ->sortByDesc('updated_at')
                    ->first();

            return $item;
        });

        return $courses;
    }
}
