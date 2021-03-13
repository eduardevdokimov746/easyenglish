@extends('layouts.auth')

@section('content')
    <div class="form-div">
        <div class="banner-form-w3">
            <div class="padding">
                <form action="#" class='form-auth' method="get">

                    <h5 class="mb-3">НОВЫЙ ПАРОЛЬ</h5>
                    <div class="form-style">

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
                            <button class="btn btn-submit" :disabled="isDisabledBtn">Сохранить</button>
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
                    password: '',
                    password_confirmation: ''
                },
            }
        };

        mixins.push(loginComponent);
    </script>
@endpush
