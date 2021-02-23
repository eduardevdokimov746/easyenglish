@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" id="why">
        <div class="container mb-4">
            <div class="head-content mb-4">
                <h1 class="heading col">Основы организации хозяйственной деятельности + КР</h1>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form mb-3">
                        <div class="form-head">
                            <h2 style="text-align: center">Общая информация о дисциплине</h2>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p style="white-space: pre-line;">
                                    2020-2021 учебный год
                                    Группы: СКС-17, СКС-17з
                                    Название дисциплины: «Основы организации хозяйственной деятельности» (ОХД)
                                    4 курс, 7 семестр
                                    Курсовая работа по дисциплине «ОХД»: 4 курс, 8 семестр
                                    Количество часов на изучение дисциплины: всего - 108 ч, в том числе:
                                    лекции - 32 ч, практические занятия - 16 ч, СРС - 60 ч
                                    Форма контроля - экзамен
                                    Лектор - Гонтовая Наталия Викторовна

                                    Вопросы преподавателю - через сообщения в «лс» на сайте ДО.
                                </p>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <h5>Прикрепленные ссылки</h5>
                                <div>
                                    <p><a href="#">Форум от 11.01.2021, 8-30 Экзамен по дисциплине «ОХД», Группа СКС-17</a></p>
                                    <p><a href="#">Форум от 11.01.2021, 8-30 Экзамен по дисциплине «ОХД», Группа СКС-17</a></p>
                                    <p><a href="#">Форум от 11.01.2021, 8-30 Экзамен по дисциплине «ОХД», Группа СКС-17</a></p>
                                </div>
                            </div>
                        </div>

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
                                        <tr data-href="#" class="table-row">
                                            <td>1</td>
                                            <td>
                                                <img class="table-list-radanie-file-icon" style="width: 30px;" src="{{ asset('file_icons/png/doc.png') }}" alt="">
                                                <span>file.pdf</span>
                                            </td>
                                            <td>2mb</td>
                                        </tr>
                                        <tr data-href="#" class="table-row">
                                            <td>1</td>
                                            <td>
                                                <img class="table-list-radanie-file-icon" style="width: 30px;" src="{{ asset('file_icons/png/doc.png') }}" alt="">
                                                <span>file.pdf</span>
                                            </td>
                                            <td>2mb</td>
                                        </tr>
                                        <tr data-href="#" class="table-row">
                                            <td>1</td>
                                            <td>
                                                <img class="table-list-radanie-file-icon" style="width: 30px;" src="{{ asset('file_icons/png/doc.png') }}" alt="">
                                                <span>file.pdf</span>
                                            </td>
                                            <td>2mb</td>
                                        </tr>
                                        <tr data-href="#" class="table-row">
                                            <td>1</td>
                                            <td>
                                                <img class="table-list-radanie-file-icon" style="width: 30px;" src="{{ asset('file_icons/png/doc.png') }}" alt="">
                                                <span>file.pdf</span>
                                            </td>
                                            <td>2mb</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <h5>Задания</h5>

                                <table class="table-hover mt-2 table-list-zadanie" border="1">
                                    <thead>
                                    <th>№</th>
                                    <th>Название</th>
                                    <th>Тип</th>
                                    <th>Дата получения</th>
                                    <th>Срок сдачи</th>
                                    <th>Статус</th>
                                    <th>Оценка</th>
                                    </thead>
                                    <tr class="table-info table-row" data-href="#">
                                        <td>1</td>
                                        <td>Иванова Ивановна</td>
                                        <td>Перевод</td>
                                        <td>20.12.2020</td>
                                        <td>20.12.2020</td>
                                        <td>Новое</td>
                                        <td>-</td>
                                    </tr>
                                    <tr class="table-warning table-row" data-href="#">
                                        <td>1</td>
                                        <td>Иванова Ивановна</td>
                                        <td>Перевод</td>
                                        <td>20.12.2020</td>
                                        <td>20.12.2020</td>
                                        <td>На проверке</td>
                                        <td>-</td>
                                    </tr>
                                    <tr class="table-success table-row" data-href="#">
                                        <td>1</td>
                                        <td>Иванова Ивановна</td>
                                        <td>Перевод</td>
                                        <td>20.12.2020</td>
                                        <td>20.12.2020</td>
                                        <td>Зачтено</td>
                                        <td>-</td>
                                    </tr>
                                    <tr class="table-danger table-row" data-href="#">
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
                        </div>
                    </div>

                    <div class="form mb-3">
                        <div class="form-head">
                            <h2 style="text-align: center">Общая информация о дисциплине</h2>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p style="white-space: pre-line;">
                                    2020-2021 учебный год
                                    Группы: СКС-17, СКС-17з
                                    Название дисциплины: «Основы организации хозяйственной деятельности» (ОХД)
                                    4 курс, 7 семестр
                                    Курсовая работа по дисциплине «ОХД»: 4 курс, 8 семестр
                                    Количество часов на изучение дисциплины: всего - 108 ч, в том числе:
                                    лекции - 32 ч, практические занятия - 16 ч, СРС - 60 ч
                                    Форма контроля - экзамен
                                    Лектор - Гонтовая Наталия Викторовна

                                    Вопросы преподавателю - через сообщения в «лс» на сайте ДО.
                                </p>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <h5>Прикрепленные ссылки</h5>
                                <div>
                                    <p><a href="#">Форум от 11.01.2021, 8-30 Экзамен по дисциплине «ОХД», Группа СКС-17</a></p>
                                    <p><a href="#">Форум от 11.01.2021, 8-30 Экзамен по дисциплине «ОХД», Группа СКС-17</a></p>
                                    <p><a href="#">Форум от 11.01.2021, 8-30 Экзамен по дисциплине «ОХД», Группа СКС-17</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <h5>Прикрепленные файлы</h5>
                                <table class="table-hover mt-2" border="1" style="text-align: center">
                                    <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Название</th>
                                        <th>Размер</th>
                                        <th>Скачать</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>file.pdf</td>
                                        <td>2mb</td>
                                        <td><i class="fa fa-download" aria-hidden="true"></i></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <h5>Задания</h5>

                                <table class="table-hover" border="1" style="background: white;
    width: 100%;
    text-align: center;
    border: 1px solid silver;">
                                    <thead>
                                    <th>№</th>
                                    <th>Преподаватель</th>
                                    <th>Тип</th>
                                    <th>Дата получения</th>
                                    <th>Срок сдачи</th>
                                    <th>Статус</th>
                                    <th>Оценка</th>
                                    </thead>
                                    <tr class="table-info">
                                        <td>1</td>
                                        <td>Иванова Ивановна</td>
                                        <td>Перевод</td>
                                        <td>20.12.2020</td>
                                        <td>20.12.2020</td>
                                        <td>Новое</td>
                                        <td>-</td>
                                    </tr>
                                    <tr class="table-warning">
                                        <td>1</td>
                                        <td>Иванова Ивановна</td>
                                        <td>Перевод</td>
                                        <td>20.12.2020</td>
                                        <td>20.12.2020</td>
                                        <td>На проверке</td>
                                        <td>-</td>
                                    </tr>
                                    <tr class="table-success">
                                        <td>1</td>
                                        <td>Иванова Ивановна</td>
                                        <td>Перевод</td>
                                        <td>20.12.2020</td>
                                        <td>20.12.2020</td>
                                        <td>Зачтено</td>
                                        <td>-</td>
                                    </tr>
                                    <tr class="table-danger">
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
                        </div>
                    </div>

                    <div class="form mb-3">
                        <div class="form-head">
                            <h2 style="text-align: center">Общая информация о дисциплине</h2>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p style="white-space: pre-line;">
                                    2020-2021 учебный год
                                    Группы: СКС-17, СКС-17з
                                    Название дисциплины: «Основы организации хозяйственной деятельности» (ОХД)
                                    4 курс, 7 семестр
                                    Курсовая работа по дисциплине «ОХД»: 4 курс, 8 семестр
                                    Количество часов на изучение дисциплины: всего - 108 ч, в том числе:
                                    лекции - 32 ч, практические занятия - 16 ч, СРС - 60 ч
                                    Форма контроля - экзамен
                                    Лектор - Гонтовая Наталия Викторовна

                                    Вопросы преподавателю - через сообщения в «лс» на сайте ДО.
                                </p>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <h5>Прикрепленные ссылки</h5>
                                <div>
                                    <p><a href="#">Форум от 11.01.2021, 8-30 Экзамен по дисциплине «ОХД», Группа СКС-17</a></p>
                                    <p><a href="#">Форум от 11.01.2021, 8-30 Экзамен по дисциплине «ОХД», Группа СКС-17</a></p>
                                    <p><a href="#">Форум от 11.01.2021, 8-30 Экзамен по дисциплине «ОХД», Группа СКС-17</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <h5>Прикрепленные файлы</h5>
                                <table class="table-hover mt-2" border="1" style="text-align: center">
                                    <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Название</th>
                                        <th>Размер</th>
                                        <th>Скачать</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>file.pdf</td>
                                        <td>2mb</td>
                                        <td><i class="fa fa-download" aria-hidden="true"></i></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <h5>Задания</h5>

                                <table class="table-hover" border="1" style="background: white;
    width: 100%;
    text-align: center;
    border: 1px solid silver;">
                                    <thead>
                                    <th>№</th>
                                    <th>Преподаватель</th>
                                    <th>Тип</th>
                                    <th>Дата получения</th>
                                    <th>Срок сдачи</th>
                                    <th>Статус</th>
                                    <th>Оценка</th>
                                    </thead>
                                    <tr class="table-info">
                                        <td>1</td>
                                        <td>Иванова Ивановна</td>
                                        <td>Перевод</td>
                                        <td>20.12.2020</td>
                                        <td>20.12.2020</td>
                                        <td>Новое</td>
                                        <td>-</td>
                                    </tr>
                                    <tr class="table-warning">
                                        <td>1</td>
                                        <td>Иванова Ивановна</td>
                                        <td>Перевод</td>
                                        <td>20.12.2020</td>
                                        <td>20.12.2020</td>
                                        <td>На проверке</td>
                                        <td>-</td>
                                    </tr>
                                    <tr class="table-success">
                                        <td>1</td>
                                        <td>Иванова Ивановна</td>
                                        <td>Перевод</td>
                                        <td>20.12.2020</td>
                                        <td>20.12.2020</td>
                                        <td>Зачтено</td>
                                        <td>-</td>
                                    </tr>
                                    <tr class="table-danger">
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
                        </div>
                    </div>
                </div>

                <div class="col-md-3 main-right-div">
                    <div class="right-div-block">
                        <h4>Информация</h4>
                        <p><b>Преподаватель:</b> <p>Евдокимов Эдуард Игоревич</p></p>
                        <p><b>Последнее обновление:</b> <p>12.02.2021 12:23</p></p>
                    </div>
                    <div class="right-div-block">
                        <h4>Задания</h4>
                        <p><a href="{{ route('web_student_zadanies_index', 'asd') }}"><b>Все:</b> <span>44</span></a></p>
                        <p><a href="{{ route('web_student_zadanies_index', 'asd') }}"><b>Новые:</b> <span>2</span></a></p>
                        <p><a href="#"><b>На проверке:</b> <span>4</span></a></p>
                        <p><a href="#"><b>Выполенные:</b> <span>23</span></a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
