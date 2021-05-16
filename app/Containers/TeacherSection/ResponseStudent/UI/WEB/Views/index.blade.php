@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" id="why">

        <div style="width: 95%; margin: 0 auto">
            <div class="head-content mb-4">
                <h1 class="heading col">Ответы студентов на "{{ $zadanie->title }}"</h1>
            </div>

            @include('components.breadcrumbs', [$breadcrumb])

            <div class="row">
                <div class="py-3 col-md-9">
                    @if($responses->isNotEmpty())
                    <table class="table-hover table-list-zadanie" border="1">
                        <thead>
                        <th>Группа</th>
                        <th>ФИО</th>
                        <th>Дата добавления</th>
                        <th>Дата изменения</th>
                        <th>Оценка</th>
                        <th>Оцененно</th>
                        <th>Изменение оценки</th>
                        </thead>
                        @foreach($responses as $response)
                        <tr class="table-row" data-href="{{ route('web_teacher_responses_students_show', [$zadanie->id, $response->id]) }}">
                            <td>{{ $response->user->group->first()->title }}</td>
                            <td>{{ $response->user->fio }}</td>
                            <td>{{ $response->show_created_at }}</td>
                            <td>{{ $response->show_updated_at }}</td>
                            <td>{!! $response->responseTeacher?->result ?: '&mdash;' !!}</td>
                            <td>{!! $response->responseTeacher?->show_created_at ?: '&mdash;' !!}</td>
                            <td>{!! $response->responseTeacher?->show_updated_at ?: '&mdash;' !!}</td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                        <h5>Ответы не найдены</h5>
                    @endif

                </div>

                <div class="py-3 col-md-3 main-right-div">
                    <div class="right-div-block">
                        <h4>Группа</h4>
                        <ul>
                            <li>
                                <select v-model="currentGroup" @change="changeGroup" class="form-control">
                                    <option value="all">Все</option>
                                    @foreach($groups as $group)
                                        <option value="{{ $group->slug }}">{{ $group->title }}</option>
                                    @endforeach
                                </select>
                            </li>
                        </ul>
                    </div>

                    <div class="right-div-block">
                        <h4>Поиск</h4>
                        <ul>
                            <li>
                                <input class="form-control" @keyup="search" v-model="searchQuery" type="text" placeholder="ФИО студента">
                            </li>
                        </ul>
                    </div>

                    <div class="right-div-block">
                        <h4>Сортировка</h4>
                        <ul>
                            <li>
                                <label class="radio-li-item">ФИО
                                    <input name="radio-1" {{ request()->get('sort') == 'fio' ? 'checked' : '' }} @click="sort('fio')" type="radio" checked>
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-li-item">Изменение ответа
                                    <input name="radio-1" {{ request()->get('sort') == 'updated_at' ? 'checked' : '' }} @click="sort('updated_at')" type="radio">
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-li-item">Изменение оценки
                                    <input name="radio-1" {{ request()->get('sort') == 'result' ? 'checked' : '' }} @click="sort('result')" type="radio">
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
        var responsesOnZadanie = {
            data: {
                currentGroup: '{{ request()->get('group', 'all') }}',
                domain: '{{ config('app.url') }}',
                searchQuery: '{{ request()->get('search') }}'
            },
            methods: {
                changeGroup: function(){
                    var path = window.location.pathname;
                    var query = window.location.search;

                    if (query.length > 0) {
                        var params = query.replace('?', '').split('&');

                        var index = _.findIndex(params, function(item){
                            return item.search(/group/) != -1;
                        });

                        if(index !== -1) {
                            params[index] = 'group=' + this.currentGroup;
                        }else{
                            params.push('group=' + this.currentGroup);
                        }

                        query = '?' + params.join('&');
                    }else{
                        query = '?group=' + this.currentGroup;
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
                }, 1000),
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

        mixins.push(responsesOnZadanie);
    </script>
@endpush
