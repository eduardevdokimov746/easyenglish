@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" id="why">
        <div class="container mb-4">
            <div class="head-content">
                <h1 class="heading col">
                    Редактирование задания "{{ $zadanie->title }}"
                </h1>
            </div>

            @include('components.breadcrumbs', [$breadcrumb])

            <div class="row mt-3 mb-3">
                <div class="col">
                    <div class="form form-create-course">
                        <h3>Основные параметры</h3>

                        <div class="form-group mt-3">
                            <label for="list_courses">
                                Курс <span class="mark-required-field" title="Обязательно для заполнения">*</span>
                                <select id="list_courses" class="form-control" v-model="currentCourse" :class="{'is-invalid' : currentCourse == 'default' && isSelectCourse}">
                                    <option value="default">Выберите курс</option>
                                    <option v-for="(course, indexCourse) in courses" :value="course.id" :key="course.id">@{{ course.title }}</option>
                                </select>
                                <div class="invalid-feedback">
                                    {{ __('teachersection/zadanie::validation.select-course') }}
                                </div>
                            </label>
                        </div>

                        <div class="form-group mt-3">
                            <label for="list_sections">
                                Раздел <span class="mark-required-field" title="Обязательно для заполнения">*</span>
                                <select id="list_sections" class="form-control" :class="{'is-invalid' : (currentSection == 'default' && isSelectSection)}" v-model="currentSection" :disabled="currentCourse != 'default' ? null : 'disabled'">
                                    <option value="default">Выберите раздел</option>
                                    <option v-for="(section, indexSection) in sections" :value="section.id" :key="section.id">@{{ section.title }}</option>
                                </select>
                                <div class="invalid-feedback">
                                    {{ __('teachersection/zadanie::validation.select-section') }}
                                </div>
                            </label>
                        </div>

                        <div class="form-group mt-3">
                            <label for="title_course">
                                Название <span class="mark-required-field" title="Обязательно для заполнения">*</span>
                                <input id="title_course" class="form-control" :class="{'is-invalid' : title.length <= 0 && isChangedTitle}" v-model="title" type="text">

                                <div class="invalid-feedback">
                                    {{ __('ship::validation.required', ['attribute' => __('ship::attributes.title')]) }}
                                </div>
                            </label>
                        </div>

                        <div class="form-group">
                            <label for="description_zadanie">Описание (необязательно)</label>
                            <textarea id="description_zadanie" class="ckeditor-textarea" name="description">{{ $zadanie->description }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="links_section">Прикрепленные ссылки</label>
                            <div>
                                <div class="div-link-change-section" v-for="(link, indexLink) in linksShow">
                                            <span class="btn-delete-link" title="Удалить ссылку" @click="deleteLink(indexLink)">
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
                                                <a class="dropdown-item" style="cursor: pointer" @click="selectLinkType(indexLink, 'http')">http://</a>
                                                <a class="dropdown-item" style="cursor: pointer" @click="selectLinkType(indexLink, 'https')">https://</a>
                                            </div>
                                        </div>

                                        <input type="text" class="form-control" placeholder="yandex.ru" @keyup="replaceUrl($event, indexLink)" v-model="link.edit_url">
                                    </div>
                                </div>

                                <button type="button" class="btn btn-info" @click="addLink">Добавить ссылку</button>
                            </div>
                        </div>

                        <div class="form-group" v-if="filesShow.length">
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
                                <tr v-for="(file, indexFile) in filesShow">
                                    <td>@{{ indexFile + 1 }}</td>
                                    <td class="text-left">
                                        <img class="table-list-radanie-file-icon" style="width: 30px;" :src="file.icon" alt="">
                                        <span>@{{ file.title }}</span>
                                    </td>
                                    <td>@{{ file.size }}</td>
                                    <td>
                                        <i class="fa fa-times" @click="deleteFile($event, indexFile)" aria-hidden="true"></i>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlFile1">Добавить файлы</label>
                            <input type="file" class="form-control-file" @change="uploadFile" id="exampleFormControlFile1">
                        </div>

                        <div class="form-group">
                            <label for="last-datetime-send">Крайний срок сдачи</label>
                            <input type="datetime-local" v-model="deadline" id="last-datetime-send">
                        </div>

                        <div class="form-check">
                            <input type="checkbox" v-model="isPublished" class="form-check-input" id="check-isPublish-zadanie">
                            <label class="form-check-label" for="check-isPublish-zadanie">Опубликовать</label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end mt-3">
                        <button class="btn btn-primary" @click="submitBtn" :disabled="isActiveBtn">Сохранить</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        var msgError = '{{ __('ship::validation.error-server') }}';
        var notIssetSection = '{{ __('teachersection/zadanie::validation.not-isset-section') }}'
        var token = '{{ csrf_token() }}';
        var icons =  JSON.parse('{!! $icons !!}');
        var redirectUrl = '{{ config('app.url') . '/' . Route::getRoutes()->getByName('web_teacher_zadanies_index')->uri}}';

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

        var editZadanieComponent = {
            data: {
                title: '{{ $zadanie->title }}',
                isChangedTitle: false,
                currentCourse: '{{ $zadanie->section->course->id }}',
                isSelectCourse: false,
                currentSection: '{{ $zadanie->section->id }}',
                isSelectSection: false,
                type: '{{ request()->get('type', 'main') }}',
                links: [],
                files: [],
                courses: [],
                sections: [],
                deadline: '',
                isPublished: '{{ $zadanie->is_visible }}' == 1 ? true : false
            },
            created: function(){
                this.courses = JSON.parse('{!! str_replace('\\"', "\\'", $courses->toJson()) !!}');
                this.sections = JSON.parse('{!! str_replace('\\"', "\\'", $sections->toJson()) !!}');
                this.links = JSON.parse('{!! str_replace('\\"', "\\'", $zadanie->links->toJson()) !!}');
                this.files = JSON.parse('{!! $zadanie->files->toJson() !!}');
                this.deadline = '{{ $zadanie->deadline }}'.replace(' ', 'T');
            },
            methods: {
                uploadFile: function(e){
                    if ($(e.target).val()) {
                        var file = e.target.files[0];
                        var fileName = file.name;
                        var icon = getIcon(fileName);
                        var size = getSize(file.size);

                        this.files.push({
                            title: fileName,
                            icon: icon,
                            size: size,
                            action: 'add',
                            file: file
                        });

                        $(e.target).val('');
                    }
                },
                deleteFile: function(e, indexFile) {
                    var file = this.filesShow[indexFile];
                    var indexFileForFiles = _.findIndex(this.files, file);
                    this.files[indexFileForFiles].action = 'delete';
                    var files = this.files.splice(0, this.files.length);
                    this.files = files;
                },
                addLink: function(){
                    this.links.push({
                        title: '',
                        url: '',
                        type: 'https://',
                        action: 'add'
                    });
                },
                deleteLink: function(indexLink){
                    var link = this.linksShow[indexLink];
                    var indexLinkForLinks = _.findIndex(this.links, link);
                    this.links[indexLinkForLinks].action = 'delete';
                    var links = this.links.splice(0, this.links.length);
                    this.links = links;
                },
                selectLinkType: function(indexLink, type){
                    switch (type) {
                        case('http'):
                            this.links[indexLink].type = 'http://';
                            return;
                        case('https'):
                            this.links[indexLink].type = 'https://';
                            return;
                    }
                },
                replaceUrl: function(e, indexLink){
                    var url = e.target.value;

                    if(/(https?:\/\/)\S+/.test(url)){
                        var newUrl = url.replace(/(https?:\/\/)/, '');
                        var type = url.match(/(https?:\/\/)/)[0];
                        this.links[indexLink].url = newUrl;
                        this.links[indexLink].edit_url = newUrl;
                        this.links[indexLink].type = type;
                    }
                },
                submitBtn: function(){
                    var form = new FormData();

                    form.append('section_id', this.currentSection);
                    form.append('course_id', this.currentCourse);
                    form.append('title', this.title);
                    form.append('type', 'typical');
                    form.append('description', window['editor_description'].getData());
                    form.append('_token', token);
                    form.append('deadline', this.deadline.replace('T', ' '));
                    form.append('is_visible', this.isPublished ? 1 : 0);

                    if(this.links.length){
                        form.append('links', JSON.stringify(this.links));
                    }

                    var deleteFiles = [];

                    this.files.forEach(function(item){
                        if(item.action == 'delete'){
                            deleteFiles.push(item);
                        }
                    });

                    if(deleteFiles.length){
                        form.append('deleteFiles', JSON.stringify(deleteFiles));
                    }

                    this.filesShow.forEach(function(item, index){
                        if(item.file){
                            form.append('file_' + index, item.file);
                        }
                    });

                    $.ajax({
                        url: '{{ route('web_teacher_zadanies_update', $zadanie->id) }}',
                        processData: false,
                        contentType: false,
                        data: form,
                        type: 'post',
                        dataType: 'json',
                        success: function(data){
                            console.log(data);
                            if(data.type == 'success'){
                                alertSuccess(data.msg);
                                setTimeout(function(){
                                    window.location.href = app.url(redirectUrl, {id: app.currentCourse});
                                }, 1000);
                            }else{
                                alertDanger(data.msg);
                            }
                        },
                        error: function(error){
                            alertDanger(msgError);
                        }
                    });
                },
            },
            watch: {
                currentCourse: function(){
                    this.isSelectCourse = true;
                    this.sections.splice(0, this.sections.length);
                    this.isSelectSection = false;
                    this.currentSection = 'default';

                    if(this.currentCourse == 'default'){
                        return;
                    }

                    axios.post('{{ route('api_teacher_sections_get_sections_from_course') }}', {
                        data: {id: app.currentCourse},
                        type: 'post'
                    }).then(function(response){
                        if(response.data.length <= 0){
                            alertNotice(notIssetSection);
                        }else{
                            app.sections = response.data;
                        }

                    }).catch(function(error){
                        alertDanger(msgError);
                    });
                },
                currentSection: function(){
                    this.isSelectSection = true;
                },
                title: function(){
                    this.isChangedTitle = true;
                }
            },
            computed: {
                isActiveBtn: function(){
                    return (this.title.length > 0 &&
                        this.currentCourse != 'default' &&
                        this.currentSection != 'default' &&
                        this.deadline.length > 0) ? null : 'disabled';
                },
                filesShow: function(){
                    return _.filter(this.files, function(item){
                        if(item.action === undefined){
                            return true;
                        }

                        if(item.action === 'add'){
                            return true;
                        }
                    })
                },
                linksShow: function(){
                    return _.filter(this.links, function(item){
                        if(item.action === undefined){
                            return true;
                        }

                        if(item.action === 'add'){
                            return true;
                        }
                    })
                },
            }
        };

        mixins.push(editZadanieComponent);
    </script>
@endpush
