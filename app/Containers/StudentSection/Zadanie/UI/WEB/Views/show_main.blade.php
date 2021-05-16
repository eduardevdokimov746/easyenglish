@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" id="why">
        <div class="container mb-4">
            <div class="head-content">
                <h1 class="heading col">
                    {{ $zadanie->title }}
                </h1>
            </div>

            @include('components.breadcrumbs', [$breadcrumb])

            <div class="row mt-3 mb-3">
                <div class="col">
                    <div class="form form-create-course">
                        <div class="d-flex justify-content-center">
                            <h2>Формулировка задания</h2>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <p style="white-space: pre-line;">{!! $zadanie->description !!}</p>
                            </div>
                        </div>

                        @if($zadanie->links->isNotEmpty())
                            <div class="row mt-4">
                                <div class="col">
                                    <h5>Прикрепленные ссылки</h5>
                                    <div>
                                        @foreach($zadanie->links as $linkIndex => $link)
                                            <p>
                                                <a href="{{ $link->url }}" target="_blank">{{ $link->title }}</a>
                                            </p>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($zadanie->files->isNotEmpty())
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
                                        @foreach($zadanie->files as $fileIndex => $file)
                                            <tr data-href="{{ route('web_zadanie_file_download', $file->hash) }}" class="table-row">
                                                <td>{{ $fileIndex + 1 }}</td>
                                                <td class="text-left">
                                                    <img class="table-list-radanie-file-icon" style="width: 30px;" src="{{ $file->icon }}" alt="">
                                                    <span>{{ $file->title }}</span>
                                                </td>
                                                <td>{{ $file->size }}</td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        @endif
                    </div>

                    <template v-if="activeForm == 'show'">
                        @include('studentsection/responsestudent::forms.show')
                    </template>

                    <template v-if="activeForm == 'edit'">
                        @include('studentsection/responsestudent::forms.edit')
                    </template>

                    <template v-if="activeForm == 'create'">
                        @include('studentsection/responsestudent::forms.create')
                    </template>

                    @if(!is_null($zadanie->responseStudents->first()) && !is_null($zadanie->responseStudents->first()->responseTeacher))
                        @include('studentsection/responseteacher::forms.show')
                    @endif
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        var token = '{{ csrf_token() }}';
        var icons =  JSON.parse('{!! $icons !!}');
        var errorMsg = '{{ __('ship::validation.error-server') }}';

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

        var formResponseStudentComponent = {
            data: {
                activeForm: 'show',
                files: [],
            },
            created: function(){
                this.zadanie = JSON.parse('{!! str_replace('\\"', "\'", $zadanie->toJson()) !!}');
                this.files = JSON.parse('{!! !is_null($zadanie->responseStudents->first()) && !is_null($zadanie->responseStudents->first()->files) ? str_replace('\\"', "\\'", $zadanie->responseStudents->first()->files->toJson()) : '[]' !!}');
            },
            methods: {
                changeForm: function(formName){
                    this.activeForm = formName;

                    setTimeout(function () {
                        bindCkeditor(document.getElementsByClassName('ckeditor-textarea')[0]);
                    }, 200);
                },
                bCkeditor: function(e){
                    bindCkeditor(e.target);
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
                    this.filesShow()[indexFile].action = 'delete';
                    this.files = this.files.splice(0, this.files.length);
                },
                addResponse: function(){
                    if(window['editor_comment'].getData().length == 0 && this.filesShow().length == 0){
                        alertNotice('Необходимо заполнить поле комментарий, либо добавить файл');
                        return;
                    }

                    var form = new FormData();

                    form.append('comment', window['editor_comment'].getData());
                    form.append('_token', token);


                    this.files.forEach(function(file, indexFile, files){
                        form.append('file_' + indexFile, file.file);
                    });

                    $.ajax({
                        url: '{{ route('web_student_responses_store', $zadanie->id) }}',
                        processData: false,
                        contentType: false,
                        data: form,
                        type: 'post',
                        dataType: 'json',
                        success: function(data){
                            alertSuccess(data.msg);
                            setTimeout(function(){
                                window.location.href = '{{ route('web_student_zadanies_show', [request()->course, $zadanie->id]) }}';
                            }, 1000);
                        },
                        error: function(error){
                            alertDanger(errorMsg);
                        }
                    });
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
                updateResponse: function(){
                    if(window['editor_comment'].getData().length == 0 && this.filesShow().length == 0){
                        alertNotice('Необходимо заполнить поле комментарий, либо добавить файл');
                        return;
                    }

                    var form = new FormData();

                    form.append('comment', window['editor_comment'].getData());
                    form.append('_token', token);
                    form.append('files', JSON.stringify(this.files));

                    this.filesShow().forEach(function(file, indexFile, files){
                        if (file.action !== undefined && file.action === 'add') {
                            form.append('file_' + indexFile, file.file);
                        }
                    });

                    $.ajax({
                        url: '{{ $zadanie->responseStudents->isEmpty() ? '' : route('web_student_responses_update', $zadanie->responseStudents->first()->id) }}',
                        processData: false,
                        contentType: false,
                        data: form,
                        type: 'post',
                        dataType: 'json',
                        success: function(data){
                            alertSuccess(data.msg);
                            setTimeout(function(){
                                window.location.href = '{{ route('web_student_zadanies_show', [request()->course, $zadanie->id]) }}';
                            }, 1000);
                        },
                        error: function(error){
                            alertDanger(errorMsg);
                        }
                    });
                }
            },
        };

        mixins.push(formResponseStudentComponent);
    </script>
@endpush
