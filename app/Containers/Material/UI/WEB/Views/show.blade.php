@extends('layouts.main')

@section('content')
    <section class="other_services mt-5" id="why" style="background: white">
        <div class="container">
            <div class="head-content mb-4">
                <h3 class="heading">
                    <img id="status-text" src="{{ asset('images/s2-green.png') }}">

                    {!! $material->html_title !!}
                </h3>
            </div>
        <div id="text-body">
            {!! $material->html_text !!}
        </div>
        </div>
        <div id="footer-text-block" class="mt-4 mb-4">
            <div>
                <button class="btn btn-info">Все понятно</button>
            </div>
            <div class="mt-2">
                <small :class="{press: isPressLike, like: !isPressLike}">@{{ likes_count }}</small>&nbsp;
                <i class="fa fa-thumbs-up" @click="actionPress('like')" :class="{press: isPressLike, like: !isPressLike}"></i>&nbsp;|
                <i class="fa fa-thumbs-down" @click="actionPress('dislike')" :class="{press: isPressDislike, dislike: !isPressDislike}"></i>&nbsp;
                <small :class="{press: isPressDislike, dislike: !isPressDislike}">@{{ dislikes_count }}</small>
            </div>
        </div>
    </section>

    @include('components.list_translate')

    @include('dictionary::modal')

    @can('chat')
        @include('chat::modal')
    @endcan
@endsection

@push('scripts')
    <script>
        $('body').removeClass('body-background');
        var errorMsg = '{{ __('ship::validation.error-server') }}';

        var likedislikeComponent = {
            data: {
                pressed: '{{ $material->pressed }}',
                likes_count: '{{ $material->likes_count }}',
                dislikes_count: '{{ $material->dislikes_count }}',
                material_id: '{{ $material->id }}'
            },
            computed: {
                isPressLike: function(){
                    return this.pressed == 'like' ? true : false;
                },
                isPressDislike: function(){
                    return this.pressed == 'dislike' ? true : false;
                },
            },
            methods: {
                actionPress: function(btnType){
                    if(btnType == 'like' && this.isPressLike){
                        this.deleteLike(btnType);
                        this.pressed = '';
                    }else if(btnType == 'dislike' && this.isPressDislike){
                        this.deleteDislike(btnType);
                        this.pressed = '';
                    } else {
                        if (btnType == 'like') {
                            if (this.isPressDislike) {
                                this.deleteDislike();
                                this.addLike();
                            } else {
                                this.addLike();
                            }
                            this.pressed = btnType;
                        } else {
                            if (this.isPressLike) {
                                this.deleteLike();
                                this.addDislike();
                            } else {
                                this.addDislike();
                            }
                            this.pressed = btnType;
                        }
                    }
                },
                addLike: function(){
                    $.ajax({
                        url: '{{ route('web_materials_add_like') }}',
                        type: 'post',
                        data: {'_token': token, 'material_id': this.material_id},
                        success: function(response){
                            app.likes_count++;
                        },
                        error: function(){
                            alertDanger(errorMsg);
                        }
                    });
                },
                addDislike: function(){
                    $.ajax({
                        url: '{{ route('web_materials_add_dislike') }}',
                        type: 'post',
                        data: {'_token': token, 'material_id': this.material_id},
                        success: function(response){
                            app.dislikes_count++;
                        },
                        error: function(){
                            alertDanger(errorMsg);
                        }
                    });
                },
                deleteLike: function(){
                    $.ajax({
                        url: '{{ route('web_materials_delete_like') }}',
                        type: 'post',
                        data: {'_token': token, 'material_id': this.material_id},
                        success: function(response){
                            app.likes_count -= app.likes_count > 0 ? 1 : 0;
                        },
                        error: function(){
                            alertDanger(errorMsg);
                        }
                    });
                },
                deleteDislike: function(){
                    $.ajax({
                        url: '{{ route('web_materials_delete_dislike') }}',
                        type: 'post',
                        data: {'_token': token, 'material_id': this.material_id},
                        success: function(response){
                            app.dislikes_count -= app.dislikes_count > 0 ? 1 : 0;
                        },
                        error: function(){
                            alertDanger(errorMsg);
                        }
                    });
                }
            }
        };
        mixins.push(likedislikeComponent);
    </script>
@endpush
