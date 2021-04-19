@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Главная</h1>
                    </div>
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{ $adminCount }}</h3>
                                <p>Администраторов</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-male" aria-hidden="true"></i>
                            </div>
                            <a href="{{ route('web_admin_user_index', ['role' => 'admin']) }}" class="small-box-footer">Список
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{ $teacherCount }}</h3>
                                <p>Преподавателей</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-male" aria-hidden="true"></i>
                            </div>
                            <a href="{{ route('web_admin_user_index', ['role' => 'teacher']) }}" class="small-box-footer">Список
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{ $studentCount }}</h3>
                                <p>Студентов</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-male" aria-hidden="true"></i>
                            </div>
                            <a href="{{ route('web_admin_user_index', ['role' => 'student']) }}" class="small-box-footer">Список
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ $simpleCount }}</h3>
                                <p>Пользователей</p>
                            </div>
                            <div class="icon">
                                <i class="fa fa-male" aria-hidden="true"></i>
                            </div>
                            <a href="{{ route('web_admin_user_index', ['role' => 'simple']) }}" class="small-box-footer">Список
                                <i class="fas fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection