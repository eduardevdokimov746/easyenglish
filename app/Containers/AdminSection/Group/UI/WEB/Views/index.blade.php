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
                        <th>Название</th>
                        <th>Студентов</th>
                        <th>Дата создания</th>
                        <th>Редактировать</th>
                        <th>Удалить</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>1</td>
                        <td>СКС-17</td>
                        <td>15</td>
                        <td>22.12.2020</td>
                        <td>
                            <a href="{{ route('web_admin_group_edit', 'asd') }}">
                                <i class="fa fa-pencil text-blue" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('web_admin_group_delete', 'asd') }}">
                                <i class="fa fa-fw fa-close text-danger"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>СКС-17</td>
                        <td>15</td>
                        <td>22.12.2020</td>
                        <td>
                            <a href="{{ route('web_admin_group_edit', 'asd') }}">
                                <i class="fa fa-pencil text-blue" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('web_admin_group_delete', 'asd') }}">
                                <i class="fa fa-fw fa-close text-danger"></i>
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>1</td>
                        <td>СКС-17</td>
                        <td>15</td>
                        <td>22.12.2020</td>
                        <td>
                            <a href="{{ route('web_admin_group_edit', 'asd') }}">
                                <i class="fa fa-pencil text-blue" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('web_admin_group_delete', 'asd') }}">
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
