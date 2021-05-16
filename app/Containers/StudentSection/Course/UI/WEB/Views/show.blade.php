@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" id="why">
        <div class="container mb-4">
            <div class="head-content mb-4">
                <h1 class="heading col">{{ $course->title }}</h1>
            </div>

            @include('components.breadcrumbs', [$breadcrumb])

            <div class="row">
                <div class="col">
                    @if(!empty($course->characteristic) || !empty($course->little_description) || !empty($course->target) || !empty($course->list_literature))
                    <div class="form mb-3">
                        <div class="form-head">
                            <h2 style="text-align: center">Основная информация</h2>
                        </div>

                        @if(!empty($course->characteristic))
                            <div class="row mt-4">
                                <div class="col">
                                    <h5>Характеристика курса</h5>
                                    <div>
                                        {!! $course->characteristic  !!}
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(!empty($course->little_description))
                            <div class="row mt-4">
                                <div class="col">
                                    <h5>Описание</h5>
                                    <div>
                                        {!! $course->little_description  !!}
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(!empty($course->target))
                            <div class="row mt-4">
                                <div class="col">
                                    <h5>Цель</h5>
                                    <div>
                                        {!! $course->target  !!}
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(!empty($course->list_literature))
                            <div class="row mt-4">
                                <div class="col">
                                    <h5>Список рекомендуемой литературы</h5>
                                    <div>
                                        {!! $course->list_literature  !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    @endif

                    @foreach($course->sections as $section)
                        <div class="form mb-3">
                            <div class="form-head">
                                <h2 style="text-align: center">{{ $section->title }}</h2>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <p style="white-space: pre-line;">
                                        {!! $section->description  !!}
                                    </p>
                                </div>
                            </div>

                            @if($section->links->isNotEmpty())
                                <div class="row mt-4">
                                    <div class="col">
                                        <h5>Прикрепленные ссылки</h5>
                                        <div>
                                            @foreach($section->links as $linkIndex => $link)
                                                <p>
                                                    <a href="{{ $link->url }}" target="_blank">{{ $link->title }}</a>
                                                </p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if($section->files->isNotEmpty())
                                <div class="row mt-4">
                                    <div class="col">
                                        <h5>Прикрепленные файлы</h5>

                                        <table class="table-hover mt-2 table-list-files" border="1">
                                            <thead>
                                            <tr>
                                                <th>№</th>
                                                <th>Название</th>
                                                <th>Размер</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($section->files as $fileIndex => $file)
                                                <tr data-href="{{ route('web_section_file_download', $file->hash) }}" class="table-row">
                                                    <td>{{ $fileIndex + 1 }}</td>
                                                    <td class="text-left">
                                                        <img class="table-list-radanie-file-icon" style="width: 30px;" src="{{ $file->icon }}" alt="">
                                                        <span>{{ $file->title }}</span>
                                                    </td>
                                                    <td>{{ $file->size }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            @endif

                            @if($section->zadanies->isNotEmpty())
                                <div class="row mt-4" >
                                    <div class="col">
                                        <h5>Задания</h5>

                                        <table class="table-hover mt-2 table-list-zadanie" border="1">
                                            <thead>
                                            <th>Название</th>
                                            <th>Дата получения</th>
                                            <th>Срок сдачи</th>
                                            <th>Статус</th>
                                            <th>Дата ответа</th>
                                            <th>Дата обновления</th>
                                            <th>Оценка</th>
                                            </thead>
                                            @foreach($section->zadanies as $zadanieIndex => $zadanie)
                                                <tr class="table-row {{ $zadanie->statusStyle }}" data-href="{{ route('web_student_zadanies_show', [$course->id, $zadanie->id]) }}">
                                                <td>{{ $zadanie?->title }}</td>
                                                <td>{{ $zadanie?->show_updated_at }}</td>
                                                <td>{{ $zadanie?->formatDate($zadanie?->deadline) }}</td>
                                                <td>{{ $zadanie?->statusTitle }}</td>
                                                <td>{!! $zadanie->responseStudents->isEmpty() ? '&mdash;' : $zadanie->responseStudents->first()->show_created_at !!}</td>
                                                <td>{!! $zadanie->responseStudents->isEmpty() ? '&mdash;' : $zadanie->responseStudents->first()->show_updated_at !!}</td>
                                                <td>{!!
                                                    $zadanie->responseStudents->isNotEmpty() &&
                                                    !is_null($zadanie->responseStudents->first()->responseTeacher) &&
                                                    $zadanie->responseStudents->first()->responseTeacher->first()->is_credited == 1 ?
                                                    $zadanie->responseStudents->first()->responseTeacher->first()->result : '&mdash;'  !!}</td>
                                                </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>

                <div class="col-md-3 main-right-div">
                    <div class="right-div-block">
                        <h4>Информация</h4>
                        <p>
                            <b>Преподаватель:</b>
                            <a href="{{ route('web_user_show', $course->teacher->login) }}">
                                <span>{{ $course->teacher->fio }}</span>
                            </a>
                        </p>
                        <p><b>Последнее обновление:</b> <p>{{ $course->show_updated_at }}</p></p>
                    </div>

                    <div class="right-div-block">
                        <h4>Задания</h4>
                        <p><a href="{{ route('web_student_zadanies_index', [$course->id, 'filter' => 'all']) }}"><b>Все:</b> <span>{{ $zadaniesCounts['all'] }}</span></a></p>
                        <p><a href="{{ route('web_student_zadanies_index', [$course->id, 'filter' => 'new']) }}"><b>Новые:</b> <span>{{ $zadaniesCounts['new'] }}</span></a></p>
                        <p><a href="{{ route('web_student_zadanies_index', [$course->id, 'filter' => 'on_checked']) }}"><b>На проверке:</b> <span>{{ $zadaniesCounts['on_checked'] }}</span></a></p>
                        <p><a href="{{ route('web_student_zadanies_index', [$course->id, 'filter' => 'done']) }}"><b>Выполенные:</b> <span>{{ $zadaniesCounts['done'] }}</span></a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
