function notyConfirm() {
    noty({
        text: 'Do you want to continue?',
        layout: 'topRight',
        buttons: [
            {
                addClass: 'btn btn-success btn-clean', text: 'Ok', onClick: function ($noty) {
                    $noty.close();
                    noty({text: 'You clicked "Ok" button', layout: 'topRight', type: 'success'});
                }
            },
            {
                addClass: 'btn btn-danger btn-clean', text: 'Cancel', onClick: function ($noty) {
                    $noty.close();
                    noty({text: 'You clicked "Cancel" button', layout: 'topRight', type: 'error'});
                }
            }
        ]
    })
}
$(document).ready(function () {
    $('.changelocal').on('click', function () {
        var locale = $(this).attr('id');
        console.log(locale);
        var port = "<?= $_SERVER['SERVER_PORT']?>";
        var http = "http://";
        if (port == "443") {
            http = "https://"
        }

        $.post(http + "<?=$_SERVER['HTTP_HOST']?>/change-locale", {locale: locale}, function (data, status) {
            console.log(data);
            window.location = "/";
        });
    })

})