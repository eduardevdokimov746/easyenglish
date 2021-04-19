@extends('layouts.main')

@section('content')
<section class="other_services pt-5" style="padding-top: 100px" id="why">
    <div class="container">
        <div class="head-content mb-4 row">
            @include('components/nav_panel')
            <div>
                <a href="{{ route('web_teacher_courses_create') }}" class="hover-button head-btn">Добавить курс</a>
            </div>
        </div>

        @include('components.breadcrumbs', [$breadcrumb])

        @if($courses->isNotEmpty())
        <div class="row">
            <div style="background: white; width: 100%">
                <table class="table table-hover" style="text-align: center">
                    <thead>
                        <tr>
                            <th>Название</th>
                            <th>Разделов</th>
                            <th>Количество групп</th>
                            <th>Добавленно</th>
                            <th>Обновленно</th>
                            <th>Видимость</th>
                            <th>Удалить</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr
                                class="table-row"
                                :data-href="course.url"
                                v-for="(course, indexCourse) in courses"
                        >
                            <td>@{{ course.title }}</td>
                            <td>@{{ course.sections_count }}</td>
                            <td></td>
                            <td>@{{ course.created_at }}</td>
                            <td>@{{ course.updated_at }}</td>
                            <td>
                                <i v-if="!course.is_visible" @click="showCourse(indexCourse)" class="fa fa-eye-slash btn-eye-show-hide" title="Показать" aria-hidden="true"></i>
                                <i v-if="course.is_visible" @click="hideCourse(indexCourse)" class="fa fa-eye btn-eye-show-hide" title="Скрыть" aria-hidden="true"></i>
                            </td>
                            <td>
                                <i class="fa fa-ban btn-eye-show-hide" title="Удалить курс" @click="deleteCourse(indexCourse)" aria-hidden="true"></i>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @else
            <h3>У вас пока нет курсов</h3>
        @endif
    </div>
</section>
@endsection


@push('scripts')
    <script>
        var errorMsg = '{{ __('ship::validation.error-server') }}';

        var listCourse = {
            data: {
                courses: []
            },
            created: function(){
                console.log(JSON.parse('{!! $courses->toJson() !!}'));
                this.courses = JSON.parse('{!! $courses->toJson() !!}');
            },
            methods: {
                hideCourse: function(indexCourse){
                    var course_id = this.courses[indexCourse].id;

                    axios({
                            method: 'post',
                            url: '{{ route('api_teacher_course_hide') }}',
                            data: {course_id: course_id},
                            dataType: 'json'
                        }
                    ).then(function(response){
                        app.courses[indexCourse].is_visible = 0;
                        alertSuccess(response.data.msg);
                    })
                },
                showCourse: function(indexCourse){
                    var course_id = this.courses[indexCourse].id;

                    axios({
                            method: 'post',
                            url: '{{ route('api_teacher_course_show') }}',
                            data: {course_id: course_id},
                            dataType: 'json'
                        }
                    ).then(function(response){
                        app.courses[indexCourse].is_visible = 1;
                        alertSuccess(response.data.msg);
                    })
                },
                deleteCourse: function(indexCourse){
                    var course_id = this.courses[indexCourse].id;

                    axios({
                        method: 'post',
                        url: '{{ route('api_teacher_courses_delete') }}',
                        data: {course_id: course_id},
                        dataType: 'json'
                    }).then(function(response){
                        app.courses.splice(indexCourse, 1);
                        alertSuccess(response.data.msg);
                    })
                }
            }
        };

        mixins.push(listCourse);



        {{--$(document).ready(function(){--}}
            {{--$('.btn-eye-show-hide').click(function(e){--}}
                {{--var eventType = $(this).attr('data-type');--}}
                {{--var course_id = $(this).closest('td').attr('data-id');--}}


                {{--if(eventType == 'show'){--}}
                    {{--$.ajax({--}}
                        {{--url: '{{ route('api_teacher_course_show') }}',--}}
                        {{--data: {course_id: course_id},--}}
                        {{--dataType: 'json',--}}
                        {{--type: 'post',--}}
                        {{--success: function(data){--}}
                            {{--console.log(data);--}}
                            {{--alertSuccess(data.msg);--}}
                            {{--$(e.target).removeClass('fa-eye-slash').addClass('fa-eye').attr('data-type', 'hide');--}}
                        {{--},--}}
                        {{--error: function(error){--}}
                            {{--alertDanger(errorMsg);--}}
                        {{--}--}}
                    {{--});--}}
                {{--}else if(eventType == 'hide'){--}}
                    {{--$.ajax({--}}
                        {{--url: '{{ route('api_teacher_course_hide') }}',--}}
                        {{--data: {course_id: course_id},--}}
                        {{--dataType: 'json',--}}
                        {{--type: 'post',--}}
                        {{--success: function(data){--}}
                            {{--console.log(data);--}}
                            {{--alertSuccess(data.msg);--}}
                        {{--},--}}
                        {{--error: function(error){--}}
                            {{--alertDanger(errorMsg);--}}
                        {{--}--}}
                    {{--});--}}
                {{--}--}}
            {{--});--}}
        {{--});--}}
    </script>
@endpush