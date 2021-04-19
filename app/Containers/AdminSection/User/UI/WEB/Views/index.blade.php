@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-5">
                        <h1>Главная</h1>
                    </div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <div class="navbar-search-block">
                                <div class="form-inline">
                                    <div class="input-group input-group-sm">
                                        <input class="form-control" type="text" placeholder="Поиск" @keyup="search($event)" aria-label="Search">
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                    {{--<div class="col-sm-6">--}}
                    {{--<ol class="breadcrumb float-sm-right">--}}
                    {{--<li class="breadcrumb-item"><a href="#">Home</a></li>--}}
                    {{--<li class="breadcrumb-item active">Language Menu</li>--}}
                    {{--</ol>--}}
                    {{--</div>--}}
                </div>
            </div>
        </section>
        <section class="content">
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Роль</th>
                        <th>Логин</th>
                        <th>ФИО</th>
                        <th>Эл. почта</th>
                        <th>Редактировать</th>
                        <th>Удалить</th>
                    </tr>
                    </thead>
                    <tbody>
                        <tr v-for="user in users">
                            <td>@{{ user.id }}</td>
                            <td>@{{ user.roleLang }}</td>
                            <td>@{{ user.login }}</td>
                            <td>@{{ user.fio.length ? user.fio : '&mdash;' }}</td>
                            <td>@{{ user.email ? user.email.email : '&mdash;' }}</td>
                            {{--<td>--}}
                                {{--<a href="{{ route('web_admin_users_edit', $user->id) }}">--}}
                                    {{--<i class="fa fa-pencil text-blue" aria-hidden="true"></i>--}}
                                {{--</a>--}}
                            {{--</td>--}}
                            {{--<td>--}}
                                {{--<a href="{{ route('web_admin_users_delete', $user->id) }}">--}}
                                    {{--<i class="fa fa-fw fa-close text-danger"></i>--}}
                                {{--</a>--}}
                            {{--</td>--}}
                        </tr>
                    </tbody>
                </table>
            </div>
            <div v-if="!isSearch" class="d-flex justify-content-center">
                {{ $users->links() }}
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        var usersIndexComponent = {
            data: {
                defaultUsers: [],
                users: [],
                searchUsers: [],
                isSearch: false
            },
            created: function(){
                this.defaultUsers = JSON.parse('{!! $users->toJson() !!}').data;
                this.users = JSON.parse('{!! $users->toJson() !!}').data;
            },
            methods: {
                search: _.debounce(e => {
                    var query = e.target.value;

                    if(query.length <= 2){
                        app.users = app.defaultUsers;
                        app.isSearch = false;
                        return;
                    }

                    if(e.keyCode == 13 || query.length <= 2){
                        return;
                    }

                    app.isSearch = true;

                    axios({
                        url: '{{ route('api_admin_users_search') }}',
                        data: {query: query},
                        method: 'post',
                    }).then(function(response){
                        app.users = response.data;
                    });
                }, 500),
            }
        };

        mixins.push(usersIndexComponent);
    </script>
@endpush