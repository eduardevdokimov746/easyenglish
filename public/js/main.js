$(document).ready(function(){
	$('#up').click(function() {
		$('html, body').animate({scrollTop: 0},500);
		return false;
	});


	$('body').css('min-height', $(window).height());
	$('.other_services').css('min-height', ($(window).height() - $('.copyright').height()));


	/*-------------------------- ФОРМА ЧАТА ----------------------------------------*/




	/*-------------------------- ФОРМА ЧАТА ----------------------------------------*/



	/*-------------------------- ДОБАВЛЕНИЕ ЗАДАНИЯ -------------------------------*/

	$('#select-zadan-type').change(function(){
		var body = $('#body-zadan');
		switch ($(this).val()){
			case('perevod'):
				body.find('#perevod-pereskaz').css('display', 'block');
				body.find('#response-on-question').css('display', 'none');
				body.find('#translate-words').css('display', 'none');
				body.find('#comp-words').css('display', 'none');

				break;
			case('pereskaz'):
				body.find('#perevod-pereskaz').css('display', 'block');
				body.find('#response-on-question').css('display', 'none');
				body.find('#translate-words').css('display', 'none');
				body.find('#comp-words').css('display', 'none');
				break;
			case('response'):
				body.find('#response-on-question').css('display', 'block');
				body.find('#perevod-pereskaz').css('display', 'none');
				body.find('#translate-words').css('display', 'none');
				body.find('#comp-words').css('display', 'none');
				break;
			case('translate'):
				body.find('#translate-words').css('display', 'block');
				body.find('#perevod-pereskaz').css('display', 'none');
				body.find('#response-on-question').css('display', 'none');
				body.find('#comp-words').css('display', 'none');
				break;
			case('comp'):
				body.find('#comp-words').css('display', 'block');
				body.find('#perevod-pereskaz').css('display', 'none');
				body.find('#response-on-question').css('display', 'none');
				body.find('#translate-words').css('display', 'none');
				break;
		}
	});


	$("#count-ball").keypress(function (e) {
		e.preventDefault();
	});

	$('#infinity-time-for-work').change(function(){
		if($(this).is(':checked')){
			$('#time-for-work').attr('disabled', 'disabled');
		}else{
			$('#time-for-work').removeAttr('disabled');
		}
	});

	$('#set-zadan-queue').change(function(){
		if($(this).is(':checked')){
			$('#datetime-input-zadan-queue').removeAttr('disabled');
		}else{
			$('#datetime-input-zadan-queue').attr('disabled', 'disabled'
			);
		}
	});


	/* ОТВЕТЫ НА ВОПРОСЫ */
	$('#response-on-question .add-form').click(function(e){
		e.preventDefault();

		var form = $('#response-on-question .form-group:last').clone();
		var countQuestion = Number.parseInt(form.data('count'));
		var numberQuestion = countQuestion + 1;

		form.attr('data-count', numberQuestion);
		form.find('label span').html(numberQuestion);
		form.find('input').val('');
		$('#response-on-question .delete-form-input-btn').css('display', 'inline');
		form.insertAfter($('#response-on-question .form-group:last'));
	});

	$('#response-on-question').on('click', '.delete-form-input-btn', function(e){
		e.preventDefault();

		$('#response-on-question .form-group:last').remove();

		if($('#response-on-question .form-group').length == 1){
			$(this).css('display', 'none');
		}
	});
	/* ОТВЕТЫ НА ВОПРОСЫ */

	/* ПЕРЕВОД СЛОВ */

	$('#translate-words .box-radio-btns input[type=radio]').click(function(){
		if($(this).attr('id') == 'manual'){
			$('#translate-words #manual-check').css('display', 'block');
			$('#translate-words #auto-check').css('display', 'none');
		}else if($(this).attr('id') == 'auto'){
			$('#translate-words #auto-check').css('display', 'block');
			$('#translate-words #manual-check').css('display', 'none');
		}
	});

	$('#translate-words #auto-check .add-form').click(function(e){
		e.preventDefault();

		var form = $('.form-word:last').clone().attr('class', 'form-word');
		form.find('input').val('');
		form.find('tr:first label span').html(Number.parseInt(form.find('tr:first label span').html()) + 1);
		form.insertAfter($('.form-word').last());

		$('#translate-words #auto-check .delete-form-input-btn').css('display', 'inline');
	});

	$('#translate-words #manual-check .add-form').click(function(e){
		e.preventDefault();

		var form = $('#translate-words #manual-check .form-group:last').clone().addClass('form-word');
		var count = Number.parseInt(form.data('count')) + 1
		form.attr('data-count', count);
		form.find('label span').html(count);
		form.find('input').val('');
		form.insertAfter('#translate-words #manual-check .form-group:last');
		$('#translate-words #manual-check .delete-form-input-btn').css('display', 'inline');
	});

	$('#translate-words #auto-check .delete-form-input-btn').click(function(e){
		e.preventDefault();

		$('#translate-words #auto-check .form-word:last').remove();

		if($('#translate-words #auto-check .form-word').length == 1){
			$(this).css('display', 'none');
		}
	});

	$('#translate-words #manual-check .delete-form-input-btn').click(function(e){
		e.preventDefault();

		$('#translate-words #manual-check .form-group:last').remove();

		if($('#translate-words #manual-check .form-group').length == 1){
			$(this).css('display', 'none');
		}
	});

	/* ПЕРЕВОД СЛОВ */

	/*-------------------------- ДОБАВЛЕНИЕ ЗАДАНИЯ -------------------------------*/



$('#comp-words .add-row-form').click(function(e){
    e.preventDefault();

    var form = $(this).closest('#comp-words').find('table tbody tr:last').clone();
    form.find('input').val('');
    form.find('td:first').html(Number.parseInt(form.find('td:first').html()) + 1);

    form.insertAfter($('#comp-words table tbody tr:last'));

    if($('#comp-words table tbody tr').length > 2){
        $('#comp-words .delete-form-input-btn').css('display', 'inline');
    }else{
        $('#comp-words .delete-form-input-btn').css('display', 'none');
    }
});

$('#comp-words .delete-form-input-btn').click(function(e){
    e.preventDefault();

    $('#comp-words table tbody tr:last').remove();

    if($('#comp-words table tbody tr').length <= 2){
        $('#comp-words .delete-form-input-btn').css('display', 'none');
    }
});
});
