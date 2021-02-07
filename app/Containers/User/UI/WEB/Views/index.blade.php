@extends('layouts.main')

@section('content')
    <form action="{{ route('users') }}" method="post" @submit.prevent="actionSub">
        <label for="login">
            Введите Login:
            <input type="text" id="login" v-model="login">
        </label>
        <label for="email">
            Введите email:
            <input type="email" id="email" v-model="email">
        </label>

        <label for="checkbox_pwd_visible">
            Видимость пароля
            <input type="checkbox" id="checkbox_pwd_visible" @change="changeVisiblePwd">
        </label>
        <label>
            Введите пароль:
            <input type="@{{ pwd_input_type }}" id="password" v-model="password">
        </label>
        <label>
            Введите пароль повторно:
            <input type="@{{ pwd_input_type }}" id="password_confirmation" v-model="password_confirmation">
        </label>

        <button type="submit">Зарегистрировать</button>
    </form>
@endsection
