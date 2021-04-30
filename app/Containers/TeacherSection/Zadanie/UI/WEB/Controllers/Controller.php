<?php

namespace App\Containers\TeacherSection\Zadanie\UI\WEB\Controllers;

use App\Containers\Zadanie\UI\WEB\Requests\CreateZadanieRequest;
use App\Containers\Zadanie\UI\WEB\Requests\DeleteZadanieRequest;
use App\Containers\Zadanie\UI\WEB\Requests\GetAllZadaniesRequest;
use App\Containers\Zadanie\UI\WEB\Requests\FindZadanieByIdRequest;
use App\Containers\Zadanie\UI\WEB\Requests\UpdateZadanieRequest;
use App\Containers\Zadanie\UI\WEB\Requests\StoreZadanieRequest;
use App\Containers\Zadanie\UI\WEB\Requests\EditZadanieRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

class Controller extends WebController
{
    public function index($id)
    {
        $course = Apiato::call('TeacherSection\Course@FindCourseByIdAction', [$id]);

        if ($this->isNotTeacher() || \Gate::denies('update-course', $course)) {
            return abort(403, __('ship::http_errors.403'));
        }

        $zadanies = \Apiato::call('TeacherSection\Zadanie@GetZadaniesWithSectionListAction', [$id]);
        $sections = \Apiato::call('TeacherSection\Zadanie@GetAllSectionsForCourseAction', [$id]);

        return view('teachersection/zadanie::index', compact('zadanies', 'sections', 'course'));
    }

    public function zadanies()
    {
        if ($this->isNotTeacher()) {
            return abort(403, __('ship::http_errors.403'));
        }

        $courses = \Apiato::call('TeacherSection\Zadanie@GetZadaniesWithCourseListAction', [\Auth::id()]);

        $activePavItem = 'zadanies';
        return view('teachersection/zadanie::courses_zadanies', compact('activePavItem', 'courses'));
    }

    public function show()
    {
        return view('teachersection/zadanie::show');
    }

    public function create()
    {
        if(request()->get('type') == 'testing'){
            return view('teachersection/zadanie::create_testing');
        }

        return view('teachersection/zadanie::create_main');
    }

    public function store(StoreTeacherRequest $request)
    {
        $teacher = Apiato::call('Teacher@CreateTeacherAction', [$request]);

        // ..
    }

    public function edit()
    {
        //Определяем тип задания
        $type = 'testing';

        if($type == 'testing'){
            return view('teachersection/zadanie::edit_testing');
        }

        return view('teachersection/zadanie::edit_main');
    }

    public function update(UpdateTeacherRequest $request)
    {
        $teacher = Apiato::call('Teacher@UpdateTeacherAction', [$request]);

        // ..
    }

    public function delete(DeleteTeacherRequest $request)
    {
        $result = Apiato::call('Teacher@DeleteTeacherAction', [$request]);

        // ..
    }
}
