@extends('layouts.main')

@section('content')
    <section class="services py-5" id="services">
        <div class="container">
            <h3 class="heading mb-5">Курсы</h3>
            @if($courses->isEmpty())
                <h5>Вы не подписаны ни на один курс</h5>
            @endif
            @foreach($courses->chunk(2) as $coursesRow)
                <div class="row">
                    @foreach($coursesRow as $course)
                        <div class="col-xl-5 col-lg-5 col-md-6 col-sm-12">
                            <div class="our-services-wrapper mb-60">
                                <div class="services-inner">
                                    <a href="{{ route('web_student_courses_show', $course->id) }}">
                                        <div class="our-services-text">
                                            <h4>{{ $course->title }}</h4>
                                            <div class="content-course-cart">
                                                <div class="div-image-course-cart">
                                                    <img src="{{ asset('images/no_image_user.png') }}">
                                                </div>
                                                <div class="div-name-prepod-course-cart">
                                                    <p style="color: black" class="name-prepod-course-cart">
                                                        {{ $course->teacher->fio }}
                                                    </p>
                                                </div>
                                            </div>
                                            <p class="mt-2">Новые задания: {{ $course->zadanies->count() }}</p>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </section>
@endsection
