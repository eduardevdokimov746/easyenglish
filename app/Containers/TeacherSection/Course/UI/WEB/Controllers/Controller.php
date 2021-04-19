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
        if ($this->isNotTeacher()) {
            return abort(403, __('ship::http_errors.403'));
        }

        $breadcrumb = new \App\Ship\Services\Breadcrumbs\CourseList();

        $courses = Apiato::call('TeacherSection\Course@GetAllCoursesAction', [\Auth::id()]);

        return view('teachersection/course::index', compact('breadcrumb', 'courses'));
    }

    public function show()
    {
        $course = Apiato::call('TeacherSection\Course@FindCourseByIdAction', [request()->id]);

        if ($this->isNotTeacher() || \Gate::allows('update-course', $course)) {
            return abort(403, __('ship::http_errors.403'));
        }

        $title = $course->title;
        $url = route('web_teacher_courses_show', $course->id);

        $breadcrumb = new \App\Ship\Services\Breadcrumbs\CourseSingle(compact('title', 'url'));

        return view('teachersection/course::show', compact('breadcrumb', 'course'));
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

        return $request->wantsJson() ?
            json_encode(['status' => 'success']) :
            redirect()->route('web_teacher_courses_index')->with(['success-notice' => __('teachersection/course::action.created')]);
    }

    public function edit()
    {
        $course = Apiato::call('TeacherSection\Course@FindCourseByIdAction', [request()->id]);

        if ($this->isNotTeacher() || \Gate::allows('update-course', $course)) {
            return abort(403, __('ship::http_errors.403'));
        }

        $icons = json_encode(\FileStorage::getIcons());

        return view('teachersection/course::edit', compact('icons', 'course'));
    }

    public function update(UpdateTeacherRequest $request)
    {
        $teacher = Apiato::call('Teacher@UpdateTeacherAction', [$request]);

        // ..
    }

    public function delete()
    {
        $course = Apiato::call('TeacherSection\Course@FindCourseByIdAction', [request()->id]);

        if ($this->isNotTeacher() || \Gate::allows('update-course', $course)) {
            return abort(403, __('ship::http_errors.403'));
        }

        $isSuccess = \Apiato::call( 'TeacherSection\Course@DeleteCourseAction', [request()->id]);

        if ($isSuccess) {
            return redirect()->route('web_teacher_courses_index')->with(['success-notice' => __('teachersection/course::action.course-deleted')]);
        }

        return abort(500);
    }

    public function visible()
    {
        $course = Apiato::call('TeacherSection\Course@FindCourseByIdAction', [request()->id]);

        if ($this->isNotTeacher() || \Gate::allows('update-course', $course)) {
            return abort(403, __('ship::http_errors.403'));
        }

        $isSuccess = \Apiato::call( 'TeacherSection\Course@ShowCourseAction', [request()->id]);

        if ($isSuccess) {
            return back()->with(['success-notice' => __('teachersection/course::action.course-showed')]);
        }

        return abort(500);
    }

    public function hide()
    {
        $course = Apiato::call('TeacherSection\Course@FindCourseByIdAction', [request()->id]);

        if ($this->isNotTeacher() || \Gate::allows('update-course', $course)) {
            return abort(403, __('ship::http_errors.403'));
        }

        $isSuccess = \Apiato::call( 'TeacherSection\Course@HideCourseAction', [request()->id]);

        if ($isSuccess) {
            return back()->with(['success-notice' => __('teachersection/course::action.course-hidden')]);
        }

        return abort(500);
    }
}
