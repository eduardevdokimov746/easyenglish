<?php

namespace App\Containers\TeacherSection\ResponseStudent\UI\WEB\Controllers;

use App\Containers\TeacherSection\ResponseStudent\Breadcrumbs\ListResponses;
use App\Containers\TeacherSection\ResponseStudent\Breadcrumbs\SingleResponse;
use App\Ship\Parents\Controllers\WebController;

class Controller extends WebController
{
    public function index($id)
    {
        if ($this->isNotTeacher()) {
            return abort(403, __('ship::http_errors.403'));
        }

        $zadanie = \Apiato::call('TeacherSection\Zadanie@FindZadanieByIdAction', [$id]);

        $responses = \Apiato::call('TeacherSection\ResponseStudent@GetAllResponsesForZadanieAction', [$id]);
        $groups = \Apiato::call('TeacherSection\Zadanie@GetAllGroupsOnZadanieByCourseAction', [$id]);

        $breadcrumb = new ListResponses(['id' => $zadanie->section->course->id]);

        return view('teachersection/responsestudent::index', compact('responses', 'zadanie', 'groups', 'breadcrumb'));
    }

    public function show($zadanie, $id)
    {
        if ($this->isNotTeacher()) {
            return abort(403, __('ship::http_errors.403'));
        }

        $response = \Apiato::call('TeacherSection\ResponseStudent@FindResponseStudentByIdAction', [$id]);
        $icons = json_encode(\FileStorage::getIcons());

        $breadcrumb = new SingleResponse(['id' => $response->zadanie->section->course->id]);

        return view('teachersection/responsestudent::show_main', compact('response', 'icons', 'breadcrumb'));
//        return view('teachersection/responsestudent::show_testing');
    }

    public function fileDownload($hash)
    {
        $file = \Apiato::call('TeacherSection\ResponseStudent@FindFileByHashAction', [$hash]);

        if (is_null($file)) {
            return back(500);
        }

        $fileName = $file->hash . '.' . $file->ext;

        return \Storage::download(\FileStorage::toResponseStudent()->getPathForDownload($fileName), $file->title);
    }
}
