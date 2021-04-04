@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-3">
                <div class="block-content-profile">
                    <div>
                        <img src="{{ asset('images/no_image_user.png') }}" alt="">
                    </div>
                    <div>
                        <a href="{{ route('web_user_edit', 'asd') }}" class="btn-change-info-profile">Редактировать</a>
                    </div>
                </div>

            </div>

            <div class="col-9">
                <div class="block-content-profile">
                    <h4>Информация о пользователе</h4>

                    <div class="mt-2">
                        <p>
                            <b>ФИО:</b>
                            Евдокимов Эдуард Игоревич
                        </p>
                    </div>
                    <div class="mt-2">
                        <p>
                            <b>Email:</b>
                            eduard@mail.com
                        </p>
                    </div>

                    <div class="mt-2">
                        <p>
                            <b>Телефон:</b>
                            8 800 555 35 35
                        </p>
                    </div>
                    <div class="mt-2">
                        <p>
                            <b>Дата рождения:</b>
                            16.11.1999
                        </p>
                    </div>
                </div>

                @if(!session()->has('success-notice') && !auth()->user()->email->is_confirmation)
                    <div class="block-content-profile">
                        <div>
                            <h4>Электронная почта не подтверждена</h4>
                        </div>

                        <h5 class="mt-3">На Вашу почту было отправленно письмо. Перейдите на почту для подтверждения адреса электройнной почты</h5>

                        <div class="d-flex justify-content-end mt-3">
                            <a href="{{ route('web_send_dublicate_confirm_email_code') }}" class="btn btn-info">Отправить заново</a>
                        </div>
                    </div>
                @endif

                <div class="block-content-profile">
                    <div>
                        <h4>Входы в систему</h4>
                    </div>
                    <div class="mt-2">
                        <p>
                            <b>Первый вход:</b>
                            Четверг, 24 сентября 2020, 15:46  (166 дн. 23 час.)
                        </p>
                    </div>
                    <div class="mt-2">
                        <p>
                            <b>Последний вход:</b>
                            Четверг, 24 сентября 2020, 15:46  (166 дн. 23 час.)
                        </p>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('web_logout') }}" class="btn btn-light">Выход</a>
                </div>
            </div>
        </div>
    </div>
@endsection
