@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Создание группы</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="{{ route('web_admin_index') }}">Главная</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('web_admin_group_index') }}">Список групп</a>
                            </li>
                            <li class="breadcrumb-item active">Создание группы</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Основные параметры</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    <div class="mt-2 form-group">
                        <label for="title">
                            Название группы <span class="text-danger" title="Обязательно для заполнения">*</span>
                        </label>
                        <input class="form-control" v-model="$v.title.$model" @keyup="checkUniqueTitle" name="title" :class="{'is-invalid': statusValidation($v.title, $v.title.required) || titleIsNotUnique}" type="text" id="title">
                        <div class="invalid-feedback" v-if="statusValidation($v.title, $v.title.required)">
                            {{ __('ship::validation.required', ['attribute' => __('ship::attributes.title-group')]) }}
                        </div>
                        <div class="invalid-feedback" v-if="titleIsNotUnique">
                            {{ __('ship::validation.title-group-already-exists') }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Добавление студентов</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-between">

                        <div class="col-5 div-students-create-group">
                            <div class="header-students-create-group">
                                <h5>Поиск студентов</h5>
                            </div>
                            <div>
                                <input type="text" class="form-control" @keyup="search" placeholder="Найти">
                            </div>
                            <div style="margin-top: 10px;">
                                <ul class="list-students-create-group" style="max-height: 370px; overflow-y: auto;">
                                    <li v-for="(user, userIndex) in searchStudents" :key="user.id">
                                        <label class="item-list-students-create-group">
                                            <div>
                                                @{{ user.fio.length ? user.fio : user.login }}
                                            </div>
                                            <div>
                                                <input type="checkbox" @change="searchChangeSelect(userIndex)" :checked="hasAddListStudent(user.id)">
                                            </div>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="col-5 div-students-create-group">
                            <div class="header-students-create-group">
                                <h5>Добавленные студенты @{{ addStudents.length }}</h5>
                            </div>
                            <div>
                                <ul class="list-students-create-group" style="max-height: 408px; overflow-y: auto;">
                                    <li v-for="(user, userIndex) in addStudents" :key="user.id">
                                        <label class="item-list-students-create-group">
                                            <div>
                                                @{{ user.fio.length ? user.fio : user.login }}
                                            </div>
                                            <div>
                                                <input type="checkbox" checked @change="addChangeSelect(userIndex)">
                                            </div>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-3 pb-3">
                <button @click="createGroup" :disabled="isActiveBtn" class="btn btn-primary">Создать</button>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        validation = {
            title: {
                required
            }
        };

        var createGroupComponent = {
            data: {
                title: '',
                students: [],
                searchStudents: [],
                addStudents: [],
                token: '{{ csrf_token() }}',
                titleIsNotUnique: false
            },
            created: function(){
                this.students = JSON.parse('{!! $students->toJson() !!}');
                this.searchStudents = JSON.parse('{!! $students->toJson() !!}');
            },
            methods: {
                search: _.debounce(e => {
                    var query = e.target.value;

                    if(e.keyCode == 13){
                        return;
                    }

                    if(query.length <= 2){
                        app.searchStudents = app.students;
                        return;
                    }

                    axios({
                        url: '{{ route('api_admin_students_search') }}',
                        data: {query: query},
                        method: 'post',
                    }).then(function(response){
                        console.log(response.data);
                        app.searchStudents = response.data;
                    });
                }, 500),
                hasAddListStudent: function(student_id){
                    return -1 !== _.findIndex(this.addStudents, {id: student_id});
                },
                searchChangeSelect: function(indexStudent){
                    var user = this.searchStudents[indexStudent];

                    if(this.hasAddListStudent(user.id)){
                        this.addStudents.splice(_.findIndex(this.addStudents, {id: user.id}), 1);
                    }else{
                        this.addStudents.push(user);
                    }
                },
                addChangeSelect: function(indexStudent){
                    var user = this.addStudents[indexStudent];
                    this.addStudents.splice(_.findIndex(this.addStudents, {id: user.id}), 1);
                },
                createGroup: function() {
                    var data = new FormData();
                    data.append('title', this.title);
                    data.append('students', JSON.stringify(this.addStudents));
                    data.append('_token', this.token);

                    axios.post('{{ route('web_admin_group_store') }}', data)
                        .then(function(response){
                        alertSuccess(response.data.msg);
                    })
                },
                checkUniqueTitle: _.debounce(e => {
                    var query = e.target.value;

                    if(e.keyCode == 13 || query.length <= 2){
                        app.titleIsNotUnique = false;
                        return;
                    }

                    axios({
                        url: '{{ route('api_admin_groups_check_unique_title') }}',
                        data: {query: query},
                        method: 'post',
                    }).then(function(response){
                        if(response.data === 1){
                            app.titleIsNotUnique = true;
                        }else{
                            app.titleIsNotUnique = false;
                        }
                    }).catch(function(error){
                        alertDanger('{{ __('ship::validation.error-server') }}');
                    });
                }, 500),
            },
            computed: {
                isActiveBtn(){
                    return this.statusValidation(this.$v.title, this.$v.title.$error)  && !this.titleIsNotUnique ? null : 'disabled';
                }
            }
        };

        mixins.push(createGroupComponent);
    </script>
@endpush
