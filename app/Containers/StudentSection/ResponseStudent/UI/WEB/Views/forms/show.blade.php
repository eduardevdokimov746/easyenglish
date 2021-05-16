<div class="form mt-3">
    <div class="d-flex justify-content-center">
        <h2>Форма ответа</h2>
    </div>

    <table class="mt-3 table table-striped table-hover">
        <tbody>
        <tr>
            <th>Состояние оценивания</th>
            <td>{{ $zadanie->responseStatus }}</td>
        </tr>
        <tr>
            <th>Крайний срок сдачи</th>
            <td>{{ $zadanie->getDateIsoFormat($zadanie->deadline) }}</td>
        </tr>
        <tr>
            <th>Ответ добавлен</th>
            <td>{{ is_null($zadanie->responseStudents->first()) ? 'Ответ не отправлен' : $zadanie->getDateIsoFormat($zadanie->responseStudents->first()->created_at) }}</td>
        </tr>
        <tr>
            <th>Ответ изменен</th>
            <td>{{ is_null($zadanie->responseStudents->first()) ? 'Ответ не отправлен' : $zadanie->getDateIsoFormat($zadanie->responseStudents->first()->updated_at) }}</td>
        </tr>
        </tbody>
    </table>

    @if(!is_null($zadanie->responseStudents?->first()) && !empty($zadanie->responseStudents?->first()?->comment))
    <div class="row mt-4">
        <div class="col">
            <h5>Комментарий</h5>
            <div>{!! $zadanie->responseStudents?->first()?->comment !!}</div>
        </div>
    </div>
    @endif

    @if($zadanie->responseStudents->isNotEmpty() && $zadanie->responseStudents->first()->files->isNotEmpty())
        <div class="row mt-4">
            <div class="col">
                <h5>Прикрепленные файлы</h5>

                <table class="table-hover mt-2 table-list-files" border="1">
                    <thead>
                    <tr>
                        <th>№</th>
                        <th>Название</th>
                        <th>Размер</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($zadanie->responseStudents?->first()?->files as $fileIndex => $file)
                        <tr data-href="{{ route('web_response_student_file_download', $file->hash) }}" class="table-row">
                            <td>{{ $fileIndex + 1 }}</td>
                            <td class="text-left">
                                <img class="table-list-radanie-file-icon" style="width: 30px;" src="{{ $file->icon }}" alt="">
                                <span>{{ $file->title }}</span>
                            </td>
                            <td>{{ $file->size }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    <div class="d-flex justify-content-end">
        @if(is_null($zadanie->responseStudents->first()))
            <button class="btn btn-primary" @click="changeForm('create')">Добавить ответ</button>
        @else
            <button class="btn btn-info" @click="changeForm('edit')">Редактировать</button>
        @endif
    </div>
</div>
