@extends('layouts.auth')

@section('content')
    <div class="form-div">
        <div class="banner-form-w3 reg-padding">
            <div class="padding">
                <form action="{{ route('web_register') }}" name="form_auth" class='form-auth' method="post" novalidate>
                    @csrf

                    <h5 class="mb-3">РЕГИСТРАЦИЯ</h5>

                    <div class="form-style">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul style="list-style: none">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <div class="div-input">
                            <input placeholder="Логин" name="login" @keyup="checkLoginValid" v-model="$v.fields.login.$model" type="text">

                            <div class='div-error-auth' v-if="statusValidation($v.fields.login, $v.fields.login.required)">
                                <span>{{ __('ship::validation.required', ['attribute' => __('ship::attributes.login')]) }}</span>
                            </div>

                            <div class='div-error-auth' v-if="statusValidation($v.fields.login, $v.fields.login.minLength)">
                                <span>{{ __('auth::validation.register-login-length') }}</span>
                            </div>

                            <div class='div-error-auth' v-if="errorMessages.isLoginAlreadyExist">
                                <span>{{ __('auth::validation.register-login-already-exist') }}</span>
                            </div>
                        </div>

                        <div class="div-input">
                            <input
                                placeholder="Электронная почта"
                                name="email"
                                @keyup="checkEmailValid"
                                v-model="$v.fields.email.$model"
                                type="email">

                            <div class='div-error-auth' v-if="statusValidation($v.fields.email, $v.fields.email.required)">
                                <span>{{ __('ship::validation.required', ['attribute' => __('ship::attributes.email')]) }}</span>
                            </div>

                            <div class='div-error-auth' v-if="statusValidation($v.fields.email, $v.fields.email.email)">
                                <span>{{ __('ship::validation.email') }}</span>
                            </div>

                            <div class='div-error-auth' v-if="errorMessages.isEmailAlreadyExist">
                                <span>{{ __('auth::validation.register-email-already-exist') }}</span>
                            </div>
                        </div>

                        <div class="div-input">
                            <div class='password-field' data-visible='false'>
                                <input
                                    placeholder="Пароль"
                                    name="password"
                                    @keyup="errorMessages.isNotValidPassword = false"
                                    v-model="$v.fields.password.$model"
                                    :type="passwordInputType">

                                <i
                                    class="fa fa-eye eye-password"
                                    aria-hidden="true"
                                    v-if="isVisiblePassword"
                                    @click="changeTypeInputPassword('password')"></i>

                                <i
                                    class="fa fa-eye-slash eye-password"
                                    aria-hidden="true"
                                    v-if="!isVisiblePassword"
                                    @click="changeTypeInputPassword('text')"></i>
                            </div>

                            <div class='div-error-auth' v-if="statusValidation($v.fields.password, $v.fields.password.required)">
                                <span>{{ __('ship::validation.required', ['attribute' => __('ship::attributes.password')]) }}</span>
                            </div>

                            <div class='div-error-auth' v-if="statusValidation($v.fields.password, $v.fields.password.custom_password)">
                                <span>{{ __('auth::validation.register-password-not-valid') }}</span>
                            </div>
                        </div>

                        <div class="div-input">
                            <input
                                placeholder="Повторить пароль"
                                name="password_confirmation"
                                @keyup="errorMessages.isNotValidPasswordConfirmation = false"
                                v-model="$v.fields.password_confirmation.$model"
                                :type="passwordInputType">

                            <div class='div-error-auth' v-if="statusValidation($v.fields.password_confirmation, $v.fields.password_confirmation.confirmation)">
                                <span>{{ __('auth::validation.register-password-confirmation-not-valid') }}</span>
                            </div>
                        </div>

                        <div>
                            <button class="btn btn-submit" @click.prevent="registerAction" :disabled="isActiveBtn">Создать аккаунт</button>
                        </div>

                            <div class='social-btn'>
                                <ul>
                                    <li>
                                        <a href="{{ route('social-auth', 'mailru') }}" class="fa icon mail-btn" title="mail.ru">
                                            <i class="fas fa-at"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('social-auth', 'vkontakte') }}" class="fa icon vk-btn" title="vk.com">
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
                    required,
                    custom_password
                },
                password_confirmation: {
                    required,
                    confirmation: sameAs('password')
                }
            }
        };

        var registerComponent = {
            data: {
                fields: {
                    login: '{{ \SocialAuthSession::getParam('login') }}',
                    email: '{{ \SocialAuthSession::getParam('email') }}',
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
                        return;
                    }

                    if(app.fields.login.length < 3){
                        app.errorMessages.isNotValidLogin = true;
                        return;
                    }else{
                        app.errorMessages.isNotValidLogin = false;
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
                registerAction: function(){
                    this.hideErrorMessages();

                    document.form_auth.submit();
                },
                hideErrorMessages: function(){
                    var key;
                    for (key in this.errorMessages) {
                        this.errorMessages[key] = false;
                    }
                }
            },
            created: function(){
                if (isNotEmptyString(this.fields.login)) {
                    this.$v.fields.login.$touch();
                    this.checkLoginValid();
                }

                if (isNotEmptyString(this.fields.email)) {
                    this.$v.fields.email.$touch();
                    this.checkEmailValid();
                }
            },
            watch: {
                errorMessages:{
                    handler: function(newValue){
                        var issetErrorValidationForm;
                        var key;

                        for(key in this.errorMessages){
                            if(this.errorMessages[key] == true) {
                                issetErrorValidationForm = true;
                                break;
                            }
                        }

                        if(issetErrorValidationForm){
                            this.isNotErrorsValidation = false;
                        }else{
                            this.isNotErrorsValidation = true;
                        }
                    },
                    deep: true
                }
            },
            computed: {
                isActiveBtn(){
                    return this.statusValidation(this.$v.fields, this.$v.fields.$error) && this.isNotErrorsValidation ? null : 'disabled';
                }
            }
        };

        mixins.push(registerComponent);
    </script>
@endpush
