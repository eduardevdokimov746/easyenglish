<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ config('app.name') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link href="{{ asset('bootstrap/css/bootstrap.css') }}" rel='stylesheet' type='text/css'/>
    <link href="{{ asset('css/auth.css') }}" rel='stylesheet' type='text/css'/>
    <link href="{{ asset('css/css_slider.css') }}" type="text/css" rel="stylesheet" media="all">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
</head>
<body>
@include('components.noscript')
<header>
    <div class="container">
        <nav class="py-3 d-lg-flex">
            <div id="logo">
                <h1><a href="{{ route('index') }}"><img src="{{ asset('images/s2.png') }}" alt=""> Easy English </a></h1>
            </div>

            <ul class="menu ml-auto mt-1">
                <li class="active">
                    <a href="#">Язык</a>
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
            </ul>
        </nav>
    </div>
</header>

<div class="banner" id="home">
    <div class="layer">
        <div class="container" id="app">
            <div class="row">
                <div class="col-lg-7 banner-text">
                    <div class="csslider infinity" id="slider1">
                        <input type="radio" name="slides" checked="checked" id="slides_1" />
                        <input type="radio" name="slides" id="slides_2" />
                        <input type="radio" name="slides" id="slides_3" />
                        <ul class="banner_slide_bg">
                            <li>
                                <div class="container-fluid">
                                    <div class="banner_txt">
                                        <h3 class="b-txt mt-md-4">Разнообразие текстов.</h3>
                                        <h4 class="b-txt mt-md-2">Изучай язык и познавай интересное</h4>
                                        <p class="my-3">Большое количество текстов позволяет быстрее освоить и расширить словарный запас английского языка</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="container-fluid">
                                    <div class="banner_txt">
                                        <h3 class="b-txt mt-md-4">Удобный словарь.</h3>
                                        <h4 class="b-txt mt-md-2">Не трать время на ведение тетради</h4>
                                        <p class="my-3">Добавляй незнакомые слова одним кликом в словарь не отвлекаясь на ведение тетради. Получай доступ к словарю из любой точки мира.</p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="container-fluid">
                                    <div class="banner_txt">
                                        <h3 class="b-txt mt-md-4">Интересные упражнения.</h3>
                                        <h4 class="b-txt mt-md-2">Учить английский - это легко</h4>
                                        <p class="my-3">Пополнять словарный запас очень легко и весело с мини-играми. Добавляй  незнакомые слова в словарь и приступай к игре.</p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                        <div class="navigation">
                            <div>
                                <label for="slides_1"></label>
                                <label for="slides_2"></label>
                                <label for="slides_3"></label>
                            </div>
                        </div>
                    </div>
                </div>

                @yield('content')

            </div>
        </div>
    </div>
</div>

@if(session()->has('notice-auth'))
    @include('auth::components.modal_notice', ['msg' => session('notice-auth')])
@endif

@include('scripts.auth')

</body>
</html>
