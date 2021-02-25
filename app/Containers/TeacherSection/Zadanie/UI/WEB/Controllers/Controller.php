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

/**
 * Class Controller
 *
 * @package App\Containers\Teacher\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllTeachersRequest $request
     */
    public function index()
    {
        return view('teachersection/zadanie::index');
    }

    public function zadanies()
    {
        return view('teachersection/zadanie::courses_zadanies');
    }

    /**
     * Show one entity
     *
     * @param FindTeacherByIdRequest $request
     */
    public function show()
    {
        return view('teachersection/zadanie::show');
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateTeacherRequest $request
     */
    public function create()
    {
        if(request()->get('type') == 'testing'){
            return view('teachersection/zadanie::create_testing');
        }

        return view('teachersection/zadanie::create_main');
    }

    /**
     * Add a new entity
     *
     * @param StoreTeacherRequest $request
     */
    public function store(StoreTeacherRequest $request)
    {
        $teacher = Apiato::call('Teacher@CreateTeacherAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditTeacherRequest $request
     */
    public function edit()
    {
        //Определяем тип задания
        $type = 'testing';

        if($type == 'testing'){
            return view('teachersection/zadanie::edit_testing');
        }

        return view('teachersection/zadanie::edit_main');
    }

    /**
     * Update a given entity
     *
     * @param UpdateTeacherRequest $request
     */
    public function update(UpdateTeacherRequest $request)
    {
        $teacher = Apiato::call('Teacher@UpdateTeacherAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteTeacherRequest $request
     */
    public function delete(DeleteTeacherRequest $request)
    {
        $result = Apiato::call('Teacher@DeleteTeacherAction', [$request]);

        // ..
    }
}
