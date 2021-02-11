//Проверка на пустоту строки
function isNotEmpty(str){
	var regex = /^\s+$/;
	if(!regex.test(str) && str){
		return true;
	}
	return false;
}

//Отображение формы ввода кода восстановления пароля
function visibleFormInputRestoreCode(){
	$('.form-request-restore-code').css('display', 'none');
	$('.form-input-code').css('display', 'block');

	$('.form-request-restore-code input').val('');
	$('.form-input-code .btn').attr('disabled', 'disabled').css('cursor', 'not-allowed');
}

//Сокрытие формы ввода кода восстановления пароля
function unvisibleFormInputRestoreCode(){
	$('.form-input-code').css('display', 'none');
	$('.form-request-restore-code').css('display', 'block');

	$('.form-input-code input').val('');
	$('.form-request-restore-code .btn').attr('disabled', 'disabled').css('cursor', 'not-allowed');
}