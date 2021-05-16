<div class="form mt-3">
    <div class="d-flex justify-content-center">
        <h2>Ответ преподавателя</h2>
    </div>

    <table class="mt-3 table table-striped table-hover">
        <tbody>
        <tr>
            <th style="width: 30%">Оценка</th>
            <td>{!! is_null($zadanie->responseStudents->first()->responseTeacher->result) ? '&mdash;' : $zadanie->responseStudents->first()->responseTeacher->result !!}</td>
        </tr>
        <tr>
            <th style="width: 30%">Оценил</th>
            <td>
                <div class="content-course-cart">
                    <div class="div-image-course-cart" style="width: 40px; height: 40px;">
                        <img src="{{ PhotoStorage::getProfileAvatar($zadanie->responseStudents->first()->responseTeacher->user) }}">
                    </div>
                    <div class="div-name-prepod-course-cart">
                        <p class="name-prepod-course-cart" style="color: black;">
                            {{ $zadanie->responseStudents->first()->responseTeacher->user->fio }}
                        </p>
                    </div>
                </div>
            </td>
        </tr>
        <tr>
            <th>Ответ добавлен</th>
            <td>{{ $zadanie->getDateIsoFormat($zadanie->responseStudents->first()->responseTeacher->created_at) }}</td>
        </tr>
        <tr>
            <th>Ответ изменен</th>
            <td>{{ $zadanie->getDateIsoFormat($zadanie->responseStudents->first()->responseTeacher->updated_at) }}</td>
        </tr>
        @if(!empty($zadanie->responseStudents->first()->responseTeacher->comment))
        <tr>
            <th>Комментарий</th>
            <td>
                {!! $zadanie->responseStudents->first()->responseTeacher->comment !!}
            </td>
        </tr>
        @endif
        </tbody>
    </table>
</div>
