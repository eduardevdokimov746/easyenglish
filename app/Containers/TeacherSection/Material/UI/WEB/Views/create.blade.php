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
                            <label for="visible-material">
                                Видимость
                                <input type="checkbox" id="visible-material">
                            </label>
                        </div>
                    </div>

                </div>
            </div>

            <div class="row mt-3 mb-3">
                <div class="col">
                    <form class="form form-create-course" action="{{ route('web_teacher_materials_prepare_text') }}" method="post">
                        @csrf
                        <h3>Работа с текстом</h3>
                        <div class="form-group mt-3">
                            <label for="title-material">
                                Название <span class="mark-required-field" title="Обязательно для заполнения">*</span>
                                <input id="title-material" name="plain_title" v-model="plainTitle" class="form-control" type="text">
                            </label>
                        </div>

                        <div class="form-group mt-3">
                            <label for="plain-material">
                                Введите текст <span class="mark-required-field" title="Обязательно для заполнения">*</span>
                                <textarea rows="10" id="plain-material" name="plain_text" v-model="plainText" class="form-control" type="text"></textarea>
                            </label>
                        </div>

                        <div class="form-group mt-3" style="position: relative;">
                            <label for="autowrite-material" class="no-width">
                                Автозаполнение слов
                                <input type="checkbox" id="autowrite-material" {{ isset($isPrepare) && $isAutogenerate ? 'checked' : '' }} name="auto-generate">
                            </label>
                            <i class="fa fa-question-circle-o" @click="showHideNoticeMaterial" :class="{ 'btn-active-notice-material' : isVisibleNoticeMaterial }" id="btn-notice-material" aria-hidden="true"></i>
                            <div class="notice-autowrite-material" v-show="isVisibleNoticeMaterial" style="margin-left: 30px">
                                <p>
                                    Система попытается выполнить перевод недостающих слов с помощью API ABBYY Lingvo и найти ассоциативные изображения с помощью API Unsplash
                                </p>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-info" :disabled="isActivePrepareBtn">Подготовить</button>
                        </div>
                    </form>
                </div>
            </div>

            @if(isset($isPrepare))
            <div class="row mt-3 mb-3">
                <div class="col">
                    <div class="form form-create-course">
                        <h3>Настройка слов</h3>
                        <div>
                            <div id="text-body">
                                <h3>
                                    {!! $htmlTitle !!}
                                </h3>
                                <p>
                                    {!! $htmlText !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif


            <div class="d-flex justify-content-end">
                <button class="btn btn-primary" :disabled="newWords.length > 0 ? 'disabled' : null">Создать</button>
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

                    <div class="head">
                        <div class="image-block">
                            <img :src="Object.keys(modalWord).length >= 1 ? getModalWordImage() : ''" alt="">
                            <label for="change-image-word" class="btn-change-word-image">
                                Изменить фото
                            </label>
                            <input type="file" id="change-image-word" style="display: none">
                        </div>
                    </div>
                    <div class="mt-2 body">
                        <div class="content content-eng">
                            <p id="eng-word">@{{ modalWord.word }}</p>
                            <span @click="sound">
                                <i aria-hidden="true" class="fa fa-volume-up"></i>
                            </span>
                        </div>
                        <div class="content content-translate">
                            <div class='words-translate'>
                                <ul class="list-words">
                                    <li v-show="translateWords.length == 0">
                                        <p class="translate-word">
                                            Переводов нет
                                        </p>
                                    </li>
                                    <li v-for="(translate, indexTranslate) in translateWords" :key="indexTranslate">
                                        <p class="translate-word">
                                            @{{ translate.translate }}
                                            <span class="trash-translate-word" @click="deleteTranslate(indexTranslate)" v-if="auth_id == translate.user_id">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </span>
                                        </p>
                                    </li>
                                    <li>
                                        <div>
                                            <input type="text" placeholder="Введите перевод" v-model="wordAdd">
                                            <button style="padding: 2px 10px" title="Добавить" @click="addTranslate(modalWord.id)" :disabled="isActiveAddTranslateBtn" class="btn btn-info">+</button>
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
        var token = '{{ csrf_token() }}';
        var domain = '{{ config('app.url') }}';
        var errorMsg = '{{ __('ship::validation.error-server') }}';

        var dictionaryComponent = {
            data:{
                auth_id: '{{ \Auth::id() }}',
                checkedWordsList: [],
                isShowMenuChangeStatus: false,
                translateWords: [],
                plainTitle: "{!! isset($isPrepare) ?  str_replace("\r\n", "\\r\\n", $plainTitle) : '' !!}",
                plainText: "{!! isset($isPrepare) ? str_replace("\r\n", "\\r\\n", $plainText) : '' !!}",
                htmlTitle: "{!! isset($isPrepare) ?  str_replace("\"", "'", $htmlTitle) : '' !!}",
                htmlText: "{!! isset($isPrepare) ? str_replace("\"", "'", $htmlText) : '' !!}",
                newWords: [],
                modalWord: {},
                lastSpeedSound: 'slow',
                sounds: {
                    normal: '',
                    slow: ''
                },
                wordAdd: ''
            },
            created: function(){
                {!! isset($isPrepare) ? 'this.newWords = JSON.parse(\'' . $newWords->toJson() . '\')' : '' !!}
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

                    $.ajax({
                        url: '{{ route('web_word_show') }}',
                        data: {'_token': token, 'id': wordId},
                        type: 'post',
                        success: function(response){
                            console.log(response);
                            var data = JSON.parse(response);
                            console
                            if(data[0]){
                                app.modalWord = data[0];
                                app.translateWords = data[0].rus_translate;
                                if(Object.keys(data[0].sound).length > 0){
                                    for (const [key, value] of Object.entries(data[0].sound)) {
                                        if(key == 'normal'){
                                            app.sounds.normal = value;
                                        }

                                        if (key == 'slow') {
                                            app.sounds.slow = value;
                                        }
                                    }
                                }
                                app.lastSpeedSound = 'slow';
                                $('#show-word-modal').modal();
                            }
                        },
                        error: function(error){
                            console.log(error);
                        }
                    });
                },
                hasTranslate: function(word_id){
                    if(this.newWords.length > 0){
                        var index = _.findIndex(this.newWords, function(item){
                            return item.id == word_id;
                        });

                        return index === -1;
                    } else {
                        return true;
                    }
                },
                resetWordData: function(){
                    alert('AJAX')
                },
                hideModalWord: function(){
                    $('#show-word-modal').modal('hide');
                },
                getModalWordImage: function(){
                    if(this.modalWord) {
                        return domain + '/storage/word_images/' + this.modalWord.image;
                    }
                },
                sound: function(){
                    this.lastSpeedSound = this.lastSpeedSound == 'slow' ? 'normal' : 'slow';

                    if(Object.keys(this.sounds).length > 0) {
                        if (this.sounds[this.lastSpeedSound]) {
                            var notice = new Howl({
                                src: domain + '/storage/' + this.sounds[this.lastSpeedSound]
                            });

                            notice.play();
                        }
                    }
                },
                addTranslate: function(engWordId){
                    $.ajax({
                        url: '{{ route('web_word_add_new_translate') }}',
                        data: {
                            '_token': token,
                            'user_id': app.auth_id,
                            'translate': app.wordAdd,
                            'english_word_id': engWordId
                        },
                        type: 'post',
                        success: function(response){
                            console.log(response);
                            var data = JSON.parse(response);
                            console.log(data);
                            if(Object.keys(data).length > 0){
                                console.log('123');
                                app.translateWords.push(data);
                                app.updateNewMessageStatus(engWordId);
                            }
                            app.wordAdd = '';
                        },
                        error: function(error){
                            alertDanger(errorMsg);
                        }
                    });
                },
                deleteTranslate: function(indexTranslate) {
                    if (this.translateWords[indexTranslate]) {
                        $.ajax({
                            url: '{{ route('web_word_delete_translate') }}',
                            data: {
                                '_token': token,
                                'id': this.translateWords[indexTranslate].id,
                            },
                            type: 'post',
                            success: function(response){
                                console.log(response);
                                if (response == 1) {
                                    app.translateWords.splice(indexTranslate, 1);
                                    app.updateNewMessageStatus(app.modalWord.id);
                                } else {
                                    alertDanger(errorMsg);
                                }
                            },
                            error: function(error){
                                alertDanger(errorMsg);
                            }
                        });
                    }
                },
                updateNewMessageStatus: function(word_id) {
                    console.log(this.translateWords.length, !this.hasTranslate(word_id));
                    if (this.translateWords.length == 0 && this.hasTranslate(word_id)) {
                        console.log('111');
                        this.newWords.push(this.modalWord);
                        return;
                    }
                    console.log(this.translateWords.length, this.hasTranslate(word_id));
                    if (this.translateWords.length > 0 && !this.hasTranslate(word_id)) {
                        console.log('222');
                        var index = _.findIndex(this.newWords, function(item){
                            return item.id == word_id;
                        });

                        if (index !== -1) {
                            this.newWords.splice(index, 1);
                            return;
                        }
                    }
                }
            },
            computed: {
                isActivePrepareBtn: function(){
                    return isNotEmptyString(this.plainTitle) && isNotEmptyString(this.plainText) ? null : 'disabled';
                },
                isActiveAddTranslateBtn: function(){
                    return isNotEmptyString(this.wordAdd) ? null : 'disabled';
                }
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
