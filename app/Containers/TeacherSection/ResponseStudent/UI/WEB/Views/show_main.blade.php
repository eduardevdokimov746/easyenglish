@extends('layouts.main')

@section('content')
    <section class="other_services pt-5" id="why">
        <div class="container mb-4">
            <div class="head-content">
                <h1 class="heading col">
                    Название задания
                </h1>
            </div>

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
        $(document).on('mouseover', '.row', function(){
            if($(this).find('.ckeditor-textarea') != undefined) {
                $(this).find('.ckeditor-textarea').ckeditor();
            }
        });

        var createZadanieComponent = {
            data: {
                title: '',
                isDisableQueuePublish: true,
                activeForm: 'show',
                links: [
                    {
                        title: 'Тестовая ссылка',
                        url: 'https://google.com'
                    }
                ],
                files: [
                    {
                        id: '',
                        title: 'test.pdf',
                        icon: "{{ asset('file_icons/png/doc.png') }}",
                        size: '2mb'
                    }
                ]
            },
            methods: {
                addLink: function(){

                },
                removeLink: function(){

                },
                changeForm: function(formName){
                    this.activeForm = formName;
                }
            }
        };

        mixins.push(createZadanieComponent);
    </script>
@endpush

