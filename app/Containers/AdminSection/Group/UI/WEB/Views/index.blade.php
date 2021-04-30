@extends('layouts.admin')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            @include('components.notices-admin')
            <div class="container-fluid">
                <div class="row mb-2 d-flex justify-content-between">
                    <div>
                        <h1>Список групп</h1>
                    </div>
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <div class="navbar-search-block">
                                <form class="form-inline">
                                    <div class="input-group input-group-sm">
                                        <input class="form-control" type="text" @keyup="search($event)" placeholder="Поиск" aria-label="Search">
                                    </div>
                                </form>
                            </div>
                        </li>
                    </ul>

                    <div>
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('web_admin_index') }}">Главная</a></li>
                            <li class="breadcrumb-item active">Список групп</li>
                        </ol>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="table-responsive">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Название</th>
                        <th>Студентов</th>
                        <th>Дата создания</th>
                        <th>Редактировать</th>
                        <th>Удалить</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="group in groups">
                        <td>@{{ group.id }}</td>
                        <td>@{{ group.title }}</td>
                        <td>@{{ group.students_count }}</td>
                        <td>@{{ group.created_at }}</td>
                        <td>
                            <a :href="url(editUrl, {id: group.id})">
                                <i class="fa fa-pencil text-blue" aria-hidden="true"></i>
                            </a>
                        </td>
                        <td>
                            <a :href="url(deleteUrl, {id: group.id})">
                                <i class="fa fa-fw fa-close text-danger"></i>
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div v-if="!isSearch" class="d-flex justify-content-center">
                {{ $groups->links() }}
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        var domain = '{{ config('app.url') }}';
        var editUri = '{{ Route::getRoutes()->getByName('web_admin_group_edit')->uri }}';
        var deleteUri = '{{ Route::getRoutes()->getByName('web_admin_group_delete')->uri }}';

        var groupsIndexComponent = {
            data: {
                defaultGroups: [],
                groups: [],
                searchGroups: [],
                isSearch: false,
                editUrl: '',
                deleteUrl: '',
            },
            created: function(){
                this.defaultGroups = JSON.parse('{!! $groups->toJson() !!}').data;
                this.groups = JSON.parse('{!! $groups->toJson() !!}').data;
                this.editUrl = domain + '/' + editUri;
                this.deleteUrl = domain + '/' + deleteUri;
            },
            methods: {
                search: _.debounce(e => {
                    var query = e.target.value;

                    if(query.length <= 1){
                        app.groups = app.defaultGroups;
                        app.isSearch = false;
                        return;
                    }

                    if(e.keyCode == 13 || query.length <= 1){
                        return;
                    }

                    app.isSearch = true;

                    axios({
                        url: '{{ route('api_admin_groups_search') }}',
                        data: {query: query},
                        method: 'post',
                    }).then(function(response){
                        app.groups = response.data;
                    });
                }, 500),
            }
        };

        mixins.push(groupsIndexComponent);
    </script>
@endpush
