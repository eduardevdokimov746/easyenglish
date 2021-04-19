$(document).ready(function() {

    $('#up').click(function () {
        $('html, body').animate({scrollTop: 0}, 500);
        return false;
    });

    $(".table-row").click(function (e) {
        var regex = /.*btn-eye-show-hide/;

        if (regex.test($(e.target).attr('class'))) {
            return;
        }

        window.document.location = $(this).data("href");
    });

    if ($('.ckeditor-textarea').length) {
        $('.ckeditor-textarea').each(function (key, item) {
            bindCkeditor(item);
        });
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

function bindCkeditor(element){
    ClassicEditor
        .create(element, {
            toolbar: {
                items: [
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'underline',
                    'MathType',
                    'bulletedList',
                    'numberedList',
                    'alignment',
                    '|',
                    'fontSize',
                    'fontColor',
                    'fontBackgroundColor',
                    'fontFamily',
                    'insertTable',
                    'removeFormat',
                    'horizontalLine',
                    'undo',
                    'redo'
                ]
            },
            language: 'ru',
            licenseKey: '',
        })
        .then(editor => {
             window['editor_' + element.name] = editor;
        })
        .catch( error => {
            console.error( 'Oops, something went wrong!' );
            console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
            console.warn( 'Build id: ihq2gtjzbp0w-rnbkvm9bzjl3' );
            console.error( error );
        });

}

function alertDanger(msg) {
    $('.alert').remove();
    var alert = "<div class='alert alert-danger-custom'><i class='fa fa-exclamation-circle'></i>&nbsp;" + msg;
    alert += "<button type='button' class='close' data-dismiss='alert'>×</button></div>";

    $('body').append(alert);

    setTimeout(function () {
        $('.alert-danger-custom').remove();
    }, 5000);
}


function alertNotice(msg) {
    $('.alert').remove();
    var alert = "<div class='alert alert-warning-custom'><i class='fa fa-exclamation-circle'></i>&nbsp;" + msg;
    alert += "<button type='button' class='close' data-dismiss='alert'>×</button></div>";

    $('body').append(alert);

    setTimeout(function () {
        $('.alert-warning-custom').remove();
    }, 5000);
}


function alertSuccess(msg) {
    $('.alert').remove();
    var alert = "<div class='alert alert-success-custom'><i class='fa fa-check-circle'></i>&nbsp;" + msg;
    alert += "<button type='button' class='close' data-dismiss='alert'>×</button></div>";

    $('body').append(alert);

    setTimeout(function () {
        $('.alert-success-custom').remove();
    }, 5000);
}

