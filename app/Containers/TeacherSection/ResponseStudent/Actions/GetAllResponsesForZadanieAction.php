<?php

namespace App\Containers\TeacherSection\ResponseStudent\Actions;

use App\Containers\TeacherSection\ResponseStudent\Models\ResponseStudent;
use App\Ship\Parents\Actions\Action;

class GetAllResponsesForZadanieAction extends Action
{
    public function run($zadanie_id)
    {
        $query = ResponseStudent::where('zadanie_id', $zadanie_id)
            ->with(['user.group', 'responseTeacher']);

        if (request()->filled('search')) {
            $queryStr = request()->get('search');
            $query
                ->select('responses_students.*')
                ->join('users', 'responses_students.user_id', '=', 'users.id')
                ->whereRaw("CONCAT(last_name, ' ', first_name, ' ', otchestvo) like '%$queryStr%'");
        }

        if (request()->filled('sort')) {
            $sort = request()->get('sort');

            if ($sort == 'fio') {
                if (request()->filled('search')) {
                    $query->orderBy('last_name');
                }else {
                    $query
                        ->select('responses_students.*')
                        ->join('users', 'responses_students.user_id', '=', 'users.id')
                        ->orderBy('last_name');
                }
            } else if ($sort == 'updated_at') {
                $query->orderByDesc('updated_at');
            } else if ($sort == 'result') {
                $query
                    ->select('responses_students.*')
                    ->leftJoin('responses_teachers', 'responses_students.id', '=', 'responses_teachers.response_student_id')
                    ->orderByDesc('responses_teachers.updated_at');
            }

        } else {
            if (request()->filled('search')) {
                $query->orderBy('last_name');
            }else {
                $query
                    ->select('responses_students.*')
                    ->join('users', 'responses_students.user_id', '=', 'users.id')
                    ->orderBy('last_name');
            }
        }

        $responses = $query->get();

        if (request()->filled('group') && request()->get('group') !== 'all') {
            $slug = request()->get('group');

            $responses = $responses->filter(function($item) use ($slug){
                return $item->user->group->first()->slug == $slug;
            });
        }

        return $responses;
    }
}
