@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Создание пользователя</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Главная</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Список</a>
                            </li>
                            <li class="breadcrumb-item active">Создание пользователя</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Редактировать фото</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
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
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Основная информация</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mt-2 form-group">
                        <label for="first-name">
                            Имя <span class="text-danger" title="Обязательно для заполнения">*</span>
                        </label>
                        <input class="form-control" type="text" id="first-name">
                    </div>

                    <div class="mt-2 form-group">
                        <label for="last-name">
                            Фамилия <span class="text-danger" title="Обязательно для заполнения">*</span>
                        </label>
                        <input class="form-control" type="text" id="last-name">
                    </div>
                    <div class="mt-2 form-group">
                        <label for="otchestvo">
                            Отчество <span class="text-danger" title="Обязательно для заполнения">*</span>
                        </label>
                        <input class="form-control" type="text" id="otchestvo">
                    </div>
                    <div class="mt-2 form-group">
                        <label for="login">
                            Логин
                        </label>
                        <input class="form-control" type="text" id="login">
                    </div>
                    <div class="mt-2 form-group">
                        <label for="email">
                            Email
                        </label>
                        <input type="email" id="email" class="form-control" value="localhost@mail.com">
                    </div>
                    <div class="mt-2 form-group">
                        <label for="date-birth">
                            Дата рождения
                        </label>
                        <input type="date" id="date-birth" class="form-control">
                    </div>
                    <div class="mt-2 form-group">
                        <label for="email">
                            Роль <span class="text-danger" title="Обязательно для заполнения">*</span>
                        </label>
                        <select class="form-control">
                            <option selected>Выберете роль</option>
                            <option>Администратор</option>
                            <option>Преподаватель</option>
                            <option>Студент</option>
                            <option>Пользователь</option>
                        </select>
                    </div>

                    <div class="mt-2 form-group">
                        <label for="email">
                            Группа <span class="text-danger" title="Обязательно для заполнения">*</span>
                        </label>
                        <select class="form-control" disabled>
                            <option>СКС-17</option>
                            <option>СКС-18</option>
                            <option>СКС-19</option>
                            <option>СКС-20</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Пароль</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="mt-2 form-group">
                        <label for="new_password">
                            Новый пароль
                        </label>
                        <label>
                            (Показать
                            <input type="checkbox">)
                        </label>
                        <input type="password" class="form-control" id="new_password">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Дополнительная информация</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
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
            </div>

            <div class="d-flex justify-content-end mt-3 pb-3">
                <button href="#" class="btn btn-primary">Создать</button>
            </div>
        </section>
    </div>
@endsection
