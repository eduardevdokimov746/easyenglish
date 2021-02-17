@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" style="padding-top: 100px" id="why">
        <div class="container">
            <div class="head-content mb-5">
                <h3 class="heading">Конструктор слов</h3>
            </div>

            <div class="row justify-content-md-center">
                <div class="col-md-8 form form-practice row">
                    <div id='head-block'>
                        <p id='autosound-block'>
                            <label>
                                <input type='checkbox'> Автопроизношение
                            </label>
                        </p>
                        <p><span>1</span>/10</p>
                    </div>

                    <div class="d-flex justify-content-center" style="width: 100%;">

                            <div>
                                <i id='sound-word' class="fa fa-volume-up" aria-hidden="true"></i>
                            </div>

                            <div class="body-practice-constructor">
                                <div class="word-constructor">
                                    <p>вопрос</p>
                                </div>

                                <div class="div-image-constructor">
                                    <img src='{{ asset('images/1.jpg') }}' id='img-word'>
                                </div>

                                <div>
                                    <div class="mt-4 div-lists-constructor">
                                        <div class="div-list-responce-constructor">
                                            <p class="input-responce-constructor current-word-constructor"></p>
                                            <p class="input-responce-constructor"></p>
                                            <p class="input-responce-constructor"></p>
                                            <p class="input-responce-constructor"></p>
                                            <p class="input-responce-constructor"></p>
                                            <p class="input-responce-constructor"></p>
                                            <p class="input-responce-constructor"></p>

                                        </div>
                                    </div>
                                    <div class="mt-4 div-list-variable-responce-constructor">
                                        <div class="list-variable-responce-constructor">
                                            <p class="responce-constructor">a</p>
                                            <p class="responce-constructor">a</p>
                                            <p class="responce-constructor">a</p>
                                            <p class="responce-constructor">a</p>
                                            <p class="responce-constructor">a</p>
                                            <p class="responce-constructor">a</p>
                                            <p class="responce-constructor">a</p>
                                            <p class="responce-constructor">a</p>
                                            <p class="responce-constructor">a</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                    </div>

                    <div class="mt-5 footer-constructor">
                        <div>
                            <p id='progress-learning-word' title="Прогресс изучения слова"><span>0</span>/3</p>
                        </div>
                        <div>
                            <div>
                                <label>
                                    <span id="span-btn">Enter</span>
                                    <button type="button" class="btn btn-light" style="display: none">Не знаю</button>
                                    <button type="button" class="btn btn-primary">Дальше</button>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
