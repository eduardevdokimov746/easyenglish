<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <title>{{ config('app.name') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <link rel="stylesheet" type='text/css' href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <link href="{{ asset('css/layout.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('css/style.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('css/css_slider.css') }}" type="text/css" rel="stylesheet" media="all">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/breadcrumbs.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body>

@include('components.noscript')

<div class="index-body-div">
    <header class="index-header">
        <div class="container">
            <nav>
                <div id="logo">
                    <h1>
                        <a href="{{ route('index') }}" style="font-size: .50em">
                            <img src="{{ asset('images/s2.png') }}" style="width: 35px;" alt=""> Easy English
                        </a>
                    </h1>
                </div>
                <ul class="menu ml-auto mt-1">
                    @can('teacher')
                        <li>
                            <a class='a-hover' href="{{ route('web_teacher_courses_index') }}">Преподавателю</a>
                        </li>
                    @endcan
                    @can('student')
                        <li>
                            <a class='a-hover' href="{{ route('web_student_courses_index') }}">Курсы</a>
                        </li>
                    @endcan
                    <li>
                        <a class='a-hover' href="{{ route('web_material_index') }}">Материалы</a>
                    </li>
                    <li>
                        <a class="a-hover" href="{{ route('web_practice_index') }}">Упражнения</a>
                    </li>
                    <li>
                        <a class='a-hover' href="{{ route('web_dictionary_index') }}">Словарь</a>
                    </li>
                    <li>
                        <a href="#stats">Язык</a>
                        <ul class="drpdown">
                            <li>
                                <a href="#" class="disactive">Русский
                                    <i class="fa fa-check check-selected-language" aria-hidden="true"></i>
                                </a>
                            </li>
                            <li>
                                <a href="#">Украинский
                                    <i class="fa fa-check check-selected-language" aria-hidden="true"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a class="a-hover" href="{{ route('web_user_show', auth()->user()->login) }}">Профиль</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container index-content">
        <div class="pt-3">
            <h1 class="index-text">Английский язык - это новые возможности и перспективы</h1>
        </div>
        <div class="pt-3">
            <h3 class="index-text">Начните прямо сейчас с нового слова, текста, языка</h3>
        </div>
        <div class="pt-4">
            <div class="index-btns-block">
                <a href="{{ route('web_dictionary_index') }}" class="index-btn">Выучить слова</a>
                <a href="{{ route('web_material_index') }}" class="index-btn">Прочитать текст</a>
                <a href="{{ route('web_practice_index') }}" class="index-btn">Попрактиковаться</a>
            </div>
        </div>
    </div>
</div>

@include('layouts.footer')

</body>
</html>
