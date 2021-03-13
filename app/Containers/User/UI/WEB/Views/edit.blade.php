@extends('layouts.main')

@section('content')
    <div class="container mb-4">

        <div class="mt-4">
            <div class="mb-4">
                <h1>
                    Редактирование профиля
                </h1>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="form">
                    <h4>Редактировать фото</h4>

                    <h5 class="mt-2">Текущее</h5>

                    <div class="block-content-profile col-3 mt-2">
                        <div>
                            <img src="{{ asset('images/no_image_user.png') }}" alt="">
                        </div>
                    </div>

                    <div class="mt-2 form-group">
                        <label for="photo-profile">
                            Изменить фото
                        </label>
                        <input class="form-control" style="height: auto;" type="file" id="photo-profile">
                    </div>

                </div>

                <div class="form mt-3">
                    <h4>Основная информация</h4>

                    <div class="mt-2 form-group">
                        <label for="first-name">
                            Имя
                        </label>
                        <input class="form-control" type="text" id="first-name">
                    </div>

                    <div class="mt-2 form-group">
                        <label for="last-name">
                            Фамилия
                        </label>
                        <input class="form-control" type="text" id="last-name">
                    </div>
                    <div class="mt-2 form-group">
                        <label for="otchestvo">
                            Отчество
                        </label>
                        <input class="form-control" type="text" id="otchestvo">
                    </div>
                    <div class="mt-2 form-group">
                        <label for="email">
                            Email
                        </label>
                        <label>
                            (Видимость
                            <input type="checkbox">)
                        </label>
                        <input type="email" id="email" class="form-control">
                    </div>
                    <div class="mt-2 form-group">
                        <label for="date-birth">
                            Дата рождения
                        </label>
                        <label>
                            (Видимость
                            <input type="checkbox">)
                        </label>
                        <input type="date" id="date-birth" class="form-control">
                    </div>
                </div>

                <div class="form mt-3">
                    <div>
                        <h4>Изменение пароля</h4>
                    </div>
                    <div class="mt-2 form-group">
                        <label for="old_password">
                            Старый пароль
                        </label>
                        <input type="password" class="form-control" id="old_password">
                    </div>
                    <div class="mt-2 form-group">
                        <label for="new_password">
                            Новый пароль
                        </label>
                        <input type="password" class="form-control" id="new_password">
                    </div>
                    <div class="mt-2 form-group">
                        <label for="new_password_confirmation">
                            Новый пароль еще раз
                        </label>
                        <input type="password" class="form-control" id="new_password_confirmation">
                    </div>
                </div>

                <div class="form mt-3">
                    <div>
                        <h4>Дополнительная информация</h4>
                    </div>
                    <div class="mt-2 form-group">
                        <label for="city">
                            Город
                        </label>
                        <input type="text" class="form-control" id="city">
                    </div>
                    <div class="mt-2 form-group">
                        <label for="country">
                            Страна
                        </label>
                        <input type="text" class="form-control" id="country">
                    </div>
                    <div class="mt-2 form-group">
                        <label for="phone">
                            Телефон
                        </label>
                        <input type="text" class="form-control" id="phone">
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-3">
                    <a href="{{ route('web_user_show', 'asd') }}" style="margin-right: 20px" class="btn btn-danger">Отмена</a>
                    <button href="#" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </div>
    </div>
@endsection
