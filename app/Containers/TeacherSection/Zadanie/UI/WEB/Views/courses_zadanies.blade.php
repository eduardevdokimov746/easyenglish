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
                        <tr class="table-row" data-href="{{ route('web_teacher_zadanies_index', 'asd') }}">
                            <td>Название курса 1</td>
                            <td>2</td>
                            <td>23:33 20.11.2020</td>
                            <td>22</td>
                            <td>
                                23:33 20.11.2020
                            </td>
                        </tr>
                        <tr class="table-row" data-href="{{ route('web_teacher_zadanies_index', 'asd') }}">
                            <td>Название курса 1</td>
                            <td>2</td>
                            <td>23:33 20.11.2020</td>
                            <td>22</td>
                            <td>
                                23:33 20.11.2020
                            </td>
                        </tr>
                        <tr class="table-row" data-href="{{ route('web_teacher_zadanies_index', 'asd') }}">
                            <td>Название курса 1</td>
                            <td>2</td>
                            <td>23:33 20.11.2020</td>
                            <td>22</td>
                            <td>
                                23:33 20.11.2020
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection
