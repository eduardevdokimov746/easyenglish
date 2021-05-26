@extends('layouts.main')

@section('content')
    <div class="container mb-4">
        <div class="mt-4">
            <div class="mb-4">
                <h1>
                    Редактирование профиля
                </h1>
            </div>
        </div>

        @include('components.breadcrumbs', [$breadcrumb])

        <div class="row">
            <form action="{{ route('web_user_update', $user->login) }}" enctype="multipart/form-data" class="col" method="post" novalidate>
                @method('patch')
                @csrf
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul style="list-style: none">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form">
                    <h4>Редактировать фото</h4>

                    <h5 class="mt-2">Текущее</h5>

                    <div class="block-content-profile col-3 mt-2">
                        <div>
                            <img id="block-avatar" src="{{ PhotoStorage::getProfileAvatar($user) }}" alt="">
                        </div>
                    </div>

                    <div class="mt-2 form-group">
                        <label for="photo-profile">
                            Изменить фото
                        </label>

                        <input type="hidden" name="isDefaultAvatar" value="0" id="isDefaultAvatar">
                        <input class="form-control" style="height: auto;" name="users[avatar]" type="file" id="photo-profile">

                        <div class="invalid-feedback">
                            {{ __('ship::validation.type-photo') }}
                        </div>

                        <div class="mt-2">
                            <button class="btn btn-danger" onclick="setDefaultAvatar(event)">Удалить фото</button>
                        </div>
                    </div>
                </div>

                <div class="form mt-3">
                    <h4>Основная информация</h4>

                    <div class="mt-2 form-group">
                        <label for="login">
                            Логин
                        </label>

                        <input
                            class="form-control"
                            v-model="$v.fields.login.$model"
                            name="users[login]"
                            type="text"
                            id="login"
                            :class="{'is-invalid' :
                            statusValidation($v.fields.login, $v.fields.login.required) ||
                            statusValidation($v.fields.login, $v.fields.login.minLength) ||
                            errorMessages.isLoginAlreadyExist
                            }"
                            @keyup="checkLoginValid()"
                        >

                        <div class="invalid-feedback" v-if="statusValidation($v.fields.login, $v.fields.login.required)">
                            <span>{{ __('ship::validation.required', ['attribute' => __('ship::attributes.login')]) }}</span>
                        </div>

                        <div class="invalid-feedback" v-if="statusValidation($v.fields.login, $v.fields.login.minLength)">
                            <span>{{ __('auth::validation.register-login-length') }}</span>
                        </div>

                        <div class='invalid-feedback' v-if="errorMessages.isLoginAlreadyExist">
                            <span>{{ __('auth::validation.register-login-already-exist') }}</span>
                        </div>
                    </div>

                    <div class="mt-2 form-group">
                        <label for="first-name">
                            Имя
                        </label>
                        <input class="form-control" value="{{ $user->first_name }}" name="users[first_name]" type="text" id="first-name">
                    </div>

                    <div class="mt-2 form-group">
                        <label for="last-name">
                            Фамилия
                        </label>
                        <input class="form-control" value="{{ $user->last_name }}" name="users[last_name]" type="text" id="last-name">
                    </div>
                    <div class="mt-2 form-group">
                        <label for="otchestvo">
                            Отчество
                        </label>
                        <input class="form-control" value="{{ $user->otchestvo }}" name="users[otchestvo]" type="text" id="otchestvo">
                    </div>

                    <div class="mt-2 form-group">
                        <label for="email">
                            Эл. почта
                        </label>
                        <label>
                            (Видимость
                            <input type="checkbox" name="email_users[is_visible]" {{ $user->email?->is_visible ? 'checked' : '' }}>)
                        </label>
                        <input
                            type="email"
                            id="email"
                            name="email_users[email]"
                            class="form-control"
                            :class="{'is-invalid' :
                            statusValidation($v.fields.email, $v.fields.email.required) ||
                            statusValidation($v.fields.email, $v.fields.email.email) ||
                            errorMessages.isEmailAlreadyExist
                            }"
                            @keyup="checkEmailValid()"
                            v-model="$v.fields.email.$model"
                        >

                        <div class='invalid-feedback' v-if="statusValidation($v.fields.email, $v.fields.email.required)">
                            <span>{{ __('ship::validation.required', ['attribute' => __('ship::attributes.email')]) }}</span>
                        </div>

                        <div class='invalid-feedback' v-if="statusValidation($v.fields.email, $v.fields.email.email)">
                            <span>{{ __('ship::validation.email') }}</span>
                        </div>

                        <div class='invalid-feedback' v-if="errorMessages.isEmailAlreadyExist">
                            <span>{{ __('auth::validation.register-email-already-exist') }}</span>
                        </div>
                    </div>
                    <div class="mt-2 form-group">
                        <label for="date-birth">
                            Дата рождения
                        </label>
                        <label>
                            (Видимость
                            <input type="checkbox" name="users_info[is_visible_date_of_birth]" {{ $user->userInfo?->is_visible_date_of_birth ? 'checked' : '' }}>)
                        </label>
                        <input type="date" id="date-birth" value="{{ $user->userInfo?->date_of_birth }}" name="users_info[date_of_birth]" class="form-control">
                    </div>
                </div>

                <div class="form mt-3">
                    <div>
                        <h4>Изменение пароля</h4>
                    </div>
                    <div class="mt-2 form-group">
                        <label for="old_password">
                            Старый пароль
                        </label>
                        <input type="password" class="form-control {{ $errors->has('old_password_not_valid') ? 'is-invalid' : '' }}" name="old_password" id="old_password">

                        <div class="invalid-feedback">
                            {{ $errors->first('old_password_not_valid') }}
                        </div>
                    </div>
                    <div class="mt-2 form-group">
                        <label for="password">
                            Новый пароль
                        </label>
                        <input
                            type="password"
                            v-model="$v.fields.password.$model"
                            class="form-control"
                            name="password"
                            id="password"
                            :class="{'is-invalid' : statusValidation($v.fields.password, $v.fields.password.custom_password)}"
                        >
                        <div class='invalid-feedback' v-if="statusValidation($v.fields.password, $v.fields.password.custom_password)">
                            <span>{{ __('auth::validation.register-password-not-valid') }}</span>
                        </div>
                    </div>

                    <div class="mt-2 form-group">
                        <label for="password_confirmation">
                            Новый пароль еще раз
                        </label>
                        <input
                            type="password"
                            v-model="$v.fields.password_confirmation.$model"
                            class="form-control"
                            name="password_confirmation"
                            id="password_confirmation"
                            :class="{'is-invalid' : statusValidation($v.fields.password_confirmation, $v.fields.password_confirmation.confirmation)}"
                        >

                        <div class='invalid-feedback' v-if="statusValidation($v.fields.password_confirmation, $v.fields.password_confirmation.confirmation)">
                            <span>{{ __('auth::validation.register-password-confirmation-not-valid') }}</span>
                        </div>
                    </div>
                </div>

                <div class="form mt-3">
                    <div>
                        <h4>Дополнительная информация</h4>
                    </div>
                    <div class="mt-2 form-group">
                        <label for="city">
                            Город
                        </label>
                        <input type="text" value="{{ $user->userInfo?->city }}" name="users_info[city]"  class="form-control" id="city">
                    </div>
                    <div class="mt-2 form-group">
                        <label for="country">
                            Страна
                        </label>
                        <input type="text" value="{{ $user->userInfo?->country }}" name="users_info[country]" class="form-control" id="country">
                    </div>
                    <div class="mt-2 form-group">
                        <label for="number_phone">
                            Телефон
                        </label>
                        <input type="text" value="{{ $user->userInfo?->number_phone }}" name="users_info[number_phone]" class="form-control" id="number_phone">
                    </div>
                    <div class="mt-2 form-group">
                        <label for="phone">
                            О себе
                        </label>
                        <textarea name="users_info[description]" class="ckeditor-textarea">{{ $user->userInfo?->description }}</textarea>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('web_user_show', $user->login) }}" style="margin-right: 20px" class="btn btn-danger">Отмена</a>
                    <button class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        validation = {
            fields:{
                login: {
                    required,
                    minLength: minLength(3)
                },
                email: {
                    required,
                    email,
                },
                password: {
                    custom_password
                },
                password_confirmation: {
                    confirmation: sameAs('password')
                }
            }
        };

        var updateUserComponent = {
            data: {
                userData: {
                    login: '{{ $user->login }}',
                    email: '{{ $user->email?->email }}'
                },
                fields: {
                    login: '{{ $user->login }}',
                    email: '{{ $user->email?->email }}',
                    password: '',
                    password_confirmation: '',
                },
                errorMessages:{
                    isLoginAlreadyExist: false,
                    isEmailAlreadyExist: false,
                },
                isNotErrorsValidation: true
            },
            methods: {
                checkLoginValid: _.debounce(() => {
                    app.errorMessages.isLoginAlreadyExist = false;

                    if(isEmptyString(app.fields.login)){
                        app.fields.login = app.userData.login;
                        return;
                    }

                    if(app.fields.login.length < 3){
                        return;
                    }

                    if (app.fields.login == app.userData.login) {
                        return;
                    }

                    axios({
                            method: 'post',
                            url: '{{ route('api_register_check_valid_login') }}',
                            data: {
                                login: app.fields.login
                            }
                        }
                    ).then(function(response){
                        if(!response.data.isLoginAlreadyExist){
                            app.errorMessages.isLoginAlreadyExist = true;
                        }
                    });
                }, 200),
                checkEmailValid: _.debounce(() => {
                    app.errorMessages.isEmailAlreadyExist = false;

                    if(isEmptyString(app.fields.email)){
                        app.fields.email = app.userData.email;
                        return;
                    }

                    if (app.fields.email == app.userData.email) {
                        return;
                    }

                    axios({
                            method: 'post',
                            url: '{{ route('api_register_check_valid_email') }}',
                            data: {
                                email: app.fields.email
                            }
                        }
                    ).then(function(response){
                        if(!response.data.isValidEmail){
                            app.errorMessages.isEmailAlreadyExist = true;
                        }
                    });
                }, 200),
            }
        };

        mixins.push(updateUserComponent);

        $(document).ready(function(){
            var user_avatar = '{{ asset('storage/users/profile_avatars/' . $user->avatar) }}';

            $('#photo-profile').change(function(event) {
                let reader = new FileReader();

                reader.onload = (e) => {
                    $('#block-avatar').attr('src', e.target.result);
                };

                if (this.files[0]) {
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
