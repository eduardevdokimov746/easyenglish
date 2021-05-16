@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" id="why">
        <div class="container">
            <div class="head-content mb-4">
                <h1 class="heading col">Задания курса "{{ $course->title }}"</h1>
            </div>

            @include('components.breadcrumbs', [$breadcrumb])

            <div v-if="zadanies.length == 0">
                <h5>Заданий не найдено</h5>
            </div>

            <div class="row">
                <div class="py-3 col-md-9">
                <table class="table-hover table-list-zadanie" border="1" v-if="zadanies.length > 0">
                    <thead>
                    <th>Название</th>
                    <th>Дата получения</th>
                    <th>Срок сдачи</th>
                    <th>Статус</th>
                    <th>Дата ответа</th>
                    <th>Дата обновления</th>
                    <th>Оценка</th>
                    </thead>
                    <tr class="table-row" v-for="zadanie in zadanies" :class="zadanie.statusStyle" :data-href="url(showUrl, {course: course.id, zadanie: zadanie.id})">
                        <td>@{{ zadanie.title }}</td>
                        <td>@{{ zadanie.show_updated_at }}</td>
                        <td>@{{ zadanie.deadline }}</td>
                        <td>@{{ zadanie.statusTitle }}</td>
                        <td>@{{ zadanie.response_students.length == 0 ? '&mdash;' : zadanie.response_students[0].created_at }}</td>
                        <td>@{{ zadanie.response_students.length == 0 ? '&mdash;' : zadanie.response_students[0].updated_at }}</td>
                        <td>@{{
                            zadanie.response_students.length != 0 &&
                            zadanie.response_students[0].response_teacher &&
                            zadanie.response_students[0].response_teacher.is_credited == 1 ?
                            zadanie.response_students[0].response_teacher.result : '&mdash;' }}</td>
                    </tr>
                </table>

            </div>
                <div class="py-3 col-md-3 main-right-div">
                    <div class="right-div-block">
                        <h4>Статус</h4>
                        <ul style="list-style: none">
                            <li>
                                <label class="radio-li-item">Все
                                    <input @click="filter('all')" name="radio-1" type="radio" {{ request()->get('filter') === 'all' ? 'checked' : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-li-item">Новое
                                    <input @click="filter('new')" name="radio-1" type="radio" {{ request()->get('filter') === 'new' ? 'checked' : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-li-item">На проверке
                                    <input @click="filter('on_checked')" name="radio-1" type="radio" {{ request()->get('filter') === 'on_checked' ? 'checked' : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-li-item">Зачтено
                                    <input @click="filter('done')" name="radio-1"  type="radio" {{ request()->get('filter') === 'done' ? 'checked' : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                            <li>
                                <label class="radio-li-item">Не зачтено
                                    <input @click="filter('undone')" name="radio-1"  type="radio" {{ request()->get('filter') === 'undone' ? 'checked' : ''}}>
                                    <span class="checkmark"></span>
                                </label>
                            </li>
                        </ul>
                    </div>

                    <div class="right-div-block">
                        <h4>Раздел</h4>
                        <ul style="list-style: none">
                            <li>
                                <select class="form-control" @change="changeSection" v-model="currentSection">
                                    <option value="all">Все</option>
                                    <option v-for="section in sections" :key="section.id" :value="section.id">@{{ section.title }}</option>
                                </select>
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
        var indexZadaniesComponent = {
            data: {
                course: [],
                zadanies: [],
                sections: [],
                domain: '{{ config('app.url') }}',
                currentSection: '{{ request()->get('section', 'all') }}',
                showUrl: '{{ config('app.url') }}/' + '{{ Route::getRoutes()->getByName('web_student_zadanies_show')->uri }}'
            },
            created: function(){
                this.zadanies = JSON.parse('{!! str_replace('\\"', "\'", $zadanies->toJson()) !!}');
                this.sections = JSON.parse('{!! str_replace('\\"', "\'", $sections->toJson()) !!}');
                this.course = JSON.parse('{!! str_replace('\\"', "\'", $course->toJson()) !!}');
            },
            methods: {
                filter: function(type){
                    var path = window.location.pathname;
                    var query = window.location.search;

                    if (query.length > 0) {
                        var params = query.replace('?', '').split('&');

                        var index = _.findIndex(params, function(item){
                            return item.search(/filter/) != -1;
                        });

                        if(index !== -1) {
                            params[index] = 'filter=' + type;
                        }else{
                            params.push('filter=' + type);
                        }

                        query = '?' + params.join('&');
                    }else{
                        query = '?filter=' + type;
                    }

                    window.location.href = this.domain + path + query;
                },
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
            }
        };

        mixins.push(indexZadaniesComponent);
    </script>
@endpush
