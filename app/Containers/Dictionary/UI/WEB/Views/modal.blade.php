<div id="btn-dictionary-panel" title="Открыть словарь" v-show="!isShowDictionary" @click="showHideDictionaryForm">
    <div class="count-notice" v-show="countNewWords">
        <span>@{{ countNewWords }}</span>
    </div>
    <i class="fa fa-book" aria-hidden="true"></i>
</div>

<div id="btn-hide-dictionary-form" title="Скрыть словарь" v-show="isShowDictionary" @click="showHideDictionaryForm">
    <i class="fa fa-arrow-right" aria-hidden="true"></i>
</div>

<div id="form-dictionary" v-if="isShowDictionary">
    <nav class="nav nav-pills" id="nav-dictionary">
        <p class="text-sm-center nav-link" :class="nav_class_current" @click="showCurrentWords">Текущие</p>
        <p class="text-sm-center nav-link" :class="nav_class_dictionary" @click="showMainDictionary">Словарь</p>
    </nav>

    <ul id="list-words">
        <li class="item-list-words">
            <span class="sound-word-dictionary-form" title="Прослушать">
                <i class="fa fa-volume-up" aria-hidden="true"></i>
            </span>
            <p>
                <span class="eng-word-dictionary-form">hello&nbsp;&mdash;</span>
                <span class="translate-word-dictionary-form">привет</span>
            </p>
            <span class="remove-word-dictionary-form" title="Удалить">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </span>
        </li>
        <li class="item-list-words">
            <span class="sound-word-dictionary-form" title="Прослушать">
                <i class="fa fa-volume-up" aria-hidden="true"></i>
            </span>
            <p>
                <span class="eng-word-dictionary-form">hello&nbsp;&mdash;</span>
                <span class="translate-word-dictionary-form">привет</span>
            </p>
            <span class="remove-word-dictionary-form" title="Удалить">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </span>
        </li>
        <li class="item-list-words">
            <span class="sound-word-dictionary-form" title="Прослушать">
                <i class="fa fa-volume-up" aria-hidden="true"></i>
            </span>
            <p>
                <span class="eng-word-dictionary-form">hello&nbsp;&mdash;</span>
                <span class="translate-word-dictionary-form">привет</span>
            </p>
            <span class="remove-word-dictionary-form" title="Удалить">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </span>
        </li>
        <li class="item-list-words">
            <span class="sound-word-dictionary-form" title="Прослушать">
                <i class="fa fa-volume-up" aria-hidden="true"></i>
            </span>
            <p>
                <span class="eng-word-dictionary-form">hello&nbsp;&mdash;</span>
                <span class="translate-word-dictionary-form">привет</span>
            </p>
            <span class="remove-word-dictionary-form" title="Удалить">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </span>
        </li>
        <li class="item-list-words">
            <span class="sound-word-dictionary-form" title="Прослушать">
                <i class="fa fa-volume-up" aria-hidden="true"></i>
            </span>
            <p>
                <span class="eng-word-dictionary-form">hello&nbsp;&mdash;</span>
                <span class="translate-word-dictionary-form">привет</span>
            </p>
            <span class="remove-word-dictionary-form" title="Удалить">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </span>
        </li>
        <li class="item-list-words">
            <span class="sound-word-dictionary-form" title="Прослушать">
                <i class="fa fa-volume-up" aria-hidden="true"></i>
            </span>
            <p>
                <span class="eng-word-dictionary-form">hello&nbsp;&mdash;</span>
                <span class="translate-word-dictionary-form">привет</span>
            </p>
            <span class="remove-word-dictionary-form" title="Удалить">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </span>
        </li>
        <li class="item-list-words">
            <span class="sound-word-dictionary-form" title="Прослушать">
                <i class="fa fa-volume-up" aria-hidden="true"></i>
            </span>
            <p>
                <span class="eng-word-dictionary-form">hello&nbsp;&mdash;</span>
                <span class="translate-word-dictionary-form">привет</span>
            </p>
            <span class="remove-word-dictionary-form" title="Удалить">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </span>
        </li>
        <li class="item-list-words">
            <span class="sound-word-dictionary-form" title="Прослушать">
                <i class="fa fa-volume-up" aria-hidden="true"></i>
            </span>
            <p>
                <span class="eng-word-dictionary-form">hello&nbsp;&mdash;</span>
                <span class="translate-word-dictionary-form">привет</span>
            </p>
            <span class="remove-word-dictionary-form" title="Удалить">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </span>
        </li>
        <li class="item-list-words">
            <span class="sound-word-dictionary-form" title="Прослушать">
                <i class="fa fa-volume-up" aria-hidden="true"></i>
            </span>
            <p>
                <span class="eng-word-dictionary-form">hello&nbsp;&mdash;</span>
                <span class="translate-word-dictionary-form">привет</span>
            </p>
            <span class="remove-word-dictionary-form" title="Удалить">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </span>
        </li>
        <li class="item-list-words">
            <span class="sound-word-dictionary-form" title="Прослушать">
                <i class="fa fa-volume-up" aria-hidden="true"></i>
            </span>
            <p>
                <span class="eng-word-dictionary-form">hello&nbsp;&mdash;</span>
                <span class="translate-word-dictionary-form">привет</span>
            </p>
            <span class="remove-word-dictionary-form" title="Удалить">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </span>
        </li>
        <li class="item-list-words">
            <span class="sound-word-dictionary-form" title="Прослушать">
                <i class="fa fa-volume-up" aria-hidden="true"></i>
            </span>
            <p>
                <span class="eng-word-dictionary-form">hello&nbsp;&mdash;</span>
                <span class="translate-word-dictionary-form">привет</span>
            </p>
            <span class="remove-word-dictionary-form" title="Удалить">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </span>
        </li>
        <li class="item-list-words">
            <span class="sound-word-dictionary-form" title="Прослушать">
                <i class="fa fa-volume-up" aria-hidden="true"></i>
            </span>
            <p>
                <span class="eng-word-dictionary-form">hello&nbsp;&mdash;</span>
                <span class="translate-word-dictionary-form">привет</span>
            </p>
            <span class="remove-word-dictionary-form" title="Удалить">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </span>
        </li>
        <li class="item-list-words">
            <span class="sound-word-dictionary-form" title="Прослушать">
                <i class="fa fa-volume-up" aria-hidden="true"></i>
            </span>
            <p>
                <span class="eng-word-dictionary-form">hello&nbsp;&mdash;</span>
                <span class="translate-word-dictionary-form">привет</span>
            </p>
            <span class="remove-word-dictionary-form" title="Удалить">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </span>
        </li>
        <li class="item-list-words">
            <span class="sound-word-dictionary-form" title="Прослушать">
                <i class="fa fa-volume-up" aria-hidden="true"></i>
            </span>
            <p>
                <span class="eng-word-dictionary-form">hello&nbsp;&mdash;</span>
                <span class="translate-word-dictionary-form">привет</span>
            </p>
            <span class="remove-word-dictionary-form" title="Удалить">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </span>
        </li>
        <li class="item-list-words">
            <span class="sound-word-dictionary-form" title="Прослушать">
                <i class="fa fa-volume-up" aria-hidden="true"></i>
            </span>
            <p>
                <span class="eng-word-dictionary-form">hello&nbsp;&mdash;</span>
                <span class="translate-word-dictionary-form">привет</span>
            </p>
            <span class="remove-word-dictionary-form" title="Удалить">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </span>
        </li>
        <li class="item-list-words">
            <span class="sound-word-dictionary-form" title="Прослушать">
                <i class="fa fa-volume-up" aria-hidden="true"></i>
            </span>
            <p>
                <span class="eng-word-dictionary-form">hello&nbsp;&mdash;</span>
                <span class="translate-word-dictionary-form">привет</span>
            </p>
            <span class="remove-word-dictionary-form" title="Удалить">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </span>
        </li>
        <li class="item-list-words">
            <span class="sound-word-dictionary-form" title="Прослушать">
                <i class="fa fa-volume-up" aria-hidden="true"></i>
            </span>
            <p>
                <span class="eng-word-dictionary-form">hello&nbsp;&mdash;</span>
                <span class="translate-word-dictionary-form">привет</span>
            </p>
            <span class="remove-word-dictionary-form" title="Удалить">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </span>
        </li>
        <li class="item-list-words">
            <span class="sound-word-dictionary-form" title="Прослушать">
                <i class="fa fa-volume-up" aria-hidden="true"></i>
            </span>
            <p>
                <span class="eng-word-dictionary-form">hello&nbsp;&mdash;</span>
                <span class="translate-word-dictionary-form">привет</span>
            </p>
            <span class="remove-word-dictionary-form" title="Удалить">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </span>
        </li>
        <li class="item-list-words">
            <span class="sound-word-dictionary-form" title="Прослушать">
                <i class="fa fa-volume-up" aria-hidden="true"></i>
            </span>
            <p>
                <span class="eng-word-dictionary-form">hello&nbsp;&mdash;</span>
                <span class="translate-word-dictionary-form">привет</span>
            </p>
            <span class="remove-word-dictionary-form" title="Удалить">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </span>
        </li>
        <li class="item-list-words">
            <span class="sound-word-dictionary-form" title="Прослушать">
                <i class="fa fa-volume-up" aria-hidden="true"></i>
            </span>
            <p>
                <span class="eng-word-dictionary-form">hello&nbsp;&mdash;</span>
                <span class="translate-word-dictionary-form">привет</span>
            </p>
            <span class="remove-word-dictionary-form" title="Удалить">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </span>
        </li>
        <li class="item-list-words">
            <span class="sound-word-dictionary-form" title="Прослушать">
                <i class="fa fa-volume-up" aria-hidden="true"></i>
            </span>
            <p>
                <span class="eng-word-dictionary-form">hello&nbsp;&mdash;</span>
                <span class="translate-word-dictionary-form">привет</span>
            </p>
            <span class="remove-word-dictionary-form" title="Удалить">
                <i class="fa fa-trash" aria-hidden="true"></i>
            </span>
        </li>
    </ul>
</div>

@push('scripts')
    <script>
        var dictionaryComponent = {
            data: {
                isShowDictionary: false,
                nav_class_current: 'active',
                nav_class_dictionary: 'disactive',
                countNewWords: 0
            },
            methods: {
                showHideDictionaryForm: function(){
                    this.isShowDictionary = this.isShowDictionary ? false : true;
                },
                showCurrentWords: function(){
                    this.nav_class_current = 'active';
                    this.nav_class_dictionary = 'disactive';
                },
                showMainDictionary: function(){
                    this.nav_class_current = 'disactive';
                    this.nav_class_dictionary = 'active';
                }
            }
        };

        mixins.push(dictionaryComponent);
    </script>
@endpush
