@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" id="why">
        <div class="container mb-4">
            <div class="head-content">
                <h1 class="heading col">
                    Создание задания
                </h1>
            </div>

            <div class="row mt-3 mb-3">
                <div class="col">
                    <div class="form form-create-course">
                        <h3>Основные параметры</h3>

                        <div class="form-group mt-3">
                            <label for="list_courses">
                                Курс <span class="mark-required-field" title="Обязательно для заполнения">*</span>
                                <select id="list_courses" class="form-control" v-model="currentCourse" :class="{'is-invalid' : currentCourse == 'default' && isSelectCourse}">
                                    <option value="default">Выберите курс</option>
                                    <option v-for="(course, indexCourse) in courses" :value="course.id" :key="course.id">@{{ course.title }}</option>
                                </select>
                                <div class="invalid-feedback">
                                    {{ __('teachersection/zadanie::validation.select-course') }}
                                </div>
                            </label>
                        </div>

                        <div class="form-group mt-3">
                            <label for="list_sections">
                                Раздел <span class="mark-required-field" title="Обязательно для заполнения">*</span>
                                <select id="list_sections" class="form-control" :class="{'is-invalid' : (currentSection == 'default' && isSelectSection)}" v-model="currentSection" :disabled="currentCourse != 'default' ? null : 'disabled'">
                                    <option value="default">Выберите раздел</option>
                                    <option v-for="(section, indexSection) in sections" :value="section.id" :key="section.id">@{{ section.title }}</option>
                                </select>
                                <div class="invalid-feedback">
                                    {{ __('teachersection/zadanie::validation.select-section') }}
                                </div>
                            </label>
                        </div>

                        <div class="form-group mt-3">
                            <label for="title_course">
                                Название <span class="mark-required-field" title="Обязательно для заполнения">*</span>
                                <input id="title_course" class="form-control" :class="{'is-invalid' : title.length <= 0 && isChangedTitle}" v-model="title" type="text">

                                <div class="invalid-feedback">
                                    {{ __('ship::validation.required', ['attribute' => __('ship::attributes.title')]) }}
                                </div>
                            </label>
                        </div>

                        <div class="form-group mt-3">
                            <label for="last-datetime-send" class="no-width">Крайний срок сдачи</label>
                            <input type="datetime-local" required="" id="last-datetime-send">
                        </div>

                        <div class="form-group mt-3">
                            <label for="time-for-work">
                                Время на выполенение
                                <input type="time" required="" id="time-for-work" :disabled="isDisableLimitTime">
                                <label class="no-width"><input type="checkbox" v-model="isDisableLimitTime"> Без ограничения по времени</label>
                            </label>
                        </div>

                        <div class="form-check mt-3">
                            <input type="checkbox" class="form-check-input" id="check-isPublish-zadanie">
                            <label class="form-check-label" for="check-isPublish-zadanie">Опубликовать</label>
                        </div>
                    </div>

                    <div class="form mt-3" v-for="(item, index) in zadanieItems">
                        <ul class="nav nav-pills nav-fill nav-create-test">
                            <li class="nav-item">
                                <p class="nav-link" :class="{active : item.type == 'v1'}" @click="changeType(index, 'v1')">1 вариант</p>
                            </li>
                            <li class="nav-item">
                                <p class="nav-link" :class="{active : item.type == 'v2'}" @click="changeType(index, 'v2')">1 и > вариантов</p>
                            </li>
                            <li class="nav-item">
                                <p class="nav-link" :class="{active : item.type == 'v3'}" @click="changeType(index, 'v3')">Сопоставление</p>
                            </li>
                        </ul>

                        <div v-if="item.type == 'v1'" class="mt-2">
                            <div class="form-group">
                                <label style="width: 100%;">Вопрос
                                    <textarea class="form-control" v-model="item.question"></textarea>
                                </label>
                            </div>

                            <div class="form-group">
                                <label style="width: 100%;">Ответ (правильный)
                                    <input type="text" class="form-control" v-model="item.trueResponse">
                                </label>
                            </div>

                            <div class="form-group" v-for="response in item.extResponses">
                                <label style="width: 100%;">Ответ
                                    <input type="text" class="form-control" v-model="response.body">
                                </label>
                            </div>

                            <div>
                                <button class="add-row-form btn btn-success" @click="addDataToV1(index)">+</button>
                                <button class="btn btn-danger delete-form-input-btn" @click="delDataToV1(index)" v-show="item.extResponses.length >= 2">-</button>
                            </div>

                            <div class="d-flex justify-content-between">
                                <label>
                                    Максимальный балл
                                    <input type="number" class="form-control input-number-ball" step="0.1" min="0">
                                </label>
                                <button class="btn btn-danger" v-if="index != 0" @click="delZadanieItem(index)">Удалить</button>
                            </div>
                        </div>

                        <div v-if="item.type == 'v2'" class="mt-2">
                            <div class="form-group">
                                <label style="width: 100%;">Вопрос
                                    <textarea class="form-control" v-model="item.question"></textarea>
                                </label>
                            </div>

                            <div class="form-group" v-for="response in item.responses">
                                Ответ
                                <label>
                                    (правильный
                                    <input style="vertical-align: middle" type="checkbox" :checked="response.isTrue">
                                    )
                                </label>
                                <input type="text" class="form-control" v-model="response.body">
                            </div>

                            <div>
                                <button class="add-row-form btn btn-success" @click="addDataToV2(index)">+</button>
                                <button class="btn btn-danger delete-form-input-btn" @click="delDataToV2(index)" v-show="item.responses.length >= 3">-</button>
                            </div>

                            <div class="d-flex justify-content-between">
                                <label>
                                    Максимальный балл
                                    <input type="number" class="form-control input-number-ball" step="0.1" min="0">
                                </label>
                                <button class="btn btn-danger" v-if="index != 0" @click="delZadanieItem(index)">Удалить</button>
                            </div>
                        </div>

                        <div v-if="item.type == 'v3'" id="comp-words" class="mt-2">
                            <div class="form-group">
                                <label style="width: 100%;">Вопрос
                                    <textarea class="form-control" v-model="item.question"></textarea>
                                </label>
                            </div>

                            <table style="width: 100%">
                                <thead>
                                <tr>
                                    <td></td>
                                    <td><h5>Левый столбец</h5></td>
                                    <td><h5>Правый столбец</h5></td>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(word, index) in item.words">
                                    <td class="count">@{{ ++index }}</td>
                                    <td><div class="form-group">
                                            <input type="text" class="form-control" v-model="word.left">
                                        </div></td>
                                    <td>
                                        <div class="form-group">
                                            <input type="text" class="form-control" v-model="word.right">
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>

                            <div>
                                <button class="add-row-form btn btn-success" @click="addDataToV3(index)">+</button>
                                <button class="btn btn-danger delete-form-input-btn" @click="delDataToV3(index)" v-show="item.words.length >= 3">-</button>
                            </div>

                            <div class="d-flex justify-content-between">
                                <label>
                                    Максимальный балл
                                    <input type="number" class="form-control input-number-ball" step="0.1" min="0">
                                </label>
                                <button class="btn btn-danger" v-if="index != 0" @click="delZadanieItem(index)">Удалить</button>
                            </div>
                        </div>
                    </div>

                    <div class="block-footer-btns-create-course mt-3">
                        <div>
                            <button class="btn btn-info" @click="addZadanieItem">Добавить вопрос</button>
                        </div>
                        <div>
                            <button class="btn btn-primary">Создать</button>
                        </div>
                    </div>
                </div>

                <div class="col-md-3 main-right-div">
                    <div class="right-div-block">
                        <h4>Тип</h4>
                        <ul>
                            <li>
                                <label class="radio-li-item checkbox-url" data-url="{{ route('web_teacher_zadanies_create', ['type' => 'main'])}}">Обычное
                                    <input name="radio-1" type="radio" {{ request()->get('type', 'main') == 'main' ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-li-item checkbox-url" data-url="{{ route('web_teacher_zadanies_create', ['type' => 'testing'])}}">Тестирование
                                    <input name="radio-1" type="radio" {{ request()->get('type') == 'testing' ? 'checked' : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        var msgError = '{{ __('ship::validation.error-server') }}';
        var notIssetSection = '{{ __('teachersection/zadanie::validation.not-isset-section') }}'
        var token = '{{ csrf_token() }}';
        var redirectUrl = '{{ config('app.url') . '/' . Route::getRoutes()->getByName('web_teacher_zadanies_index')->uri}}';


        var createTestingZadanieComponent = {
            data: {
                title: '',
                isChangedTitle: false,
                currentCourse: 'default',
                isSelectCourse: false,
                currentSection: 'default',
                isSelectSection: false,
                type: '{{ request()->get('type', 'main') }}',
                zadanieItems: [],
                isDisableQueuePublish: true,
                isDisableLimitTime: true,
                courses: [],
                sections: [],
                deadline: '',
                isPublished: false
            },
            created: function(){
                this.courses = JSON.parse('{!! $courses->toJson() !!}');
            },
            mounted: function(){
                this.addZadanieItem();
            },
            methods: {
                changeType: function(index, type){
                    var exampleZadanieV1 = {
                        type: 'v1',
                        question: '',
                        trueResponse: '',
                        extResponses: [
                            {
                                id: 1,
                                body: ''
                            }
                        ]
                    };
                    var exampleZadanieV2 = {
                        type: 'v2',
                        question: '',
                        responses: [
                            {
                                id: 1,
                                body: '',
                                isTrue: true
                            },
                            {
                                id: 2,
                                body: '',
                                isTrue: false
                            },
                        ]
                    };
                    var exampleZadanieV3 = {
                        type: 'v3',
                        question: '',
                        words: [
                            {
                                id: 1,
                                left: '',
                                right: ''
                            },
                            {
                                id: 2,
                                left: '',
                                right: ''
                            }
                        ]
                    };

                    this.zadanieItems.splice(index, 1);

                    if(type == 'v2'){
                        this.zadanieItems.push(exampleZadanieV2);
                    }else if(type == 'v3'){
                        this.zadanieItems.push(exampleZadanieV3);
                    }else{
                        this.zadanieItems.push(exampleZadanieV1);
                    }
                },
                addZadanieItem: function(){
                    var exampleZadanieV1 = {
                        type: 'v1',
                        question: '',
                        trueResponse: '',
                        extResponses: [
                            {
                                id: 1,
                                body: ''
                            },
                        ]
                    };
                    var exampleZadanieV2 = {
                        type: 'v2',
                        question: '',
                        responses: [
                            {
                                id: 1,
                                body: '',
                                isTrue: true
                            },
                            {
                                id: 2,
                                body: '',
                                isTrue: false
                            },
                        ]
                    };
                    var exampleZadanieV3 = {
                        type: 'v3',
                        question: '',
                        words: [
                            {
                                id: 1,
                                left: '',
                                right: ''
                            },
                            {
                                id: 2,
                                left: '',
                                right: ''
                            }
                        ]
                    };

                    this.zadanieItems.push(exampleZadanieV1);
                },
                delZadanieItem: function(index){
                    this.zadanieItems.splice(index, 1);
                },
                addDataToV1: function(index){
                    var item = this.zadanieItems[index];
                    var lastIdExtResponse = _.last(item.extResponses).id;
                    var extIdResponse = ++lastIdExtResponse;
                    var extResponse = {
                        id: extIdResponse,
                        body: ''
                    };
                    item.extResponses.push(extResponse);
                },
                addDataToV2: function(index){
                    var item = this.zadanieItems[index];
                    var lastIdExtResponse = _.last(item.responses).id;
                    var extIdResponse = ++lastIdExtResponse;
                    var extResponse = {
                        id: extIdResponse,
                        body: '',
                        isTrue: false
                    };
                    item.responses.push(extResponse);
                },
                addDataToV3: function(index){
                    var item = this.zadanieItems[index];
                    var lastIdExtResponse = _.last(item.words).id;
                    var extIdResponse = ++lastIdExtResponse;
                    var extResponse = {
                        id: extIdResponse,
                        left: '',
                        right: ''
                    };
                    item.words.push(extResponse);
                    console.log(item.words);
                },
                delDataToV1: function(index){
                    this.zadanieItems[index].extResponses.pop();
                },
                delDataToV2: function(index){
                    this.zadanieItems[index].responses.pop();
                },
                delDataToV3: function(index){
                    this.zadanieItems[index].words.pop();
                }
            },
            watch: {
                currentCourse: function(){
                    this.isSelectCourse = true;
                    this.sections.splice(0, this.sections.length);
                    this.isSelectSection = false;
                    this.currentSection = 'default';

                    if(this.currentCourse == 'default'){
                        return;
                    }

                    axios.post('{{ route('api_teacher_sections_get_sections_from_course') }}', {
                        data: {id: app.currentCourse},
                        type: 'post'
                    }).then(function(response){
                        if(response.data.length <= 0){
                            alertNotice(notIssetSection);
                        }else{
                            app.sections = response.data;
                        }

                    }).catch(function(error){
                        alertDanger(msgError);
                    });
                },
                currentSection: function(){
                    this.isSelectSection = true;
                },
                title: function(){
                    this.isChangedTitle = true;
                }
            },
        };

        mixins.push(createTestingZadanieComponent);
    </script>
@endpush
