@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" style="padding-top: 100px" id="why">
        <div class="container">

            <div class="head-content mb-4 row">
                @include('components/nav_panel')
                <div>
                    <a href="{{ route('web_teacher_materials_create') }}" class="hover-button head-btn">Добавить материал</a>
                </div>
            </div>

            @include('components.breadcrumbs')

            @if($materials->isNotEmpty())
            <div class="row">
                <div style="background: white; width: 100%">
                    <table class="table table-hover" style="text-align: center">
                        <thead>
                        <tr>
                            <th>Название</th>
                            <th>Добавленно</th>
                            <th>Обновленно</th>
                            <th>Лайков</th>
                            <th>Дизлайков</th>
                            <th>Скрыть</th>
                            <th>Удалить</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr class="table-row" v-for="(material, indexMaterial) in materials" :data-href="editUrl(material)">
                                <td>@{{ material.plain_title  }}</td>
                                <td>@{{ material.created_at }}</td>
                                <td>@{{ material.updated_at }}</td>
                                <td>@{{ material.likes_count }}</td>
                                <td>@{{ material.dislikes_count}}</td>
                                <td>
                                    <i v-if="!material.is_visible" @click="showCourse(indexMaterial)" class="fa fa-eye-slash btn-eye-show-hide" title="Показать" aria-hidden="true"></i>
                                    <i v-if="material.is_visible" @click="hideCourse(indexMaterial)" class="fa fa-eye btn-eye-show-hide" title="Скрыть" aria-hidden="true"></i>
                                </td>
                                <td>
                                    <i class="fa fa-ban btn-eye-show-hide" title="Удалить курс" @click="deleteCourse(indexMaterial)" aria-hidden="true"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            @else
            <h3>Вы пока не добавили ни одно текста</h3>
            @endif
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        var errorMsg = '{{ __('ship::validation.error-server') }}';
        var token = '{{ csrf_token() }}';
        var editUrl = redirectUrl = '{{ config('app.url') . '/' . Route::getRoutes()->getByName('web_teacher_materials_edit')->uri}}';

        var listMaterial = {
            data: {
                materials: []
            },
            created: function(){
                this.materials = JSON.parse('{!! $materials->toJson() !!}');
            },
            methods: {
                hideCourse: function(indexMaterial){
                    var material_id = this.materials[indexMaterial].id;

                    axios({
                            method: 'post',
                            url: '{{ route('api_teacher_material_hide') }}',
                            data: {material_id: material_id, '_token': token},
                            dataType: 'json'
                        }
                    ).then(function(response){
                        app.materials[indexMaterial].is_visible = 0;
                        alertSuccess(response.data.msg);
                    })
                },
                showCourse: function(indexMaterial){
                    var material_id = this.materials[indexMaterial].id;

                    axios({
                            method: 'post',
                            url: '{{ route('api_teacher_material_show') }}',
                            data: {material_id: material_id, '_token': token},
                            dataType: 'json'
                        }
                    ).then(function(response){
                        app.materials[indexMaterial].is_visible = 1;
                        alertSuccess(response.data.msg);
                    })
                },
                deleteCourse: function(indexMaterial){
                    var material_id = this.materials[indexMaterial].id;

                    axios({
                        method: 'post',
                        url: '{{ route('api_teacher_material_delete') }}',
                        data: {material_id: material_id},
                        dataType: 'json'
                    }).then(function(response){
                        app.materials.splice(indexMaterial, 1);
                        alertSuccess(response.data.msg);
                    })
                },
                editUrl: function(material){
                    return this.url(editUrl, {id: material.id});
                }
            }
        };

        mixins.push(listMaterial);
    </script>
@endpush
