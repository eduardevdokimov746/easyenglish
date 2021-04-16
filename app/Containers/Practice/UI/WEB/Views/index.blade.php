@extends('layouts.main')

@section('content')
    <section class="services py-5" id="services">
        <div class="container">
            <h3 class="heading mb-5">Упражнения</h3>
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="our-services-wrapper mb-60">
                        <div class="services-inner">
                            <a href="{{ route('web_practice_slovo_perevod') }}">
                                <div class="our-services-text">
                                    <h4>Слово-перевод</h4>
                                    <p style="color: black">Cпособствует пониманию текстов</p>
                                    <p>Слов на изучении: 23</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="our-services-wrapper mb-60">
                        <div class="services-inner">
                            <a href="{{ route('web_practice_perevod_slovo') }}">
                                <div class="our-services-text">
                                    <h4>Перевод-слово</h4>
                                    <p style="color: black">Помогает выучить значение слов</p>
                                    <p>Слов на изучении: 23</p>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="our-services-wrapper mb-60">
                            <div class="services-inner">
                                <a href="{{ route('web_practice_constructor') }}">
                                    <div class="our-services-text">
                                        <h4>Конструктор слов</h4>
                                        <p style="color: black">Оттачивает навыки обратного перевода и набирания слов</p>
                                        <p>Слов на изучении: 23</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                        <div class="our-services-wrapper mb-60">
                            <div class="services-inner">
                                <a href="{{ route('web_practice_povtor') }}">
                                    <div class="our-services-text">
                                        <h4>Повторение</h4>
                                        <p style="color: black">Помогает не забывать выученные слова</p>
                                        <p>Слов на изучении: 23</p>
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
