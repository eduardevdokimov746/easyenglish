@extends('layouts.auth')

@section('content')
    <div class="form-div">
        <div class="banner-form-w3">
            <div class="padding">
                <form action="#" class='form-auth' method="get">

                    <h5 class="mb-3">ВОЙТИ</h5>
                    <div class="form-style">
                        <div class="div-input">
                            <input placeholder="Введите логин" type="text" v-model="fields.login" required>
                        </div>

                        <div class="div-input">
                            <div class='password-field' data-visible='false'>
                                <input placeholder="Пароль" name="password" v-model="fields.password"  :type="passwordInputType" required>
                                <i class="fa fa-eye eye-password" aria-hidden="true" v-show="isVisiblePassword" @click="changeTypeInputPassword('password')"></i>
                                <i class="fa fa-eye-slash eye-password" aria-hidden="true" v-show="!isVisiblePassword" @click="changeTypeInputPassword('text')"></i>
                            </div>
                            <div class='div-error-auth'>
                                <span>Проверьте правильность введенных данных</span>
                            </div>
                        </div>

                        <div>
                            <label>
                                Запомнить меня
                                <input style="vertical-align: middle;" type="checkbox">
                            </label>
                        </div>

                        <div>
                            <button class="btn btn-submit" :disabled="isDisabledBtn">Войти</button>
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

                        <div class='ext-action-form' style="padding: 5px 0">
                            <span>
                                <a href="{{ route('web_show_forgot_form') }}">ВОССТАНОВИТЬ ПАРОЛЬ</a>
                            </span>
                        </div>
                        <div class='ext-action-form'>
                            <span>
                                <a href="{{ route('web_show_registration_form') }}">СОЗДАТЬ АККАУНТ</a>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        var loginComponent = {
            data: {
                fields: {
                    login: '',
                    password: ''
                },
            }
        };

        mixins.push(loginComponent);
    </script>
@endpush
