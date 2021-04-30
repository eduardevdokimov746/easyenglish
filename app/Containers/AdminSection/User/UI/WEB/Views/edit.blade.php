@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">

            @include('components.notices-admin')
            <div class="container-fluid">
                <div class="row mb-2 d-flex justify-content-between">
                    <div>
                        <h1>Редактирование пользователя</h1>
                    </div>

                    <div>
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('web_admin_index') }}">Главная</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('web_admin_user_index', ['role' => request()->get('role', 'student')]) }}">Список аккаунтов</a></li>
                            <li class="breadcrumb-item active">Редактирование пользователя</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="list-style: none">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="content">
            <form action="{{ route('web_admin_user_update', $user->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <input type="hidden" name="id" value="{{ $user->id }}">
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
                        <h5>Текущее</h5>

                        <input type="hidden" name="isDefaultAvatar" value="0" id="isDefaultAvatar">

                        <div class="block-content-profile col-3 mt-2">
                            <div>
                                <img id="block-avatar" width="200" src="{{ PhotoStorage::getProfileAvatar($user) }}" alt="">
                            </div>
                        </div>

                        <div class="mt-2 form-group">
                            <label for="photo-profile">
                                Изменить фото
                            </label>
                            <input class="form-control" style="height: auto;" type="file" id="photo-profile" name="users[avatar]">

                            <div class="invalid-feedback">
                                {{ __('ship::validation.type-photo') }}
                            </div>

                            <div class="mt-2">
                                <button class="btn btn-danger" onclick="setDefaultAvatar(event)">Удалить фото</button>
                            </div>
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
                        <div class="form-group">
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
                            <input class="form-control" type="text" v-model="login" id="login" name="users[login]">
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
                            <label for="password" class="width-max">
                                Изменить пароль
                            </label>
                            <div class="input-group">
                                <input id="password" :value="password" type="text" class="form-control" name="password" aria-label="" aria-describedby="basic-addon1">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button" @click="generatePassword">Сгенерировать</button>
                                </div>
                            </div>
                        </div>

                        <div class="mt-2 form-group">
                            <label for="date-birth">
                                Дата рождения
                            </label>
                            <input type="date" id="date-birth" name="users_info[date_of_birth]" value="{{ $user->userInfo?->date_of_birth }}" class="form-control">
                        </div>
                        <div class="mt-2 form-group">
                            <label for="email">
                                Роль <span class="text-danger" title="Обязательно для заполнения">*</span>
                            </label>
                            <select class="form-control" name="users[role]" v-model="role">
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Администратор</option>
                                <option value="teacher" {{ $user->role == 'teacher' ? 'selected' : '' }}>Преподаватель</option>
                                <option value="student" {{ $user->role == 'student' ? 'selected' : '' }}>Студент</option>
                                <option value="simple" {{ $user->role == 'simple' ? 'selected' : '' }}>Пользователь</option>
                            </select>
                        </div>

                        <div class="mt-2 form-group">
                            <label for="email">
                                Группа <span class="text-danger" title="Обязательно для заполнения">*</span>
                            </label>
                            <select class="form-control" v-model="group" name="group" :disabled="!isRoleStudent">
                                <option selected value="default">Выберете группу</option>
                                @foreach($groups as $group)
                                    <option value="{{ $group->slug }}">{{ $group->title }}</option>
                                @endforeach
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
                        <div class="form-group">
                            <label for="city">
                                Город
                            </label>
                            <input type="text" class="form-control" value="{{ $user->userInfo?->city }}" name="users_info[city]" id="city">
                        </div>
                        <div class="mt-2 form-group">
                            <label for="country">
                                Страна
                            </label>
                            <input type="text" class="form-control" value="{{ $user->userInfo?->country }}" name="users_info[country]" id="country">
                        </div>
                        <div class="mt-2 form-group">
                            <label for="phone">
                                Телефон
                            </label>
                            <input type="text" class="form-control" value="{{ $user->userInfo?->number_phone }}" name="users_info[number_phone]" id="phone">
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-3 pb-3">
                    <a href="{{ route('web_admin_user_index', ['role' => request()->get('role', 'student')]) }}" class="btn btn-danger mr-2">Отмена</a>
                    <button class="btn btn-primary">Сохранить</button>
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
                first_name: '{{ $user->first_name }}',
                last_name: '{{ $user->last_name }}',
                otchestvo: '{{ $user->otchestvo }}',
                email: '{{ $user->email?->email }}',
                role: '{{ $user->role }}',
                group: '{{ $user->group->first()?->slug ?: 'default'}}',
                password: '',
                login: '{{ $user->login }}',
                isRequireLogin: '{{ $user->login ? true : false }}'
            },
            methods:{
                showHideNoticeMaterial: function(){
                    this.isVisibleNoticeMaterial = this.isVisibleNoticeMaterial ? false : true;
                },
                generatePassword: function(){
                    this.password = getRandom(1000, 9999);
                }
            },
            watch: {
                email: function(){
                    if(this.email.length <= 0){
                        this.email = 'localhost@mail.com';
                    }
                },
                first_name: function(){
                    if(!this.isRequireLogin){
                        if(isNotEmptyString(this.last_name) && isNotEmptyString(this.first_name) && isNotEmptyString(this.otchestvo)){

                            if(this.isRoleStudent && this.group.length && this.group !== 'default'){
                                this.login = toSlug(this.group + '-' + this.last_name + '-' + this.first_name.substr(0, 1) + this.otchestvo.substr(0, 1));
                                return;
                            }

                            this.login = toSlug(this.last_name + '-' + this.first_name.substr(0, 1) + this.otchestvo.substr(0, 1));
                            return;
                        }
                    }
                },
                last_name: function(){
                    if(!this.isRequireLogin) {
                        if (isNotEmptyString(this.last_name) && isNotEmptyString(this.first_name) && isNotEmptyString(this.otchestvo)) {

                            if (this.isRoleStudent && this.group.length && this.group !== 'default') {
                                this.login = toSlug(this.group + '-' + this.last_name + '-' + this.first_name.substr(0, 1) + this.otchestvo.substr(0, 1));
                                return;
                            }

                            this.login = toSlug(this.last_name + '-' + this.first_name.substr(0, 1) + this.otchestvo.substr(0, 1));
                            return;
                        }
                    }
                },
                otchestvo: function(){
                    if(!this.isRequireLogin) {
                        if (isNotEmptyString(this.last_name) && isNotEmptyString(this.first_name) && isNotEmptyString(this.otchestvo)) {

                            if (this.isRoleStudent && this.group.length && this.group !== 'default') {
                                this.login = toSlug(this.group + '-' + this.last_name + '-' + this.first_name.substr(0, 1) + this.otchestvo.substr(0, 1));
                                return;
                            }

                            this.login = toSlug(this.last_name + '-' + this.first_name.substr(0, 1) + this.otchestvo.substr(0, 1));
                            return;
                        }
                    }
                },
                group: function(){
                    if(!this.isRequireLogin) {
                        if (isNotEmptyString(this.last_name) && isNotEmptyString(this.first_name) && isNotEmptyString(this.otchestvo)) {

                            if (this.isRoleStudent && this.group.length && this.group !== 'default') {
                                this.login = toSlug(this.group + '-' + this.last_name + '-' + this.first_name.substr(0, 1) + this.otchestvo.substr(0, 1));
                                return;
                            }

                            this.login = toSlug(this.last_name + '-' + this.first_name.substr(0, 1) + this.otchestvo.substr(0, 1));
                            return;
                        }
                    }
                },
            },
            computed: {
                isRoleStudent: function(){
                    return this.role === 'student' ? true : false;
                }
            }
        };

        mixins.push(createMaterialComponent);

        $(document).ready(function(){
            var user_avatar = '{{ PhotoStorage::getProfileAvatar($user) }}';

            $('#photo-profile').change(function(event) {
                let reader = new FileReader();

                reader.onload = (e) => {
                    $('#block-avatar').attr('src', e.target.result);
                };

                if (this.files[0]) {
                    if (
                        this.files[0].type !== 'image/jpeg' &&
                        this.files[0].type !== 'image/jpg' &&
                        this.files[0].type !== 'image/png')
                    {
                        $(this).addClass('is-invalid');
                        return;
                    }

                    $(this).removeClass('is-invalid');

                    reader.readAsDataURL(this.files[0]);
                } else {
                    $('#block-avatar').attr('src', user_avatar);
                }
                $('#isDefaultAvatar').attr('value', 0);
            });
        });

        var defaultAvatar = '{{ asset('storage/users/profile_avatars/no_image_user.png') }}';

        function setDefaultAvatar(event) {
            event.preventDefault();
            $('#isDefaultAvatar').attr('value', 1);
            $('#block-avatar').attr('src', defaultAvatar);
            $('#photo-profile').val('');
        }
    </script>
@endpush
