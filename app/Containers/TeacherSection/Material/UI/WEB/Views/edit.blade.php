@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" id="why">
        <div class="container mb-4">
            <div class="head-content">
                <h1 class="heading col">
                    Редактирование материала
                </h1>
            </div>

            @include('components.breadcrumbs')

            <div class="row mt-3 mb-3">
                <div class="col">
                    <form class="form form-create-course" action="{{ route('web_teacher_materials_prepare_text_update', $material->id) }}" method="post">
                        @csrf
                        <h3>Подготовка текста</h3>
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

            <div class="row mt-3 mb-3">
                <div class="col">
                    <div class="form form-create-course">
                        <h3>Настройка слов</h3>
                        <div>
                            <div id="text-body">
                                <h3>
                                    {!! isset($isPrepare) ? $htmlTitle : $material->html_title !!}
                                </h3>
                                <p>
                                    {!! isset($isPrepare) ? $htmlText : $material->html_text !!}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-3 mb-3">
                <div class="col">
                    <div class="form form-create-course">
                        <h3>Дополнительно</h3>

                        <div class="form-group mt-3">
                            <label>
                                Добавить изображение
                                <input type="file" id="image" name="image">
                            </label>
                            <h5>Предпросмотр</h5>
                            <div class="col-lg-4 box-text mt-3" style="margin-bottom: 0">
                                <div class="grid">
                                    <div class="box-text-stat-div">
                                        <img src="{{ asset('storage/materials/' . $material->image) }}" alt="" class="img-fluid">
                                    </div>
                                    <div class="info p-4">
                                        <h4 class="">Название текста</h4>
                                        <p class="mt-3">Какой-то текст</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="complexity">Сложность текста</label>
                            <select id="complexity" class="form-control" v-model="complexity">
                                <option value="default">Выберете сложность</option>
                                <option value="basic">Начальный</option>
                                <option value="middle">Средний</option>
                                <option value="advanced">Продвинутый</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="visible-material">
                                Видимость
                                <input type="checkbox" id="visible-material" v-model="is_visible">
                            </label>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('web_teacher_materials_index') }}" class="btn btn-danger" style="margin-right: 10px">Отменить</a>
                <button class="btn btn-primary" :disabled="isActiveAddMaterialBtn" @click="updateMaterial">Сохранить</button>
            </div>
        </div>
    </section>

    @include('material::modal-word')
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
                plainTitle: "{!! isset($isPrepare) ?  str_replace("\r\n", "\\r\\n", $plainTitle) : $material->plain_title !!}",
                plainText: "{!! isset($isPrepare) ? str_replace("\r\n", "\\r\\n", $plainText) : $material->plain_text !!}",
                htmlTitle: "{!! isset($isPrepare) ?  htmlspecialchars($htmlTitle) : htmlspecialchars($material->html_text) !!}",
                htmlText: "{!! isset($isPrepare) ? htmlspecialchars($htmlText) : htmlspecialchars($material->html_title) !!}",
                htmlTitleToDb: "{!! isset($isPrepare) ? htmlspecialchars($htmlTitleToDb) : '' !!}",
                htmlTextToDb: "{!! isset($isPrepare) ? htmlspecialchars($htmlTextToDb) : '' !!}",
                newWords: [],
                isPrepare: true,
                isLoadImage: false,
                image: {},
                complexity: '{{ $material->complexity }}',
                is_visible: '{{ $material->is_visible }}' == 1 ? true : false
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
                },
                updateMaterial: function() {
                    var form = new FormData();

                    form.append('_token', token);
                    form.append('plain_title', this.plainTitle);
                    form.append('html_title', this.htmlTitleToDb);
                    form.append('plain_text', this.plainText);
                    form.append('html_text', this.htmlTextToDb);
                    form.append('complexity', this.complexity);
                    form.append('is_visible', this.is_visible ? 1 : 0);

                    if(this.isLoadImage){
                        form.append('image', this.image);
                    }

                    console.log('asd');
                    $.ajax({
                        url: '{{ route('web_teacher_materials_update', $material->id) }}',
                        type: 'post',
                        data: form,
                        processData: false,
                        contentType: false,
                        success: function(data){
                            console.log(data);

                            var msg = JSON.parse(data).msg;
                            alertSuccess(msg);

                            setTimeout(function(){
                                window.location = '{{ route('web_teacher_materials_index') }}'
                            }, 1000);
                        },
                        error: function(error){
                            console.log(error);
                            alertDanger(errorMsg);
                        }
                    });
                }
            },
            computed: {
                isActivePrepareBtn: function(){
                    return isNotEmptyString(this.plainTitle) && isNotEmptyString(this.plainText) ? null : 'disabled';
                },
                isActiveAddMaterialBtn: function(){
                    return this.isPrepare && this.newWords.length == 0 && this.complexity !== 'default' ? null : 'disabled';
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

        $(document).ready(function(){
            var defaultImage = '{{ asset('storage/materials/' . $material->image) }}';

            $('#image').change(function (event) {
                let reader = new FileReader();

                reader.onload = (e) => {
                    $('.img-fluid').attr('src', e.target.result);
                };

                if (this.files[0]) {
                    reader.readAsDataURL(this.files[0]);
                    app.isLoadImage = true;
                    app.image = this.files[0];
                } else {
                    $('.img-fluid').attr('src', defaultImage);
                    app.isLoadImage = false;
                    app.image = {};
                }
            });
        });
    </script>
@endpush
