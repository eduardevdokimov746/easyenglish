@extends('layouts.auth')

@section('content')
    <div class="form-div">
        <div class="banner-form-w3 reg-padding">
            <div class="padding">
                <form action="#" class='form-auth' method="get">

                    <h5 class="mb-3">РЕГИСТРАЦИЯ</h5>

                    <div class="form-style">

                        <div class="div-input">
                            <input placeholder="Логин" name="login" v-model="fields.login" type="text" required>

                            <div class='div-error-auth'>
                                <span>Пользователь с данным логином уже зарегистрирован</span>
                            </div>
                        </div>

                        <div class="div-input">
                            <input placeholder="Электронная почта" name="email" v-model="fields.email" type="email" required>

                            <div class='div-error-auth'>
                                <span>Пользователь с данной эл. почтой уже зарегистрирован</span>
                            </div>
                        </div>

                        <div class="div-input">
                            <div class='password-field' data-visible='false'>
                                <input placeholder="Пароль" name="password" v-model="fields.password" :type="passwordInputType" required>
                                <i class="fa fa-eye eye-password" aria-hidden="true" v-show="isVisiblePassword" @click="changeTypeInputPassword('password')"></i>
                                <i class="fa fa-eye-slash eye-password" aria-hidden="true" v-show="!isVisiblePassword" @click="changeTypeInputPassword('text')"></i>
                            </div>
                        </div>

                        <div class="div-input">
                            <input placeholder="Повторить пароль" name="password_confirmation" v-model="fields.password_confirmation" :type="passwordInputType" required>

                            <div class='div-error-auth'>
                                <span>Пароли не совпадают</span>
                            </div>
                        </div>

                        <div>
                            <button class="btn btn-submit" :disabled="isDisabledBtn">Создать аккаунт</button>
                        </div>

                        <div class='social-btn' style="">
                            <ul>
                                <li>
                                    <a href="#" class="fa icon mail-btn" title="mail.ru">
                                        <i class="fas fa-at"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="fa icon vk-btn" title="vk.com">
                                        <i class="fab fa-vk"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class='ext-action-form'>
                            <span><a href="{{ route('web_show_login_form') }}">УЖЕ ЕСТЬ АККАУНТ</a></span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var registerComponent = {
            data: {
                fields: {
                    login: '',
                    email: '',
                    password: '',
                    password_confirmation: ''
                },
            }
        };

        mixins.push(registerComponent);
    </script>
@endpush
