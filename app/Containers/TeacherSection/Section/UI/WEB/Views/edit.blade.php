@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" id="why">
        <div class="container mb-4">
            <div class="head-content">
                <h1 class="heading col">
                    {{ $section->course->title }}
                </h1>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <div class="form mb-3">
                        <form>
                            <div class="form-group">
                                <label for="title">Заголовок раздела</label>
                                <input
                                    type="text"
                                    class="form-control"
                                    id="title"
                                    v-model="$v.title.$model"
                                    placeholder="Введите заголовок раздела"
                                    :class="{'is-invalid' : statusValidation($v.title, $v.title.required)}"
                                >

                                <div class="invalid-feedback">
                                    {{ __('ship::validation.required', ['attribute' => __('ship::attributes.title')]) }}
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="main_info_section">Основная информация</label>
                                <textarea class="ckeditor-textarea" name="description">{!! $section->description  !!}</textarea>
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
                                <label>
                                    Видимость
                                    <input type="checkbox" name="is_visible" v-model="is_visible">
                                </label>
                            </div>
                        </form>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('web_teacher_courses_show', $section->course->id) }}" class="btn btn-danger" style="margin-right: 10px">Отмена</a>
                        <button class="btn btn-primary" @click="submitBtn" :disabled="isActiveBtn">Сохранить</button>
                    </div>
                </div>
            </div>
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
            title: {
                required
            }
        };

        var errorMsg = '{{ __('ship::validation.error-server') }}';

        var editSectionComponent = {
            data: {
                title: '{{ $section->title }}',
                links: [],
                files: [],
                is_visible: '{{ (bool)$section->is_visible }}',
            },
            created: function(){
                this.links = JSON.parse('{!! $section->links->toJson() !!}');
                this.files = JSON.parse('{!! $section->files->toJson() !!}');
                this.$v.title.$touch();
            },
            methods: {
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

                    form.append('title', this.title);
                    form.append('description', window['editor_description'].getData());
                    form.append('_token', token);
                    form.append('is_visible', this.is_visible ? 1 : 0);
                    form.append('links', this.links);

                    var deleteFiles = [];

                    this.files.forEach(function(item){
                        if(item.action == 'delete'){
                            deleteFiles.push(item);
                        }
                    });

                    this.filesShow.forEach(function(item, index){
                        if(item.file){
                            form.append('file_' + index, item.file);
                        }
                    });

                    if(deleteFiles.length){
                        form.append('deleteFiles', JSON.stringify(deleteFiles));
                    }

                    form.append('links', JSON.stringify(this.links));

                    $.ajax({
                        url: '{{ route('web_teacher_sections_update', $section->id) }}',
                        processData: false,
                        contentType: false,
                        data: form,
                        type: 'post',
                        dataType: 'json',
                        success: function(data){
                            if(data.type == 'success'){
                                alertSuccess(data.msg);
                                setTimeout(function(){
                                    window.location.href = '{{ route('web_teacher_courses_show', $section->course->id) }}';
                                }, 1000);
                            }else{
                                alertDanger(data.msg);
                            }
                        },
                        error: function(error){
                            console.log(error);
                            alertDanger(errorMsg);
                        }
                    });
                },
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
                }
            },
            computed: {
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
                isActiveBtn(){
                    return this.statusValidation(this.$v.title, this.$v.title.$error) ? null : 'disabled';
                }
            }
        };

        mixins.push(editSectionComponent);
    </script>
@endpush
