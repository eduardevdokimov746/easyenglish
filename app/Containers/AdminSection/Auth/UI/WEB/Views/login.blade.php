<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') . ' Admin' }}</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head>
<body class="hold-transition login-page">
<div class="login-box">
    <div class="login-logo">
        <a href="#"><b>{{ config('app.name') }}</b>&nbsp;Admin</a>
    </div>

    <div class="card">
        <div class="card-body login-card-body">
            <form action="{{ route('web_admin_login') }}" method="post">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control {{  $errors->has('login') ? 'is-invalid': '' }}" placeholder="Логин" name="login">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="fa fa-user" aria-hidden="true"></i>
                        </div>
                    </div>
                    @if($errors->has('login'))
                        <div class="invalid-feedback">
                            <p>{{ $errors->first('login') }}</p>
                        </div>
                    @endif
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control {{  $errors->has('password') ? 'is-invalid': '' }}" placeholder="Пароль" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            <p>{{ $errors->first('password') }}</p>
                        </div>
                    @endif
                </div>
                @if($errors->has('data-auth-not-valid'))
                    <div>
                        <p style="color: red; font-size: .8em">{{ $errors->first('data-auth-not-valid') }}</p>
                    </div>
                @endif
                <div class="row d-flex justify-content-end">
                    <div class="col-4 ">
                        <button type="submit" class="btn btn-primary btn-block">Войти</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
</body>
</html>
