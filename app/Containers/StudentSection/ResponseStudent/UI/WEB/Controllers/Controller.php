<?php

namespace App\Containers\StudentSection\ResponseStudent\UI\WEB\Controllers;

use App\Containers\StudentSection\ResponseStudent\UI\WEB\Requests\StoreResponseStudentRequest;
use App\Containers\StudentSection\ResponseStudent\UI\WEB\Requests\UpdateResponseStudentRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

class Controller extends WebController
{
    public function store($id, StoreResponseStudentRequest $request)
    {
        try {
            $data = array_merge(['user_id' => \Auth::id()], $request->only(['comment']));

            $response = \Apiato::call('StudentSection\ResponseStudent@CreateResponseStudentAction', [$id, $data]);

            collect($_FILES)->filter(function($item, $key){
                return str_contains($key, 'file');
            })->each(function($item) use ($response){
                \Apiato::call('StudentSection\ResponseStudent@CreateFileAction', [$response->id, $item]);
            });

            return json_encode(['type' => 'success', 'msg' => __('studentsection/responsestudent::action.created')]);
        } catch (\Exception) {
            return json_encode(['type' => 'error', 'msg' => __('ship::validation.error-server')]);
        }
    }

    public function update($id, UpdateResponseStudentRequest $request)
    {
        $response = \Apiato::call('StudentSection\ResponseStudent@FindResponseStudentByIdAction', [$id]);

        if ($this->isNotStudent() || \Gate::denies('update-response-student', $response)) {
            return abort(403, __('ship::http_errors.403'));
        }

        try {
            \Apiato::call('StudentSection\ResponseStudent@UpdateResponseStudentAction', [$id, $request->only(['comment'])]);

            if ($request->filled('files')) {
                collect(json_decode($request->get('files'), 1))->filter(function ($item) {
                    if (isset($item['action']) && $item['action'] === 'delete') {
                        \Apiato::call('StudentSection\ResponseStudent@DeleteFileAction', [$item]);
                    }
                });
            }

            collect($_FILES)->filter(function($item, $key){
                return str_contains($key, 'file');
            })->each(function($item) use ($response){
                \Apiato::call('StudentSection\ResponseStudent@CreateFileAction', [$response->id, $item]);
            });

            return json_encode(['type' => 'success', 'msg' => __('studentsection/responsestudent::action.updated')]);
        } catch (\Exception) {
            return json_encode(['type' => 'error', 'msg' => __('ship::validation.error-server')]);
        }
    }

    public function delete(DeleteResponseStudentRequest $request)
    {
         $result = Apiato::call('ResponseStudent@DeleteResponseStudentAction', [$request]);
    }
}
