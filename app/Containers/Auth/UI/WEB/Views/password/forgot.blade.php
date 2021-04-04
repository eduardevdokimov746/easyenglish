@extends('layouts.auth')

@section('content')
    <div class="form-div mt-5">
        <div class="banner-form-w3">
            <div class="padding">
                <form action="{{ route('web_send_reset_link_email') }}" class='form-auth' method="post">
                    @csrf

                    <h5 class="mb-3">ВОССТАНОВЛЕНИЕ ПАРОЛЯ</h5>

                    <div class="form-style form-request-restore-code">
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
                            <input placeholder="Электронная почта" @keyup="checkExistEmail" name="email" v-model="$v.fields.email.$model" type="email">

                            <div class='div-error-auth' v-if="statusValidation($v.fields.email, $v.fields.email.required)">
                                <span>{{ __('ship::validation.required', ['attribute' => __('ship::attributes.email')]) }}</span>
                            </div>

                            <div class='div-error-auth' v-if="statusValidation($v.fields.email, $v.fields.email.email)">
                                <span>{{ __('ship::validation.email') }}</span>
                            </div>

                            <div class='div-error-auth' v-if="errorMessages.isNotExistEmail">
                                <span>{{ __('auth::validation.forgot-password-email-not-found') }}</span>
                            </div>
                        </div>

                        <div>
                            <button class="btn btn-submit" :disabled="isActiveBtn">Получить код</button>
                        </div>

                        <div class='ext-action-form' style="padding: 20px 0 5px 0">
                            <span>
                                <a href="{{ route('web_show_code_form') }}">ВВЕСТИ КОД</a>
                            </span>
                        </div>
                        <div class='ext-action-form' style="padding: 5px 0 0 0">
                            <span>
                                <a href="{{ route('web_show_login_form') }}">ФОРМА ВХОДА</a>
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
                email: {
                    required,
                    email
                },
            }
        };

        var passwordResetComponent = {
            data: {
                fields: {
                    email: '',
                },
                errorMessages:{
                    isNotExistEmail: false
                },
                isNotErrorsValidation: true
            },
            methods: {
                checkExistEmail: _.debounce(() => {
                    app.errorMessages.isNotExistEmail = false;

                    if(isEmptyString(app.fields.email)){
                        return;
                    }

                    if(app.$v.fields.email.$error){
                        return;
                    }

                    axios({
                            method: 'post',
                            url: '{{ route('api_forgot_password_check_exist_email') }}',
                            data: {
                                email: app.fields.email
                            }
                        }
                    ).then(function(response){
                        if(!response.data.isNotExistEmail){
                            app.errorMessages.isNotExistEmail = true;
                        }
                    });
                }, 50),
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

        mixins.push(passwordResetComponent);
    </script>
@endpush
