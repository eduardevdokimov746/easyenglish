<div class="form mt-3">
    <div class="d-flex justify-content-center">
        <h2>Форма ответа</h2>
    </div>

    <table class="mt-3 table table-striped table-hover">
        <tbody>
        <tr>
            <th style="width: 30%">Состояние ответа на задание</th>
            <td>Ответ не отправлен</td>
        </tr>
        <tr>
            <th>Состояние оценивания</th>
            <td>Не оценено</td>
        </tr>
        <tr>
            <th>Крайний срок сдачи</th>
            <td>Вторник, 29 июня 2021, 00:00</td>
        </tr>
        <tr>
            <th>Ответ добавлен</th>
            <td>Вторник, 12 января 2021, 17:48</td>
        </tr>
        <tr>
            <th>Ответ изменен</th>
            <td>Вторник, 12 января 2021, 17:48</td>
        </tr>
        </tbody>
    </table>

    <div class="row mt-4">
        <div class="col">
            <h5>Комментарий</h5>
            <div>Какой-то комментарий</div>
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

    <div class="d-flex justify-content-end">
        <button class="btn btn-primary" @click="changeForm('create')">Добавить ответ</button>
        <button class="btn btn-info" style="display: none" @click="changeForm('edit')">Редактировать</button>
    </div>
</div>
