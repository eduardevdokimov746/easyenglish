<div class="row">
    <div class="col-md-9">
        <div class="form">
            <div class="row mt-4">
                <div class="col">
                <h5>Список вопросов</h5>
                    <ul style="list-style: none">
                        <li>1. Вопрос про что-то интересное</li>
                        <li>2. Вопрос про что-то интересное</li>
                        <li>3. Вопрос про что-то интересное</li>
                        <li>4. Вопрос про что-то интересное</li>
                    </ul>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <h5>Прикрепленные файлы</h5>
                    <table class="table-hover mt-2" border="1" style="text-align: center">
                        <thead>
                        <tr>
                            <th>№</th>
                            <th>Название</th>
                            <th>Размер</th>
                            <th>Скачать</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>1</td>
                            <td>file.pdf</td>
                            <td>2mb</td>
                            <td><i class="fa fa-download" aria-hidden="true"></i></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row mt-4">
                <div class="col">
                    <h5>Комментарий преподавателя</h5>
                    <p>Пусто</p>
                </div>
            </div>

        </div>

        <div class="form">
            <h4>Форма ответа</h4>

            <form>
                <div class="form-group">
                    <label>1. Вопрос про что-то интересное</label>
                    <input type="text" required class="form-control" placeholder="Ответ">
                </div>
                <div class="form-group">
                    <label>2. Вопрос про что-то интересное</label>
                    <input type="text" required class="form-control" placeholder="Ответ">
                </div>
                <div class="form-group">
                    <label>3. Вопрос про что-то интересное</label>
                    <input type="text" required class="form-control" placeholder="Ответ">
                </div>
                <div class="form-group">
                    <label>4. Вопрос про что-то интересное</label>
                    <input type="text" required class="form-control" placeholder="Ответ">
                </div>


                <div class="form-group mt-2">
                    <label>Прикрепить файлы к ответу</label>
                    <input type="file" id="upload-file" class="form-control">
                </div>

                <div class="form-group mt-2">
                    <label for="comment">Добавить комментарий</label>
                    <textarea id="comment" class="form-control" rows="5"></textarea>
                </div>

                <button type="submit" class="btn btn-primary mb-2">Отправить</button>
            </form>
        </div>
    </div>
</div>

