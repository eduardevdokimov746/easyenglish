@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Создание пользователя</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Главная</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Список</a>
                            </li>
                            <li class="breadcrumb-item active">Создание пользователя</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <form action="{{ route('web_admin_users_store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Редактировать фото</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="mt-2">Текущее</h5>

                        <div class="block-content-profile col-3 mt-2">
                            <div>
                                <img src="{{ asset('images/no_image_user.png') }}" alt="">
                            </div>
                        </div>

                        <div class="mt-2 form-group">
                            <label for="photo-profile">
                                Изменить фото
                            </label>
                            <input class="form-control" style="height: auto;" type="file" id="photo-profile" name="avatar">
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Основная информация</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mt-2 form-group">
                            <label for="first-name">
                                Имя
                            </label>
                            <input class="form-control" type="text" v-model="first_name" id="first-name" name="users[first_name]">
                        </div>

                        <div class="mt-2 form-group">
                            <label for="last-name">
                                Фамилия
                            </label>
                            <input class="form-control" type="text" v-model="last_name" id="last-name" name="users[last_name]">
                        </div>
                        <div class="mt-2 form-group">
                            <label for="otchestvo">
                                Отчество
                            </label>
                            <input class="form-control" type="text" id="otchestvo" v-model="otchestvo" name="users[otchestvo]">
                        </div>
                        <div class="mt-2 form-group">
                            <label for="login" style="position: relative;">
                                Логин
                                <i class="fa fa-question-circle-o" @click="showHideNoticeMaterial" :class="{ 'btn-active-notice-material' : isVisibleNoticeMaterial }" id="btn-notice-material" aria-hidden="true"></i>
                                <div class="notice-autowrite-material" v-show="isVisibleNoticeMaterial">
                                    <p>
                                        Вы можете ввести ФИО пользователя, тогда логин сгенерируется автоматически
                                    </p>
                                </div>
                            </label>
                            <input class="form-control" type="text" :value="login" id="login" name="users[login]">
                        </div>
                        <div class="mt-2 form-group">
                            <label for="email">
                                Email
                            </label>
                            <input
                                    type="email"
                                    id="email"
                                    class="form-control"
                                    :class="{'is-invalid': statusValidation($v.email, $v.email.email)}"
                                    v-model="$v.email.$model"
                                    name="email"
                                    >
                            <div class="invalid-feedback">
                                <p>{{ __('ship::validation.email') }}</p>
                            </div>
                        </div>

                        <div class="mt-2 form-group">
                            <label for="new_password">
                                Пароль
                            </label>
                            <label>
                                (Показать
                                <input type="checkbox">)
                            </label>
                            <input type="password" class="form-control" id="new_password" name="users[password]">
                        </div>

                        <div class="mt-2 form-group">
                            <label for="date-birth">
                                Дата рождения
                            </label>
                            <input type="date" id="date-birth" name="users_info[date_of_birth]" class="form-control">
                        </div>
                        <div class="mt-2 form-group">
                            <label for="email">
                                Роль <span class="text-danger" title="Обязательно для заполнения">*</span>
                            </label>
                            <select class="form-control" name="users[role]" v-model="role">
                                <option selected value="default">Выберете роль</option>
                                <option value="admin">Администратор</option>
                                <option value="teacher">Преподаватель</option>
                                <option value="student">Студент</option>
                                <option value="simple">Пользователь</option>
                            </select>
                        </div>

                        <div class="mt-2 form-group">
                            <label for="email">
                                Группа <span class="text-danger" title="Обязательно для заполнения">*</span>
                            </label>
                            <select class="form-control" v-model="group" name="group" :disabled="!isRoleStudent">
                                <option selected value="default">Выберете группу</option>
                                <option>СКС-17</option>
                                <option>СКС-18</option>
                                <option>СКС-19</option>
                                <option>СКС-20</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Дополнительная информация</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mt-2 form-group">
                            <label for="city">
                                Город
                            </label>
                            <input type="text" class="form-control" name="users_info[city]" id="city">
                        </div>
                        <div class="mt-2 form-group">
                            <label for="country">
                                Страна
                            </label>
                            <input type="text" class="form-control" name="users_info[country]" id="country">
                        </div>
                        <div class="mt-2 form-group">
                            <label for="phone">
                                Телефон
                            </label>
                            <input type="text" class="form-control" name="users_info[number_phone]" id="phone">
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-3 pb-3">
                    <button href="#" class="btn btn-primary">Создать</button>
                </div>
            </form>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        validation = {
            email: {
                email
            }
        };

        var createMaterialComponent = {
            data:{
                isVisibleNoticeMaterial: false,
                first_name: '',
                last_name: '',
                otchestvo: '',
                email: 'localhost@mail.com',
                role: 'default',
                group: 'default',
            },
            methods:{
                showHideNoticeMaterial: function(){
                    this.isVisibleNoticeMaterial = this.isVisibleNoticeMaterial ? false : true;
                }
            },
            watch: {
                email: function(){
                    if(this.email.length <= 0){
                        this.email = 'localhost@mail.com';
                    }
                }
            },
            computed: {
                login: function(){
                    if(isNotEmptyString(this.last_name) && isNotEmptyString(this.first_name) && isNotEmptyString(this.otchestvo)){

                        if(this.isRoleStudent && this.group.length){
                            return this.group + '-' + this.last_name + '-' + this.first_name.substr(0, 1) + this.otchestvo.substr(0, 1);
                        }

                        return this.last_name + '-' + this.first_name.substr(0, 1) + this.otchestvo.substr(0, 1);
                    }

                    return '';
                },
                isRoleStudent: function(){
                    return this.role === 'student' ? true : false;
                }
            }
        };

        mixins.push(createMaterialComponent);
    </script>
@endpush