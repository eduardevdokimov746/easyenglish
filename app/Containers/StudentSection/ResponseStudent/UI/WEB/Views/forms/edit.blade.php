<div class="form mt-3">
    <div class="d-flex justify-content-center">
        <h2>Редактирование ответа</h2>
    </div>

    <div class="mt-4">
        <h5>Комментарий</h5>
        <textarea class="ckeditor-textarea" id="edit-comment" @mouseover.once="bCkeditor" name="comment">@{{ zadanie.response_students[0] ? zadanie.response_students[0].comment : '' }}</textarea>
    </div>

    <div class="mt-4">
        <h5>Прикрепленные файлы</h5>
        <table class="table-hover mt-2 table-list-files" border="1" v-if="filesShow().length > 0">
            <thead>
            <tr>
                <th>№</th>
                <th>Название</th>
                <th>Размер</th>
                <th>Удалить</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(file, indexFile) in filesShow()">
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
        <button class="btn btn-primary" @click="updateResponse" :disabled="isInvalidData ? 'disabled' : null">Сохранить</button>
    </div>
</div>
