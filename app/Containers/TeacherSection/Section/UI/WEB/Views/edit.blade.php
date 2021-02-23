@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" id="why">
        <div class="container mb-4">
            <div class="head-content">
                <h1 class="heading col">
                    Основы организации хозяйственной деятельности + КР
                    <p class="btn-change-title-course" title="Редактировать заголовок"><i class="fa fa-pencil" aria-hidden="true"></i></p>
                </h1>

                <div class="input-group mb-3" style="display: none">
                    <input type="text" value="Основы организации хозяйственной деятельности + КР" class="form-control" placeholder="" aria-label="" aria-describedby="basic-addon1">
                    <div class="input-group-append">
                        <button class="btn btn-outline-success" type="button">Сохранить</button>
                        <button class="btn btn-outline-danger" type="button">Отмена</button>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="form mb-3">
                        <form>
                            <div class="form-group">
                                <label for="title_section">Заголовок раздела</label>
                                <input type="text" class="form-control" id="title_section" value="Общая информация о дисциплине" placeholder="Введите заголовок раздела">
                            </div>

                            <div class="form-group">
                                <label for="main_info_section">Основная информация</label>
                                <textarea class="ckeditor-textarea">
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
                                </textarea>
                            </div>

                            <div class="form-group">
                                <label for="links_section">Прикрепленные ссылки</label>

                                <div>
                                    <div class="div-link-change-section" v-for="link in links">
                                        <span class="btn-delete-link" title="Удалить ссылку" @click="removeLink">
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </span>
                                        <p>
                                            <label>Название ссылки:
                                                <input type="text" v-model="link.title">
                                            </label>
                                        </p>
                                        <p>
                                            <label>Cсылка:
                                                <input type="text" v-model="link.url">
                                            </label>
                                        </p>
                                    </div>

                                    <button type="button" class="btn btn-info" @click="addLink">Добавить ссылку</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="files_section">Прикрепленные файлы</label>
                                <table class="table-hover mt-2 table-list-files" border="1">
                                    <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Название</th>
                                        <th>Размер</th>
                                        <th>Скачать</th>
                                        <th>Удалить</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <img class="table-list-radanie-file-icon" style="width: 30px;" src="{{ asset('file_icons/png/doc.png') }}" alt="">
                                            <span>file.pdf</span>
                                        </td>
                                        <td>2mb</td>
                                        <td>
                                            <i class="fa fa-download" aria-hidden="true"></i>
                                        </td>
                                        <td>
                                            <i class="fa fa-times" aria-hidden="true"></i>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                            <div class="form-group">
                                <label for="exampleFormControlFile1">Добавить файлы</label>
                                <input type="file" multiple class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </form>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-light" style="margin-right: 10px">Предпросмотр</button>
                            <button class="btn btn-success">Сохранить</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        var changeSectionCourseComponent = {
            data: {
                links: [
                    {
                        id: 1,
                        title: 'Форум от 11.01.2021, 8-30 Экзамен по дисциплине «ОХД», Группа СКС-17',
                        url: 'https://google.com'
                    },
                    {
                        id: 2,
                        title: 'Форум от 11.01.2021, 8-30 Экзамен по дисциплине «ОХД», Группа СКС-17',
                        url: 'https://google.com'
                    },
                    {
                        id: 3,
                        title: 'Форум от 11.01.2021, 8-30 Экзамен по дисциплине «ОХД», Группа СКС-17',
                        url: 'https://google.com'
                    },
                    {
                        id: 4,
                        title: 'Форум от 11.01.2021, 8-30 Экзамен по дисциплине «ОХД», Группа СКС-17',
                        url: 'https://google.com'
                    },
                ],
            },
            methods: {
                addLink: function(){
                    this.links.push({
                        title: '',
                        url: ''
                    });
                },
                removeLink: function(action){

                }
            }
        };

        mixins.push(changeSectionCourseComponent);
    </script>

@endpush
