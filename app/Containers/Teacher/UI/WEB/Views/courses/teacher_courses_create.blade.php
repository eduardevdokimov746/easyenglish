@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" id="why">
        <div class="container mb-4">
            <div class="head-content">
                <h1 class="heading col">
                    Создание курса
                </h1>
            </div>

            <div class="row mt-3 mb-3">
                <div class="col">
                    <div class="form form-create-course">
                        <h3>Основные параметры</h3>

                        <div class="form-group mt-3">
                            <label for="title_course">
                                Заголовок курса <span class="mark-required-field" title="Обязательно для заполнения">*</span>
                                <input id="title_course" class="form-control" type="text">
                            </label>
                        </div>

                        <div class="form-group mt-3">
                            <label for="general_info_course">
                                Общая характеристика (необязательно)
                                <textarea id="general_info_course" class="form-control"></textarea>
                            </label>
                        </div>

                        <div class="form-group mt-3">
                            <label for="description_course">
                                Краткое описание (необязательно)
                                <textarea id="description_course" class="form-control"></textarea>
                            </label>
                        </div>

                        <div class="form-group mt-3">
                            <label for="idea_course">
                                Цель (необязательно)
                                <textarea id="idea_course" class="form-control"></textarea>
                            </label>
                        </div>

                        <div class="form-group mt-3">
                            <label for="literature_course">
                                Список рекомендуемой литературы (необязательно)
                                <textarea id="literature_course" class="form-control"></textarea>
                            </label>
                        </div>

                    </div>
                </div>
            </div>




            <div class="row" v-for="section in sections">
                <div class="col">
                    <div class="form mb-3">
                        <form>
                            <div class="form-group">
                                <label for="title_section">Заголовок раздела</label>
                                <input type="text" class="form-control" id="title_section" v-model="section.title" placeholder="Введите заголовок раздела">
                            </div>

                            <div class="form-group div-ckeditor">
                                <label for="main_info_section">Основная информация</label>
                                <textarea id="main_info_section" class="ckeditor-textarea"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="links_section">Прикрепленные ссылки</label>

                                <div>

                                    <div class="div-link-change-section" v-for="link in section.links">
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
                                    <tr v-for="(file, index) in section.files">
                                        <td>@{{ ++index }}</td>
                                        <td>
                                            <img class="table-list-radanie-file-icon" style="width: 30px;" :src="file.icon" alt="">
                                            <span>@{{ file.title }}</span>
                                        </td>
                                        <td>@{{ file.size }}</td>
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




            <div class="block-footer-btns-create-course">
                <button class="btn btn-info" @click="addSection">Добавить раздел</button>
                <button class="btn btn-primary" @click="test">Создать</button>
            </div>


        </div>
    </section>
@endsection

@push('scripts')
    <script>

        $(document).on('mouseover', '.row', function(){
            if($(this).find('.ckeditor-textarea') != undefined) {
                $(this).find('.ckeditor-textarea').ckeditor();
            }
        });



        var exampleSectionData = {
            title: '',
            mainInfo: '',
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
        };

        var createCourseComponent = {
            data: {
                sections: [],
            },
            methods: {
                addSection: function(){
                    this.sections.push(exampleSectionData);
                },
                deleteSection: function(){

                },
                addLink: function(){

                },
                removeLink: function(){

                },
                test: function(){
                    //Работа с ckeditor полями (получение данных)
                    $('.ckeditor-textarea').each(function(key, item){
                         console.log($(item).val());
                    });
                }
            },
        };



        mixins.push(createCourseComponent);
    </script>
@endpush
