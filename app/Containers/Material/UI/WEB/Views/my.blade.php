@extends('layouts.main')

@section('content')
<section class="other_services mt-5" id="why">
    <div class="container">
        <div class="head-content mb-4">
            <h3 class="heading">Мои тексты</h3>

            <div class="search-block col-5">
                <input type="text" placeholder="Найти" class="search-input" name="search" autocomplete="off">
                <i class="fa fa-search" aria-hidden="true" title="Поиск"></i>
            </div>

            <div>
                <a href="#" class="hover-button head-btn">Добавить</a>
            </div>
{{--            <div class="block-filters">--}}
{{--                <ul class="list-filter">--}}
{{--                    <li class="item-list-filter">--}}
{{--                        Сложность--}}
{{--                        <ul>--}}
{{--                            <li class="active-item-list-filter">--}}
{{--                                Все--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                Начальный--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                Средний--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                Продвинутый--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li class="item-list-filter">--}}
{{--                        Сортировка--}}
{{--                        <ul>--}}
{{--                            <li class="active-item-list-filter">--}}
{{--                                По лайкам--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                По дизлайкам--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                    <li class="item-list-filter">--}}

{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
        </div>

        <div class="row">
            <div class="py-3 col-md-9">

                <div class="row">
                    <div class="col-lg-6 box-text">
                        <a href="#">
                            <div class="grid">
                                <div class="box-text-stat-div">
                                    <!-- <div class='box-img-status' title='На изучении' id='progress-learning'>
                                        <img src='images/s2-yellow.png'>
                                    </div> -->

                                    <div class="box-img-status" title="Изучено" id="progress-finish">
                                        <img src="{{ asset('images/s2-green.png') }}">
                                    </div>

                                    <div class="btn-add-delete-material" id="add" title="Добавить в мои материалы">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </div>

                                    <!-- <div class='btn-add-delete-material ' id='delete' title='Удалить из моих материалов'>
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                    </div>
         -->
                                    <div class="box-text-statlist">
                                        <ul>
                                            <li>
										<span class="box-count-likes">
											<i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 12321
										</span>
                                            </li>
                                            <li>
										<span class="box-count-dislikes">
											<i class="fa fa-thumbs-o-down" aria-hidden="true"></i> 12321
										</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <img src="{{ asset('images/choose1.jpg') }}" alt="" class="img-fluid">
                                </div>
                                <div class="info p-4">
                                    <h4 class="">AC Class Rooms</h4>
                                    <p class="mt-3">Onec consequat sapien amet leo cur sus rhoncus. Nullam dui mi Donec at nunc enim. Proin at iaculis tellus...</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 box-text">
                        <a href="#">
                            <div class="grid">
                                <div class="box-text-stat-div">
                                    <div class="box-text-statlist">
                                        <ul>
                                            <li>
										<span class="box-count-likes">
											<i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 12321
										</span>
                                            </li>
                                            <li>
										<span class="box-count-dislikes">
											<i class="fa fa-thumbs-o-down" aria-hidden="true"></i> 12321
										</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <img src="{{ asset('images/choose2.jpg') }}" alt="" class="img-fluid">
                                </div>
                                <div class="info p-4">
                                    <h4 class="">Quality Staff</h4>
                                    <p class="mt-3">Onec consequat sapien amet leo cur sus rhoncus. Nullam dui mi Donec at nunc enim. Proin at iaculis tellus...</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-6 box-text">
                        <a href="#">
                            <div class="grid">
                                <div class="box-text-stat-div">
                                    <div class="box-text-statlist">
                                        <ul>
                                            <li>
										<span class="box-count-likes">
											<i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 12321
										</span>
                                            </li>
                                            <li>
										<span class="box-count-dislikes">
											<i class="fa fa-thumbs-o-down" aria-hidden="true"></i> 12321
										</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <img src="{{ asset('images/choose1.jpg') }}" alt="" class="img-fluid">
                                </div>
                                <div class="info p-4">
                                    <h4 class="">AC Class Rooms</h4>
                                    <p class="mt-3">Onec consequat sapien amet leo cur sus rhoncus. Nullam dui mi Donec at nunc enim. Proin at iaculis tellus...</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 box-text">
                        <a href="#">
                            <div class="grid">
                                <div class="box-text-stat-div">
                                    <div class="box-text-statlist">
                                        <ul>
                                            <li>
										<span class="box-count-likes">
											<i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 12321
										</span>
                                            </li>
                                            <li>
										<span class="box-count-dislikes">
											<i class="fa fa-thumbs-o-down" aria-hidden="true"></i> 12321
										</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <img src="{{ asset('images/choose2.jpg') }}" alt="" class="img-fluid">
                                </div>
                                <div class="info p-4">
                                    <h4 class="">Quality Staff</h4>
                                    <p class="mt-3">Onec consequat sapien amet leo cur sus rhoncus. Nullam dui mi Donec at nunc enim. Proin at iaculis tellus...</p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>

                <div class="row">
                    <div class="col-lg-6 box-text">
                        <a href="#">
                            <div class="grid">
                                <div class="box-text-stat-div">
                                    <div class="box-text-statlist">
                                        <ul>
                                            <li>
										<span class="box-count-likes">
											<i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 12321
										</span>
                                            </li>
                                            <li>
										<span class="box-count-dislikes">
											<i class="fa fa-thumbs-o-down" aria-hidden="true"></i> 12321
										</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <img src="{{ asset('images/choose1.jpg') }}" alt="" class="img-fluid">
                                </div>
                                <div class="info p-4">
                                    <h4 class="">AC Class Rooms</h4>
                                    <p class="mt-3">Onec consequat sapien amet leo cur sus rhoncus. Nullam dui mi Donec at nunc enim. Proin at iaculis tellus...</p>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-6 box-text">
                        <a href="#">
                            <div class="grid">
                                <div class="box-text-stat-div">
                                    <div class="box-text-statlist">
                                        <ul>
                                            <li>
										<span class="box-count-likes">
											<i class="fa fa-thumbs-o-up" aria-hidden="true"></i> 12321
										</span>
                                            </li>
                                            <li>
										<span class="box-count-dislikes">
											<i class="fa fa-thumbs-o-down" aria-hidden="true"></i> 12321
										</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <img src="{{ asset('images/choose2.jpg') }}" alt="" class="img-fluid">
                                </div>
                                <div class="info p-4">
                                    <h4 class="">Quality Staff</h4>
                                    <p class="mt-3">Onec consequat sapien amet leo cur sus rhoncus. Nullam dui mi Donec at nunc enim. Proin at iaculis tellus...</p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>
            </div>

            <div class="py-3 col-md-3 main-right-div">
                <div class="right-div-block">
                    <h4>Статус</h4>
                    <ul style="list-style: none">
                        <li>
                            <label class="radio-li-item">На изучении
                                <input name="radio-3" type="radio" checked>
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="radio-li-item">Изучено
                                <input name="radio-3" type="radio">
                                <span class="checkmark"></span>
                            </label>
                        </li>
                    </ul>
                </div>
                <div class="right-div-block">
                    <h4>Сложность</h4>
                    <ul style="list-style: none">
                        <li>
                            <label class="radio-li-item">Все
                                <input name="radio-1" type="radio" checked>
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="radio-li-item">Начальный
                                <input name="radio-1" type="radio">
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="radio-li-item">Средний
                                <input name="radio-1"  type="radio">
                                <span name="radio-1" class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="radio-li-item">Продвинутый
                                <input name="radio-1" type="radio">
                                <span class="checkmark"></span>
                            </label>
                        </li>
                    </ul>
                </div>
                <div class="right-div-block">
                    <h4>Сортировка</h4>
                    <ul style="list-style: none">
                        <li>
                            <label class="radio-li-item">По лайкам
                                <input name="radio-2" type="radio" checked>
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="radio-li-item">По дизлайкам
                                <input name="radio-2" type="radio">
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="radio-li-item">По дате
                                <input name="radio-2" type="radio">
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
