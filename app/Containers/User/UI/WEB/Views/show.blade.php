@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row mt-4">
            <div class="col-3">
                <div class="block-content-profile">
                    <div>
                        <img src="{{ asset('storage/users/profile_avatars/' . $user->avatar) }}" alt="">
                    </div>
                    @can('my-account', [$user])
                    <div>
                        <a href="{{ route('web_user_edit', $user->login) }}" class="btn-change-info-profile">Редактировать</a>
                    </div>
                    @endcan
                </div>
            </div>

            <div class="col-9">
                <div class="block-content-profile">
                    <h4>Информация о пользователе</h4>

                    @if($user->fio)
                        <div class="mt-2">
                            <p>
                                <b>ФИО:</b>
                                {{ $user->fio }}
                            </p>
                        </div>
                    @else
                        <div class="mt-2">
                            <p>
                                <b>ФИО:</b>
                                Информация отсутствует
                            </p>
                        </div>
                    @endif

                    @if($user->email->is_visible)
                    <div class="mt-2">
                        <p>
                            <b>Эл. почта:</b>
                            {{ $user->email->email }}
                        </p>
                    </div>
                    @else
                        <div class="mt-2">
                            <p>
                                <b>Эл. почта:</b>
                                Информация отсутствует
                            </p>
                        </div>
                    @endif

                    @if($user->userInfo?->number_phone)
                    <div class="mt-2">
                        <p>
                            <b>Телефон:</b>
                            {{ $user->userInfo->number_phone }}
                        </p>
                    </div>
                    @else
                        <div class="mt-2">
                            <p>
                                <b>Телефон:</b>
                                Информация отсутствует
                            </p>
                        </div>
                    @endif

                    @if($user->userInfo?->dbirth)
                    <div class="mt-2">
                        <p>
                            <b>Дата рождения:</b>
                            {{ $user->userInfo->dbirth }}
                        </p>
                    </div>
                    @else
                        <div class="mt-2">
                            <p>
                                <b>Дата рождения:</b>
                                Информация отсутствует
                            </p>
                        </div>
                    @endif

                    @if($user->userInfo?->city)
                        <div class="mt-2">
                            <p>
                                <b>Город:</b>
                                {{ $user->userInfo->city }}
                            </p>
                        </div>
                    @else
                        <div class="mt-2">
                            <p>
                                <b>Город:</b>
                                Информация отсутствует
                            </p>
                        </div>
                    @endif

                    @if($user->userInfo?->country)
                        <div class="mt-2">
                            <p>
                                <b>Страна:</b>
                                {{ $user->userInfo->country }}
                            </p>
                        </div>
                    @else
                        <div class="mt-2">
                            <p>
                                <b>Страна:</b>
                                Информация отсутствует
                            </p>
                        </div>
                    @endif

                    @if($user->userInfo?->description)
                        <div class="mt-2">
                            <p>
                                {!! $user->userInfo->description !!}
                            </p>
                        </div>
                    @endif
                </div>

                @can('my-account', [$user])
                @if(!session()->has('success-notice') && !$user->email->is_confirmation)
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
                @endcan

                @can('my-account', [$user])
                <div class="d-flex justify-content-end">
                    <a href="{{ route('web_logout') }}" class="btn btn-light">Выход</a>
                </div>
                @endcan
            </div>
        </div>
    </div>
@endsection
