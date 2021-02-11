<div id="list-translate" v-show="translateWords.length">
    <ul>
        <li class="word-translate-drpdw">фывфыjjghjgfhjghjhhjghjjgfjgfjgfjfgjhgfjfghjghфывфы</li>
        <li class="word-translate-drpdw">фывфыфывфы</li>
        <li class="word-translate-drpdw">фывфыфывфы</li>
        <li id="add-translate-drpdw">
            <template v-if="!visibleInputWordTranslate">
                    <span id="title-action-drpdw" @click="showInputWordTranslate">
                        <i class="fa fa-plus-circle" aria-hidden="true"></i>
                        Добавить перевод
                    </span>

                <span id="sound-drpdw">
                        <i class="fa fa-volume-up" aria-hidden="true"></i>
                    </span>
            </template>

            <div id="div-new-translate-drpdw" v-if="visibleInputWordTranslate">
                <input type="text" id="input-new-translate-drpdw" v-model="newWord">
                <div id="div-action-new-translate-drpdw">
                    <button class="btn btn-danger" @click="hideInputWordTranslate">Отменить</button>
                    <button class="btn btn-success" :disabled="isDisabled">Добавить</button>
                </div>
            </div>
        </li>
    </ul>
</div>

@push('scripts')
    <script src="{{ asset('js/app/add_new_translate.js') }}"></script>
@endpush
