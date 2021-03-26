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
    public function index()
    {
        return view('teachersection/responsestudent::index');
    }

    public function show()
    {
        return view('teachersection/responsestudent::show_testing');
        return view('teachersection/responsestudent::show_main');
    }

    public function create(CreateResponseStudentRequest $request)
    {
        // ..
    }

    public function store(StoreResponseStudentRequest $request)
    {
        $responsestudent = Apiato::call('ResponseStudent@CreateResponseStudentAction', [$request]);

        // ..
    }

    public function edit(EditResponseStudentRequest $request)
    {
        $responsestudent = Apiato::call('ResponseStudent@GetResponseStudentByIdAction', [$request]);

        // ..
    }

    public function update(UpdateResponseStudentRequest $request)
    {
        $responsestudent = Apiato::call('ResponseStudent@UpdateResponseStudentAction', [$request]);

        // ..
    }

    public function delete(DeleteResponseStudentRequest $request)
    {
         $result = Apiato::call('ResponseStudent@DeleteResponseStudentAction', [$request]);

         // ..
    }
}
