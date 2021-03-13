@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" id="why">
        <div class="container mb-4">
            <div class="head-content">
                <h1 class="heading col">
                    Создание материала
                </h1>
            </div>

            <div class="row mt-3 mb-3">
                <div class="col">
                    <div class="form form-create-course">
                        <h3>Основные параметры</h3>
                        <div class="form-group mt-3">
                            <label for="title-material">
                                Название <span class="mark-required-field" title="Обязательно для заполнения">*</span>
                                <input id="title-material" class="form-control" type="text">
                            </label>
                        </div>

                        <div class="form-group mt-3">
                            <label for="visible-material">
                                Видимость
                                <input type="checkbox" id="visible-material">
                            </label>
                        </div>

                        <div class="form-group mt-3" style="position: relative;">
                            <label for="autowrite-material" class="no-width">
                                Автозаполнение слов
                                <input type="checkbox" id="autowrite-material">
                            </label>
                            <i class="fa fa-question-circle-o" @click="showHideNoticeMaterial" :class="{ 'btn-active-notice-material' : isVisibleNoticeMaterial }" id="btn-notice-material" aria-hidden="true"></i>
                            <div class="notice-autowrite-material" v-show="isVisibleNoticeMaterial">
                                <p>
                                    Система попытается выполнить перевод недостающих слов с помощью API ABBYY Lingvo и найти ассоциативные изображения с помощью API Unsplash
                                </p>
                            </div>
                        </div>
                    </div>



                </div>
            </div>

            <div class="row mt-3 mb-3">
                <div class="col">
                    <div class="form form-create-course">
                        <h3>Работа с текстом</h3>
                        <div class="form-group mt-3">
                            <label for="plain-material">
                                Введите текст <span class="mark-required-field" title="Обязательно для заполнения">*</span>
                                <textarea rows="10" id="plain-material" class="form-control" type="text"></textarea>
                            </label>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-info">Подготовить</button>
                        </div>

                    </div>
                </div>
            </div>

            <div class="row mt-3 mb-3">
                <div class="col">
                    <div class="form form-create-course">
                        <h3>Настройка слов</h3>
                        <div>
                            <div id="text-body">
                                <h3>
                                    <span class="untranslate-word" @click="showListTranslate('1', $event)">Пример</span>
                                    <span class="word" @click="showListTranslate('1', $event)">перевода</span>
                                </h3>
                                "Shiro!
                                Shiro!"

                                Mr and Mrs Nakamura were worried.
                                Their dog Shiro was missing.
                                "Shiro!
                                "  they called again and again.
                                Mr and Mrs Nakamura lived on a small island in Japan.
                                They looked everywhere on the island, but they couldn't find Shiro.

                                The next day Mr Nakamura heard a noise at the front door.
                                He opened the door, and there was Shiro.
                                Shiro was very wet, and he was shivering.

                                A few days later Shiro disappeared again.
                                He disappeared in the morning, and he came back late in the night.
                                When he came back, he was wet and shivering.

                                Shiro began to disappear often.
                                He always disappeared in the morning and came back late at night.
                                He was always wet when he came back.

                                Mr Nakamura was curious.
                                "Where does Shiro go?
                                "  he wondered.
                                "Why is he wet when he comes back?"

                                One morning Mr Nakamura followed Shiro.
                                Shiro walked to the beach, ran into the water, and began to swim.
                                Mr Nakamura jumped into his boat and followed his dog.
                                Shiro swam for about two miles (1).
                                Then he was tired, so climbed onto a rock and rested.
                                A few minutes later he jumped back into the water and continued swimming.

                                Shiro swam for three hours.
                                Then he arrived at an island.
                                He walked onto the beach, shook the water off, and walked toward town.
                                Mr Nakamura followed him.
                                Shiro walked to a house.
                                A dog was waiting in front of the house.
                                Shiro ran to the dog, and the two dogs began to play.
                                The dog's name was Marilyn.
                                Marilyn was Shiro's girlfriend.

                                Marilyn lived on Zamami, another Japanese island.
                                Shiro and the Nakamuras used to live on Zamami.
                                Then the Nakamuras moved to Aka, a smaller island.
                                They took Shiro with them.
                                Shiro missed Marilyn very much and wanted to be with her.
                                But he wanted to be with the Nakamuras, too.
                                So, Shiro lived with the Nakamuras on the island of Aka and swam to Zamami to visit Marilyn.

                                People were amazed when they heard about Shiro.
                                The distance from Aka to Zamami is two and a half miles (2), and the ocean between the islands is very rough.
                                "Nobody can swim from Aka to Zamami!
                                "  the people said.

                                Shiro became famous.
                                Many people went to Zamami because they wanted to see Shiro.
                                During <span class="word" @click="showListTranslate('{{ 1 }}', $event)">one</span> Japanese holiday, 3.000 people visited Zamami.
                                They waited on the beach for Shiro.
                                "Maybe Shiro will swim to Zamami today," they said.
                                They all wanted to see Shiro, the dog who was in <span >love</span>.
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="d-flex justify-content-end">
                <button class="btn btn-primary">Создать</button>
            </div>
        </div>
    </section>

    <!-- МОДАЛЬНОЕ ОКНО ПРОСМОТРА СЛОВА -->
    <div class="modal" tabindex="-1" role="dialog" id="show-word-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class='cansel-form' @click="hideModalWord">
                        <i class="fa fa-times" aria-hidden="true"></i>
                    </div>

                    <div class='trash-block' title="Сбросить">
                        <i class="fa fa-ban" aria-hidden="true"></i>
                    </div>

                    <div class="head">
                        <div class="image-block">
                            <img src="{{ asset('images/banner.jpg') }}" alt="">
                            <label for="change-image-word" class="btn-change-word-image">
                                Изменить фото
                            </label>
                            <input type="file" id="change-image-word" style="display: none">
                        </div>

                    </div>
                    <div class="mt-2 body">
                        <div class="content content-eng">
                            <p>elder</p>
                        </div>
                        <div class="content content-translate">
                            <div class='words-translate'>
                                <ul v-if="!translateWords.length" class="list-words">
                                    <li v-show="false">
                                        <p class="translate-word">
                                            Переводов нет
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
                                        <div>
                                            <input type="text" placeholder="Введите перевод">
                                            <button style="padding: 2px 10px" title="Добавить" class="btn btn-info">+</button>
                                        </div>
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



@endsection

@push('scripts')
    <script>
        var dictionaryComponent = {
            data:{
                checkedWordsList: [],
                isShowMenuChangeStatus: false,
                translateWords: [],
            },
            mounted: function(){
                $('#table-slovar .td-trash').click(function(){
                    $('#modal-delete-words').modal();
                });

                $('.trash-block').click(function(){
                    $('#modal-delete-words').modal();
                });

            },
            methods:{
                showListTranslate: function(wordId, event){
                    console.log(wordId, event);
                    $('#show-word-modal').modal();
                },
                resetWordData: function(){
                    alert('AJAX')
                },
                hideModalWord: function(){
                    $('#show-word-modal').modal('hide');
                },
            }
        };



        var createMaterialComponent = {
            data:{
                isVisibleNoticeMaterial: false,
            },
            methods:{
                showHideNoticeMaterial: function(){
                    this.isVisibleNoticeMaterial = this.isVisibleNoticeMaterial ? false : true;
                }
            }
        };

        mixins.push(createMaterialComponent, dictionaryComponent);
    </script>
@endpush
