@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" style="padding-top: 100px" id="why">
        <div class="container">
            <div class="head-content mb-5">
                <h3 class="heading">Перевод-слово</h3>
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

                    <div class='left-block col-5'>
                        <div>
                            <i id='sound-word' class="fa fa-volume-up" aria-hidden="true"></i>
                        </div>
                        <div class="mb-5">
                            <p id='word-practice'>Машина</p>
                            <p class="mt-2"><img src='{{ asset('images/1.jpg') }}' id='img-word'></p>
                        </div>
                        <div>
                            <p id='progress-learning-word' title="Прогресс изучения слова"><span>0</span>/3</p>
                        </div>
                    </div>

                    <div class='right-block col'>
                        <ul class='list-variants'>
                            <li class='selected-true disabled'>
                                <span>1</span>
                                <p>car</p>
                            </li>
                            <li class='selected-false disabled'>
                                <span>2</span>
                                <p>car</p>
                            </li>
                            <li class='disabled'>
                                <span>3</span>
                                <p>car</p>
                            </li>
                            <li class='disabled'>
                                <span>4</span>
                                <p>car</p>
                            </li>
                            <li>
                                <span>5</span>
                                <p>Не знаю</p>
                            </li>
                            <li>
                                <span>Enter</span>
                                <!-- <p>не знаю</p> -->
                                <p id='btn-next'>Далее
                                    <i class="fa fa-arrow-right" aria-hidden="true"></i>
                                </p>
                            </li>
                        </ul>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection
