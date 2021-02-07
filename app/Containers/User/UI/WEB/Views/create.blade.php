@extends('layouts.main')

@section('content')
    <form action="{{ route('web_user_store') }}" @submit.prevent="actionSub" method="post" novalidate>
@csrf
        @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </ul>
        @endif

        <ul>
            <li v-for="error in errors">@{{ error }}</li>
        </ul>

        <div>
        <label for="login">
            Введите Login:
            <input type="text" id="login" name="login" v-model="login">
            Количество символов: @{{ loginLen }}
        </label>
        </div>
        <div>
        <label for="email">
            Введите email:
            <input type="email" id="email" name="email" v-model="email">
        </label>
        </div>
        <div>
        <label for="checkbox_pwd_visible">
            Видимость пароля
            <input type="checkbox" id="checkbox_pwd_visible" @change="changeVisiblePwd">
        </label>
        </div>
        <div>
        <label>
            Введите пароль:
            <input :type="pwd_input_type" id="password" name="password" v-model="password">
        </label>
        </div>
        <div>
        <label>
            Введите пароль повторно:
            <input :type="pwd_input_type" id="password_confirmation" name="password_confirmation" v-model="password_confirmation">
        </label>
        </div>
        <button type="submit">Зарегистрировать</button>
    </form>
@endsection

@push('scripts')
    <script>
        var route = "{{ route('web_user_store') }}";
    </script>

    <script type="text/javascript" src="{{ asset('js/app/test.js') }}"></script>
@endpush
