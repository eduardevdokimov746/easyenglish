@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" id="why">
        <div class="container mb-4">
            <div class="head-content">
                <h1 class="heading col">
                    Создание задания
                </h1>
            </div>

            <div class="row mt-3 mb-3">
                <div class="col">
                    <div class="form form-create-course">
                        <h3>Основные параметры</h3>

                        <div class="form-group mt-3">
                            <label for="list_courses">
                                Курс<span class="mark-required-field" title="Обязательно для заполнения">*</span>
                                <select id="list_courses" class="form-control">
                                    <option>Название курса 1</option>
                                    <option>Название курса 2</option>
                                    <option>Название курса 3</option>
                                </select>
                            </label>
                        </div>

                        <div class="form-group mt-3">
                            <label for="list_sections">
                                Раздел<span class="mark-required-field" title="Обязательно для заполнения">*</span>
                                <select id="list_sections" class="form-control">
                                    <option>Название раздела 1</option>
                                    <option>Название раздела 2</option>
                                    <option>Название раздела 3</option>
                                </select>
                            </label>
                        </div>


                        <div class="form-group mt-3">
                            <label for="title_course">
                                Название<span class="mark-required-field" title="Обязательно для заполнения">*</span>
                                <input id="title_course" class="form-control" type="text">
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="description_zadanie">Описание (необязательно)</label>
                            <textarea id="description_zadanie" class="ckeditor-textarea"></textarea>
                        </div>

                        <div class="form-group">
                            <label for="main_links_zadanie">Прикрепленные ссылки</label>
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
                            <label for="main_files_zadanie">Прикрепленные файлы</label>
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
                            <label for="exampleFormControlFile1">Добавить файлы (необязательно)</label>
                            <input type="file" multiple class="form-control-file" id="exampleFormControlFile1">
                        </div>

                        <div class="form-group mt-3">
                            <label>
                                Дата публикации
                                <input id="datetime-input-zadan-queue" type="datetime-local" :disabled="isDisableQueuePublish">
                                <label for="set-zadan-queue" style="width: auto" class="no-margin">
                                    <input type="checkbox" value="" id="set-zadan-queue" v-model="isDisableQueuePublish">
                                    Отложить публикацию задания
                                </label>
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="last-datetime-send">Крайний срок сдачи</label>
                            <input type="datetime-local" required="" id="last-datetime-send">
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="check-isPublish-zadanie">
                            <label class="form-check-label" for="check-isPublish-zadanie">Опубликовать</label>
                        </div>

                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        <button class="btn btn-light" style="margin-right: 10px">Сохранить как шаблон</button>
                        <button class="btn btn-light" style="margin-right: 10px">Предпросмотр</button>
                        <button class="btn btn-primary" >Создать</button>
                    </div>
                </div>

                <div class="col-md-3 main-right-div">
                    <div class="right-div-block">
                        <h4>Тип</h4>
                        <ul>
                            <li>
                                <label class="radio-li-item checkbox-url" data-url="{{ route('web_teacher_zadanies_create', ['type' => 'main'])}}">Обычное
                                    <input name="radio-1" type="radio">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-li-item checkbox-url" data-url="{{ route('web_teacher_zadanies_create', ['type' => 'testing'])}}">Тестирование
                                    <input name="radio-1" type="radio">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </section>
@endsection

@push('scripts')
    <script>
        var createZadanieComponent = {
            data: {
                title: '',
                isDisableQueuePublish: true,
                links: [
                    {
                        title: 'Тестовая ссылка',
                        url: 'https://google.com'
                    }
                ],
                files: [
                    {
                        id: '',
                        title: 'test.pdf',
                        icon: "{{ asset('file_icons/png/doc.png') }}",
                        size: '2mb'
                    }
                ]
            },
            methods: {
                addLink: function(){

                },
                removeLink: function(){

                }
            }
        };

        mixins.push(createZadanieComponent);
    </script>
@endpush
