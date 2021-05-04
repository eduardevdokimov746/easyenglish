<?php

namespace App\Containers\TeacherSection\Zadanie\Actions;

use App\Containers\TeacherSection\Course\Models\Course;
use App\Containers\TeacherSection\Section\Models\Section;
use App\Containers\TeacherSection\Zadanie\Models\Zadanie;
use App\Ship\Parents\Actions\Action;

class GetZadaniesWithSectionListAction extends Action
{
    public function run($course_id)
    {
        if (request()->filled('section') && request()->get('section') !== 'all') {
            $section_ids[] = request()->get('section');
        } else {
            $section_ids = Section::where('course_id', $course_id)->get()->pluck('id');
        }

        $query = Zadanie::
        select(\DB::raw('zadanies.*, (SELECT 
            COUNT(*) FROM responses_students as s 
            WHERE zadanies.id = s.zadanie_id AND NOT EXISTS 
            (SELECT * FROM responses_teachers as t WHERE s.id=t.response_student_id)) as new_responses'))
            ->whereIn('section_id', $section_ids)
            ->with('section')
            ->withCount('responseStudents');



        if(request()->filled('search')){
            $queryStr = request()->get('search');
            $query->where('title', 'like', "%$queryStr%");
        }

        if (request()->filled('sort')) {
            $sort = request()->get('sort');

            switch ($sort) {
                case('response'):
                    $query->orderByDesc('new_responses');
                    break;
                case('zadanie'):
                    $query->orderBy('zadanies.title');
                    break;
            }
        } else {
            $query->orderByDesc('new_responses');
        }

        $zadanies = $query->get();


        return $zadanies;
    }
}
