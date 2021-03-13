@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Редактирование группы</h1>
                    </div>

                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item">
                                <a href="#">Главная</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="#">Список</a>
                            </li>
                            <li class="breadcrumb-item active">Редактирование группы</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Основные параметры</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">

                    <div class="mt-2 form-group">
                        <label for="title">
                            Название группы
                        </label>
                        <input class="form-control" type="text" id="title">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Добавление студентов</h3>
                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                            <i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-between">

                        <div class="col-5 div-students-create-group">
                            <div class="header-students-create-group">
                                <h5>Поиск студентов</h5>
                            </div>
                            <div>
                                <input type="text" class="form-control" placeholder="Найти">
                            </div>
                            <div style="margin-top: 10px;">
                                <ul class="list-students-create-group">
                                    <li>
                                        <label class="item-list-students-create-group">
                                            <div>
                                                Евдокимов Эдуард Игоревич
                                            </div>
                                            <div>
                                                <input type="checkbox">
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="item-list-students-create-group">
                                            <div>
                                                Евдокимов Эдуард Игоревич
                                            </div>
                                            <div>
                                                <input type="checkbox">
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="item-list-students-create-group">
                                            <div>
                                                Евдокимов Эдуард Игоревич
                                            </div>
                                            <div>
                                                <input type="checkbox">
                                            </div>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-5 div-students-create-group">
                            <div style="text-align: center;">
                                <h5>Добавленные студенты (3)</h5>
                            </div>
                            <div>
                                <ul class="list-students-create-group">
                                    <li>
                                        <label class="item-list-students-create-group">
                                            <div>
                                                Евдокимов Эдуард Игоревич
                                            </div>
                                            <div>
                                                <input type="checkbox">
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="item-list-students-create-group">
                                            <div>
                                                Евдокимов Эдуард Игоревич
                                            </div>
                                            <div>
                                                <input type="checkbox">
                                            </div>
                                        </label>
                                    </li>
                                    <li>
                                        <label class="item-list-students-create-group">
                                            <div>
                                                Евдокимов Эдуард Игоревич
                                            </div>
                                            <div>
                                                <input type="checkbox">
                                            </div>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-3 pb-3">
                <a href="#" class="btn btn-danger" style="margin-right: 20px">Отмена</a>
                <button class="btn btn-primary">Сохранить</button>
            </div>
        </section>
    </div>
@endsection
