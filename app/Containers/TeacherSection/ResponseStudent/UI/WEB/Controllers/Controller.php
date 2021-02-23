<?php

namespace App\Containers\TeacherSection\ResponseStudent\UI\WEB\Controllers;

use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

/**
 * Class Controller
 *
 * @package App\Containers\ResponseStudent\UI\WEB\Controllers
 */
class Controller extends WebController
{
    /**
     * Show all entities
     *
     * @param GetAllResponseStudentsRequest $request
     */
    public function index()
    {
        return view('teachersection/responsestudent::index');
    }

    /**
     * Show one entity
     *
     * @param FindResponseStudentByIdRequest $request
     */
    public function show()
    {
        return view('teachersection/responsestudent::show_testing');
        //return view('teachersection/responsestudent::show_main');
    }

    /**
     * Create entity (show UI)
     *
     * @param CreateResponseStudentRequest $request
     */
    public function create(CreateResponseStudentRequest $request)
    {
        // ..
    }

    /**
     * Add a new entity
     *
     * @param StoreResponseStudentRequest $request
     */
    public function store(StoreResponseStudentRequest $request)
    {
        $responsestudent = Apiato::call('ResponseStudent@CreateResponseStudentAction', [$request]);

        // ..
    }

    /**
     * Edit entity (show UI)
     *
     * @param EditResponseStudentRequest $request
     */
    public function edit(EditResponseStudentRequest $request)
    {
        $responsestudent = Apiato::call('ResponseStudent@GetResponseStudentByIdAction', [$request]);

        // ..
    }

    /**
     * Update a given entity
     *
     * @param UpdateResponseStudentRequest $request
     */
    public function update(UpdateResponseStudentRequest $request)
    {
        $responsestudent = Apiato::call('ResponseStudent@UpdateResponseStudentAction', [$request]);

        // ..
    }

    /**
     * Delete a given entity
     *
     * @param DeleteResponseStudentRequest $request
     */
    public function delete(DeleteResponseStudentRequest $request)
    {
         $result = Apiato::call('ResponseStudent@DeleteResponseStudentAction', [$request]);

         // ..
    }
}
