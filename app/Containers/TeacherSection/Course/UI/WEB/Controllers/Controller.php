<?php

namespace App\Containers\TeacherSection\Course\UI\WEB\Controllers;

use App\Containers\TeacherSection\Course\UI\WEB\Requests\StoreCourseRequest;
use App\Containers\TeacherSection\Section\UI\WEB\Requests\StoreSectionRequest;
use App\Ship\Parents\Controllers\WebController;
use Apiato\Core\Foundation\Facades\Apiato;

class Controller extends WebController
{
    public function index()
    {
        return 'asd';

        if ($this->isNotTeacher()) {
            return abort(403, __('ship::http_errors.403'));
        }

        $breadcrumb = new \App\Ship\Services\Breadcrumbs\CourseList();

        return view('teachersection/course::index', compact('breadcrumb'));
    }

    public function show()
    {
        if ($this->isNotTeacher()) {
            return abort(403, __('ship::http_errors.403'));
        }

        $title = 'Основы организации хозяйственной деятельности + КР';
        $url = route('web_teacher_courses_show', 'asd');

        $breadcrumb = new \App\Ship\Services\Breadcrumbs\CourseSingle(compact('title', 'url'));

        return view('teachersection/course::show', compact('breadcrumb'));
    }

    public function create()
    {
        if ($this->isNotTeacher()) {
            return abort(403, __('ship::http_errors.403'));
        }

        $icons = json_encode(\FileStorage::getIcons());

        return view('teachersection/course::create', compact('icons'));
    }

    public function store(StoreCourseRequest $request)
    {
        if ($this->isNotTeacher()) {
            return abort(403, __('ship::http_errors.403'));
        }

        if ($request->filled('sections')) {
            $sectionsData = json_decode($request->get('sections'), 1);

            foreach ($sectionsData as $section) {
                if (empty($section['title'])) {
                    return json_encode(['status' => 'error']);
                }

                if (!empty($section['links'])) {
                    foreach ($section['links'] as $link) {
                        if (empty($link['url'])) {
                            return json_encode(['status' => 'error']);
                        }
                    }
                }
            }
        }

        $course = Apiato::call('TeacherSection\Course@CreateCourseAction', [$request]);

        if ($course === false) {
            return back()->withErrors([__('ship::validation.error-server')]);
        }

        if ($request->filled('sections')) {
            $sectionsData = json_decode($request->get('sections'), 1);

            foreach ($sectionsData as $sectionIndex => $section) {

                $data = collect($section)->only(['title', 'description', 'is_visible'])->toArray();
                $sectionModel = Apiato::call('TeacherSection\Section@CreateSectionAction', [$course->id, $data]);

                $fileKey = 'file.section_' . $sectionIndex . '_';

                collect($_FILES)->keys()->filter(function ($item) use ($fileKey) {
                    return preg_match('#'.$fileKey.'#', $item);
                })->each(function ($item) use ($sectionModel) {
                    Apiato::call('TeacherSection\Section@CreateFileAction', [$sectionModel->id, $_FILES[$item]]);
                });


                if ($sectionModel !== false && !empty($section['links'])) {
                    foreach ($section['links'] as $link) {
                        Apiato::call('TeacherSection\Section@CreateLinkAction', [$sectionModel->id, $link]);
                    }
                }
            }
        }

        return json_encode(['status' => 'success']);
    }

    public function edit()
    {
        return view('teachersection/course::edit');
    }

    public function update(UpdateTeacherRequest $request)
    {
        $teacher = Apiato::call('Teacher@UpdateTeacherAction', [$request]);

        // ..
    }

    public function delete(DeleteTeacherRequest $request)
    {
        $result = Apiato::call('Teacher@DeleteTeacherAction', [$request]);

        // ..
    }
}
