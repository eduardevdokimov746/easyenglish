$(document).ready(function(){

/* Отображение вводимого пароля на формах аутентификации */
$('.eye-password').click(function(){
	var element = $(this);
	var input = $('input[name=password]');
	var inputConfirmed = $('input[name=password_confirmation]');

	element.css('display', 'none');

	if(element.data('type') == 'visible'){
		input.attr('type', 'password');
		$('.eye-password[data-type=unvisible]').css('display', 'inline');
		
		if(inputConfirmed.length){
			inputConfirmed.attr('type', 'password');
		}
	}else{
		input.attr('type', 'text');
		$('.eye-password[data-type=visible]').css('display', 'inline');

		if(inputConfirmed.length){
			inputConfirmed.attr('type', 'text');
		}
	}

	input.focus();
});
/* Отображение вводимого пароля на формах аутентификации */

/* Валидация пустых полей форм аутентификации */
$('.form-auth').keyup(function(){
	var btn = $('.btn-submit');
	var issetEmpty = false;

	$(this).closest('.form-auth').find('input').each(function(){
		if(!isNotEmpty($(this).val())){
			btn.attr('disabled', 'disabled').css('cursor', 'not-allowed');
			issetEmpty = true;
		}
	});

	if(!issetEmpty){
		btn.removeAttr('disabled').css('cursor', 'pointer');
	}
});
/* Валидация пустых полей форм аутентификации */
});