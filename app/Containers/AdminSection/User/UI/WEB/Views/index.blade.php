@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-5">
                        <h1>Главная</h1>
                    </div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <div class="navbar-search-block">
                                <form class="form-inline">
                                    <div class="input-group input-group-sm">
                                        <input class="form-control" type="search" placeholder="Поиск" aria-label="Search">
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>

                    {{--<div class="col-sm-6">--}}
                    {{--<ol class="breadcrumb float-sm-right">--}}
                    {{--<li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                    {{--<li class="breadcrumb-item active">Language Menu</li>--}}
                    {{--</ol>--}}
                    {{--</div>--}}
                </div>
            </div>
        </section>
        <section class="content">
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Роль</th>
                        <th>Логин</th>
                        <th>ФИО</th>
                        <th>Эл. почта</th>
                        <th>Группа</th>
                        <th>Редактировать</th>
                        <th>Удалить</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Студент</td>
                            <td>sks-17-evdokimov-ei</td>
                            <td>Евдокимов Эдуард Игоревич</td>
                            <td>eduard@mail.com</td>
                            <td>СКС-17</td>
                            <td>
                                <a href="{{ route('web_admin_users_edit', 'asd') }}">
                                    <i class="fa fa-pencil text-blue" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('web_admin_users_delete', 'asd') }}">
                                    <i class="fa fa-fw fa-close text-danger"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Студент</td>
                            <td>sks-17-evdokimov-ei</td>
                            <td>Евдокимов Эдуард Игоревич</td>
                            <td>eduard@mail.com</td>
                            <td>СКС-17</td>
                            <td>
                                <a href="{{ route('web_admin_users_edit', 'asd') }}">
                                    <i class="fa fa-pencil text-blue" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('web_admin_users_delete', 'asd') }}">
                                    <i class="fa fa-fw fa-close text-danger"></i>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Студент</td>
                            <td>sks-17-evdokimov-ei</td>
                            <td>Евдокимов Эдуард Игоревич</td>
                            <td>eduard@mail.com</td>
                            <td>СКС-17</td>
                            <td>
                                <a href="{{ route('web_admin_users_edit', 'asd') }}">
                                    <i class="fa fa-pencil text-blue" aria-hidden="true"></i>
                                </a>
                            </td>
                            <td>
                                <a href="{{ route('web_admin_users_delete', 'asd') }}">
                                    <i class="fa fa-fw fa-close text-danger"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </section>
    </div>
@endsection
