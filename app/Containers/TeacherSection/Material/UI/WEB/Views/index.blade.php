@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" style="padding-top: 100px" id="why">
        <div class="container">

            <div class="head-content mb-4 row">
                @include('components/nav_panel')
                <div>
                    <a href="{{ route('web_teacher_materials_create') }}" class="hover-button head-btn">Добавить материал</a>
                </div>
            </div>

            {{--@include('components.breadcrumbs')--}}

            <div class="row">
                <div style="background: white; width: 100%">
                    <table class="table table-hover" style="text-align: center">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Добавленно</th>
                            <th>Обновленно</th>
                            <th>Лайков</th>
                            <th>Дизлайков</th>
                            <th>Скрыть</th>
                            <th>Удалить</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="table-row" data-href="{{ route('web_teacher_materials_edit', 'asd') }}">
                            <td>Название текста</td>
                            <td>23:33 20.11.2020</td>
                            <td>23:33 20.11.2020</td>
                            <td>2</td>
                            <td>3</td>
                            <td>
                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                            </td>
                            <td>
                                <i class="fa fa-ban" aria-hidden="true"></i>
                            </td>
                        </tr>
                        <tr class="table-row" data-href="{{ route('web_teacher_courses_show', 'asd') }}">
                            <td>Название курса 1</td>
                            <td>23:33 20.11.2020</td>
                            <td>23:33 20.11.2020</td>
                            <td>2</td>
                            <td>3</td>
                            <td>
                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                            </td>
                            <td>
                                <i class="fa fa-ban" aria-hidden="true"></i>
                            </td>
                        </tr>
                        <tr class="table-row" data-href="{{ route('web_teacher_courses_show', 'asd') }}">
                            <td>Название курса 1</td>
                            <td>23:33 20.11.2020</td>
                            <td>23:33 20.11.2020</td>
                            <td>2</td>
                            <td>3</td>
                            <td>
                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                            </td>
                            <td>
                                <i class="fa fa-ban" aria-hidden="true"></i>
                            </td>
                        </tr>
                        <tr class="table-row" data-href="{{ route('web_teacher_courses_show', 'asd') }}">
                            <td>Название курса 1</td>
                            <td>23:33 20.11.2020</td>
                            <td>23:33 20.11.2020</td>
                            <td>2</td>
                            <td>3</td>
                            <td>
                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                            </td>
                            <td>
                                <i class="fa fa-ban" aria-hidden="true"></i>
                            </td>
                        </tr>


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
