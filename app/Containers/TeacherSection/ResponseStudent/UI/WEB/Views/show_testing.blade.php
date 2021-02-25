@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" id="why">
        <div class="container mb-4">
            <div class="head-content">
                <h1 class="heading col">
                    Название задания
                </h1>
            </div>

            <div class="row mt-3 mb-3">
                <div class="col">

                    <template v-if="activeForm == 'show'">
                        @include('teachersection/responseteacher::forms_testing.show')
                    </template>

                    <template v-if="activeForm == 'edit'">
                        @include('teachersection/responseteacher::forms_testing.edit')
                    </template>


                    <div class="form mt-3">
                        <div class="d-flex justify-content-center">
                            <h2>Просмотр</h2>
                        </div>

                        <div class="mt-2">
                            <p>
                                <span>1)</span>
                                <span>Какой то вопрос</span>
                            </p>
                            <div>
                                <ul>
                                    <li>
                                        <label>
                                            <input type="radio" name="radio-1">
                                            <span>а)</span>
                                            <span>вариант а</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="radio-1">
                                            <span>а)</span>
                                            <span>вариант а</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="radio-1">
                                            <span>а)</span>
                                            <span>вариант а</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="radio" name="radio-1">
                                            <span>а)</span>
                                            <span>вариант а</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <table style="width: 100%;">
                                    <tr>
                                        <td width="50%" class="li-item-response-test-form li-result-false-response">
                                            <p>
                                                <span>1</span>
                                                <span>Car</span>
                                            </p>
                                        </td>
                                        <td>
                                            <p>
                                                <input class="number-comp-words" type="number" min="1">
                                                <span>Машина</span>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="li-item-response-test-form li-result-true-response">
                                            <p>
                                                <span>1</span>
                                                <span>Car</span>
                                            </p>
                                        </td>
                                        <td>
                                            <p>
                                                <input class="number-comp-words" type="number" min="1">
                                                <span>Машина</span>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div>
                                <p><b>Количество баллов:</b> <span>0/1</span></p>
                            </div>
                            <div>
                                <label class="width-max">
                                    Добавить комментарий
                                    <input type="text" class="form-control" value="asdsadasd asd d as dasd as  as dasd asd ad asd asd ">
                                </label>
                            </div>
                        </div>

                        <div class="mt-2">
                            <p>
                                <span>1)</span>
                                <span>Какой то вопрос</span>
                            </p>
                            <div>
                                <ul>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <span>а)</span>
                                            <span>вариант а</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <span>а)</span>
                                            <span>вариант а</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <span>а)</span>
                                            <span>вариант а</span>
                                        </label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox">
                                            <span>а)</span>
                                            <span>вариант а</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <label class="width-max">
                                    Добавить комментарий
                                    <input type="text" class="form-control" value="asdsadasd asd d as dasd as  as dasd asd ad asd asd ">
                                </label>
                            </div>
                        </div>

                        <div class="mt-2">
                            <p>
                                <span>1)</span>
                                <span>Какой то вопрос</span>
                            </p>
                            <div>
                                <ul>
                                    <li class="li-item-response-test-form li-result-true-response">
                                        <label class="label-for-test-form">
                                            <input type="radio" name="radio-1">
                                            <span>а)</span>
                                            <span>вариант а</span>
                                        </label>
                                    </li>
                                    <li class="li-item-response-test-form">
                                        <label class="label-for-test-form">
                                            <input type="radio" name="radio-1">
                                            <span>а)</span>
                                            <span>вариант а</span>
                                        </label>
                                    </li>
                                    <li class="li-item-response-test-form li-result-false-response">
                                        <label class="label-for-test-form">
                                            <input type="radio" name="radio-1">
                                            <span>а)</span>
                                            <span>вариант а</span>
                                        </label>
                                    </li>
                                    <li class="li-item-response-test-form">
                                        <label class="label-for-test-form">
                                            <input type="radio" name="radio-1">
                                            <span>а)</span>
                                            <span>вариант а</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <p><b>Количество баллов:</b> <span>0/1</span></p>
                            </div>
                            <div>
                                <label class="width-max">
                                    Добавить комментарий
                                    <input type="text" class="form-control">
                                </label>
                            </div>
                        </div>

                        <div class="mt-2">
                            <p>
                                <span>1)</span>
                                <span>Какой то вопрос</span>
                            </p>
                            <div>
                                <ul>
                                    <li class="li-item-response-test-form">
                                        <label class="label-for-test-form">
                                            <input type="checkbox">
                                            <span>а)</span>
                                            <span>вариант а</span>
                                        </label>
                                    </li>
                                    <li class="li-item-response-test-form">
                                        <label class="label-for-test-form">
                                            <input type="checkbox">
                                            <span>а)</span>
                                            <span>вариант а</span>
                                        </label>
                                    </li>
                                    <li class="li-item-response-test-form li-result-false-response">
                                        <label class="label-for-test-form">
                                            <input type="checkbox">
                                            <span>а)</span>
                                            <span>вариант а</span>
                                        </label>
                                    </li>
                                    <li class="li-item-response-test-form li-result-true-response">
                                        <label class="label-for-test-form">
                                            <input type="checkbox">
                                            <span>а)</span>
                                            <span>вариант а</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                            <div>
                                <p><b>Количество баллов:</b> <span>0/1</span></p>
                            </div>
                            <div>
                                <label class="width-max">
                                    Добавить комментарий
                                    <input type="text" class="form-control">
                                </label>
                            </div>
                        </div>

                        <div class="mt-2">
                            <p>
                                <span>1)</span>
                                <span>Сопоставьте правильно слова</span>
                            </p>

                            <div>
                                <table style="width: 100%;">
                                    <tr>
                                        <td width="50%" class="li-item-response-test-form li-result-false-response">
                                            <p>
                                                <span>1</span>
                                                <span>Car</span>
                                            </p>
                                        </td>
                                        <td>
                                            <p>
                                                <input class="number-comp-words" type="number" min="1">
                                                <span>Машина</span>
                                            </p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="li-item-response-test-form li-result-true-response">
                                            <p>
                                                <span>1</span>
                                                <span>Car</span>
                                            </p>
                                        </td>
                                        <td>
                                            <p>
                                                <input class="number-comp-words" type="number" min="1">
                                                <span>Машина</span>
                                            </p>
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div>
                                <p><b>Количество баллов:</b> <span>0/1</span></p>
                            </div>
                            <div>
                                <label class="width-max">
                                    Добавить комментарий
                                    <input type="text" class="form-control">
                                </label>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-info">Сохранить</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        var responseTeacherOnTest = {
            data: {
                activeForm: 'show'
            },
            methods: {
                changeActiveForm: function(formName){
                    this.activeForm = formName;
                }
            }
        };

        mixins.push(responseTeacherOnTest);
    </script>

@endpush
