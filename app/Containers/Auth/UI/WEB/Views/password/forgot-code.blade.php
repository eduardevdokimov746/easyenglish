@extends('layouts.auth')

@section('content')
    <div class="form-div">
        <div class="banner-form-w3">
            <div class="padding">
                <form action="#" class='form-auth form-input-code' method="get">
                    <div class="form-style">
                        <h5 class="mb-3">КОД ВОССТАНОВЛЕНИЯ ПАРОЛЯ</h5>

                        <div>
                            <span>На указанную эл. почту было отправленно письмо с кодом восстановления.</span>
                        </div>

                        <div class="div-input">
                            <input placeholder="Введите код" name="code" v-model="fields.forgotCode" type="text">
                        </div>

                        <button class="btn btn-submit" :disabled="isDisabledBtn">Отправить</button>

                        <div class='ext-action-form' style="padding: 5px 0 0 0">
                            <span>
                                <a href="{{ route('web_show_forgot_form') }}" onclick="unvisibleFormInputRestoreCode()">ПОЛУЧИТЬ КОД</a>
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
                    forgotCode: '',
                },
            }
        };

        mixins.push(loginComponent);
    </script>
@endpush
