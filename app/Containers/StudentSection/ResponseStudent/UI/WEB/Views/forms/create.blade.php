<div class="form mt-3">
    <div class="d-flex justify-content-center">
        <h2>Добавление ответа</h2>
    </div>

    <div class="mt-4">
        <h5>Комментарий</h5>
        <textarea class="ckeditor-textarea" name="comment" @mouseover.once="bCkeditor"></textarea>
    </div>

    <div class="mt-4">
        <h5>Прикрепленные файлы</h5>

        <table border="1" class="table-hover mt-2 table-list-files" v-if="files.length > 0">
            <thead>
            <tr>
                <th>№</th>
                <th>Название</th>
                <th>Размер</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="(file, indexFile) in files">
                    <td>@{{ indexFile + 1 }}</td>
                    <td class="text-left">
                        <img class="table-list-radanie-file-icon" style="width: 30px;" :src="file.icon" alt="">
                        <span>@{{ file.title }}</span>
                    </td>
                    <td>@{{ file.size }}</td>
                    <td>
                        <i class="fa fa-times" aria-hidden="true" @click="deleteFile($event, indexFile)"></i>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <input type="file" style="height: auto;" @change="uploadFile($event)" class="form-control">
    </div>

    <div class="mt-4 d-flex justify-content-end">
        <button class="btn btn-danger" style="margin-right: 10px" @click="changeForm('show')">Отмена</button>
        <button class="btn btn-primary" @click="addResponse" :disabled="isInvalidData ? 'disabled' : null">Сохранить</button>
    </div>
</div>
