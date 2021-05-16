@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" id="why">

        <div style="width: 95%; margin: 0 auto">
            <div class="head-content mb-4">
                <h1 class="heading col">Задания курса "{{ $course->title }}"</h1>
            </div>

            @include('components.breadcrumbs', [$breadcrumb])

            <div class="row">

                <div class="py-3 col-md-9">
                    @if($zadanies->isNotEmpty())
                    <table class="table-hover table-list-zadanie" border="1">
                        <thead>
                        <th>Название</th>
                        <th>Тип</th>
                        <th>Раздел</th>
                        <th>Новых ответов</th>
                        <th>Ответов</th>
                        <th>Срок сдачи</th>
                        <th>Дата изменения</th>
                        <th>Изменить</th>
                        <th>Видимость</th>
                        <th>Удалить</th>
                        </thead>
                        @foreach($zadanies as $zadanie)
                            <tr class="table-row" data-href="{{ route('web_teacher_responses_students_index', $zadanie->id) }}">
                                <td>{{ $zadanie->title }}</td>
                                <td>{{ $zadanie->showType }}</td>
                                <td>{{ $zadanie->section->title }}</td>
                                <td>{{ $zadanie->new_responses }}</td>
                                <td>{{ $zadanie->response_students_count }}</td>
                                <td>{{ $zadanie->formatDate($zadanie->deadline) }}</td>
                                <td>{{ $zadanie->show_updated_at }}</td>
                                <td>
                                    <a href="{{ route('web_teacher_zadanies_edit', $zadanie->id) }}" title="Редактировать">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                    </a>
                                </td>
                                @if($zadanie->is_visible)
                                    <td>
                                        <a href="{{ route('web_teacher_zadanies_hide', $zadanie->id) }}" title="Скрыть">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                @else
                                    <td>
                                        <a href="{{ route('web_teacher_zadanies_visible', $zadanie->id) }}" title="Показать">
                                            <i class="fa fa-eye-slash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                @endif
                                <td>
                                    <a href="{{ route('web_teacher_zadanies_delete', $zadanie->id) }}" title="Удалить">
                                        <i class="fa fa-ban" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                    @else
                        <h5>Задания не найдены</h5>
                    @endif
                </div>


                <div class="py-3 col-md-3 main-right-div">
                    <div class="right-div-block">
                        <h4>Раздел</h4>
                        <ul>
                            <li>
                                <select v-model="currentSection" @change="changeSection" class="form-control">
                                    <option value="all">Все</option>
                                    @foreach($sections as $section)
                                        <option value="{{ $section->id }}">{{ $section->title }}</option>
                                    @endforeach
                                </select>
                            </li>
                        </ul>
                    </div>

                    <div class="right-div-block">
                        <h4>Поиск</h4>
                        <ul>
                            <li>
                                <input class="form-control" v-model="searchQuery" @keyup="search" type="text" placeholder="Название задания">
                            </li>
                        </ul>
                    </div>

                    <div class="right-div-block">
                        <h4>Сортировка</h4>
                        <ul>
                            <li>
                                <label class="radio-li-item">Новых ответов
                                    <input name="radio-1" @click="sort('response')" {{ request()->get('sort', 'response') == 'response' ? 'checked' : '' }} type="radio">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-li-item">Название задания
                                    <input name="radio-1" {{ request()->get('sort') == 'zadanie' ? 'checked' : '' }} @click="sort('zadanie')" type="radio">
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
        var courseZadanies = {
            data: {
                currentSection: '{{ request()->get('section', 'all') }}',
                domain: '{{ config('app.url') }}',
                searchQuery: '{{ request()->get('search') }}'
            },
            methods: {
                changeSection: function(){
                    var path = window.location.pathname;
                    var query = window.location.search;

                    if (query.length > 0) {
                        var params = query.replace('?', '').split('&');

                        var index = _.findIndex(params, function(item){
                            return item.search(/section/) != -1;
                        });

                        if(index !== -1) {
                            params[index] = 'section=' + this.currentSection;
                        }else{
                            params.push('section=' + this.currentSection);
                        }

                        query = '?' + params.join('&');
                    }else{
                        query = '?section=' + this.currentSection;
                    }

                    window.location.href = this.domain + path + query;
                },
                search: _.debounce(function(e){
                    if(e.target.keyCode == 13)
                        return;

                    var path = window.location.pathname;
                    var query = window.location.search;

                    if (query.length > 0) {
                        var params = query.replace('?', '').split('&');

                        var index = _.findIndex(params, function(item){
                            return item.search(/search/) != -1;
                        });

                        if(index !== -1) {
                            params[index] = 'search=' + app.searchQuery;
                        }else{
                            params.push('search=' + app.searchQuery);
                        }

                        query = '?' + params.join('&');
                    }else{
                        query = '?search=' + this.searchQuery;
                    }

                    window.location.href = this.domain + path + query;
                }, 500),
                sort: function(type){
                    var path = window.location.pathname;
                    var query = window.location.search;

                    if (query.length > 0) {
                        var params = query.replace('?', '').split('&');

                        var index = _.findIndex(params, function(item){
                            return item.search(/sort/) != -1;
                        });

                        if(index !== -1) {
                            params[index] = 'sort=' + type;
                        }else{
                            params.push('sort=' + type);
                        }

                        query = '?' + params.join('&');
                    }else{
                        query = '?sort=' + type;
                    }

                    window.location.href = this.domain + path + query;
                }
            }
        };

        mixins.push(courseZadanies);
    </script>
@endpush
