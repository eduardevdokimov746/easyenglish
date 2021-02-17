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
    <script type="text/javascript" src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script src="{{ asset('ckeditor/adapters/jquery.js') }}"></script>
</head>
<body class="body-background">

<header>
    <div class="container">
        <nav>
            <div id="logo">
                <h1>
                    <a href="{{ route('web_material_index') }}" style="font-size: .50em">
                        <img src="{{ asset('images/s2.png') }}" style="width: 35px;" alt=""> Easy English
                    </a>
                </h1>
            </div>
            <ul class="menu ml-auto mt-1">
                <li>
                    <a class='a-hover' href="{{ route('web_teacher_courses_index') }}">Преподавателю</a>
                </li>
                <li>
                    <a class='a-hover' href="{{ route('web_course_index') }}">Курсы</a>
                </li>
                <li class='active-nav'>
                    <a class='a-hover a-active' href="{{ route('web_material_index') }}">Материалы</a>
                </li>
                <li>
                    <a class="a-hover" href="{{ route('web_practice_index') }}">Упражнения</a>
                </li>
                <li>
                    <a class='a-hover' href="{{ route('web_dictionary_index') }}">Словарь</a>
                </li>

                <li class="">
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
                <li class=""><a href="#testi">Профиль</a></li>
            </ul>
        </nav>
    </div>
</header>

<div style="min-height: 100vh">
    <div id="app" style="display: none" v-show="start">
        @yield('content')
    </div>
</div>

<section class="copyright">
    <div class="container py-4">
        <div class="row bottom">
            <ul class="col-lg-6 links p-0">
                <li><a href="#why" class="">Why Choose Us</a></li>
                <li><a href="#services" class="">Services </a></li>
                <li><a href="#team" class="">Teachers </a></li>
                <li><a href="#testi" class="">Testimonials </a></li>
            </ul>
            <div class="col-lg-6 copy-right p-0">
                <p class="">© 2019 Child Learn. All rights reserved | Design by
                    <a href="http://w3layouts.com"> W3layouts.</a>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- move top -->
<div class="move-top text-right">
    <a href='#' id='up' class="move-top">
        <span class="fa fa-angle-up  mb-3" aria-hidden="true"></span>
    </a>
</div>

@include('scripts.main')
<script>
    CKEDITOR.replace('editor1');
    CKEDITOR.replace('main_info_section');
</script>

</body>
</html>
