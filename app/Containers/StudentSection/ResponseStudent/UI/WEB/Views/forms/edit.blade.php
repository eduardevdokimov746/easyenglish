<div class="form mt-3">
    <div class="d-flex justify-content-center">
        <h2>Редактирование ответа</h2>
    </div>

    <div class="mt-4">
        <textarea class="ckeditor-textarea"></textarea>
    </div>

    <div class="row mt-4" style="display: none">
        <div class="col">
            <h5>Прикрепленные файлы</h5>
            <table border="1" class="table-hover mt-2 table-list-files">
                <thead>
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Размер</th>
                    <th>Скачать</th>
                    <th>Удалить</th>
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
                    <td>
                        <i aria-hidden="true" class="fa fa-download"></i>
                    </td>
                    <td>
                        <i aria-hidden="true" class="fa fa-times"></i>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-4">
        <input type="file" style="height: auto;" class="form-control">
    </div>

    <div class="mt-4 d-flex justify-content-end">
        <button class="btn btn-danger" style="margin-right: 10px" @click="changeForm('show')">Отмена</button>
        <button class="btn btn-primary">Сохранить</button>
    </div>
</div>
