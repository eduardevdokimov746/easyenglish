@extends('layouts.auth')

@section('content')
    <div class="form-div">
        <div class="banner-form-w3">
            <div class="padding">
                <form action="#" class='form-auth' method="get">
                    <h5 class="mb-3">ВОССТАНОВЛЕНИЕ ПАРОЛЯ</h5>
                    <div class="form-style form-request-restore-code">

                        <div class="div-input">
                            <input placeholder="Электронная почта" name="email" v-model="fields.email" type="email" required>
                        </div>

                        <div>
                            <button class="btn btn-submit" :disabled="isDisabledBtn">Получить код</button>
                        </div>

                        <div class='ext-action-form' style="padding: 20px 0 5px 0">
                            <span>
                                <a href="{{ route('web_show_code_form') }}" onclick='visibleFormInputRestoreCode()'>ВВЕСТИ КОД</a>
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
        var loginComponent = {
            data: {
                fields: {
                    email: '',
                },
            }
        };

        mixins.push(loginComponent);
    </script>
@endpush
