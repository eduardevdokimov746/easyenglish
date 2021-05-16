<div class="form mt-3">
    <div class="d-flex justify-content-center">
        <h2>Форма ответа</h2>
    </div>

    <table class="mt-3 table table-striped table-hover">
        <tbody>
        <tr>
            <th style="width: 30%">
                Оценка
            </th>
            <td>
                {!! !is_null($response->responseTeacher) && $response->responseTeacher->is_credited == 1 ? $response->responseTeacher->result : '&mdash;' !!}
            </td>
        </tr>
        <tr>
            <th>Состояние оценивания</th>
            <td>{{ $response->type }}</td>
        </tr>
        <tr>
            <th>Ответ добавлен</th>
            <td>{!! !is_null($response->responseTeacher) ? $response->getDateIsoFormat($response->responseTeacher->created_at) : '&mdash;' !!}</td>
        </tr>
        <tr>
            <th>Ответ изменен</th>
            <td>{!! !is_null($response->responseTeacher) ? $response->getDateIsoFormat($response->responseTeacher->updated_at) : '&mdash;' !!}</td>
        </tr>
        </tbody>
    </table>

    @if(is_null($response->responseTeacher) && !empty($response->responseTeacher))
    <div class="row mt-4">
        <div class="col">
            <h5>Комментарий</h5>
            <div>{!! $response->responseTeacher->comment !!}</div>
        </div>
    </div>
    @endif

    <div class="d-flex justify-content-end">
        @if(is_null($response->responseTeacher))
            <button class="btn btn-primary" @click="changeForm('create')">Добавить ответ</button>
        @else
            <button class="btn btn-info"  @click="changeForm('edit')">Редактировать</button>
        @endif
    </div>
</div>
