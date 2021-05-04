@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" id="why">
        <div class="container mb-4">
            <div class="head-content">
                <h1 class="heading col">
                    Создание курса
                </h1>
            </div>

            @include('components.breadcrumbs', [$breadcrumb])

            @if (!$errors->has('data-auth-not-valid') && $errors->any())
                <div class="alert alert-danger">
                    <ul style="list-style: none">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('web_teacher_courses_store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mt-3 mb-3">
                    <div class="col">
                        <div class="form form-create-course">
                            <h3>Основные параметры</h3>

                            <div class="form-group mt-3">
                                <label for="title_course">
                                    Заголовок курса <span class="mark-required-field" title="Обязательно для заполнения">*</span>
                                    <input
                                        id="title_course"
                                        class="form-control"
                                        v-model="$v.course.title.$model"
                                        :class="{'is-invalid' : statusValidation($v.course.title, $v.course.title.required)}"
                                        type="text"
                                        name="title"
                                    >
                                    <div class="invalid-feedback">
                                        {{ __('ship::validation.required', ['attribute' => __('ship::attributes.title')]) }}
                                    </div>
                                </label>
                            </div>

                            <div class="form-group mt-3">
                                <label for="general_info_course">
                                    Общая характеристика (необязательно)
                                    <textarea id="general_info_course" name="characteristic" class="form-control ckeditor-textarea"></textarea>
                                </label>
                            </div>

                            <div class="form-group mt-3">
                                <label for="description_course">
                                    Краткое описание (необязательно)
                                    <textarea id="description_course" name="little_description" class="form-control ckeditor-textarea"></textarea>
                                </label>
                            </div>

                            <div class="form-group mt-3">
                                <label for="idea_course">
                                    Цель (необязательно)
                                    <textarea id="idea_course" name="target" class="form-control ckeditor-textarea"></textarea>
                                </label>
                            </div>

                            <div class="form-group mt-3">
                                <label for="literature_course">
                                    Список рекомендуемой литературы (необязательно)
                                    <textarea id="literature_course" name="list_literature" class="form-control ckeditor-textarea"></textarea>
                                </label>
                            </div>

                            <div class="form-group mt-3">
                                <label>Видимость
                                    <input type="checkbox" name="is_visible">
                                </label>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="row" v-for="(section, indexSection) in $v.sections.$each.$iter">
                    <div class="col">
                        <div class="form mb-3">
                            <div class="form-relative">
                            <span class="btn-delete-link-section" title="Удалить ссылку" @click="deleteSection(indexSection)">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </span>
                                <div class="form-group">
                                    <label for="title_section">Заголовок раздела <span class="mark-required-field" title="Обязательно для заполнения">*</span></label>
                                    <input
                                        id="title_section"
                                        class="form-control"
                                        v-model="section.title.$model"
                                        :class="{'is-invalid' : statusValidation(section.title, section.title.required)}"
                                        type="text"
                                        placeholder="Введите заголовок раздела"
                                        name="sections[][title]"
                                    >
                                    <div class="invalid-feedback">
                                        {{ __('ship::validation.required', ['attribute' => __('ship::attributes.title')]) }}
                                    </div>
                                </div>

                                <div class="form-group div-ckeditor">
                                    <label for="main_info_section">Основная информация</label>
                                    <textarea id="main_info_section" :name="'section_' + indexSection + '_description'" @mouseover.once="bCkeditor" class="ckeditor-textarea"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="links_section">Прикрепленные ссылки</label>

                                    <div>
                                        <div class="div-link-change-section" v-for="(link, indexLink) in section.$model.links">
                                            <span class="btn-delete-link" title="Удалить ссылку" @click="deleteLink(indexSection, indexLink)">
                                                <i class="fa fa-times" aria-hidden="true"></i>
                                            </span>

                                            <div class="input-group mb-3" style="width: 95%">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroup-sizing-default">Название</span>
                                                </div>
                                                <input type="text" class="form-control" v-model="link.title" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                                            </div>

                                            <div class="input-group mb-3" style="width: 95%">
                                                <div class="input-group-prepend">
                                                    <button class="btn btn-outline-secondary dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">@{{ link.type }}</button>
                                                    <div class="dropdown-menu">
                                                        <a class="dropdown-item" style="cursor: pointer" @click="selectLinkType(indexSection, indexLink, 'http')">http://</a>
                                                        <a class="dropdown-item" style="cursor: pointer" @click="selectLinkType(indexSection, indexLink, 'https')">https://</a>
                                                    </div>
                                                </div>

                                                <input type="text" class="form-control" placeholder="yandex.ru" @keyup="replaceUrl($event, indexSection, indexLink)" v-model="link.url">
                                            </div>
                                        </div>

                                        <button type="button" class="btn btn-info" @click="addLink(indexSection)">Добавить ссылку</button>
                                    </div>
                                </div>

                                <div class="form-group" v-if="section.$model.files.length">
                                    <label for="files_section">Прикрепленные файлы</label>
                                    <table class="table-hover mt-2 table-list-files" border="1">
                                        <thead>
                                        <tr>
                                            <th>№</th>
                                            <th>Название</th>
                                            <th>Размер</th>
                                            <th>Удалить</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(file, indexFile) in section.$model.files">
                                            <td>@{{ indexFile + 1 }}</td>
                                            <td class="text-left">
                                                <img class="table-list-radanie-file-icon" style="width: 30px;" :src="file.icon" alt="">
                                                <span>@{{ file.title }}</span>
                                            </td>
                                            <td>@{{ file.size }}</td>
                                            <td>
                                                <i class="fa fa-times" aria-hidden="true" @click="deleteFile($event, indexSection, indexFile)"></i>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Добавить файлы</label>
                                    <input type="file" class="form-control-file" @change="uploadFile($event, indexSection)">
                                </div>

                                <div class="form-group">
                                    <label>
                                        Видимость
                                        <input type="checkbox" name="is_visible" v-model="section.is_visible">
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="block-footer-btns-create-course">
                    <div>
                        <button class="btn btn-info" @click.prevent="addSection">Добавить раздел</button>
                    </div>

                    <div>
                        <button class="btn btn-primary" @click.prevent="submitBtn">Создать</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        var token = '{{ csrf_token() }}';
        var icons =  JSON.parse('{!! $icons !!}');

        function getIcon(fileName){
            var match = fileName.match(/.*\.(\S+)/);

            if(match && match[1]){
                if(icons[match[1]]){
                    return icons[match[1]];
                }
            }

            return icons['default'];
        }

        function getSize(countByte){
            var sizes = ['байт', 'КБ', 'MБ', 'ГБ'];
            if (countByte == 0) return '0байт';
            var i = parseInt(Math.floor(Math.log(countByte) / Math.log(1024)));
            return Math.round(countByte / Math.pow(1024, i), 2) + ' ' + sizes[i];
        }

        validation = {
            course: {
                title: {
                    required
                }
            },
            sections: {
                $each: {
                    title: {
                        required
                    }
                }
            }
        };

        var errorMsg = '{{ __('ship::validation.all-fill-required') }}';
        var successMsg = '{{ __('teachersection/course::action.created') }}';

        var createCourseComponent = {
            data: {
                course: {
                    title: ''
                },
                sections: [],
            },
            methods: {
                addSection: function(){
                    this.sections.push(
                        {
                            title: '',
                            links: [],
                            files: [],
                            filesRequest: [],
                            is_visible: 0
                        }
                    );
                },
                bCkeditor: function(e){
                    bindCkeditor(e.target);
                },
                deleteSection: function(index){
                    this.sections.splice(index, 1);
                },
                addLink: function(indexSection){
                    this.sections[indexSection].links.push({
                        title: '',
                        url: '',
                        type: 'https://'
                    });
                },
                deleteLink: function(indexSection, indexLink){
                    this.sections[indexSection].links.splice(indexLink, 1);
                },
                selectLinkType: function(indexSection, indexLink, type){
                    console.log(indexSection, indexLink, type);
                    switch (type) {
                        case('http'):
                            this.sections[indexSection].links[indexLink].type = 'http://';
                            return;
                        case('https'):
                            this.sections[indexSection].links[indexLink].type = 'https://';
                            return;
                    }
                },
                submitBtn: function(){
                    var form = new FormData();

                    form.append('title', $('input[name=title]').val());
                    form.append('characteristic', editor_characteristic.getData());
                    form.append('little_description', editor_little_description.getData());
                    form.append('target', editor_target.getData());
                    form.append('list_literature', editor_list_literature.getData());
                    form.append('is_visible', $('input[name=is_visible]').is(':checked') ? 1 : 0);

                    if(this.sections.length > 0){
                        var sections = this.sections;

                        sections.forEach(function callback(item, index, sections) {
                            if (window['editor_section_' + index + '_description']) {
                                item['description'] = window['editor_section_' + index + '_description'].getData();
                            } else {
                                item['description'] = '';
                            }

                            var files = item.filesRequest;

                            files.forEach(function(file, indexFile, files){
                                form.append('file_section_' + index + '_' + indexFile, file);
                            });
                        });
                        form.append('sections', JSON.stringify(sections));
                    }

                    form.append('_token', token);


                    $.ajax({
                        url: '{{ route('web_teacher_courses_store') }}',
                        processData: false,
                        contentType: false,
                        data: form,
                        type: 'post',
                        dataType: 'json',
                        success: function(data){
                            console.log(data);
                            if(data.status == 'success'){
                                alertSuccess(successMsg);
                                setTimeout(function(){
                                    window.location.href = '{{ route('web_teacher_courses_index') }}';
                                }, 1000);
                            }

                            if(data.status == 'error'){
                                alertDanger(errorMsg);
                            }
                        },
                        error: function(error){
                            console.log(error);
                            alertDanger(errorMsg);
                        }
                    });
                },
                uploadFile: function(e, indexSection){
                    if ($(e.target).val()) {
                        var file = e.target.files[0];
                        var fileName = file.name;
                        var icon = getIcon(fileName);
                        var size = getSize(file.size);

                        this.sections[indexSection].files.push({
                            title: fileName,
                            icon: icon,
                            size: size
                        });

                        $(e.target).val('');
                        this.sections[indexSection].filesRequest.push(file);
                    }
                },
                deleteFile: function(e, indexSection, indexFile) {
                    this.sections[indexSection].files.splice(indexFile, 1);
                },
                replaceUrl: function(e, indexSection, indexLink){
                    var url = e.target.value;

                    if(/(https?:\/\/)\S+/.test(url)){
                        var newUrl = url.replace(/(https?:\/\/)/, '');
                        var type = url.match(/(https?:\/\/)/)[0];
                        this.sections[indexSection].links[indexLink].url = newUrl;
                        this.sections[indexSection].links[indexLink].edit_url = newUrl;
                        this.sections[indexSection].links[indexLink].type = type;
                    }
                },
            },
            computed: {
                isVisibleInputFile: function(obj){
                    console.log(obj);
                }
            }
        };

        mixins.push(createCourseComponent);
    </script>
@endpush
