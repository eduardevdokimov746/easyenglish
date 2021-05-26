<div id="list-translate" v-show="translateWords.length">
    <ul>
        <template v-for="(translate, indexTranslate) in translateWords">
            <li
                class="word-translate-drpdw in-dictionary-list-translate"
                v-if="hasDictionary(translate.id)"
                :key="indexTranslate"
                @click="deleteWordFromDictionary(translate.id)"
            >@{{ translate.translate }}</li>

            <li
                class="word-translate-drpdw"
                v-if="!hasDictionary(translate.id)"
                :key="indexTranslate"
                @click="addWordToDictionary(translate.id)"
            >@{{ translate.translate }}</li>
        </template>


        <li id="add-translate-drpdw">
            <template v-if="!visibleInputWordTranslate">
                <span id="title-action-drpdw" @click="showInputWordTranslate">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                    Добавить перевод
                </span>

                <span id="sound-drpdw" @click="sound">
                    <i class="fa fa-volume-up" aria-hidden="true"></i>
                </span>
            </template>

            <div id="div-new-translate-drpdw" v-if="visibleInputWordTranslate">
                <input type="text" id="input-new-translate-drpdw" v-model="newWord">
                <div id="div-action-new-translate-drpdw">
                    <button class="btn btn-danger" @click="hideInputWordTranslate">Отменить</button>
                    <button class="btn btn-success" @click="addTranslate" :disabled="isDisabled">Добавить</button>
                </div>
            </div>
        </li>
    </ul>
</div>

@push('scripts')
    <script>
        var domain = '{{ config('app.url') }}';
        var errorMsg = '{{ __('ship::validation.error-server') }}';

        var listTranslateWordComponent = {
            data: {
                translateWords: [],
                visibleInputWordTranslate: false,
                newWord: '',
                currentEngWord: {},
                dictionary: [],
                lastSpeedSound: 'slow',
                sounds: {
                    normal: '',
                    slow: ''
                },
            },
            created: function(){
                this.dictionary = JSON.parse('{!! $dictionary->toJson() !!}');
            },
            mounted: function(){
                $(document).mouseup(function (e){ // событие клика по веб-документу
                    var elements = $("#list-translate"); // тут указываем класс элементов
                    elements.each(function() {
                        var dqv = $(this);
                        if (!dqv.is(e.target) && dqv.has(e.target).length === 0) {
                            app.translateWords = [];
                            app.hideInputWordTranslate();
                        }
                    });
                });
            },
            methods: {
                showListTranslate: function(wordId, action){
                    var element = action.currentTarget;

                    $.ajax({
                        url: '{{ route('web_word_show') }}',
                        data: {'_token': token, 'id': wordId},
                        type: 'post',
                        success: function(response){
                            var data = JSON.parse(response);

                            if(data[0]){
                                app.translateWords = data[0].rus_translate;
                                app.currentEngWord = data[0];
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
                            }
                        },
                        error: function(error){
                            alertDanger(errorMsg);
                        }
                    });

                    $('#list-translate').css({'top': action.pageY + 10, 'left': action.pageX + 10});
                },
                showInputWordTranslate: function(){
                    this.visibleInputWordTranslate = true;
                },
                hideInputWordTranslate: function(){
                    this.visibleInputWordTranslate = false;
                    this.newWord = '';
                },
                addWordToDictionary: function(translate_id){
                    $.ajax({
                        url: '{{ route('web_dictionary_add') }}',
                        type: 'post',
                        data: {'_token': token, 'eng_word_id': app.currentEngWord.id, 'rus_translate_id': translate_id},
                        success: function(response){
                            console.log(response);
                            app.dictionary.push({rus_translate_id: translate_id});
                        },
                        error: function(error){
                            alertDanger(errorMsg);
                        }
                    });
                },
                deleteWordFromDictionary: function(translate_id){
                    $.ajax({
                        url: '{{ route('web_dictionary_delete') }}',
                        type: 'post',
                        data: {'_token': token, 'eng_word_id': app.currentEngWord.id, 'rus_translate_id': translate_id},
                        success: function(response){
                            console.log(response);
                            var index = _.findIndex(app.dictionary, {rus_translate_id: translate_id});
                            if (index !== -1) {
                                app.dictionary.splice(index, 1);
                            }
                        },
                        error: function(error){
                            alertDanger(errorMsg);
                        }
                    });
                },
                hasDictionary: function(translate_id) {
                    var index = _.findIndex(this.dictionary, function(item){
                         return item.rus_translate_id == translate_id;
                    });

                    return index !== -1;
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
                addTranslate: function(){
                    $.ajax({
                        url: '{{ route('web_word_add_new_translate') }}',
                        data: {
                            '_token': token,
                            'user_id': app.auth_id,
                            'translate': app.newWord,
                            'english_word_id': app.currentEngWord.id
                        },
                        type: 'post',
                        success: function(response){
                            var data = JSON.parse(response);
                            console.log(data);
                            if(Object.keys(data).length > 0){
                                app.translateWords.push(data);
                            }
                            app.newWord = '';
                            app.hideInputWordTranslate();
                        },
                        error: function(error){
                            alertDanger(errorMsg);
                        }
                    });
                },
            },
            computed: {
                isDisabled: function(){
                    return !isNotEmptyString(this.newWord);
                }
            }
        };

        mixins.push(listTranslateWordComponent);
    </script>
@endpush
