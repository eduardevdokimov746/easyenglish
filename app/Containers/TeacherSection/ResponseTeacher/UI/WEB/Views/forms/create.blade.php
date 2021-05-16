<div class="form mt-3">
    <div class="d-flex justify-content-center">
        <h2>Добавление ответа</h2>
    </div>

    <div class="mt-4">
        <h5>
        <label>Зачтено
            <input type="checkbox" v-model="is_credited">
        </label>
        </h5>
    </div>

    <div class="mt-4">
        <h5>Оценка</h5>
        <input type="text" class="form-control" :class="{'is-invalid' : isInvalidResult}" v-model="result" :disabled="!is_credited">
        <div class="invalid-feedback">
            {{ __('ship::validation.required', ['attribute' => __('ship::attributes.result')]) }}
        </div>
    </div>

    <div class="mt-4">
        <h5>Комментарий</h5>
        <textarea class="ckeditor-textarea" name="comment">@{{ comment }}</textarea>
    </div>

    <div class="mt-4 d-flex justify-content-end">
        <button class="btn btn-danger" style="margin-right: 10px" @click="changeForm('show')">Отмена</button>
        <button class="btn btn-primary" @click="addResponse" :disabled="!isInvalidResult ? null : 'disabled'">Сохранить</button>
    </div>
</div>
