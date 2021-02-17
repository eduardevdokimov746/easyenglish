<div class="row">
    <div class="col">
        <div class="form">
            <div class="row">
                <div class="col">
                    <h5>Текст</h5>
                    <p>Преподаватель не добавил текст задания.</p>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <h5>Прикрепленные файлы</h5>
                    <table class="table-hover mt-2 table-list-radanie-files" border="1" style="text-align: center">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Название</th>
                            <th>Размер</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr class="table-row" data-href="#">
                            <td>1</td>
                            <td>
                                <img class="table-list-radanie-file-icon" style="width: 30px;" src="{{ asset('file_icons/png/doc.png') }}" alt="">
                                <span>file.pdf</span>
                            </td>
                            <td>2mb</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <h5>Комментарий преподавателя</h5>
                    <p>Обратите внимание на следующие разделы фывыфв выфофыв вфыовофытв фывт оыфтв отфы </p>
                </div>
            </div>
        </div>


        <div class="form mt-3">
            <h4>Форма ответа</h4>
            <div class="form-group mt-2">
                <label for="textarea-perevod">Перевод</label>
                <textarea name="editor1" id="editor1" rows="10" cols="80">
                                </textarea>
            </div>

            <div class="form-group mt-2">
                <label>Прикрепить файлы к ответу</label>
                <input type="file" style="height: auto" id="upload-file" class="form-control">
            </div>

            <div class="form-group mt-2">
                <label for="comment">Добавить комментарий</label>
                <textarea id="comment" class="form-control" rows="5"></textarea>
            </div>

            <div style="display: flex; justify-content: flex-end">
                <button type="button" class="btn btn-light">Редактировать</button>
                <button type="submit" class="btn btn-primary">Отправить</button>
            </div>
        </div>
        <div class="form mt-3">
            <h4>Ответ преподавателя</h4>

            <div class="mt-2">
                <h5>Преподаватель</h5>
                <p>Евдокимов Эдуард Игоревич</p>
            </div>

            <div class="mt-2">
                <h5>Дата проверки</h5>
                <p>Пятница, 25 декабря 2020, 12:29</p>
            </div>

            <div class="mt-2">
                <h5>Комментарий</h5>
                <p>фывфыввф втфытв  втыфот вофы вфыт овтфыо твт ывфттвфы вфы </p>
            </div>

            <div class="mt-2">
                <h5>Оценка</h5>
                <p>85,00 / 100,00</p>
            </div>

        </div>
    </div>

    <div class="col-md-3 main-right-div">
        <div class="right-div-block">
            <h4>Информация</h4>
            <p><b>Статус:</b> <p>Не отправленно</p></p>
            <p><b>Оценка:</b> <p>Не оценено</p></p>
            <p><b>Дата сдачи:</b> <p>20.20.2020</p></p>
            <p><b>Дата отправки:</b> <p>Не оправленно</p></p>
            <p><b>Время выполенения:</b> <p>Не выполенно</p></p>
        </div>
    </div>
</div>

