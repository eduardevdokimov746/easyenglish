<div class="form mt-3">
    <div class="d-flex justify-content-center">
        <h2>Результат</h2>
    </div>

    <table class="mt-3 table table-striped table-hover">
        <tbody>
        <tr>
            <th style="width: 30%">Начало</th>
            <td>Вторник, 29 июня 2021, 00:00</td>
        </tr>
        <tr>
            <th>Окончание</th>
            <td>Вторник, 29 июня 2021, 00:00</td>
        </tr>
        <tr>
            <th>Прошло времени</th>
            <td>20 сек</td>
        </tr>
        <tr>
            <th>Ответов</th>
            <td>10 из 10</td>
        </tr>
        <tr>
            <th>Оценка</th>
            <td>10 из 10</td>
        </tr>
        <tr>
            <th>Комментарий</th>
            <td>Комментарий добавленный преподавателем после прохождения теста</td>
        </tr>
        </tbody>
    </table>

    <div class="mt-3">
        <label class="width-max">
            Оценка
            <input type="text" class="form-control" value="10/10">
        </label>
    </div>

    <div class="mt-3">
        <label class="width-max">
            Комментарий
            <input type="text" class="form-control">
        </label>
    </div>

    <div class="d-flex justify-content-end">
        <button class="btn btn-danger" @click="changeActiveForm('show')" style="margin-right: 10px">Отмена</button>
        <button class="btn btn-primary">Сохранить</button>
    </div>
</div>
