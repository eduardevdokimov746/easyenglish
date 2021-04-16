@extends('layouts.auth')

@section('content')
    <div class="form-div">
        <div class="banner-form-w3">
            <div class="padding">
                <form action="{{ route('web_login') }}" class='form-auth' method="post">
                    @csrf
                    <h5 class="mb-3">ВОЙТИ</h5>

                    <div class="form-style">

                        @if (!$errors->has('data-auth-not-valid') && $errors->any())
                            <div class="alert alert-danger">
                                <ul style="list-style: none">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="div-input">
                            <input placeholder="Введите логин" type="text" name="login" v-model="$v.fields.login.$model">

                            <div class='div-error-auth' v-if="statusValidation($v.fields.login, $v.fields.login.required)">
                                <span>{{ __('ship::validation.required', ['attribute' => __('ship::attributes.login')]) }}</span>
                            </div>
                        </div>

                        <div class="div-input" style="min-height: 82px; height: auto">
                            <div class='password-field' data-visible='false'>
                                <input placeholder="Пароль" name="password" v-model="$v.fields.password.$model"  :type="passwordInputType">
                                <i class="fa fa-eye eye-password" aria-hidden="true" v-show="isVisiblePassword" @click="changeTypeInputPassword('password')"></i>
                                <i class="fa fa-eye-slash eye-password" aria-hidden="true" v-show="!isVisiblePassword" @click="changeTypeInputPassword('text')"></i>
                            </div>

                            @if($errors->has('data-auth-not-valid'))
                                <div class='div-error-auth'>
                                    <span>{{ __('auth::validation.login-user-not-found') }}</span>
                                </div>
                            @endif

                            <div class='div-error-auth' v-if="statusValidation($v.fields.password, $v.fields.password.required)">
                                <span>{{ __('ship::validation.required', ['attribute' => __('ship::attributes.password')]) }}</span>
                            </div>
                        </div>

                        <div>
                            <label>
                                Запомнить меня
                                <input style="vertical-align: middle;" v-model="fields.isRemember" name="remember" type="checkbox">
                            </label>
                        </div>

                        <div>
                            <button class="btn btn-submit" :disabled="isActiveBtn">Войти</button>
                        </div>

                        <div class='ext-action-form mt-3' style="padding: 5px 0">
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
    validation = {
        fields:{
            login: {
                required,
            },
            password: {
                required,
            },
        }
    };

    var loginComponent = {
        data: {
            fields: {
                login: '{{ old('login') }}',
                password: ''
            }
        },
        created: function(){
            if(isNotEmptyString(this.fields.login)){
                this.$v.fields.login.$touch();
            }
        },
        computed: {
            isActiveBtn(){
                return this.statusValidation(this.$v.fields, this.$v.fields.$error) ? null : 'disabled';
            }
        }
    };

    mixins.push(loginComponent);
</script>
@endpush
