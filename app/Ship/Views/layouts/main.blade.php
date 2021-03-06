<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <title>{{ config('app.name') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link rel="stylesheet" type='text/css' href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <link href="{{ asset('css/layout.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('css/style.css') }}" rel='stylesheet' type='text/css' />
    <link href="{{ asset('css/css_slider.css') }}" type="text/css" rel="stylesheet" media="all">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/breadcrumbs.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
</head>
<body class="body-background">

@include('components.noscript')

<header>
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
                    <li class="{{ $active_element_main_menu == 'prepod' ? 'active-nav' : '' }}">
                        <a
                            class='a-hover {{ $active_element_main_menu == 'prepod' ? 'a-active' : '' }}'
                            href="{{ route('web_teacher_courses_index') }}">Преподавателю</a>
                    </li>
                @endcan
                @can('student')
                <li class="{{ $active_element_main_menu == 'course' ? 'active-nav' : '' }}">
                    <a
                        class='a-hover {{ $active_element_main_menu == 'course' ? 'a-active' : '' }}'
                        href="{{ route('web_student_courses_index') }}">Курсы</a>
                </li>
                @endcan
                <li class="{{ $active_element_main_menu == 'material' ? 'active-nav' : '' }}">
                    <a
                        class='a-hover {{ $active_element_main_menu == 'material' ? 'a-active' : '' }}'
                        href="{{ route('web_material_index') }}">Материалы</a>
                </li>
                <li class="{{ $active_element_main_menu == 'practice' ? 'active-nav' : '' }}">
                    <a
                        class="a-hover {{ $active_element_main_menu == 'practice' ? 'a-active' : '' }}"
                        href="{{ route('web_practice_index') }}">Упражнения</a>
                </li>
                <li class="{{ $active_element_main_menu == 'dictionary' ? 'active-nav' : '' }}">
                    <a
                        class='a-hover {{ $active_element_main_menu == 'dictionary' ? 'a-active' : '' }}'
                        href="{{ route('web_dictionary_index') }}">Словарь</a>
                </li>

                <li >
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

                <li {{ $active_element_main_menu == 'profile' ? 'active-nav' : '' }}>
                    <a
                        class="a-hover {{ $active_element_main_menu == 'profile' ? 'a-active' : '' }}"
                        href="{{ route('web_user_show', auth()->user()->login) }}">Профиль</a>
                </li>
            </ul>
        </nav>
    </div>
</header>

<div style="min-height: 100vh">
    <div id="app" style="display: none" v-show="start">
        <div class="container">
            @include('components.notices')
        </div>

        @yield('content')
    </div>
</div>

@include('layouts.footer')

@include('scripts.main')

</body>
</html>
