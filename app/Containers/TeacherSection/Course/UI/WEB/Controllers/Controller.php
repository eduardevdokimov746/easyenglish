<?php

namespace App\Containers\TeacherSection\Course\UI\WEB\Controllers;

use App\Containers\TeacherSection\Course\UI\WEB\Requests\StoreCourseRequest;
use App\Containers\TeacherSection\Section\UI\WEB\Requests\UpdateSectionRequest;
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

        $activePavItem = 'courses';

        return view('teachersection/course::index', compact('breadcrumb', 'courses', 'activePavItem'));
    }

    public function show()
    {
        $course = Apiato::call('TeacherSection\Course@FindCourseByIdAction', [request()->id]);

        if ($this->isNotTeacher() || \Gate::denies('update-course', $course)) {
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

        if ($this->isNotTeacher() || \Gate::denies('update-course', $course)) {
            return abort(403, __('ship::http_errors.403'));
        }

        $icons = json_encode(\FileStorage::getIcons());

        return view('teachersection/course::edit', compact('icons', 'course'));
    }

    public function update($id)
    {
        $course = Apiato::call('TeacherSection\Course@FindCourseByIdAction', [$id]);

        if ($this->isNotTeacher() || \Gate::denies('update-course', $course)) {
            return abort(403, __('ship::http_errors.403'));
        }

        try {
            Apiato::call('TeacherSection\Course@UpdateCourseAction', [$id, json_decode(request()->get('course'), 1)]);

            if (request()->filled('sections')) {
                $sections = collect(json_decode(request()->get('sections'), 1));

                $sections->filter(function ($item) {
                    if (isset($item['action'])) {
                        return $item['action'] === 'delete';
                    }
                })->each(function ($item) {
                    if (isset($item['id'])) {
                        \Apiato::call('TeacherSection\Section@DeleteSectionAction', [$item['id']]);
                    }

                    if (!empty($item['files'])) {
                        foreach ($item['files'] as $file) {
                            \Apiato::call('TeacherSection\Section@DeleteFileAction', [$file]);
                        }
                    }
                });

                $sections->filter(function ($item) {
                    if (isset($item['action'])) {
                        return $item['action'] === 'add';
                    }
                })->each(function ($item, $sectionIndex) use ($id, $sections) {
                    $sectionData = [
                        'title' => $item['title'],
                        'description' => $item['description'],
                        'is_visible' => $item['is_visible']
                    ];

                    $sectionModel = \Apiato::call('TeacherSection\Section@CreateSectionAction', [$id, $sectionData]);

                    if (!empty($item['links'])) {
                        foreach ($item['links'] as $link) {
                            $link['url'] = $link['edit_url'];
                            \Apiato::call('TeacherSection\Section@CreateLinkAction', [$sectionModel->id, $link]);
                        }
                    }

                    $fileKey = 'file_section_' . $sectionIndex . '_';

                    collect($_FILES)->keys()->filter(function ($item) use ($fileKey) {
                        return preg_match('#'.$fileKey.'#', $item);
                    })->each(function ($item) use ($sectionModel) {
                        \Apiato::call('TeacherSection\Section@CreateFileAction', [$sectionModel->id, $_FILES[$item]]);
                    });
                });


                $sections->filter(function ($item) {
                    return !isset($item['action']);
                })->each(function ($section, $sectionIndex) {
                    $sectionData = [
                        'title' => $section['title'],
                        'description' => $section['description'],
                        'is_visible' => $section['is_visible']
                    ];

                    \Apiato::call('TeacherSection\Section@UpdateSectionAction', [$section['id'], $sectionData]);

                    $links = collect($section['links']);

                    $links->filter(function($item){
                        if (isset($item['action'])) {
                            return $item['action'] == 'delete';
                        }
                    })->each(function($item){
                        \Apiato::call('TeacherSection\Section@DeleteLinkAction', [$item]);
                    });

                    $links->filter(function($item){
                        if (isset($item['action'])) {
                            return $item['action'] == 'add';
                        }
                    })->each(function($item) use ($section) {
                        $item['url'] =  $item['edit_url'];

                        \Apiato::call('TeacherSection\Section@CreateLinkAction', [$section['id'], $item]);
                    });

                    if (!empty($section['files'])) {
                        $files = collect($section['files']);

                        $files->filter(function ($item) {
                            if (isset($item['action'])) {
                                return $item['action'] == 'delete';
                            }
                        })->each(function ($item) {
                            \Apiato::call('TeacherSection\Section@DeleteFileAction', [$item]);
                        });

                        $files->filter(function ($item) {
                            if (isset($item['action'])) {
                                return $item['action'] == 'add';
                            }
                        })->each(function ($item) use ($section, $sectionIndex) {
                            $fileKey = 'file_section_' . $sectionIndex . '_';

                            collect($_FILES)->keys()->filter(function ($item) use ($fileKey) {
                                return preg_match('#'.$fileKey.'#', $item);
                            })->each(function ($item) use ($section) {
                                \Apiato::call('TeacherSection\Section@CreateFileAction', [$section['id'], $_FILES[$item]]);
                            });
                        });
                    }
                });
            }
            return json_encode(['msg' => __('teachersection/course::action.updated')]);
        } catch (\Exception) {
            return abort(500);
        }
    }

    public function delete($id)
    {
        $course = Apiato::call('TeacherSection\Course@FindCourseByIdAction', [$id]);

        if ($this->isNotTeacher() || \Gate::denies('update-course', $course)) {
            return abort(403, __('ship::http_errors.403'));
        }

        \Apiato::call( 'TeacherSection\Course@DeleteCourseAction', [$id]);

        return redirect()->route('web_teacher_courses_index')->with(['success-notice' => __('teachersection/course::action.course-deleted')]);
    }

    public function visible($id)
    {
        $course = Apiato::call('TeacherSection\Course@FindCourseByIdAction', [$id]);

        if ($this->isNotTeacher() || \Gate::denies('update-course', $course)) {
            return abort(403, __('ship::http_errors.403'));
        }

        try {
            \Apiato::call( 'TeacherSection\Course@ShowCourseAction', [$id]);
            return back()->with(['success-notice' => __('teachersection/course::action.course-showed')]);
        } catch (\Exception) {
            return abort(500);
        }
    }

    public function hide($id)
    {
        $course = Apiato::call('TeacherSection\Course@FindCourseByIdAction', [$id]);

        if ($this->isNotTeacher() || \Gate::denies('update-course', $course)) {
            return abort(403, __('ship::http_errors.403'));
        }

        try {
            \Apiato::call( 'TeacherSection\Course@HideCourseAction', [$id]);
            return back()->with(['success-notice' => __('teachersection/course::action.course-hidden')]);
        } catch (\Exception) {
            return abort(500);
        }
    }
}
