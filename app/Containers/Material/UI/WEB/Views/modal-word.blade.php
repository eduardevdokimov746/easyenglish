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

@push('scripts')
    <script>
        var token = '{{ csrf_token() }}';
        var domain = '{{ config('app.url') }}';
        var errorMsg = '{{ __('ship::validation.error-server') }}';

        var modalWordComponent = {
            data: {
                auth_id: '{{ \Auth::id() }}',
                modalWord: {},
                lastSpeedSound: 'slow',
                sounds: {
                    normal: '',
                    slow: ''
                },
                wordAdd: '',
                translateWords: [],
            },
            methods: {
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
                showListTranslate: function(wordId, event){
                    $.ajax({
                        url: '{{ route('web_word_show') }}',
                        data: {'_token': token, 'id': wordId},
                        type: 'post',
                        success: function(response){
                            console.log(response);
                            var data = JSON.parse(response);

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
                            alertDanger(errorMsg);
                        }
                    });
                },
            },
            computed: {
                isActiveAddTranslateBtn: function(){
                    return isNotEmptyString(this.wordAdd) ? null : 'disabled';
                },
            }
        };

        mixins.push(modalWordComponent);
    </script>
@endpush
