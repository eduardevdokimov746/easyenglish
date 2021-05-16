<?php

namespace App\Containers\StudentSection\Course\UI\WEB\Controllers;

use App\Containers\StudentSection\Course\Breadcrumbs\CourseSingle;
use App\Containers\StudentSection\Course\Breadcrumbs\ZadanieSingle;
use App\Ship\Parents\Controllers\WebController;

class Controller extends WebController
{
    public function index()
    {
        if ($this->isNotStudent()) {
            return abort(403, __('ship::http_errors.403'));
        }

        $courses = \Apiato::call('StudentSection\Course@FindCoursesByUserIdAction', [\Auth::id()]);

        return view('studentsection/course::index', compact('courses'));
    }

    public function show($id)
    {
        $course = \Apiato::call('StudentSection\Course@FindCourseByIdAction', [$id]);

        if ($this->isNotStudent() || \Gate::denies('show-course', $course)) {
            return abort(403, __('ship::http_errors.403'));
        }

        $breadcrumb = new CourseSingle(['title' => $course->title]);

        $zadaniesCounts = \Apiato::call('StudentSection\Zadanie@GetAllTypesCountZadaniesAction', [$id]);

        return view('studentsection/course::show', compact('course','zadaniesCounts', 'breadcrumb'));
    }
}
