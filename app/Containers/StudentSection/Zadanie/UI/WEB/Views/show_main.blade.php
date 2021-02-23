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
                    <div class="form form-create-course">
                        <div class="d-flex justify-content-center">
                            <h2>Формулировка задания</h2>
                        </div>
                        <div class="row mt-4">
                            <div class="col">
                                <p style="white-space: pre-line;">-2021 учебный год
                                    Группы: СКС-17, СКС-17з
                                    Название дисциплины: «Основы организации хозяйственной деятельности» (ОХД)
                                    4 курс, 7 семестр
                                    Курсовая работа по дисциплине «ОХД»: 4 курс, 8 семестр
                                    Количество часов на изучение дисциплины: всего - 108 ч, в том числе:
                                    лекции - 32 ч, практические занятия - 16 ч, СРС - 60 ч
                                    Форма контроля - экзамен
                                    Лектор - Гонтовая Наталия Викторовна

                                    Вопросы преподавателю - через сообщения в «лс» на сайте ДО.
                                </p>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <h5>Прикрепленные ссылки</h5>
                                <div>
                                    <p><a href="#">Форум от 11.01.2021, 8-30 Экзамен по дисциплине «ОХД», Группа СКС-17</a></p>
                                    <p><a href="#">Форум от 11.01.2021, 8-30 Экзамен по дисциплине «ОХД», Группа СКС-17</a></p>
                                    <p><a href="#">Форум от 11.01.2021, 8-30 Экзамен по дисциплине «ОХД», Группа СКС-17</a></p>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col">
                                <h5>Прикрепленные файлы</h5>
                                <table border="1" class="table-hover mt-2 table-list-files">
                                    <thead>
                                    <tr>
                                        <th>№</th>
                                        <th>Название</th>
                                        <th>Размер</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>
                                            <img src="http://custom/file_icons/png/doc.png" alt="" class="table-list-radanie-file-icon" style="width: 30px;">
                                            <span>test.pdf</span>
                                        </td>
                                        <td>2mb</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <template v-if="activeForm == 'show'">
                        @include('studentsection/responsestudent::forms.show')
                    </template>

                    <template v-if="activeForm == 'edit'">
                        @include('studentsection/responsestudent::forms.edit')
                    </template>

                    <template v-if="activeForm == 'create'">
                        @include('studentsection/responsestudent::forms.create')
                    </template>

                    @include('studentsection/responseteacher::forms.show')

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
