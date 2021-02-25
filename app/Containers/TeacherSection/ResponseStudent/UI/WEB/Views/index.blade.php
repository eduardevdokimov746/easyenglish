@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" id="why">

        <div style="width: 95%; margin: 0 auto">
            <div class="head-content mb-4">
                <h1 class="heading col">Ответы студентов на "Название задания"</h1>
            </div>

            <div class="row">
                <div class="py-3 col-md-9">
                    <table class="table-hover table-list-zadanie" border="1">
                        <thead>
                        <th>Группа</th>
                        <th>ФИО</th>
                        <th>Дата добавления</th>
                        <th>Дата изменения</th>
                        <th>Оценка</th>
                        <th>Оцененно</th>
                        <th>Изменение оценки</th>
                        </thead>
                        <tr class="table-row" data-href="{{ route('web_teacher_responses_students_show', ['asd', 'asd', 'asd']) }}">
                            <td>СКС-17</td>
                            <td>Евдокимов Эдуард Игоревич</td>
                            <td>20.20.2021</td>
                            <td>20.20.2021</td>
                            <td>10</td>
                            <td>20.20.2021</td>
                            <td>20.20.2021</td>
                        </tr>
                        <tr class="table-row" data-href="{{ route('web_teacher_responses_students_show', ['asd', 'asd', 'asd']) }}">
                            <td>СКС-17</td>
                            <td>Евдокимов Эдуард Игоревич</td>
                            <td>20.20.2021</td>
                            <td>20.20.2021</td>
                            <td>10</td>
                            <td>20.20.2021</td>
                            <td>20.20.2021</td>
                        </tr>
                        <tr class="table-row" data-href="{{ route('web_teacher_responses_students_show', ['asd', 'asd', 'asd']) }}">
                            <td>СКС-17</td>
                            <td>Евдокимов Эдуард Игоревич</td>
                            <td>20.20.2021</td>
                            <td>20.20.2021</td>
                            <td>10</td>
                            <td>20.20.2021</td>
                            <td>20.20.2021</td>
                        </tr>
                        <tr class="table-row" data-href="{{ route('web_teacher_responses_students_show', ['asd', 'asd', 'asd']) }}">
                            <td>СКС-17</td>
                            <td>Евдокимов Эдуард Игоревич</td>
                            <td>20.20.2021</td>
                            <td>20.20.2021</td>
                            <td>10</td>
                            <td>20.20.2021</td>
                            <td>20.20.2021</td>
                        </tr>

                    </table>

                </div>

                <div class="py-3 col-md-3 main-right-div">
                    <div class="right-div-block">
                        <h4>Группа</h4>
                        <ul>
                            <li>
                                <select class="form-control">
                                    <option>Все</option>
                                    <option>СКС-17а</option>
                                    <option>СКС-17б</option>
                                </select>
                            </li>
                        </ul>
                    </div>

                    <div class="right-div-block">
                        <h4>Поиск</h4>
                        <ul>
                            <li>
                                <input class="form-control" type="text" placeholder="ФИО студента">
                            </li>
                        </ul>
                    </div>

                    <div class="right-div-block">
                        <h4>Сортировка</h4>
                        <ul>
                            <li>
                                <label class="radio-li-item">ФИО
                                    <input name="radio-1" type="radio" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-li-item">Изменение ответа
                                    <input name="radio-1" type="radio">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-li-item">Изменение оценки
                                    <input name="radio-1" type="radio">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-li-item">Оценка
                                    <input name="radio-1"  type="radio">
                                    <span name="radio-1" class="checkmark"></span>
                                </label>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
