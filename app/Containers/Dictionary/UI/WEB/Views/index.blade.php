@extends('layouts.main')

@section('content')
    <section class="other_services mt-5" id="why">
        <div class="container">
            <div class="head-content mb-5">
                <h3 class="heading col-4">Словарь <span>(351)</span></h3>

                <div class="search-block col-4">
                    <input type="text" placeholder="Найти" class="search-input" name="search" autocomplete="off">
                    <i class="fa fa-search" aria-hidden="true" title="Поиск"></i>
                </div>

                <div class="col-4" id="block-manage-selected-words" >
                    <template v-if="checkedWordsList.length">
                        <h5>Выделено слов: @{{ checkedWordsList.length }}</h5>
                        <button class="btn btn-danger">
                            <i class="fa fa-trash" aria-hidden="true"></i>
                        </button>

                    </template>
                </div>
            </div>

            <div class="row">
                <div class="col-md-9">
                    <div class="block-table-slovar">
                        <!-- Таблица с выполненными заданиями -->
                        <table id="table-slovar">
                            <tbody>
                            <tr>
                                <td class="td-checkbox">
                                    <input type="checkbox" value="1" v-model="checkedWordsList"></td>
                                <td class="td-sound">
                                    <div>
                                        <i class="fa fa-volume-up" aria-hidden="true"></i>
                                    </div>
                                </td>
                                <td class="td-slovo">
                                    <div>
                                        <span>my</span> &mdash; свой
                                    </div>
                                </td>
                                <td class="td-status" @click="showMenuChangeStatus">
                                    <div class="img-status-word" title="Изучено">
                                        <img src="images/s2-green.png">
                                    </div>
                                </td>
                                <td class="td-trash" v-show="!checkedWordsList.length">
                                    <div >
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-checkbox">
                                    <input type="checkbox"  value="2"  v-model="checkedWordsList"></td>
                                <td class="td-sound">
                                    <div>
                                        <i class="fa fa-volume-up" aria-hidden="true"></i>
                                    </div>
                                </td>
                                <td class="td-slovo">
                                    <div>
                                        <span>my</span> &mdash; свой
                                    </div>
                                </td>
                                <td class="td-status" @click="showMenuChangeStatus">
                                    <div class="img-status-word" title="Изучено">
                                        <img src="images/s2-green.png">
                                    </div>

                                </td>
                                <td class="td-trash" v-show="!checkedWordsList.length">
                                    <div >
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-checkbox">
                                    <input type="checkbox"  value="3"  v-model="checkedWordsList"></td>
                                <td class="td-sound">
                                    <div>
                                        <i class="fa fa-volume-up" aria-hidden="true"></i>
                                    </div>
                                </td>
                                <td class="td-slovo">
                                    <div>
                                        <span>my</span> &mdash; свой
                                    </div>
                                </td>
                                <td class="td-status" @click="showMenuChangeStatus">
                                    <div class="img-status-word" title="Изучено">
                                        <img src="images/s2-green.png">
                                    </div>

                                </td>
                                <td class="td-trash" v-show="!checkedWordsList.length">
                                    <div >
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-checkbox">
                                    <input type="checkbox"  value="4"  v-model="checkedWordsList"></td>
                                <td class="td-sound">
                                    <div>
                                        <i class="fa fa-volume-up" aria-hidden="true"></i>
                                    </div>
                                </td>
                                <td class="td-slovo">
                                    <div>
                                        <span>my</span> &mdash; свой
                                    </div>
                                </td>
                                <td class="td-status" @click="showMenuChangeStatus">
                                    <div class="img-status-word" title="Изучено" >
                                        <img src="images/s2-green.png">
                                    </div>
                                </td>
                                <td class="td-trash" v-show="!checkedWordsList.length">
                                    <div >
                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <!-- Таблица с выполненными заданиями -->
                    </div>
                </div>

                <div class="col-md-3 main-right-div">
                    <div class="right-div-block">
                        <h5>Статус слова</h5>
                        <ul style="list-style: none">
                            <li>
                                <label class="radio-li-item">Все
                                    <input name="radio-1" type="radio" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-li-item">На изучении
                                    <input name="radio-1" type="radio">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-li-item">Изучено
                                    <input name="radio-1" type="radio">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div id="menu-change-status" v-show="isShowMenuChangeStatus">
        <ul>
            <li @click="resetStatusWord">
                <p>Сбросить статус</p>
            </li>
            <li @click="upStatusWord">
                <p>Перевести в изученные</p>
            </li>
        </ul>
    </div>


    <!-- МОДАЛЬНОЕ ОКНО ПРОСМОТРА СЛОВА -->
    <div class="modal" tabindex="-1" role="dialog" id='show-word-modal'>
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-body">

                    <div title="Изучено" class="status-image-block" @click="showMenuChangeStatus">
                        <img src="{{ asset('images/s2-green.png') }}">
                    </div>

                    <div class='cansel-form' @click="hideModalWord">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>

                    <div class='trash-block'>
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </div>

                    <div class="head">
                        <div class="image-block">
                            <img src="{{ asset('images/banner.jpg') }}" alt="">
                        </div>
                    </div>
                    <div class="mt-2 body">
                        <div class="content content-eng">
                            <p id="eng-word" @click="showListTranslate('{{ 1 }}', $event)">elder</p>
                            <span><i class="fa fa-volume-up" aria-hidden="true"></i></span>
                        </div>
                        <div class="content content-translate">
                            <div class='words-translate'>
                                <ul v-if="!translateWords.length" class="list-words">
                                    <li>
                                        <p class="translate-word">
                                            старик
                                            <span class="trash-translate-word">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </span>
                                        </p>
                                    </li>
                                    <li>
                                        <p class="translate-word">
                                            старик
                                            <span class="trash-translate-word">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </span>
                                        </p>
                                    </li>
                                    <li>
                                        <p class="translate-word">
                                            старик
                                            <span class="trash-translate-word">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </span>
                                        </p>
                                    </li>
                                    <li>
                                        <p class="translate-word">
                                            старик
                                            <span class="trash-translate-word">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </span>
                                        </p>
                                    </li>
                                </ul>


                                <ul class="new-list-words" v-if="translateWords.length">
                                    <li class="added">старик</li>
                                    <li>старик</li>
                                    <li>старик</li>
                                    <li>старик</li>
                                    <li>
                                        <input type="text" placeholder="Свой вариант" v-model="newWord">
                                        <button class="btn btn-primary" :disabled="isDisabled">
                                            <i class="fa fa-plus" aria-hidden="true"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- МОДАЛЬНОЕ ОКНО ПРОСМОТРА СЛОВА -->

    <!-- МОДАЛЬНОЕ ОКНО ПОДТВЕРЖДЕНИЯ УДАЛЕНИЯ СЛОВ ИЗ СЛОВАРЯ -->

    <div class="modal" tabindex="-1" role="dialog" id='modal-delete-words'>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Вы точно хотите удалить эти слова из вашего словаря?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger">Удалить</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
                </div>
            </div>
        </div>
    </div>
    <!-- МОДАЛЬНОЕ ОКНО ПОДТВЕРЖДЕНИЯ УДАЛЕНИЯ СЛОВ ИЗ СЛОВАРЯ -->


@endsection


@push('scripts')
    <script src="{{ asset('js/app/add_new_translate.js') }}"></script>
    <script>

        var dictionaryComponent = {
            data:{
                checkedWordsList: [],
                isShowMenuChangeStatus: false,
            },
            mounted: function(){
                $(document).mouseup(function (e) {
                    var container = $("#menu-change-status");
                    if (container.has(e.target).length === 0){
                        $('#app').append(container);
                        app.isShowMenuChangeStatus = false;
                    }

                    var container1 = $(".new-list-words");
                    if (container1.has(e.target).length === 0){
                        app.translateWords = [];
                    }
                });

                $('#table-slovar .td-slovo div').click(function(){
                    $('#show-word-modal').modal();
                });

                $('#table-slovar .td-trash').click(function(){
                    $('#modal-delete-words').modal();
                });

                $('.trash-block').click(function(){
                    $('#modal-delete-words').modal();
                });



            },
            methods:{
                showMenuChangeStatus: function(action){
                    var element = $(action.currentTarget);
                    this.isShowMenuChangeStatus = true;
                    element.append($('#menu-change-status'));
                },
                resetStatusWord: function(){
                    alert('AJAX')
                },
                upStatusWord: function(){
                    alert('AJAX')
                },
                hideModalWord: function(){
                    $('#show-word-modal').modal('hide');
                },
            }
        };

        mixins.push(dictionaryComponent);
    </script>

@endpush
