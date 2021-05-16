<div id="btn-chat-panel" v-show="!isShowChat" @click="showHideChat">
    <div class="count-notice" v-show="countNotice != 0">
        <span>@{{ countNotice }}</span>
    </div>

    <i class="fa fa-commenting-o" aria-hidden="true"></i>
</div>

<div id="btn-hide-chat-form" v-show="isShowChat" @click="showHideChat">
    <i class="fa fa-arrow-right" aria-hidden="true"></i>
</div>

<div id="form-chat" v-show="isShowChat">
    <div id="head">
        <!-- КНОПКИ ПОЧТЫ и ЗВУКА ТОЛЬКО НА ГЛАВНОЙ СТРАНИЦЕ -->
        <div v-show="!isVisibleDialogWithUser">
            <!-- КНОПКИ НА ГЛАВНОЙ ФОРМЕ ЧАТА -->
            <button class="btn btn-primary btn-work-with-group" @click="showHideCreateChatGroupForm" v-show="!isVisibleCreateChatGroupForm">Создать беседу</button>
            <button class="btn btn-danger btn-work-with-group" @click="showHideCreateChatGroupForm" v-show="isVisibleCreateChatGroupForm">Отменить создание</button>
            <!-- КНОПКИ НА ГЛАВНОЙ ФОРМЕ ЧАТА -->
            <ul class="list-btn-settings">
                <li title="Письма на почту (вкл)">
                    <button class="btn-chat-setting-form active-btn"><i class="fa fa-envelope" aria-hidden="true"></i></button>
                </li>
                <li title="Звук (выкл)">
                    <button class="btn-chat-setting-form disactive-btn"><i class="fa fa-volume-up" aria-hidden="true"></i></button>
                </li>
            </ul>
        </div>
        <!-- КНОПКИ ПОЧТЫ и ЗВУКА ТОЛЬКО НА ГЛАВНОЙ СТРАНИЦЕ -->

        <!-- СТРОКА СОЗДАНИЯ БЕСЕДЫ БУДЕТ НА ГЛАВНОЙ ФОРМЕ ЧАТА -->
        <div class="mt-2 input-group" id="form-create-group" v-show="isVisibleCreateChatGroupForm">
            <input type="text" class="form-control" placeholder="Название беседы" v-model="titleNewChatGroup">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button" :disabled="isDisabledBtnCreateChatGroup">Создать</button>
            </div>
        </div>
        <!-- СТРОКА СОЗДАНИЯ БЕСЕДЫ БУДЕТ НА ГЛАВНОЙ ФОРМЕ ЧАТА -->

        <!--СТРОКА ПОИСКА НА ГЛАВНОЙ СТРАНИЦЕ ЧАТА -->
        <div class="mt-2 input-group" v-show="!isVisibleDialogWithUser">
            <input type="text" class="form-control" v-model="queryString" @keyup="findUsersAction" placeholder="Найти пользователя...">
        </div>
        <!--СТРОКА ПОИСКА НА ГЛАВНОЙ СТРАНИЦЕ ЧАТА -->

        <!-- ВЫПАДАЮШИЙ СПИСОК ВЫДЕЛЕННЫХ ПОЛЬЗОВАТЕЛЕЙ ДЛЯ СОЗДАНИЯ БЕСЕДЫ -->
        <div class="mt-2 list-selected-users" v-show="isVisibleCreateChatGroupForm">
            <ul>
                <p>Выделенных пользователе: @{{ selectedUsers.length }}
                    <span style="float: right">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </span>
                </p>

                <li v-for="user in selectedUsers">
                    <div class="image-avatar">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <div class="content-item">
                        <p class="name-user">@{{ user.name }}
                            <span class="custom-checkbox" data-active="off" @click="deleteSelectedUser(user.id)">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </span>
                        </p>
                    </div>
                </li>
{{--                <li>--}}
{{--                    <div class="image-avatar">--}}
{{--                        <i class="fa fa-user" aria-hidden="true"></i>--}}
{{--                    </div>--}}
{{--                    <div class="content-item" style="margin-top: 13px">--}}
{{--                        <p class="name-user">Евдокимов Эдуард Игоревич <span class="custom-checkbox" data-active="off"><i class="fa fa-check" aria-hidden="true" style="display: none"></i></span></p>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <div class="image-avatar">--}}
{{--                        <i class="fa fa-user" aria-hidden="true"></i>--}}
{{--                    </div>--}}
{{--                    <div class="content-item" style="margin-top: 13px">--}}
{{--                        <p class="name-user">Евдокимов Эдуард Игоревич <span class="custom-checkbox" data-active="off"><i class="fa fa-check" aria-hidden="true" style="display: none"></i></span></p>--}}
{{--                    </div>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <div class="image-avatar">--}}
{{--                        <i class="fa fa-user" aria-hidden="true"></i>--}}
{{--                    </div>--}}
{{--                    <div class="content-item" style="margin-top: 13px">--}}
{{--                        <p class="name-user">Евдокимов Эдуард Игоревич <span class="custom-checkbox" data-active="off"><i class="fa fa-check" aria-hidden="true" style="display: none"></i></span></p>--}}
{{--                    </div>--}}
{{--                </li>--}}
            </ul>
        </div>
        <!-- ВЫПАДАЮШИЙ СПИСОК ВЫДЕЛЕННЫХ ПОЛЬЗОВАТЕЛЕЙ ДЛЯ СОЗДАНИЯ БЕСЕДЫ -->

        <div v-if="isVisibleDialogWithUser && !selectedMessagesList.length" class="user-info">
            <div class="head-option-dialog-form">
                <div class="form-prev-dialog-form" @click="hideFormDialog">
                    <span>
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                    </span>
                </div>
                <div class="div-btn-show-options-dialog-form" v-show="typeDialog == 'group'">
                    <button class="btn btn-primary btn-showhide-options-dialog" @click="showHideOptionsChatGroupForm" v-show="!isVisibleOptionsChatGroupForm">Открыть опции</button>
                    <button class="btn btn-danger btn-showhide-options-dialog" @click="showHideOptionsChatGroupForm" v-show="isVisibleOptionsChatGroupForm">Закрыть опции</button>
                </div>
            </div>

            <div class="main-info-sender mt-2" v-show="!isVisibleOptionsChatGroupForm">
                <div class="image-avatar">

                    <img v-if="dialogHeader.img != 'no_image_user.png'" :src="'http://easyenglish.ddns.net/storage/users/profile_avatars/' + dialogHeader.img" alt="" class="user-avatar">

                    <i class="fa fa-user" aria-hidden="true" style="color: #474747;" v-if="dialogHeader.img == 'no_image_user.png'"></i>
            </div>
                <div class="content-item">
                <p class="name-user">@{{ dialogHeader.title }}</p>
                {{--<p class="status">В сети</p>--}}
            </div>
            </div>
        </div>

        <!-- СТРОКА ИЗМЕНЕНИЯ НАЗВАНИЯ БЕСЕДЫ -->
        <div class="mt-2 input-group" id="form-create-group" v-show="isVisibleOptionsChatGroupForm">
            <input type="text" class="form-control" placeholder="Название беседы" v-model="titleNewChatGroup">
            <div class="input-group-append">
                <button class="btn btn-primary" @click="saveOptions" type="button" :disabled="isDisabledBtnCreateChatGroup">Сохранить</button>
            </div>
        </div>
        <!-- СТРОКА ИЗМЕНЕНИЯ НАЗВАНИЯ БЕСЕДЫ -->

        <!--СТРОКА ПОИСКА ДЛЯ ДОБАВЛНЕНИЯ ПОЛЬЗОВАТЕЛЕЙ В ГРУППОВОЙ ЧАТ -->
        <div class="mt-2 input-group" v-show="isVisibleOptionsChatGroupForm">
            <input type="text" class="form-control" v-model="queryString" @keyup="findUsersAction" placeholder="Найти пользователя...">
        </div>
        <!--СТРОКА ПОИСКА ДЛЯ ДОБАВЛНЕНИЯ ПОЛЬЗОВАТЕЛЕЙ В ГРУППОЙВОЙ ЧАТ -->

        <!-- ВЫПАДАЮШИЙ СПИСОК ДОБАВЛЕННЫХ ПОЛЬЗОВАТЕЛЕЙ В ГПУППОВОЙ ЧАТ -->
        <div class="mt-2 list-selected-users" v-show="isVisibleOptionsChatGroupForm">
            <ul>
                <p>Пользователей в чате: @{{ selectedUsers.length }}
                    <span style="float: right">
                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                    </span>
                </p>

                <li v-for="user in selectedUsers">
                    <div class="image-avatar">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>
                    <div class="content-item">
                        <p class="name-user">@{{ user.name }}
                            <span class="custom-checkbox" data-active="off" @click="deleteSelectedUser(user.id)">
                                <i class="fa fa-times" aria-hidden="true"></i>
                            </span>
                        </p>
                    </div>
                </li>
            </ul>
        </div>
        <!-- ВЫПАДАЮШИЙ СПИСОК ДОБАВЛЕННЫХ ПОЛЬЗОВАТЕЛЕЙ В ГПУППОВОЙ ЧАТ -->

        <div v-show="selectedMessagesList.length" class="block-btns-change-msgs">
            <button class="btn btn-secondary" id="btn-remove" @click="showModalDeleteMessages">Удалить</button>
            <button class="btn btn-secondary" id="btn-change" v-show="isShowBtnRewriteMessage" @click="rewriteMessageAction" :disabled="isDisabledBtnRewriteMessage" title="Можно редактировать только одно свое сообщение в течении часа после отправки">Редактировать</button>
            <button class="btn btn-secondary" id="btn-change" v-show="!isShowBtnRewriteMessage" @click="rewriteMessageSend" :disabled="isDisabledBtnSendRewriteMsg">Сохранить</button>
            <button class="btn btn-danger" v-show="!isShowBtnRewriteMessage" @click="cancelRewriteMessageAction" id="btn-cancel-change">Отмена</button>
        </div>

    </div>
    <div id="body">

        <!-- СПИСОК ДИАЛОГОВ -->
        <ul class="list-dialog">
            {{--            LI ДЛЯ ОБЫЧНОГО ПОИСКА ПОЛЬЗОВАТЕЛЕЙ--}}
            <li v-for="(user, indexUser) in findUsersList" @click="selectFindUser(indexUser)">
                <div class="image-avatar">
                    <img :src="user.avatar_path" alt="" class="user-avatar" v-if="user.avatar != 'no_image_user.png'">
                    <i class="fa fa-user" v-if="user.avatar == 'no_image_user.png'"></i>
                </div>

                <div class="content-item">
                    <p class="name-user">@{{ user.fio.length <= 0 ? user.login : user.fio }}</p>
                </div>
            </li>

            {{--            LI ДЛЯ ОБЫЧНОГО ПОИСКА ПОЛЬЗОВАТЕЛЕЙ--}}

            {{--            LI ДЛЯ ПОИСКА ДЛЯ СОЗДАНИЯ ГРУППЫ--}}
            {{--<li v-for="user in findUsersForCreateGroup" @click="selectedUser(user.id)">--}}
                {{--<div class="image-avatar">--}}
                    {{--<i class="fa fa-user" aria-hidden="true"></i>--}}
                {{--</div>--}}
                {{--<div class="content-item">--}}
                    {{--<p class="name-user">@{{ user.name }}--}}
                        {{--<span class="custom-checkbox" :class="{'custom-checkbox-checked': user.isSelected}">--}}
                            {{--<i class="fa fa-check" aria-hidden="true" v-show="user.isSelected"></i>--}}
                        {{--</span>--}}
                    {{--</p>--}}

                {{--</div>--}}
            {{--</li>--}}
            {{--            LI ДЛЯ ПОИСКА ДЛЯ СОЗДАНИЯ ГРУППЫ--}}

            <template v-if="isShowListDialogs">
                {{--LI ДИАЛОГА ГРУППЫ--}}

                <li :class="{'new-message-dialog': dialog.isset_new_msg}" v-for="(dialog, indexDialog) in dialogs" @click="showDialog(indexDialog)" :key="dialog.hash">

                    <div class="image-avatar-group" v-if="dialog.type == 'group'">
                        <i class="fa fa-users" aria-hidden="true"></i>
                    </div>

                    <div class="image-avatar" v-if="dialog.type == 'dialog' && dialog.is_default_avatar == 0">
                        <img :src="dialog.img" alt="" class="user-avatar">
                    </div>

                    <div class="image-avatar" v-if="dialog.type == 'dialog' && dialog.is_default_avatar == 1">
                        <i class="fa fa-user" aria-hidden="true"></i>
                    </div>

                    <div class="content-item">
                        <div class="title-message-content-dialogs">
                            <p class="name-message-dialogs">
                                @{{ dialog.title }}
                            </p>
                        </div>

                        <div class="div-body-message-content-dialogs">
                            <p class="body-message-dialogs">
                                <b class="sender" v-if="dialog.last_msg !== undefined && dialog.last_msg.sender == 'my'">Вы:</b>
                                <span v-show="!dialog.isWriting">@{{ dialog.last_msg !== undefined ? dialog.last_msg.msg : ''}}</span>

                                <span v-show="dialog.isWriting">
                                    Набирает сообщение
                                    <object type="image/svg+xml" data="{{ asset('images/826.svg') }}" style="width: 20px; vertical-align: middle;">
                                        Your browser does not support SVG
                                    </object>
                                </span>
                            </p>

                            <p class="count-notice-message-dialogs" v-if="dialog.isset_new_msg">
                                @{{ dialog.new_msg_count }}
                            </p>
                        </div>
                    </div>
                </li>

                {{--LI ДИАЛОГА ГРУППЫ--}}

                {{--LI ДИАЛОГА С ПОЛЬЗОВАТЕЛЕМ--}}
                {{--<li>--}}
                    {{--<div class="image-avatar">--}}
                        {{--<img src="{{ asset('images/1.jpg') }}" alt="" class="user-avatar">--}}
                    {{--</div>--}}
                    {{--<div class="content-item">--}}
                        {{--<p class="name-user">Евдокимов Эдуард Игоревич <span class="time-last-msg">1 час</span></p>--}}
                        {{--<p class="last-msg"><b class="sender">Вы:</b> Добро пожаловать на сайт</p>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--LI ДИАЛОГА С ПОЛЬЗОВАТЕЛЕМ--}}

                {{--LI ДИАЛОГА С ПОЛЬЗОВАТЕЛЕМ БЕЗ АВАТАРКИ--}}
                {{--<li>--}}
                    {{--<div class="image-avatar">--}}
                        {{--<i class="fa fa-user" aria-hidden="true"></i>--}}
                    {{--</div>--}}
                    {{--<div class="content-item">--}}
                        {{--<p class="name-user">Евдокимов Эдуард Игоревич <span class="time-last-msg">1 час</span></p>--}}
                        {{--<p class="last-msg"><b class="sender">Вы:</b> Добро пожаловать на сайт</p>--}}
                    {{--</div>--}}
                {{--</li>--}}
                {{--LI ДИАЛОГА С ПОЛЬЗОВАТЕЛЕМ БЕЗ АВАТАРКИ--}}
            </template>
        </ul>
        <!-- СПИСОК ДИАЛОГОВ -->

        {{--СООБЩЕНИЯ--}}
        <ul style="padding: 10px;"
            class="list-msgs"
            v-show="isVisibleDialogWithUser && !isVisibleOptionsChatGroupForm">

            <div v-for="(msg, indexMsg) in messages" style="display: contents;">
                <li class="msg">
                    <div class="div-watched-message-icon" v-if="msg.user_id == auth_id && isLastMyMessages(indexMsg)">
                        <i class="fa fa-check-circle-o watch-message-icon" aria-hidden="true" v-if="!msg.is_checked" title="Доставленно"></i>
                        <i class="fa fa-check-circle watch-message-icon" aria-hidden="true" v-if="msg.is_checked" title="Просмотренно"></i>
                    </div>

                    <div class="msg-content"
                         :class="[msg.user_id == auth_id ? 'my-msg' : 'sender-msg', {'selected-msg' : msg.isSelected}]"
                         @click="selectMessage(msg.id)"
                         :data-selected="msg.isSelected"
                    >
                        <div class="head">
                            <p>@{{ getUser(msg.user_id).name }}<span>@{{ msg.time }}</span></p>
                        </div>

                        <div v-if="msg.type == 'simple'">
                            @{{ msg.content }}
                        </div>

                        <div class="msg-body" v-if="msg.type == 'file'">
                            <p style="font-size: 1.1em">
                                <a href="#">
                                    <i class="fa fa-file" style="font-size: 1.5em" aria-hidden="true"></i>
                                    <span>file.txt</span>
                                    <span>220kb</span>
                                </a>
                            </p>
                        </div>
                    </div>
                </li>

                <li class="databox" v-if="issetDataBox(msg.id)">
                    @{{ getDataBox(msg.id).date }}
                </li>

            </div>


            {{--<li data-check="off" class="msg">--}}
                {{--<div class="msg-content sender-msg">--}}
                    {{--<div class="head">--}}
                        {{--<p>Евдокимов Эдуард Игоревич <span>15:32</span></p>--}}
                    {{--</div>--}}
                    {{--<div class="msg-body">--}}
                        {{--<p style="font-size: 1.1em">--}}
                            {{--<a href="#">--}}
                                {{--<i class="fa fa-file" style="font-size: 1.5em" aria-hidden="true"></i>--}}
                                {{--<span>file.txt</span>--}}
                                {{--<span>220kb</span>--}}
                            {{--</a>--}}
                        {{--</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</li>--}}

            {{--<li data-check="off" class="msg">--}}
                {{--<div class="msg-content my-msg">--}}
                    {{--<div class="head">--}}
                        {{--<p>Евдокимов Эдуард Игоревич <span>15:32</span></p>--}}
                    {{--</div>--}}
                    {{--<div class="msg-body">--}}
                        {{--<p style="font-size: 1.1em">--}}
                            {{--<a href="#">--}}
                                {{--<i class="fa fa-file" style="font-size: 1.5em" aria-hidden="true"></i>--}}
                                {{--<span>file.txt</span>--}}
                                {{--<span>220kb</span>--}}
                            {{--</a>--}}
                        {{--</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</li>--}}

            <li id="info-writing-msg" style="text-align: center" v-show="isFriendWriting">
                <p style="font-size: .7em;">@{{ userWriting }} набирает сообщение
                    <object type="image/svg+xml" data="{{ asset('images/826.svg') }}" style="width: 20px; vertical-align: middle;">
                        Your browser does not support SVG
                    </object>
                </p>
            </li>

        </ul>
        {{--СООБЩЕНИЯ--}}
    </div>

    {{--    ФОРМА НАБОРА СООБЩЕНИЯ--}}
    <div id="footer" v-show="isVisibleDialogWithUser && !isVisibleOptionsChatGroupForm">
        <div class="textarea-box">
            <textarea rows="5" placeholder="Введите сообщение..." v-model="messageTextarea" @focus="focusTextarea"></textarea>
        </div>
        <div class="box-message-bnts">
            <p class="btn-message-form" id="upload-file" title="Прикрепить файл" @click="showModalUploadFileChat">
                <i class="fa fa-paperclip" aria-hidden="true"></i>
            </p>
            <p class="btn-message-form" title="Отправить" @click="sendMsg">
                <i class="fa fa-share" aria-hidden="true"></i>
            </p>
        </div>
    </div>
    {{--    ФОРМА НАБОРА СООБЩЕНИЯ--}}

</div>

<!-- МОДАЛЬНОЕ ОКНО УДАЛЕНИЯ СООБЩЕНИЯ ИЗ ЧАТА -->
<div class="modal"  id="modal-delete-msgs-chat" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Удаление сообщений</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Вы не сможете вернуть удаленные сообщения</p>
                <label title="Удалять для всех можно только свои сообшения, и если они не были прочитаны собеседниками">
                    <input :disabled="isDisabledCheckboxDeleteMsgForAllUsers" type="checkbox"> Удалить для всех
                </label>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Удалить</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
            </div>
        </div>
    </div>
</div>
<!-- МОДАЛЬНОЕ ОКНО УДАЛЕНИЯ СООБЩЕНИЯ ИЗ ЧАТА -->

<!-- МОДАЛЬНОЕ ОКНО ЗАГРУЗКИ ФАЙЛА В ЧАТЕ -->
<div class="modal" id="modal-upload-file-chat" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Загрузите файл</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="file">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Загрузить</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Отмена</button>
            </div>
        </div>
    </div>
</div>
<!-- МОДАЛЬНОЕ ОКНО ЗАГРУЗКИ ФАЙЛА В ЧАТЕ -->

@push('scripts')
    <script>
        var token = '{{ csrf_token() }}';
        var errorMsg = '{{ __('ship::validation.error-server') }}';

        var notice = new Howl({
            src: "{{ asset('notice.mp3') }}"
        });

        function changeHeightBodyChatForm(isFromDialog){
            var height = $('#head').height() + 20;
            console.log(height);
            if(isFromDialog){
                height += 128;
            }
            console.log(height);
            $('#body').css('height', 'calc(100vh - ' + height + 'px)');
        }

        var listDialogsChatComponent = {
            data: {
                dialogs: [
                    // {
                    //     'id': 1,
                    //     'name': 'Василий Пупкин',
                    //     'message': 'Добро пожаловать на сайт'
                    // },
                    // {
                    //     'id': 2,
                    //     'name': 'Василий Пупкин',
                    //     'message': 'Добро пожаловать на сайт'
                    // },
                    // {
                    //     'id': 3,
                    //     'name': 'Василий Пупкин',
                    //     'message': 'Добро пожаловать на сайт'
                    // },
                    // {
                    //     'id': 4,
                    //     'name': 'Василий Пупкин',
                    //     'message': 'Добро пожаловать на сайт'
                    // },

                ],
            },
            computed: {
                isShowListDialogs: function(){
                    return !this.isVisibleCreateChatGroupForm && !this.isVisibleDialogWithUser && this.findUsersList.length == 0;
                },
            }
        };

        var groupChatComponent = {
            data: {
                isVisibleCreateChatGroupForm: false,
                isVisibleOptionsChatGroupForm: false,
                selectedUsers: [],
                findUsersForCreateGroup: [],
                titleNewChatGroup: '',
            },
            methods: {
                showHideCreateChatGroupForm: function(){
                    this.isVisibleCreateChatGroupForm = this.isVisibleCreateChatGroupForm ? false : true;
                    this.queryString = '';

                    if(this.isVisibleCreateChatGroupForm){
                        this.findUsersList = [];
                        $('#form-chat #head').css('height', '200px');
                    }else{
                        this.selectedUsers = [];
                        this.findUsersForCreateGroup = [];
                        $('#form-chat #head').css('height', '92px');
                    }

                    changeHeightBodyChatForm();
                },
                selectedUser: function(user_id){
                    var selectedUser = this.findUsersForCreateGroup[_.findIndex(this.findUsersForCreateGroup, {'id' : user_id})];

                    if(selectedUser.isSelected){
                        selectedUser.isSelected = false;
                        var selectedIndex = _.findIndex(this.selectedUsers, {'id' : user_id});
                        this.selectedUsers.splice(selectedIndex, 1);
                        return;
                    }
                    selectedUser.isSelected = true;
                    this.selectedUsers.push(selectedUser);
                },
                deleteSelectedUser: function(user_id){
                    var selectedIndex = _.findIndex(this.selectedUsers, {'id' : user_id});
                    this.selectedUsers.splice(selectedIndex, 1);
                    var index = _.findIndex(this.findUsersForCreateGroup, {'id': user_id})
                    if(index >= 0){
                        this.findUsersForCreateGroup[index].isSelected = false;
                    }
                },
                showHideOptionsChatGroupForm: function(){
                    this.isVisibleOptionsChatGroupForm = this.isVisibleOptionsChatGroupForm ? false : true;
                    this.queryString = '';

                    if(this.isVisibleOptionsChatGroupForm){
                        this.findUsersList = [];
                        this.selectedUsers = this.usersDialog;
                        $('#form-chat #head').css('height', '200px');
                    }else{
                        this.selectedUsers = [];
                        this.findUsersForCreateGroup = [];
                        $('#form-chat #head').css('height', '102px');
                    }

                    setTimeout(changeHeightBodyChatForm(true), 500);
                },
                saveOptions: function(){
                    //AJAX на изменения группового чата
                    console.log('groupChatComponent::saveOptions');
                }
            },
            computed: {
                isDisabledBtnCreateChatGroup: function(){
                    return isEmptyString(this.titleNewChatGroup);
                }
            }
        };

        var dialogChatComponent = {
            data: {
                auth_id: '{{ \Auth::id() }}',
                dialogHeader: {},
                usersDialog: [
                    // {'id': 1, 'name': 'user 1', 'isSelected': false},
                    // {'id': 2, 'name': 'user 2', 'isSelected': false}
                ],
                isVisibleDialogWithUser: false,
                messages: [
                    // {
                    //     id: 1,
                    //     user_id: 1, // ID отправителя. Определяем тип сообщения (мое, чужое) по id. id == auth_id - мое, иначе чужое
                    //     user_name: 'Евдокимов Эдуард Игоревич',
                    //     body: 'Само сообщение',
                    //     time: '12:42',
                    //     date_time: '2020-11-12 12:42',
                    //     isChanged: false,
                    //     isWatched: true,
                    //     isSelected: false,
                    // },
                    // {
                    //     id: 2,
                    //     user_id: 2, // ID отправителя. Определяем тип сообщения (мое, чужое) по id. id == auth_id - мое, иначе чужое
                    //     user_name: 'Евдокимов Эдуард Игоревич',
                    //     body: 'Само сообщение',
                    //     time: '12:42',
                    //     date_time: '2020-11-12 12:42',
                    //     isChanged: false,
                    //     isWatched: false,
                    //     isSelected: false,
                    // },
                    // {
                    //     id: 3,
                    //     user_id: 3, // ID отправителя. Определяем тип сообщения (мое, чужое) по id. id == auth_id - мое, иначе чужое
                    //     user_name: 'Евдокимов Эдуард Игоревич',
                    //     body: 'Само сообщение',
                    //     time: '12:42',
                    //     date_time: '2020-11-12 12:42',
                    //     isChanged: false,
                    //     isWatched: false,
                    //     isSelected: false,
                    // },{
                    //     id: 4,
                    //     user_id: 1, // ID отправителя. Определяем тип сообщения (мое, чужое) по id. id == auth_id - мое, иначе чужое
                    //     user_name: 'Евдокимов Эдуард Игоревич',
                    //     body: 'Само сообщение',
                    //     time: '12:42',
                    //     date_time: '2021-02-11 12:42',
                    //     isChanged: false,
                    //     isWatched: false,
                    //     isSelected: false,
                    // },
                    // {
                    //     id: 5,
                    //     user_id: 5, // ID отправителя. Определяем тип сообщения (мое, чужое) по id. id == auth_id - мое, иначе чужое
                    //     user_name: 'Евдокимов Эдуард Игоревич',
                    //     body: 'Само сообщение',
                    //     time: '12:42',
                    //     date_time: '2021-11-02 11:42',
                    //     isChanged: false,
                    //     isWatched: false,
                    //     isSelected: false,
                    // }
                ],
                selectedMessagesList: [],
                isDisabledCheckboxDeleteMsgForAllUsers: true,
                isDisabledBtnRewriteMessage: true,
                isShowBtnRewriteMessage: true,
                isDisabledBtnSendRewriteMsg: false,
                messageTextarea: '',
                typeDialog: '',
                dataBoxes: [],
                currentChatHash: ''
            },
            methods: {
                getUser: function(user_id){
                    var indexUser = _.findIndex(this.usersDialog, function(item){
                        return item.id == user_id;
                    });

                    if(indexUser != -1){
                        return this.usersDialog[indexUser];
                    }
                },
                getFriendDialog: function(){
                    return _.find(app.usersDialog, function(item){
                        return item.id != app.auth_id;
                    });
                },
                issetDataBox: function(message_id){
                    return typeof this.dataBoxes[message_id] != "undefined";
                },
                getDataBox: function(message_id){
                    if(this.dataBoxes[message_id] !== null){
                        return this.dataBoxes[message_id];
                    }
                },
                showDialog: function(indexDialog){
                    var chatHash = this.dialogs[indexDialog].hash;
                    this.currentChatHash = chatHash;

                    $.ajax({
                        url: '{{ route('web_chat_show_dialog') }}',
                        data: {'hash': chatHash, '_token': token},
                        method: 'post',
                        success: function(response){
                            var data = JSON.parse(response);
                            console.log(data, data.dialog.data);

                            if (data.dialog.data.type == 'dialog') {
                                app.typeDialog = 'dialog';
                                app.usersDialog = data.dialog.users;
                                app.messages = data.dialog.msgs;

                                var friend = app.getFriendDialog();
                                app.dialogHeader.title = friend.name;
                                app.dialogHeader.img = friend.avatar;
                            }

                            if (data.dataBoxes) {
                                app.dataBoxes = data.dataBoxes;
                            }

                            $('#form-chat #head').css('height', '102px');
                            changeHeightBodyChatForm(true);
                            app.isVisibleDialogWithUser = true;
                            app.scrollDownMessageList();
                            app.checkMessages();
                        },
                        error: function(error){
                            alertDanger(errorMsg);
                        }
                    });
                },
                selectFindUser: function(indexUser){
                    var user_id = this.findUsersList[indexUser].id;

                    $.ajax({
                        url: '{{ route('web_chat_select_find_user') }}',
                        data: {'_token': token, 'user_id': user_id},
                        type: 'post',
                        success: function(response){
                            app.findUsersList = [];

                            console.log(response);
                            var data = JSON.parse(response);

                            app.typeDialog = 'dialog';
                            app.usersDialog = data.dialog.users;
                            app.messages = data.dialog.msgs;
                            app.currentChatHash = data.hash;

                            if (data.dataBoxes) {
                                app.dataBoxes = data.dataBoxes;
                            }

                            var friend = app.getFriendDialog();
                            app.dialogHeader.title = friend.name;
                            app.dialogHeader.img = friend.avatar;

                            $('#form-chat #head').css('height', '102px');
                            changeHeightBodyChatForm(true);
                            app.isVisibleDialogWithUser = true;
                            app.queryString = '';
                        },
                        error: function(error){
                            console.log(error);
                        }
                    });
                },
                hideFormDialog: function(){
                    if(this.isVisibleOptionsChatGroupForm){
                        this.showHideOptionsChatGroupForm();
                    }

                    this.messages = [];
                    this.dataBoxes = [];
                    this.messageTextarea = '';
                    this.usersDialog = [];
                    this.dialogHeader = {};

                    $.ajax({
                        url: '{{ route('web_chat_index') }}',
                        method: 'post',
                        data: {'_token': token},
                        success: function (data) {
                            console.log(JSON.parse(data));
                            app.dialogs = Object.values(JSON.parse(data));

                            app.dialogs.sort(function(k, v){
                                return new Date(v.sort_date) - new Date(k.sort_date);
                            });
                        },
                        error: function (error) {
                            console.log(error);
                        }
                    });

                    this.isVisibleDialogWithUser = false;
                    $('#form-chat #head').css('height', '92px');
                    changeHeightBodyChatForm();
                },
                sendMsg: function(){
                    if(isEmptyString(this.messageTextarea)){
                        return;
                    }

                    var data = {
                        '_token': token,
                        'topic': app.getTopicChat(),
                        'hash': app.currentChatHash,
                        'message': {
                            'user_id': app.auth_id,
                            'type': 'simple',
                            'content': app.messageTextarea,
                        }
                    };

                    $.ajax({
                        url: '{{ route('web_chat_send_message') }}',
                        data: data,
                        type: 'post',
                        success: function(response){
                            console.log(response);

                            var data = JSON.parse(response);

                            app.messages.push(data);

                            app.newMessage();
                            app.scrollDownMessageList();
                            app.messageTextarea = '';
                        },
                        error: function(error){
                            console.log(error);
                            alertDanger(errorMsg);
                        }
                    });
                },
                newMessage: function(friendSender = false){
                    if(friendSender){
                        notice.play();
                    }

                    app.userWriting = '';
                    app.isFriendWriting = false;
                },
                selectMessage: function(msg_id){
                    var indexMessageFromSelectedMsg = _.findIndex(this.selectedMessagesList, {'id': msg_id});

                    if(indexMessageFromSelectedMsg >= 0){
                        this.selectedMessagesList[indexMessageFromSelectedMsg].isSelected = false;
                        this.selectedMessagesList.splice(indexMessageFromSelectedMsg, 1);
                    }else{
                        var messageIndex = _.findIndex(this.messages, {'id': msg_id});
                        var message = this.messages[messageIndex];
                        message.isSelected = true;
                        this.selectedMessagesList.push(message);
                    }
                },
                showModalDeleteMessages: function(){
                    $('#modal-delete-msgs-chat').modal();
                },
                rewriteMessageAction: function(){
                    var message = this.selectedMessagesList[0];
                    this.isShowBtnRewriteMessage = false;
                    this.messageTextarea = message.body;
                },
                cancelRewriteMessageAction: function(){
                    this.messageTextarea = '';
                    this.isShowBtnRewriteMessage = true;
                },
                rewriteMessageSend: function(){
                    //отправка отредактированного сообщения AJAX
                },
                showModalUploadFileChat: function(){
                    $('#modal-upload-file-chat input[type=file]').val('');
                    $('#modal-upload-file-chat').modal();
                }
            },
            watch: {
                selectedMessagesList: function(){
                    //Предположим, что id аутентифицированного пользователя равен 1
                    var userId = 1;

                    if(this.selectedMessagesList.length){
                        //Работа по активации checkbox в modal удаления сообщений
                        var isAllMySelectedMsg = _.every(this.selectedMessagesList, function(item){
                            return (item.user_id == userId) && !item.isWatched;
                        });
                        if(isAllMySelectedMsg){
                            this.isDisabledCheckboxDeleteMsgForAllUsers = false;
                        }else{
                            this.isDisabledCheckboxDeleteMsgForAllUsers = true;
                        }
                        //Работа по активации checkbox в modal удаления сообщений


                        if(this.selectedMessagesList.length == 1 && isAllMySelectedMsg){
                            var message = this.selectedMessagesList[0];

                            var currentDate = Date.parse(new Date());

                            // количество прошедших часов после отправки
                            var countHours = Math.floor((currentDate - Date.parse(message.date_time)) / (1000 * 60 * 60));

                            if(countHours == 0){
                                this.isDisabledBtnRewriteMessage = false;
                            }else{
                                this.isDisabledBtnRewriteMessage = true;
                            }

                        }else{
                            this.isDisabledBtnRewriteMessage = true;
                        }

                    }else{
                        this.cancelRewriteMessageAction();
                    }
                },
                messageTextarea: function(){
                    this.isDisabledBtnSendRewriteMsg = isNotEmptyString(this.messageTextarea) ? false : true;
                }
            }
        };

        var mixinChatComponents = [];

        mixinChatComponents.push(listDialogsChatComponent, groupChatComponent, dialogChatComponent);

        var chatModalComponent = {
            mixins: mixinChatComponents,
            data: {
                isShowChat: false,
                queryString: '',
                findUsersList: [],
                countNotice: parseInt('{{ $countNoticeChat }}'),
                conn: {},
                isFriendWriting: false,
                userWriting: ''
            },
            created: function(){
                this.conn = new WebSocket('ws://easyenglish.ddns.net:5555');

                this.conn.onopen = function(e) {
                    console.log("Connection established!");
                    setTimeout(function(){
                        app.conn.send(JSON.stringify({'setTopic': app.auth_id}));
                    }, 1000);
                };

                this.conn.onmessage = function(e) {
                    console.log(e.data);

                    var response = JSON.parse(e.data);
                    console.log(response);

                    if (response.type == 'writing') {

                        if (app.isShowListDialogs) {

                            var hash = response.hash;

                            var indexDialog = _.findIndex(app.dialogs, function(item){
                                return item.hash == hash;
                            });

                            if (indexDialog != -1) {

                                var dialog = app.dialogs[indexDialog];
                                dialog.isWriting = true;

                                clearTimeout(window.tim1);
                                var d = app.dialogs.splice(0, app.dialogs.length);
                                app.dialogs = d;

                                window.tim1 = setTimeout(function () {
                                    dialog.isWriting = false;
                                    var d = app.dialogs.splice(0, app.dialogs.length);
                                    app.dialogs = d;
                                }, 2000);
                            }

                            return;
                        }

                        app.showNoticeWriting(response.name);
                        return;
                    }

                    if (response.type == 'checked') {
                        app.touchCheckedMessages();
                        return;
                    }

                    if (app.isShowListDialogs) {
                        var hash = response.hash;

                        var indexDialog = _.findIndex(app.dialogs, function(item){
                            return item.hash == hash;
                        });

                        if (indexDialog === -1) {
                            $.ajax({
                                url: '{{ route('web_chat_index') }}',
                                method: 'post',
                                data: {'_token': token},
                                success: function (data) {
                                    console.log(JSON.parse(data));
                                    app.dialogs = JSON.parse(data);
                                },
                                error: function (error) {
                                    console.log(error);
                                }
                            });
                        } else {
                            var dialog = app.dialogs[indexDialog];

                            if(dialog.last_msg){
                                dialog.last_msg.msg = response.content.content;
                                dialog.last_msg.sender = 'friend';
                                if(dialog.isset_new_msg){
                                    dialog.new_msg_count++;
                                }else{
                                    dialog.isset_new_msg = 1;
                                    dialog.new_msg_count = 1;
                                }

                                if(app.dialogs.length > 1){
                                    app.dialogs.unshift(...app.dialogs.splice(indexDialog,1));
                                }
                            }else{
                                $.ajax({
                                    url: '{{ route('web_chat_index') }}',
                                    method: 'post',
                                    data: {'_token': token},
                                    success: function (data) {
                                        console.log('3333');
                                        console.log(JSON.parse(data));
                                        app.dialogs = JSON.parse(data);
                                    },
                                    error: function (error) {
                                        console.log(error);
                                    }
                                });
                            }
                        }

                        app.newMessage(1);
                        app.countNotice++;
                        return;
                    }

                    if (app.isVisibleDialogWithUser) {
                        app.messages.push(response.content);

                        app.checkMessages();
                    }

                    app.countNotice++;

                    app.newMessage(1);
                };
            },
            methods: {
                findUsersAction: _.debounce(() => {
                    if(isEmptyString(app.queryString) || app.queryString.length <= 2){
                        app.findUsersForCreateGroup = [];
                        app.findUsersList = [];
                        return;
                    }

                    $.ajax({
                        url: '{{ route('web_chat_find_users') }}',
                        data: {query: app.queryString, '_token': token},
                        type: 'post',
                        success: function(response){
                            console.log(response);
                            var data = JSON.parse(response);


                            if(this.isVisibleCreateChatGroupForm || this.isVisibleOptionsChatGroupForm){
                                this.findUsersForCreateGroup.push({'id': 1, 'name': 'user 1', 'isSelected': false});
                                this.findUsersForCreateGroup.push({'id': 2, 'name': 'user 2', 'isSelected': false});
                                this.findUsersForCreateGroup.push({'id': 3, 'name': 'user 3', 'isSelected': false});

                                if(this.selectedUsers.length){
                                    var index;
                                    _.each(this.findUsersForCreateGroup, (item) => {
                                        index = _.findIndex(this.selectedUsers, {'id': item.id});
                                        if(index >= 0){
                                            item.isSelected = true;
                                        }
                                    });
                                }
                            }else{
                                app.findUsersList = data;
                            }
                        },
                        error: function(error){
                            console.log(error);
                        }
                    });

                }, 1000),
                showHideChat: function (){
                    this.isShowChat = this.isShowChat ? false : true;
                    this.queryString = '';
                    if (this.isShowChat) {
                        $.ajax({
                            url: '{{ route('web_chat_index') }}',
                            method: 'post',
                            data: {'_token': token},
                            success: function (data) {
                                console.log(JSON.parse(data));
                                app.dialogs = Object.values(JSON.parse(data));

                                app.dialogs.sort(function(k, v){
                                    return new Date(v.sort_date) - new Date(k.sort_date);
                                });
                            },
                            error: function (error) {
                                console.log(error);
                            }
                        });
                    }

                    if(this.isVisibleDialogWithUser){
                        $('#form-chat #head').css('height', '102px');
                        changeHeightBodyChatForm(true);
                    }else{
                        $('#form-chat #head').css('height', '92px');
                        changeHeightBodyChatForm();
                    }
                },
                scrollDownMessageList: function(){
                    setTimeout(function(){
                        var div = $("#body");
                        div.scrollTop(div.prop('scrollHeight'));
                    }, 100);
                },
                showNoticeWriting: function(name){
                    this.userWriting = name;
                    this.isFriendWriting = true;

                    this.scrollDownMessageList();

                    clearTimeout(window.tim);

                    window.tim = setTimeout(function () {
                        app.userWriting = '';
                        app.isFriendWriting = false;
                    }, 2000);
                },
                getTopicChat: function(){
                    if (this.typeDialog == 'dialog') {
                        return this.getFriendDialog().id;
                    } else {
                        return this.currentChatHash;
                    }
                },
                touchCheckedMessages: function(){
                    this.messages = _.map(this.messages, function(item){
                        if (item.user_id == app.auth_id) {
                            item.is_checked = 1;
                        }

                        return item;
                    });
                },
                isLastMyMessages: function(indexMessage){
                    return _.findIndex(app.messages, function(item, key){
                        if (key > indexMessage) {
                            return item.user_id != app.auth_id;
                        }

                        return false;
                    }) === -1;
                },
                focusTextarea: function(){
                    this.checkMessages();
                },
                checkMessages: function(){
                    var msgs = [];

                    this.messages.forEach(function(item, index, messages){

                        var object = Object.assign({}, item);
                        msgs.push(object);
                    });

                    var hasUncheckedMessageFriend = _.findIndex(msgs.reverse(), function(item, key){
                        if (!item.is_checked && item.user_id != app.auth_id) {
                            return true;
                        }
                    });

                    if (hasUncheckedMessageFriend !== -1) {
                        this.messages.forEach(function(item, index, messages){
                            if (!item.is_checked && item.user_id != app.auth_id) {
                                item.is_checked = 1;
                                app.countNotice--;
                            }
                        });

                        var data = {
                            '_token': token,
                            'topic': this.getTopicChat(),
                            'hash': this.currentChatHash,
                        };

                        $.ajax({
                            url: '{{ route('web_chat_check_messages') }}',
                            data: data,
                            type: 'post',
                            success: function(response) {
                                console.log(response);
                            },
                            error: function(error){
                                console.log(error);
                            }
                        });
                    }


                }
            },
            watch: {
                messageTextarea: function(){
                    console.log('asd');
                    this.focusTextarea();

                    this.conn.send(JSON.stringify({
                        'topic': this.getTopicChat(),
                        'msg': {
                            'hash': this.currentChatHash,
                            'type': 'writing',
                            'name': this.getUser(this.auth_id).name
                        }
                    }));
                }
            },

            computed: {

            }
        };

        mixins.push(chatModalComponent);
    </script>
@endpush
