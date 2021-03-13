$(document).ready(function() {

    $('#up').click(function () {
        $('html, body').animate({scrollTop: 0}, 500);
        return false;
    });

    $(".table-row").click(function () {
        window.document.location = $(this).data("href");
    });

    if ($('.ckeditor-textarea').length) {
        $('.ckeditor-textarea').ckeditor();
    }

    $('.checkbox-url').click(function () {
        if ($(this).find('checkbox').is(':checked')) {
            return;
        }
        window.location.href = $(this).data('url');
    });

    $('body').css('min-height', $(window).height());
    $('.other_services').css('min-height', ($(window).height() - $('.copyright').height()));
});
