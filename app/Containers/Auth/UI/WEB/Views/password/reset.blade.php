@extends('layouts.auth')

@section('content')
    <div class="form-div">
        <div class="banner-form-w3">
            <div class="padding">

                <form action="{{ route('web_password_reset') }}" class='form-auth' method="post">
                    @csrf
                    <h5 class="mb-3">НОВЫЙ ПАРОЛЬ</h5>
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
                            <div class='password-field' data-visible='false'>
                                <input placeholder="Пароль" name="password" v-model="$v.fields.password.$model" :type="passwordInputType">
                                <i class="fa fa-eye eye-password" aria-hidden="true" v-show="isVisiblePassword" @click="changeTypeInputPassword('password')"></i>
                                <i class="fa fa-eye-slash eye-password" aria-hidden="true" v-show="!isVisiblePassword" @click="changeTypeInputPassword('text')"></i>
                            </div>

                            <div class='div-error-auth' v-if="statusValidation($v.fields.password, $v.fields.password.required)">
                                <span>{{ __('ship::validation.required', ['attribute' => __('ship::attributes.password')]) }}</span>
                            </div>

                            <div class='div-error-auth' v-if="statusValidation($v.fields.password, $v.fields.password.custom_password)">
                                <span>{{ __('auth::validation.register-password-not-valid') }}</span>
                            </div>
                        </div>

                        <div class="div-input">
                            <input placeholder="Повторить пароль" name="password_confirmation" v-model="$v.fields.password_confirmation.$model" :type="passwordInputType">

                            <div class='div-error-auth' v-if="statusValidation($v.fields.password_confirmation, $v.fields.password_confirmation.confirmation)">
                                <span>{{ __('auth::validation.register-password-confirmation-not-valid') }}</span>
                            </div>
                        </div>

                            <input type="hidden" name="code" value="{{ $code }}">

                        <div>
                            <button class="btn btn-submit" :disabled="isActiveBtn">Сохранить</button>
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

        var loginComponent = {
            data: {
                fields: {
                    password: '',
                    password_confirmation: ''
                },
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
