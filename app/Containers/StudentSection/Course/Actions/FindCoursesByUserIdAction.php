<?php

namespace App\Containers\StudentSection\Course\Actions;

use App\Containers\User\Models\User;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Collection;

class FindCoursesByUserIdAction extends Action
{
    public function run($user_id)
    {
        $user = User::where('id', $user_id)
            ->with([
                    'group.courses' => function ($query) {
                        $query->with('teacher')->where('is_visible', 1);
                    },
                    'group.courses.sections' => function ($query) {
                        $query->where('is_visible', 1)->with(['zadanies' => function ($query) {
                            $query->doesntHave('responseStudents');
                        }]);
                    }
            ])->first();

        $courses = $user?->group?->first()?->courses;

        $isCollection = $courses instanceof Collection;

        $courses = $isCollection && $courses->isEmpty() ? null : $courses;

        if ($isCollection) {
            $courses = $courses->map(function($item){
                $item->newZadanies = $item->sections->pluck('zadanies')->collapse()->filter(function($zadanie){
                    return $zadanie->is_visible === 1;
                })->count();
                return $item;
            });
        }

        return $courses;
    }
}
