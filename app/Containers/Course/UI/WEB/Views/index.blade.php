@extends('layouts.main')

@section('content')
    <section class="services py-5" id="services">
        <div class="container">
            <h3 class="heading mb-5">Курсы</h3>
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
                    <div class="our-services-wrapper mb-60">
                        <div class="services-inner">
                            <a href="{{ route('web_course_show', 'asd') }}">
                                <div class="our-services-text">
                                    <h4>Название курса 1</h4>
                                    <div class="content-course-cart">
                                        <div class="div-image-course-cart">
                                            <img src="{{ asset('images/no_image_user.png') }}">
                                        </div>
                                        <div class="div-name-prepod-course-cart">
                                            <p style="color: black" class="name-prepod-course-cart">
                                                Евдокимов Эдуард Игоревич
                                            </p>
                                        </div>
                                    </div>
                                    <p class="mt-2">Новые задания: 23</p>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
                    <div class="our-services-wrapper mb-60">
                        <div class="services-inner">
                            <a href="{{ route('web_practice_slovo_perevod') }}">
                                <div class="our-services-text">
                                    <h4>Название курса 1</h4>
                                    <div class="content-course-cart">
                                        <div class="div-image-course-cart">
                                            <img src="{{ asset('images/no_image_user.png') }}">
                                        </div>
                                        <div class="div-name-prepod-course-cart">
                                            <p style="color: black" class="name-prepod-course-cart">
                                                Евдокимов Эдуард Игоревич
                                            </p>
                                        </div>
                                    </div>
                                    <p class="mt-2">Новые задания: 23</p>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
                    <div class="our-services-wrapper mb-60">
                        <div class="services-inner">
                            <a href="{{ route('web_practice_slovo_perevod') }}">
                                <div class="our-services-text">
                                    <h4>Название курса 1</h4>
                                    <div class="content-course-cart">
                                        <div class="div-image-course-cart">
                                            <img src="{{ asset('images/no_image_user.png') }}">
                                        </div>
                                        <div class="div-name-prepod-course-cart">
                                            <p style="color: black" class="name-prepod-course-cart">
                                                Евдокимов Эдуард Игоревич
                                            </p>
                                        </div>
                                    </div>
                                    <p class="mt-2">Новые задания: 23</p>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
                <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
                    <div class="our-services-wrapper mb-60">
                        <div class="services-inner">
                            <a href="{{ route('web_practice_slovo_perevod') }}">
                                <div class="our-services-text">
                                    <h4>Название курса 1</h4>
                                    <div class="content-course-cart">
                                        <div class="div-image-course-cart">
                                            <img src="{{ asset('images/no_image_user.png') }}">
                                        </div>
                                        <div class="div-name-prepod-course-cart">
                                            <p style="color: black" class="name-prepod-course-cart">
                                                Евдокимов Эдуард Игоревич
                                            </p>
                                        </div>
                                    </div>
                                    <p class="mt-2">Новые задания: 23</p>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        </div>
    </section>
@endsection
