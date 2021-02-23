@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" id="why">
        <div class="container">
            <div class="head-content mb-4">
                <h1 class="heading col">Задания курса "Основы организации хозяйственной деятельности + КР"</h1>
            </div>


            <div class="row">
                <div class="py-3 col-md-9">
                <table class="table-hover table-list-zadanie" border="1">
                    <thead>
                    <th>№</th>
                    <th>Преподаватель</th>
                    <th>Тип</th>
                    <th>Дата получения</th>
                    <th>Срок сдачи</th>
                    <th>Статус</th>
                    <th>Оценка</th>
                    </thead>
                    <tr class="table-info table-row" data-href="{{ route('web_student_zadanies_show', ['asd', 'asd']) }}">
                        <td>1</td>
                        <td>Иванова Ивановна</td>
                        <td>Перевод</td>
                        <td>20.12.2020</td>
                        <td>20.12.2020</td>
                        <td>Новое</td>
                        <td>-</td>
                    </tr>
                    <tr class="table-warning table-row" data-href="{{ route('web_student_zadanies_show', ['asd', 'asd']) }}">
                        <td>1</td>
                        <td>Иванова Ивановна</td>
                        <td>Перевод</td>
                        <td>20.12.2020</td>
                        <td>20.12.2020</td>
                        <td>На проверке</td>
                        <td>-</td>
                    </tr>
                    <tr class="table-success table-row" data-href="{{ route('web_student_zadanies_show', ['asd', 'asd']) }}">
                        <td>1</td>
                        <td>Иванова Ивановна</td>
                        <td>Перевод</td>
                        <td>20.12.2020</td>
                        <td>20.12.2020</td>
                        <td>Зачтено</td>
                        <td>-</td>
                    </tr>
                    <tr class="table-danger table-row" data-href="{{ route('web_student_zadanies_show', ['asd', 'asd']) }}">
                        <td>1</td>
                        <td>Иванова Ивановна</td>
                        <td>Перевод</td>
                        <td>20.12.2020</td>
                        <td>20.12.2020</td>
                        <td>Не зачтено</td>
                        <td>-</td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>Иванова Ивановна</td>
                        <td>Перевод</td>
                        <td>20.12.2020</td>
                        <td>20.12.2020</td>
                        <td>Новое</td>
                        <td>-</td>
                    </tr>
                </table>

            </div>

                <div class="py-3 col-md-3 main-right-div">
                    <div class="right-div-block">
                        <h4>Статус</h4>
                        <ul style="list-style: none">
                            <li>
                                <label class="radio-li-item">Все
                                    <input name="radio-1" type="radio" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-li-item">Новое
                                    <input name="radio-1" type="radio">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-li-item">На проверке
                                    <input name="radio-1" type="radio">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-li-item">Зачтено
                                    <input name="radio-1"  type="radio">
                                    <span name="radio-1" class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-li-item">Не зачтено
                                    <input name="radio-1"  type="radio">
                                    <span name="radio-1" class="checkmark"></span>
                                </label>
                            </li>
                        </ul>
                    </div>

                    <div class="right-div-block">
                        <h4>Раздел</h4>
                        <ul style="list-style: none">
                            <li>
                                <select class="form-control">
                                    <option>Все</option>
                                    <option>Раздел 1</option>
                                    <option>Раздел 1</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
