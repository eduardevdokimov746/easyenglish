@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" id="why">
        <div class="container mb-4">
            <div class="head-content mb-4">
                <h1 class="heading col">
                    Группы
                </h1>
            </div>

            <div class="form row justify-content-between" style="min-height: 400px">

                <div class="col-5 div-students-create-group">
                    <div class="header-students-create-group">
                        <h5>Поиск групп</h5>
                    </div>
                    <div>
                        <input type="text" @keyup="search" class="form-control"  placeholder="Найти">
                    </div>
                    <div style="margin-top: 10px;">
                        <ul class="list-students-create-group" style="max-height: 370px; overflow-y: auto;">
                            <li v-for="(group, indexGroup) in searchGroups" :key="group.id">
                                <label class="item-list-students-create-group">
                                    <div>
                                        @{{ group.title }}
                                    </div>
                                    <div>
                                        <input type="checkbox" @change="searchChangeSelect(indexGroup)" :checked="hasAddListGroups(group.id)">
                                    </div>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-5 div-students-create-group">
                    <div class="header-students-create-group">
                        <h5>Курсы</h5>
                    </div>
                    <div>
                        <select class="form-control" v-model="currentCourse" @change="selectCourse">
                            <option value="default">Выберете один из курсов</option>
                            <option v-for="(course, indexCourse) in courses" :value="indexCourse">@{{ course.title }}</option>
                        </select>
                    </div>
                    <div style="margin-top: 10px;">
                        <ul class="list-students-create-group" style="max-height: 370px; overflow-y: auto;">
                            <li v-for="(group, indexGroup) in addGroups" :key="group.id">
                                <label class="item-list-students-create-group">
                                    <div>
                                        @{{ group.title }}
                                    </div>
                                    <div>
                                        <input type="checkbox" @change="addChangeSelect(indexGroup)" :checked="hasAddListGroups(group.id)">
                                    </div>
                                </label>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-3 pb-3">
                <button @click="saveChange" :disabled="isActiveBtn" class="btn btn-primary">Сохранить</button>
            </div>
        </div>

    </section>
@endsection

@push('scripts')
    <script>


        var courseGroupsComponent = {
            data: {
                courses: [],
                currentCourse: 'default',
                courseGroups: [],
                addGroups: [],
                defaultGroups: [],
                searchGroups: [],
                updateGroups: [],
                updateUrl: '',
                token: '{{ csrf_token() }}'
            },
            created: function(){
                this.courses = JSON.parse('{!! $courses->toJson() !!}');
                this.searchGroups = JSON.parse('{!! $groups !!}');
                this.defaultGroups = JSON.parse('{!! $groups !!}');
                var domain = '{{ config('app.url') }}';
                this.updateUrl = domain + '/' + '{{ Route::getRoutes()->getByName('web_teacher_group_update')->uri }}';

                var selectedCourse =  '{{ request()->get('course') }}';

                var indexSelectedCourse = _.findIndex(this.courses, function(item){
                    return item.id == selectedCourse;
                });

                if(-1 !== indexSelectedCourse) {
                    this.currentCourse = indexSelectedCourse;
                    this.selectCourse();
                }
            },
            methods: {
                selectCourse: function() {
                    if (this.currentCourse == 'default') {
                        this.addGroups = [];
                    } else {
                        this.addGroups.splice(0, this.addGroups.length);
                        Object.assign(this.addGroups, this.courses[this.currentCourse].groups);
                    }
                },
                hasAddListGroups: function(group_id){
                    return -1 !== _.findIndex(this.addGroups, {id: group_id});
                },
                addChangeSelect: function(indexGroup){
                    var group = this.addGroups[indexGroup];
                    console.log(group);
                    this.addGroups.splice(_.findIndex(this.addGroups, {id: group.id}), 1);
                    if(this.updateGroups[_.findIndex(this.updateGroups, {id: group.id})] === undefined){
                        this.updateGroups.push(group);
                    }
                    this.updateGroups[_.findIndex(this.updateGroups, {id: group.id})].action = 'delete';
                },
                searchChangeSelect: function(indexGroup){
                    var group = this.searchGroups[indexGroup];
                    console.log(group);
                    if(this.hasAddListGroups(group.id)){
                        this.addGroups.splice(_.findIndex(this.addGroups, {id: group.id}), 1);
                        if(this.updateGroups[_.findIndex(this.updateGroups, {id: group.id})] == undefined){
                            this.updateGroups.push(group);
                        }
                        this.updateGroups[_.findIndex(this.updateGroups, {id: group.id})].action = 'delete';
                    }else{
                        this.addGroups.push(group);

                        if(this.updateGroups[_.findIndex(this.updateGroups, {id: group.id})] === undefined){
                            this.updateGroups.push(group);
                        }

                        if(this.courses[this.currentCourse].groups[_.findIndex(this.courses[this.currentCourse].groups, {id: group.id})] === undefined){
                            this.updateGroups[_.findIndex(this.updateGroups, {id: group.id})].action = 'add';
                        } else {
                            this.updateGroups[_.findIndex(this.updateGroups, {id: group.id})].action = 'default';
                        }
                    }
                },

                search: _.debounce(e => {
                    var query = e.target.value;

                    if(e.keyCode == 13){
                        return;
                    }

                    if(query.length <= 1){
                        app.searchGroups = app.defaultGroups;
                        return;
                    }

                    axios({
                        url: '{{ route('api_teacher_groups_search') }}',
                        data: {query: query},
                        method: 'post',
                    }).then(function(response){
                        console.log(response.data);
                        app.searchGroups = response.data;
                    });
                }, 500),
                saveChange: function() {
                    var data = new FormData();
                    var course_id = this.courses[this.currentCourse].id;
                    console.log(course_id);

                    if(this.updateGroups.length){
                        data.append('groups', JSON.stringify(this.updateGroups));
                    }

                    data.append('_token', this.token);

                    var updateUrl = this.url(this.updateUrl, {id: this.courses[this.currentCourse].id});

                    axios.post(updateUrl, data)
                        .then(function(response){
                            alertSuccess(response.data.msg);
                            setTimeout(function(){
                                document.location.reload();
                            }, 1000);
                        })
                },
            },
            computed: {
                isActiveBtn: function(){
                    return this.currentCourse === 'default' ? 'disabled' : null;
                },
            }
        };

        mixins.push(courseGroupsComponent);
    </script>
@endpush
