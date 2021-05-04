<?php

namespace App\Containers\TeacherSection\Zadanie\UI\WEB\Controllers;

use App\Containers\TeacherSection\Zadanie\Breadcrumbs\CreateZadanie;
use App\Containers\TeacherSection\Zadanie\Breadcrumbs\EditZadanie;
use App\Containers\TeacherSection\Zadanie\Breadcrumbs\ZadanieList;
use App\Containers\TeacherSection\Zadanie\UI\WEB\Requests\DeleteZadanieRequest;
use App\Containers\TeacherSection\Course\UI\WEB\Requests\StoreCourseRequest;
use App\Containers\TeacherSection\Zadanie\UI\WEB\Requests\EditZadanieRequest;
use App\Containers\TeacherSection\Course\Breadcrumbs\CourseList;
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
        $breadcrumb = new ZadanieList();

        return view('teachersection/zadanie::index', compact('zadanies', 'sections', 'course', 'breadcrumb'));
    }

    public function zadanies()
    {
        if ($this->isNotTeacher()) {
            return abort(403, __('ship::http_errors.403'));
        }

        $courses = \Apiato::call('TeacherSection\Zadanie@GetZadaniesWithCourseListAction', [\Auth::id()]);
        $activePavItem = 'zadanies';

        $breadcrumb = new CourseList();

        return view('teachersection/zadanie::courses_zadanies', compact('activePavItem', 'courses', 'breadcrumb'));
    }

    public function show()
    {
        return view('teachersection/zadanie::show');
    }

    public function create()
    {
        if ($this->isNotTeacher()) {
            return abort(403, __('ship::http_errors.403'));
        }

        $courses = \Apiato::call('TeacherSection\Zadanie@GetZadaniesWithCourseListAction', [\Auth::id()]);
        $icons = json_encode(\FileStorage::getIcons());
        $breadcrumb = new CreateZadanie();

        if(request()->get('type') == 'testing'){
            return view('teachersection/zadanie::create_testing', compact('courses'));
        }

        return view('teachersection/zadanie::create_main', compact('courses', 'icons', 'breadcrumb'));
    }

    public function store(StoreCourseRequest $request)
    {
        $course = \Apiato::call('TeacherSection\Course@FindCourseByIdAction', [$request->get('course_id')]);

        if ($this->isNotTeacher() || \Gate::denies('update-course', $course)) {
            return abort(403, __('ship::http_errors.403'));
        }

        $section_id = request()->get('section_id');

        try {
            $zadanie = \Apiato::call('TeacherSection\Zadanie@CreateZadanieAction', [$request]);

            if ($request->filled('links')) {
                $links = collect(json_decode($request->get('links'), 1));

                $links->each(function($item) use ($zadanie) {
                    \Apiato::call('TeacherSection\Zadanie@CreateLinkAction', [$zadanie->id, $item]);
                });
            }

            collect($_FILES)->filter(function($item, $key){
                return str_contains($key, 'file');
            })->each(function($item) use ($zadanie) {
                \Apiato::call('TeacherSection\Zadanie@CreateFileAction', [$zadanie->id, $item]);
            });

            return json_encode(['type' => 'success', 'msg' => __('teachersection/zadanie::action.created')]);
        } catch (\Exception) {
            return json_encode(['type' => 'error', 'msg' => __('ship::validation.error-server')]);
        }

    }

    public function edit(EditZadanieRequest $request)
    {
        $zadanie = \Apiato::call('TeacherSection\Zadanie@FindZadanieByIdAction', [$request->id]);

        if ($this->isNotTeacher() || \Gate::denies('update-zadanie', $zadanie)) {
            return abort(403, __('ship::http_errors.403'));
        }

        $courses = \Apiato::call('TeacherSection\Zadanie@GetZadaniesWithCourseListAction', [\Auth::id()]);
        $sections = \Apiato::call('TeacherSection\Section@GetAllSectionsFromCourseAction', [$zadanie->section->course->id]);
        $breadcrumb = new EditZadanie(['id' => $zadanie->section->course->id]);

        $icons = json_encode(\FileStorage::getIcons());

        if(request()->get('type') == 'testing'){
            return view('teachersection/zadanie::edit_testing');
        }

        return view('teachersection/zadanie::edit_main', compact('courses', 'icons', 'zadanie', 'sections', 'breadcrumb'));
    }

    public function update(EditZadanieRequest $request)
    {
        $zadanie_id = $request->id;

        $zadanie = \Apiato::call('TeacherSection\Zadanie@FindZadanieByIdAction', [$zadanie_id]);

        if ($this->isNotTeacher() || \Gate::denies('update-zadanie', $zadanie)) {
            return abort(403, __('ship::http_errors.403'));
        }
        try {
            \Apiato::call('TeacherSection\Zadanie@UpdateZadanieAction', [$zadanie_id, $request]);

            $links = collect(json_decode($request->get('links'), 1));

            $links->filter(function($item){
                if (isset($item['action'])) {
                    return $item['action'] == 'delete';
                }
                return false;
            })->each(function($item){
                \Apiato::call('TeacherSection\Zadanie@DeleteLinkAction', [$item]);
            });

            $links->filter(function($item){
                if (isset($item['action'])) {
                    return $item['action'] == 'add';
                }
                return false;
            })->each(function($item) use ($zadanie_id) {
                $item['url'] = $item['edit_url'];
                \Apiato::call('TeacherSection\Zadanie@CreateLinkAction', [$zadanie_id, $item]);
            });

            $links->filter(function($item){
                return !isset($item['action']) || empty($item['action']);
            })->each(function($item) use ($zadanie_id) {
                \Apiato::call('TeacherSection\Zadanie@UpdateLinkAction', [$item['id'], $item]);
            });

            $files = collect(json_decode($request->get('deleteFiles'), 1));

            $files->filter(function ($item) {
                return $item['action'] == 'delete';
            })->each(function ($item) {
                \Apiato::call('TeacherSection\Zadanie@DeleteFileAction', [$item]);
            });

            $files->filter(function ($item) {
                return $item['action'] == 'add';
            })->each(function ($item) {
                \Apiato::call('TeacherSection\Zadanie@CreateFileAction', [$item]);
            });

            collect($_FILES)->filter(function($item, $key){
                return str_contains($key, 'file');
            })->each(function($item) use ($zadanie_id){
                \Apiato::call('TeacherSection\Zadanie@CreateFileAction', [$zadanie_id, $item]);
            });

            return json_encode(['type' => 'success', 'msg' => __('teachersection/zadanie::action.updated')]);
        } catch (\Exception) {
            return json_encode(['type' => 'error', 'msg' => __('ship::validation.error-server')]);
        }

    }

    public function delete(DeleteZadanieRequest $request)
    {
        $zadanie = \Apiato::call('TeacherSection\Zadanie@FindZadanieByIdAction', [$request->id]);

        if ($this->isNotTeacher() || \Gate::denies('update-zadanie', $zadanie)) {
            return abort(403, __('ship::http_errors.403'));
        }

        try {
            \Apiato::call('TeacherSection\Zadanie@DeleteZadanieAction', [$request->id]);

            return back()->with(['success-notice' => __('teachersection/zadanie::action.deleted')]);
        } catch (\Exception) {
            return abort(500);
        }
    }

    public function visible(EditZadanieRequest $request)
    {
        $zadanie = \Apiato::call('TeacherSection\Zadanie@FindZadanieByIdAction', [$request->id]);

        if ($this->isNotTeacher() || \Gate::denies('update-zadanie', $zadanie)) {
            return abort(403, __('ship::http_errors.403'));
        }

        try {
            \Apiato::call('TeacherSection\Zadanie@VisibleZadanieAction', [$request->id]);

            return back()->with(['success-notice' => __('teachersection/zadanie::action.showed')]);
        } catch (\Exception) {
            return abort(500);
        }
    }

    public function hide(EditZadanieRequest $request)
    {
        $zadanie = \Apiato::call('TeacherSection\Zadanie@FindZadanieByIdAction', [$request->id]);

        if ($this->isNotTeacher() || \Gate::denies('update-zadanie', $zadanie)) {
            return abort(403, __('ship::http_errors.403'));
        }

        try {
            \Apiato::call('TeacherSection\Zadanie@HideZadanieAction', [$request->id]);

            return back()->with(['success-notice' => __('teachersection/zadanie::action.hidden')]);
        } catch (\Exception) {
            return abort(500);
        }
    }
}
