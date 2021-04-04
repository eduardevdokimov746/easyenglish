<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') . ' Admin' }}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>
<body class="hold-transition sidebar-mini">

@include('components.noscript')

    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="user-image img-circle elevation-2" alt="User Image">
                        <span class="d-none d-md-inline">Евдокимов Эдуард Игоревич</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <li class="user-header bg-primary">
                            <img src="{{ asset('adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                            <p>
                                Евдокимов Эдуард Игоревич
                                <small>Последний вход - 20.12.2020</small>
                            </p>
                        </li>
                        <li class="user-footer">
                            <a href="#" class="btn btn-default btn-flat">Профиль</a>
                            <a href="#" class="btn btn-default btn-flat float-right">Выйти</a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="flag-icon flag-icon-us"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right p-0">
                        <a href="#" class="dropdown-item active">
                            <i class="flag-icon flag-icon-us mr-2"></i> English
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="flag-icon flag-icon-ru mr-2"></i> Русский
                        </a>
                    </div>
                </li>
            </ul>
        </nav>

        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="{{ route('web_admin_index') }}" class="brand-link">
                <img src="{{ asset('images/s2.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">{{ config('app.name') }} Admin</span>
            </a>

            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-flat" data-widget="treeview" role="menu" data-accordion="false">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <p>
                                    Администраторы
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('web_admin_users_create', ['role' => 'admin']) }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Добавить</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('web_admin_user_index', ['role' => 'admin']) }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Список</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <p>
                                    Преподаватели
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('web_admin_users_create', ['role' => 'prepod']) }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Добавить</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('web_admin_user_index', ['role' => 'prepod']) }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Список</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <p>
                                    Студенты
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('web_admin_users_create', ['role' => 'student']) }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Добавить</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('web_admin_user_index', ['role' => 'student']) }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Список</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <p>
                                    Пользователи
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('web_admin_users_create', ['role' => 'simple_user']) }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Добавить</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('web_admin_user_index', ['role' => 'simple_user']) }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Список</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa fa-users" aria-hidden="true"></i>
                                <p>
                                    Группы
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ route('web_admin_group_create') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Добавить</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('web_admin_group_index') }}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Список</p>
                                    </a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>

        @yield('content')

        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                Дипломный проект ст. группы СКС-17 Евдокимова Э.И.
            </div>
            <strong>Основной сайт
                <a href="{{ route('index') }}">{{ config('app.name') }}</a>
            </strong>
        </footer>
    </div>

    <script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/demo.js') }}"></script>
</body>
</html>
