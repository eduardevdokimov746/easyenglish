<?php

namespace App\Containers\StudentSection\Zadanie\UI\WEB\Controllers;

use App\Containers\StudentSection\Zadanie\Breadcrumbs\ZadanieList;
use App\Containers\StudentSection\Zadanie\Breadcrumbs\ZadanieSingle;
use App\Ship\Parents\Controllers\WebController;

class Controller extends WebController
{
    public function index($id)
    {
        $course = \Apiato::call('StudentSection\Course@FindCourseByIdAction', [$id]);

        if ($this->isNotStudent() || \Gate::denies('show-course', $course)) {
            return abort(403, __('ship::http_errors.403'));
        }

        $zadanies = \Apiato::call('StudentSection\Zadanie@GetAllZadaniesAction', [$id]);
        $sections = $course->sections;

        $breadcrumb = new ZadanieList([
            'next_title' => $course->title,
            'next_url' => route('web_student_courses_show', $course->id)
        ]);

        return view('studentsection/zadanie::index', compact('zadanies', 'sections', 'course', 'breadcrumb'));
    }

    public function show($course, $zadanie)
    {
        $zadanie = \Apiato::call('StudentSection\Zadanie@FindZadanieByIdAction', [$zadanie]);
        $icons = json_encode(\FileStorage::getIcons());

        $breadcrumb = new ZadanieSingle([
            'title' => $zadanie->title,
            'next_title' => $zadanie->section->course->title,
            'next_url' => route('web_student_courses_show', $zadanie->section->course->id)
        ]);

        return view('studentsection/zadanie::show_main', compact('zadanie', 'icons', 'breadcrumb'));
//        return view('studentsection/zadanie::show_testing');
    }

    public function result()
    {
        return view('studentsection/zadanie::result_testing');
    }
}
