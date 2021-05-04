<?php

namespace App\Containers\TeacherSection\Section\UI\WEB\Controllers;

use App\Containers\TeacherSection\Section\Breadcrumbs\EditSection;
use App\Containers\TeacherSection\Section\UI\WEB\Requests\UpdateSectionRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;
use App\Containers\TeacherSection\Section\UI\WEB\Requests\StoreSectionRequest;

class Controller extends WebController
{
    public function index(GetAllSectionsRequest $request)
    {
        $sections = Apiato::call('Section@GetAllSectionsAction', [$request]);

        // ..
    }

    public function show(FindSectionByIdRequest $request)
    {
        $section = Apiato::call('Section@FindSectionByIdAction', [$request]);

        // ..
    }

    public function create(CreateSectionRequest $request)
    {
        // ..
    }

    public function store(StoreSectionRequest $request)
    {
        return $request->all();
    }

    public function edit($id)
    {
        $section = Apiato::call('TeacherSection\Section@FindSectionByIdAction', [$id]);

        if ($this->isNotTeacher() || \Gate::denies('update-section', $section)) {
            return abort(403, __('ship::http_errors.403'));
        }

        $icons = json_encode(\FileStorage::getIcons());
        $breadcrumb = new EditSection(['title_next' => $section->course->title, 'id' => $section->course->id]);

        return view('teachersection/section::edit', compact('section', 'icons', 'breadcrumb'));
    }

    public function delete($id)
    {
        $section = Apiato::call('TeacherSection\Section@FindSectionByIdAction', [$id]);

        if ($this->isNotTeacher() || \Gate::denies('update-section', $section)) {
            return abort(403, __('ship::http_errors.403'));
        }

        try {
            \Apiato::call( 'TeacherSection\Section@DeleteSectionAction', [$id]);
            return redirect()->route('web_teacher_courses_show', $section->course->id)->with(['success-notice' => __('teachersection/section::action.section-deleted')]);
        } catch (\Exception) {
            return abort(500);
        }
    }

    public function update($id, UpdateSectionRequest $request)
    {
        try {
            \Apiato::call('TeacherSection\Section@UpdateSectionAction', [$id, $request->only(['title', 'description', 'is_visible'])]);

            $links = collect(json_decode($request->get('links'), 1));

            $links->filter(function($item){
                if (isset($item['action'])) {
                    return $item['action'] == 'delete';
                }
                return false;
            })->each(function($item){
                \Apiato::call('TeacherSection\Section@DeleteLinkAction', [$item]);
            });

            $links->filter(function($item){
                if (isset($item['action'])) {
                    return $item['action'] == 'add';
                }
                return false;
            })->each(function($item) use ($id) {
                $item['url'] = $item['edit_url'];
                \Apiato::call('TeacherSection\Section@CreateLinkAction', [$id, $item]);
            });

            $links->filter(function($item){
                return !isset($item['action']) || empty($item['action']);
            })->each(function($item) {
                \Apiato::call('TeacherSection\Section@UpdateLinkAction', [$item['id'], $item]);
            });

            $files = collect(json_decode($request->get('deleteFiles'), 1));

            $files->filter(function ($item) {
                return $item['action'] == 'delete';
            })->each(function ($item) {
                \Apiato::call('TeacherSection\Section@DeleteFileAction', [$item]);
            });

            $files->filter(function ($item) {
                return $item['action'] == 'add';
            })->each(function ($item) {
                \Apiato::call('TeacherSection\Section@CreateFileAction', [$item]);
            });

            collect($_FILES)->filter(function($item, $key){
                return str_contains($key, 'file');
            })->each(function($item) use ($id){
                \Apiato::call('TeacherSection\Section@CreateFileAction', [$id, $item]);
            });

            return json_encode(['type' => 'success', 'msg' => __('teachersection/section::action.updated')]);
        } catch (\Exception) {
            return json_encode(['type' => 'error', 'msg' => __('ship::validation.error-server')]);
        }
    }

    public function visible($id)
    {
        $section = Apiato::call('TeacherSection\Section@FindSectionByIdAction', [$id]);

        if ($this->isNotTeacher() || \Gate::denies('update-section', $section)) {
            return abort(403, __('ship::http_errors.403'));
        }

        try {
            \Apiato::call( 'TeacherSection\Section@ShowSectionAction', [$id]);
            return back()->with(['success-notice' => __('teachersection/section::action.section-showed')]);
        } catch (\Exception) {
            return abort(500);
        }
    }

    public function hide($id)
    {
        $section = Apiato::call('TeacherSection\Section@FindSectionByIdAction', [$id]);

        if ($this->isNotTeacher() || \Gate::denies('update-section', $section)) {
            return abort(403, __('ship::http_errors.403'));
        }

        try {
            \Apiato::call( 'TeacherSection\Section@HideSectionAction', [$id]);
            return back()->with(['success-notice' => __('teachersection/section::action.section-hidden')]);
        } catch (\Exception) {
            return abort(500);
        }
    }

    public function fileDownload($hash)
    {
        $file = \Apiato::call('TeacherSection\Section@FindFileByHashAction', [$hash]);

        if (is_null($file)) {
            return back(500);
        }

        $fileName = $file->hash . '.' . $file->ext;

        return \Storage::download(\FileStorage::toSection()->getPathForDownload($fileName), $file->title);
    }
}
