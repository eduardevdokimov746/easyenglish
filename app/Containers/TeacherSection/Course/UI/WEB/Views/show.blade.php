@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" id="why">
        <div class="container mb-3">
            <div class="head-content d-flex justify-content-between">
                <h1 class="heading col" v-if="!isShowChangeTitleForm">
                    @{{ title }}
                </h1>
                <div class="input-group mb-3" v-if="isShowChangeTitleForm">
                    <input type="text"  class="form-control" v-model="$v.title.$model" :class="{'is-invalid' : statusValidation($v.title, $v.title.required)}" placeholder="Название раздела" aria-describedby="basic-addon1">
                    <div class="input-group-prepend">
                        <button class="btn btn-outline-success" type="button" @click="updateTitle" :disabled="isActiveBtn">Сохранить</button>
                        <button class="btn btn-outline-danger" @click="hideChangeTitleForm" type="button">Отмена</button>
                    </div>
                    <div class="invalid-tooltip">
                        {{ __('ship::validation.required', ['attribute' => __('ship::attributes.title')]) }}
                    </div>
                </div>

                <p class="btn-change-title-course" v-if="!isShowChangeTitleForm" @click="showChangeTitleForm" title="Редактировать заголовок"><i class="fa fa-pencil" aria-hidden="true"></i></p>
            </div>

            @include('components.breadcrumbs', [$breadcrumb])

            <div class="row">
                <div class="col">
                    <div class="form mb-3">
                        <div class="form-head">
                            <h2 style="text-align: center">Основная информация</h2>
                        </div>

                        @if(!empty($course->characteristic))
                        <div class="row mt-4">
                            <div class="col">
                                <h5>Характеристика курса</h5>
                                <div>
                                    {!! $course->characteristic  !!}
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(!empty($course->little_description))
                        <div class="row mt-4">
                            <div class="col">
                                <h5>Описание</h5>
                                <div>
                                    {!! $course->little_description  !!}
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(!empty($course->target))
                        <div class="row mt-4">
                            <div class="col">
                                <h5>Цель</h5>
                                <div>
                                    {!! $course->target  !!}
                                </div>
                            </div>
                        </div>
                        @endif

                        @if(!empty($course->list_literature))
                        <div class="row mt-4">
                            <div class="col">
                                <h5>Список рекомендуемой литературы</h5>
                                <div>
                                    {!! $course->list_literature  !!}
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>


                    @foreach($course->sections as $section)
                    <div class="form mb-3">
                        <div class="form-head head-section-and-options">
                            <h2 style="text-align: center">{{ $section->title }}</h2>

                            <div class="div-btns-control-section-course">
                                <ul class="list-btns-control-section-course">
                                    <li title="Редактировать раздел">
                                        <a href="{{ route('web_teacher_sections_edit', $section->id) }}"  class="item-list-btns-control-section-course">
                                            <i class="fa fa-pencil" aria-hidden="true"></i>
                                        </a>
                                    </li>

                                    @if($section->is_visible)
                                    <li title="Скрыть раздел">
                                        <a href="{{ route('web_teacher_sections_hide', $section->id) }}" class="item-list-btns-control-section-course">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    @endif

                                    @if(!$section->is_visible)
                                    <li title="Показать раздел">
                                        <a href="{{ route('web_teacher_sections_visible', $section->id) }}" class="item-list-btns-control-section-course">
                                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                    @endif

                                    <li title="Удалить раздел">
                                        <a href="{{ route('web_teacher_sections_delete', $section->id) }}" class="item-list-btns-control-section-course">
                                            <i class="fa fa-ban" aria-hidden="true"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <p style="white-space: pre-line;">
                                    {!! $section->description  !!}
                                </p>
                            </div>
                        </div>

                        @if($section->links->isNotEmpty())
                        <div class="row mt-4">
                            <div class="col">
                                <h5>Прикрепленные ссылки</h5>
                                <div>
                                    @foreach($section->links as $linkIndex => $link)
                                    <p>
                                        <a href="{{ $link->url }}" target="_blank">{{ $link->title }}</a>
                                    </p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        @endif

                        @if($section->files->isNotEmpty())
                        <div class="row mt-4">
                            <div class="col">
                                <h5>Прикрепленные файлы</h5>

                                <table class="table-hover mt-2 table-list-files" border="1">
                                    <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Название</th>
                                        <th>Размер</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($section->files as $fileIndex => $file)
                                        <tr data-href="{{ route('web_section_file_download', $file->hash) }}" class="table-row">
                                            <td>{{ $fileIndex + 1 }}</td>
                                            <td class="text-left">
                                                <img class="table-list-radanie-file-icon" style="width: 30px;" src="{{ $file->icon }}" alt="">
                                                <span>{{ $file->title }}</span>
                                            </td>
                                            <td>{{ $file->size }}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @endif

                        @if($section->zadanies->isNotEmpty())
                        <div class="row mt-4" >
                            <div class="col">
                                <h5>Задания</h5>

                                <table class="table-hover mt-2 table-list-zadanie" border="1">
                                    <thead>
                                    <th>№</th>
                                    <th>Название</th>
                                    <th>Тип</th>
                                    <th>Дата получения</th>
                                    <th>Срок сдачи</th>
                                    <th>Статус</th>
                                    <th>Оценка</th>
                                    </thead>
                                    @foreach($section->zadanies as $zadanieIndex => $zadanie)
                                    <tr class="table-info table-row" data-href="#">
                                        <td>{{ $zadanieIndex + 1 }}</td>
                                        <td>{{ $zadanie->title }}</td>
                                        <td>20.12.2020</td>
                                        <td>20.12.2020</td>
                                        <td>Новое</td>
                                        <td>-</td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>

                <div class="col-md-3 main-right-div">
                    <div class="right-div-block">
                        <h4>Общее</h4>
                        <p>
                            <div class="div-btns-control-section-course">
                            <ul class="list-btns-control-section-course">
                                <li title="Редактировать курс">
                                    <a href="{{ route('web_teacher_courses_edit', $course->id) }}"  class="item-list-btns-control-section-course">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                </li>
                                @if($course->is_visible)
                                <li title="Скрыть курс" >
                                    <a href="{{ route('web_teacher_courses_hide', $course->id) }}" class="item-list-btns-control-section-course">
                                        <i class="fa fa-eye" aria-hidden="true"></i>
                                    </a>
                                </li>
                                @endif
                                @if(!$course->is_visible)
                                <li title="Показать курс">
                                    <a href="{{ route('web_teacher_courses_visible', $course->id) }}" class="item-list-btns-control-section-course">
                                        <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                    </a>
                                </li>
                                @endif
                                <li title="Удалить курс">
                                    <a href="{{ route('web_teacher_courses_delete', $course->id) }}" class="item-list-btns-control-section-course">
                                        <i class="fa fa-ban" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        </p>
                        <p>
                            <a href="{{ route('web_teacher_groups_index', ['course' => $course->id]) }}">
                                Управление группами
                            </a>
                        </p>
                        <p>
                            <b>Дата добавления</b>
                            <p>{{ $course->created_at }}</p>
                        </p>
                        <p>
                            <b>Дата изменения</b>
                            <p>{{ $course->updated_at }}</p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        validation = {
            title: {
                required
            }
        };

        var errorMsg = '{{ __('ship::validation.error-server') }}';

        var showCourseComponent = {
            data: {
                title: '{{ $course->title }}',
                defaultTitle: '{{ $course->title }}',
                isShowChangeTitleForm: false
            },
            methods: {
                showChangeTitleForm: function(){
                    this.isShowChangeTitleForm = true;
                },
                hideChangeTitleForm: function(){
                    this.isShowChangeTitleForm = false;
                    this.title = this.defaultTitle;
                },
                updateTitle: function(){
                    var title = this.title;

                    axios.post('{{ route('api_teacher_courses_update_title', $course->id) }}', {
                        data: {
                            course_id: '{{ $course->id }}',
                            title: title
                        }
                    }).then(function(data){
                        app.defaultTitle = app.title;
                        app.isShowChangeTitleForm = false;
                        alertSuccess(data.data.msg);
                    }).catch(function(error){
                        alertDanger(errorMsg);
                    })
                }
            },
            computed: {
                isActiveBtn: function(){
                    return this.statusValidation(this.$v.title, this.$v.title.required) ? 'disabled' : null;
                }
            }
        };

        mixins.push(showCourseComponent);
    </script>
@endpush
