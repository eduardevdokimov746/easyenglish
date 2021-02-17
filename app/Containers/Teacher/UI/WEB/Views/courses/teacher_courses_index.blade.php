@extends('layouts.main')

@section('content')
<section class="other_services pt-5" style="padding-top: 100px" id="why">
    <div class="container">
        <div class="head-content mb-4 row">
            @include('teacher::components/nav_panel')
            <div>
                <a href="{{ route('web_teacher_courses_create') }}" class="hover-button head-btn">Добавить курс</a>
            </div>
        </div>

        <div class="row">
            <div style="background: white; width: 100%">
                <table class="table table-hover" style="text-align: center">
                    <thead>
                        <tr>
                            <th>Название</th>
                            <th>Разделов</th>
                            <th>Добавленно</th>
                            <th>Обновленно</th>
                            <th>Скрыть</th>
                            <th>Удалить</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-row" data-href="{{ route('web_teacher_courses_show', 'asd') }}">
                            <td>Название курса 1</td>
                            <td>2</td>
                            <td>23:33 20.11.2020</td>
                            <td>23:33 20.11.2020</td>
                            <td>
                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                            </td>
                            <td>
                                <i class="fa fa-ban" aria-hidden="true"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>Название курса 1</td>
                            <td>2</td>
                            <td>23:33 20.11.2020</td>
                            <td>23:33 20.11.2020</td>
                            <td>
                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                            </td>
                            <td>
                                <i class="fa fa-ban" aria-hidden="true"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>Название курса 1</td>
                            <td>2</td>
                            <td>23:33 20.11.2020</td>
                            <td>23:33 20.11.2020</td>
                            <td>
                                <i class="fa fa-eye-slash" aria-hidden="true"></i>
                            </td>
                            <td>
                                <i class="fa fa-ban" aria-hidden="true"></i>
                            </td>
                        </tr>
                        <tr>
                            <td>Название курса 1</td>
                            <td>2</td>
                            <td>23:33 20.11.2020</td>
                            <td>23:33 20.11.2020</td>
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
