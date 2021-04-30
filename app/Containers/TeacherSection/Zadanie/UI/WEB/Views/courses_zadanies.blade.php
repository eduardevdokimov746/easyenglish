@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" style="padding-top: 100px" id="why">
        <div class="container">
            <div class="head-content mb-4 row">
                @include('components/nav_panel')
                <div>
                    <a href="{{ route('web_teacher_zadanies_create') }}" class="hover-button head-btn">Добавить задание</a>
                </div>
            </div>

            <div class="row">
                <div style="background: white; width: 100%">
                    <table class="table table-hover" style="text-align: center">
                        <thead>
                        <tr>
                            <th>Название курса</th>
                            <th>Новых ответов</th>
                            <th>Последний ответ</th>
                            <th>Всего заданий</th>
                            <th>Добавленно задание</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $course)
                        <tr class="table-row" data-href="{{ route('web_teacher_zadanies_index', $course->id) }}">
                            <td>{{ $course->title }}</td>
                            <td>{{ $course->countNewResponse }}</td>
                            <td>{!! $course->lastAddResponse?->show_updated_at ?: '&mdash;'  !!}</td>
                            <td>{{ $course->zadanies_count }}</td>
                            <td>
                                {!! $course->lastAddZadanie?->show_created_at ?: '&mdash;' !!}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection

