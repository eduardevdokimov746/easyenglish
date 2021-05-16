@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="mt-4">
            <h1>Часто задаваемые вопросы</h1>
        </div>


        <div class="row mt-4 form">
            <div class="col-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active list-group-item-action" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Аккаунт</a>
                    <a class="nav-link list-group-item-action" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Материалы</a>
                    <a class="nav-link list-group-item-action" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Словарь</a>
                    <a class="nav-link list-group-item-action" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Упражнения</a>
                </div>
            </div>
            <div class="col-9">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="{{ route('web_faq_show', 'how-to-recover-your-password') }}">Как восстановить пароль</a></li>
                            <li class="list-group-item"><a href="{{ route('web_faq_show', 'how-to-change-account-information') }}">Как поменять информацию аккаунта</a></li>
                            <li class="list-group-item"><a href="{{ route('web_faq_show', 'how-to-change-your-profile-photo') }}">Как поменять фотографию профиля</a></li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="{{ route('web_faq_show', 'how-to-find-material-of-interest') }}">Как найти интересующий материал</a></li>
                            <li class="list-group-item"><a href="{{ route('web_faq_show', 'how-gets-the-status-under-study') }}">Как материал получает статус «На изучении»</a></li>
                            <li class="list-group-item"><a href="{{ route('web_faq_show', 'how-gets-the-studied-status') }}">Как материал получает статус «Изучено»</a></li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="{{ route('web_faq_show', 'how-to-add-to-the-dictionary') }}">Как пополнять словарь</a></li>
                            <li class="list-group-item"><a href="{{ route('web_faq_show', 'how-to-upload-your-picture-to-a-word') }}">Как загрузить свою картинку к слову</a></li>
                            <li class="list-group-item"><a href="{{ route('web_faq_show', 'how-to-change-the-status-of-a-word') }}">Как изменить статус слова</a></li>
                        </ul>
                    </div>
                    <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="{{ route('web_faq_show', 'how-words-get-into-training') }}">Как слова попадают на тренировки «Слово-перевод», «Перевод-слово», «Конструктор слов»</a></li>
                            <li class="list-group-item"><a href="{{ route('web_faq_show', 'how-words-get-into-repetition') }}">Как слова попадают на тренировку «Повторение»</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
