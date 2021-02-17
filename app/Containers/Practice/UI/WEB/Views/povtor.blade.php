@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" style="padding-top: 100px" id="why">
        <div class="container">
            <div class="head-content mb-5">
                <h3 class="heading">Повторение</h3>
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
                            <div class="div-image-constructor mt-5">
                                <img src='{{ asset('images/1.jpg') }}' id='img-word'>
                            </div>

                            <div class="word-constructor mt-3">
                                <p>вопрос</p>
                            </div>


                        </div>

                    </div>

                    <div class="mt-5 footer-constructor">
                        <div style="margin: 0 auto">
                            <template v-if="false">
                                <label>
                                    <button type="button" class="btn btn-light">
                                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                        Не помню
                                    </button>
                                </label>
                                <label>
                                    <button type="button" class="btn btn-primary">Помню
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </button>
                                </label>
                            </template>

                            <template >
                                <label>
                                    <button type="button" class="btn btn-light">
                                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                                        Сбросить статус
                                    </button>
                                </label>
                                <label>
                                    <button type="button" class="btn btn-primary">Продолжить
                                        <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                    </button>
                                </label>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
