<!DOCTYPE html>
<html lang="ru">
<head>
<meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

<div id="app" class="container">
    @yield('content')
</div>

@include('scripts.main')
</body>
</html>
