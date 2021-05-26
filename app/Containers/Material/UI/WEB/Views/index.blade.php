@extends('layouts.main')

@section('content')
<section class="other_services mt-5" id="why">
    <div class="container">
        <div class="head-content mb-4">
            <h3 class="heading">Тексты</h3>

            <div class="search-block col-5">
                <input type="text" placeholder="Найти" v-model="searchQuery" class="search-input" name="search" autocomplete="off">
                <i class="fa fa-search" aria-hidden="true" @click="search" title="Поиск"></i>
            </div>

            <div>
                <a href="#" class="hover-button head-btn">Мои материалы</a>
            </div>
        </div>

        <div class="row">
            <div class="py-3 col-md-9">
                @if($materials->isNotEmpty())
                <div class="row" v-for="materialsRow in materials">
                    <div class="col-lg-6 box-text" v-for="(material, indexMaterial) in materialsRow" :key="indexMaterial">
                        <a :href="showUrl(material.id)">
                            <div class="grid">
                                <div class="box-text-stat-div">

                                    <div v-if="!material.add" class='box-img-status' title="Не добавлено" id='progress-learning'>
                                        <img src='{{ asset('images/s2.png') }}'>
                                    </div>

                                    <div v-if="material.add && material.status == 'process'" class='box-img-status' title='На изучении' id='progress-learning'>
                                        <img src='{{ asset('images/s2-yellow.png') }}'>
                                    </div>

                                    <div v-if="material.add && material.status == 'finish'" class="box-img-status" title="Изучено" id="progress-finish">
                                        <img src="{{ asset('images/s2-green.png') }}">
                                    </div>

                                    <div v-if="!material.add" @click.prevent="addToMyMaterials(material)" class="btn-add-delete-material" id="add" title="Добавить в мои материалы">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </div>

                                    <div v-if="material.add" @click.prevent="deleteFromMyMaterials(material)" class='btn-add-delete-material ' id='delete' title='Удалить из моих материалов'>
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                    </div>

                                    <div class="box-text-statlist">
                                        <ul>
                                            <li>
                                                <span class="box-count-likes">
                                                    <i class="fa fa-thumbs-o-up" aria-hidden="true"></i> @{{ material.likes_count }}
                                                </span>
                                            </li>
                                            <li>
                                                <span class="box-count-dislikes">
                                                    <i class="fa fa-thumbs-o-down" aria-hidden="true"></i> @{{ material.dislikes_count }}
                                                </span>
                                            </li>
                                        </ul>
                                    </div>

                                    <img :src="domain + '/storage/materials/' + material.image" alt="" class="img-fluid">
                                </div>
                                <div class="info p-4">
                                    <h4>@{{ material.plain_title }}</h4>
                                    <p class="mt-3">@{{ material.preview_text }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                @else
                    <h3>Материалы не найдены</h3>
                @endif
            </div>

            <div class="py-3 col-md-3 main-right-div">
                <div class="right-div-block">
                    <h4>Сложность</h4>
                    <ul style="list-style: none">
                        <li>
                            <label class="radio-li-item">Все
                                <input name="radio-1" type="radio" @click="complexity('all')" {{ request()->get('complexity', 'all') == 'all' ? 'checked' : ''}}>
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="radio-li-item">Начальный
                                <input name="radio-1" type="radio" @click="complexity('basic')" {{ request()->get('complexity') == 'basic' ? 'checked' : ''}}>
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="radio-li-item">Средний
                                <input name="radio-1"  type="radio" @click="complexity('middle')" {{ request()->get('complexity') == 'middle' ? 'checked' : ''}}>
                                <span name="radio-1" class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="radio-li-item">Продвинутый
                                <input name="radio-1" type="radio" @click="complexity('advanced')" {{ request()->get('complexity') == 'advanced' ? 'checked' : ''}}>
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
                                <input name="radio-2" type="radio" @click="sort('likes')" {{ request()->get('sort') == 'likes' ? 'checked' : '' }}>
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="radio-li-item">По дизлайкам
                                <input name="radio-2" type="radio" @click="sort('dislikes')" {{ request()->get('sort') == 'dislikes' ? 'checked' : '' }}>
                                <span class="checkmark"></span>
                            </label>
                        </li>
                        <li>
                            <label class="radio-li-item">По дате
                                <input name="radio-2" type="radio" @click="sort('date')" {{ request()->get('sort') == 'date' ? 'checked' : '' }}>
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

@push('scripts')
    <script>
        var token = '{{ csrf_token() }}';
        var errorMsg = '{{ __('ship::validation.error-server') }}';
        var showUrl = '{{ config('app.url') . '/' . Route::getRoutes()->getByName('web_material_show')->uri}}';

        var indexMaterialsComponent = {
            data: {
                materials: [],
                domain: '{{ config('app.url') }}',
                searchQuery: '{{ request()->get('search') }}'
            },
            created: function(){
                this.materials = JSON.parse('{!! $materials->toJson() !!}');
            },
            methods: {
                search: function(){
                    var path = window.location.pathname;
                    var query = window.location.search;

                    if (query.length > 0) {
                        var params = query.replace('?', '').split('&');

                        var index = _.findIndex(params, function(item){
                            return item.search(/search/) != -1;
                        });

                        if(index !== -1) {
                            params[index] = 'search=' + this.searchQuery;
                        }else{
                            params.push('search=' + this.searchQuery);
                        }

                        query = '?' + params.join('&');
                    }else{
                        query = '?search=' + this.searchQuery;
                    }

                    window.location.href = this.domain + path + query;
                },
                sort: function(type){
                    var path = window.location.pathname;
                    var query = window.location.search;

                    if (query.length > 0) {
                        var params = query.replace('?', '').split('&');

                        var index = _.findIndex(params, function(item){
                            return item.search(/sort/) != -1;
                        });

                        if(index !== -1) {
                            params[index] = 'sort=' + type;
                        }else{
                            params.push('sort=' + type);
                        }

                        query = '?' + params.join('&');
                    }else{
                        query = '?sort=' + type;
                    }

                    window.location.href = this.domain + path + query;
                },
                complexity: function(type){
                    var path = window.location.pathname;
                    var query = window.location.search;

                    if (query.length > 0) {
                        var params = query.replace('?', '').split('&');

                        var index = _.findIndex(params, function(item){
                            return item.search(/complexity/) != -1;
                        });

                        if(index !== -1) {
                            params[index] = 'complexity=' + type;
                        }else{
                            params.push('complexity=' + type);
                        }

                        query = '?' + params.join('&');
                    }else{
                        query = '?complexity=' + type;
                    }

                    window.location.href = this.domain + path + query;
                },
                addToMyMaterials: function(material){

                    $.ajax({
                        url: '{{ route('web_materials_add_to_my') }}',
                        type: 'post',
                        data: {'_token': token, 'material_id': material.id},
                        success: function(response){
                            var msg = JSON.parse(response).msg;
                            material.add = true;
                            alertSuccess(msg);
                        },
                        error: function(error){
                            alertDanger(errorMsg);
                        }
                    });
                },
                deleteFromMyMaterials: function(material){
                    $.ajax({
                        url: '{{ route('web_materials_delete_from_my') }}',
                        type: 'post',
                        data: {'_token': token, 'material_id': material.id},
                        success: function(response){
                            var msg = JSON.parse(response).msg;
                            material.add = false;
                            alertSuccess(msg);
                        },
                        error: function(error){
                            alertDanger(errorMsg);
                        }
                    });
                },
                showUrl: function(material_id){
                    return this.url(showUrl, {'id': material_id});
                }
            }
        };

        mixins.push(indexMaterialsComponent);
    </script>
@endpush
