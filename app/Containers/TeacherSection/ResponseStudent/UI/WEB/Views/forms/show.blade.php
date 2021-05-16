<div class="form mt-3">
    <div class="d-flex justify-content-center">
        <h2>Ответ студента</h2>
    </div>

    <table class="mt-3 table table-striped table-hover">
        <tbody>
        <tr>
            <th style="width: 30%">Ответил</th>
            <td>
                <div class="content-course-cart">
                    <div class="div-image-course-cart" style="width: 40px; height: 40px;">
                        <img src="{{ PhotoStorage::getProfileAvatar($response->user) }}">
                    </div>
                    <div class="div-name-prepod-course-cart">
                        <p class="name-prepod-course-cart" style="color: black;">
                            {{ $response->user->fio }}
                        </p>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <th>Крайний срок сдачи</th>
            <td>{{ $response->getDateIsoFormat($response->zadanie->deadline) }}</td>
        </tr>
        <tr>
            <th>Ответ добавлен</th>
            <td>{{ $response->getDateIsoFormat($response->created_at) }}</td>
        </tr>
        <tr>
            <th>Ответ изменен</th>
            <td>{{ $response->getDateIsoFormat($response->updated_at) }}</td>
        </tr>
        </tbody>
    </table>

    @if(!empty($response->comment))
    <div class="row mt-4">
        <div class="col">
            <h5>Комментарий</h5>
            <div>{!! $response->comment !!}</div>
        </div>
    </div>
    @endif

    @if($response->files->isNotEmpty())
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
                    @foreach($response->files as $fileIndex => $file)
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
</div>
