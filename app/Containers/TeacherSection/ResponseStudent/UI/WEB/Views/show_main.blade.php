@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" id="why">
        <div class="container mb-4">
            <div class="head-content">
                <h1 class="heading col">
                    {{ $response->zadanie->title }}
                </h1>
            </div>

            @include('components.breadcrumbs', [$breadcrumb])

            <div class="row mt-3 mb-3">
                <div class="col">
                    @include('teachersection/responsestudent::forms.show')

                    <template v-if="activeForm == 'show'">
                        @include('teachersection/responseteacher::forms.show')
                    </template>

                    <template v-if="activeForm == 'edit'">
                        @include('teachersection/responseteacher::forms.edit')
                    </template>

                    <template v-if="activeForm == 'create'">
                        @include('teachersection/responseteacher::forms.create')
                    </template>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        var token = '{{ csrf_token() }}';
        var icons =  JSON.parse('{!! $icons !!}');
        var errorMsg = '{{ __('ship::validation.error-server') }}';

        function getIcon(fileName){
            var match = fileName.match(/.*\.(\S+)/);

            if(match && match[1]){
                if(icons[match[1]]){
                    return icons[match[1]];
                }
            }

            return icons['default'];
        }

        function getSize(countByte){
            var sizes = ['байт', 'КБ', 'MБ', 'ГБ'];
            if (countByte == 0) return '0байт';
            var i = parseInt(Math.floor(Math.log(countByte) / Math.log(1024)));
            return Math.round(countByte / Math.pow(1024, i), 2) + ' ' + sizes[i];
        }

        var formResponseTeacherComponent = {
            data: {
                activeForm: 'show',
                result: '{{ !is_null($response->responseTeacher) && !is_null($response->responseTeacher->result) ? $response->responseTeacher->result : '' }}',
                is_credited: '{{ !is_null($response->responseTeacher) ? (bool)$response->responseTeacher->is_credited : false }}',
                comment: '{!! !is_null($response->responseTeacher) ? $response->responseTeacher->comment : '' !!}',
                isInvalidResult: false
            },
            methods: {
                changeForm: function(formName){
                    this.activeForm = formName;

                    if (formName == 'edit' || formName == 'create') {
                        setTimeout(function () {
                            bindCkeditor(document.getElementsByClassName('ckeditor-textarea')[0]);
                        }, 200);
                    }
                },
                bCkeditor: function(e){
                    bindCkeditor(e.target);
                },
                addResponse: function(){
                    var form = new FormData();

                    form.append('comment', window['editor_comment'].getData());
                    form.append('_token', token);
                    form.append('is_credited', this.is_credited == true ? 1 : 0);

                    if (this.result.length > 0) {
                        form.append('result', this.result);
                    }

                    $.ajax({
                        url: '{{ route('web_teacher_responses_store', $response->id) }}',
                        processData: false,
                        contentType: false,
                        data: form,
                        type: 'post',
                        dataType: 'json',
                        success: function(data){
                            alertSuccess(data.msg);
                            setTimeout(function(){
                                window.location.href = '{{ route('web_teacher_responses_students_show', [$response->zadanie->id, $response->id]) }}';
                            }, 1000);
                        },
                        error: function(error){
                            alertDanger(errorMsg);
                        }
                    });
                },
                updateResponse: function(){
                    var form = new FormData();

                    form.append('comment', window['editor_comment'].getData());
                    form.append('_token', token);
                    form.append('is_credited', this.is_credited == true ? 1 : 0);

                    if (this.result.length > 0) {
                        form.append('result', this.result);
                    }


                    $.ajax({
                        url: '{{ is_null($response->responseTeacher) ? '' : route('web_teacher_responses_update', [$response->id, $response->responseTeacher->id]) }}',
                        processData: false,
                        contentType: false,
                        data: form,
                        type: 'post',
                        dataType: 'json',
                        success: function(data){
                            console.log(data);
                            alertSuccess(data.msg);
                            setTimeout(function(){
                            window.location.href = '{{ route('web_teacher_responses_students_show', [$response->zadanie->id, $response->id]) }}';
                            }, 1000);
                        },
                        error: function(error){
                            alertDanger(errorMsg);
                        }
                    });
                }
            },
            watch: {
                result: function () {
                    if(this.is_credited){
                        if(this.result.length <= 0){
                            this.isInvalidResult = true;
                            return;
                        }
                    }

                    this.isInvalidResult = false;
                },
                is_credited: function(){
                    if(this.is_credited == false){
                        this.isInvalidResult = false;
                    } else {
                        if (this.result.length <= 0) {
                            this.isInvalidResult = true;
                        }
                    }
                }
            }
        };

        mixins.push(formResponseTeacherComponent);
    </script>
@endpush

