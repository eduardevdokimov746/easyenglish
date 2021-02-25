@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" id="why">

        <div style="width: 95%; margin: 0 auto">
            <div class="head-content mb-4">
                <h1 class="heading col">Задания курса "Основы организации хозяйственной деятельности + КР"</h1>
            </div>

            <div class="row">
                <div class="py-3 col-md-9">
                    <table class="table-hover table-list-zadanie" border="1">
                        <thead>
                        <th>№</th>
                        <th>Название</th>
                        <th>Тип</th>
                        <th>Раздел</th>
                        <th>Новых ответов</th>
                        <th>Ответов</th>
                        <th>Срок сдачи</th>
                        <th>Дата добавления</th>
                        <th>Дата изменения</th>
                        <th>Изменить</th>
                        </thead>
                        <tr class="table-row" data-href="{{ route('web_teacher_responses_students_index', ['asd', 'asd']) }}">
                            <td>1</td>
                            <td>Название задания</td>
                            <td>Перевод</td>
                            <td>Название раздела</td>
                            <td>4</td>
                            <td>22</td>
                            <td>20.12.2020</td>
                            <td>20.12.2020</td>
                            <td>20.12.2020</td>
                            <td>
                                <a href="{{ route('web_teacher_zadanies_edit', 'asd') }}">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                        <tr class="table-row" data-href="{{ route('web_teacher_responses_students_index', ['asd', 'asd']) }}">
                            <td>1</td>
                            <td>Название задания</td>
                            <td>Перевод</td>
                            <td>Название раздела</td>
                            <td>4</td>
                            <td>22</td>
                            <td>20.12.2020</td>
                            <td>20.12.2020</td>
                            <td>20.12.2020</td>
                            <td>
                                <a href="{{ route('web_teacher_zadanies_edit', 'asd') }}">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>
                        <tr class="table-row" data-href="{{ route('web_teacher_responses_students_index', ['asd', 'asd']) }}">
                            <td>1</td>
                            <td>Название задания</td>
                            <td>Перевод</td>
                            <td>Название раздела</td>
                            <td>4</td>
                            <td>22</td>
                            <td>20.12.2020</td>
                            <td>20.12.2020</td>
                            <td>20.12.2020</td>
                            <td>
                                <a href="{{ route('web_teacher_zadanies_edit', 'asd') }}">
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                </a>
                            </td>
                        </tr>

                    </table>

                </div>

                <div class="py-3 col-md-3 main-right-div">
                    <div class="right-div-block">
                        <h4>Раздел</h4>
                        <ul>
                            <li>
                                <select class="form-control">
                                    <option>Все</option>
                                    <option>Раздел 1</option>
                                    <option>Раздел 1</option>
                                </select>
                            </li>
                        </ul>
                    </div>

                    <div class="right-div-block">
                        <h4>Поиск</h4>
                        <ul>
                            <li>
                                <input class="form-control" type="text" placeholder="Название задания">
                            </li>
                        </ul>
                    </div>

                    <div class="right-div-block">
                        <h4>Сортировка</h4>
                        <ul>
                            <li>
                                <label class="radio-li-item">Ответам
                                    <input name="radio-1" type="radio" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-li-item">Задание
                                    <input name="radio-1" type="radio">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-li-item">Раздел
                                    <input name="radio-1" type="radio">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-li-item">Дата ответа
                                    <input name="radio-1"  type="radio">
                                    <span name="radio-1" class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-li-item">Изменению
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
