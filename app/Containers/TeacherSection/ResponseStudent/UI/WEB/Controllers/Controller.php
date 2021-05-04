<?php

namespace App\Containers\TeacherSection\ResponseStudent\UI\WEB\Controllers;

use App\Containers\TeacherSection\ResponseStudent\Breadcrumbs\ListResponses;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

class Controller extends WebController
{
    public function index($id)
    {
        $zadanie = \Apiato::call('TeacherSection\Zadanie@FindZadanieByIdAction', [$id]);

        $responses = \Apiato::call('TeacherSection\ResponseStudent@GetAllResponsesForZadanieAction', [$id]);
        $groups = \Apiato::call('TeacherSection\Zadanie@GetAllGroupsOnZadanieByCourseAction', [$id]);

        $breadcrumb = new ListResponses(['id' => $zadanie->id]);

        return view('teachersection/responsestudent::index', compact('responses', 'zadanie', 'groups', 'breadcrumb'));
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
