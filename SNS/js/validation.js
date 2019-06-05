$(function () {
    $('input').on('blur', function () {
        $(this).next('span.error-info').remove();
        let error;
        if ($(this).val() == "") {
            error = true;
        }
        else if (!$(this).val().match(/[^\s\t]/)) {
            error = true;
        }
        if (error) {
            //エラー時の処理
            if (!$(this).next('span.error-info').length) {
                //メッセージを後ろに追加
                $(this).after('<span class = "error-info">入力してください</span>');
            }
        } else {
            //エラーじゃないのにメッセージがあったら
            if ($(this).next('span.error-info').length) {
                //エラーを消す
                $(this).next('span.error-info').remove();
            }
            mail_validation();
        }
    });
    submit_valdation();
});

function mail_validation() {
    $('input#mail').on('blur', function () {
        // $('input#mail').nextAll('span.error-info').remove();
        if (!$(this).val().match(/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)) {
            var error = true;
        } else {
            $(this).nextAll('span.error-info').remove();
        };
        if (error) {
            //エラー時の処理
            if (!$(this).next('span.error-info').length) {
                //メッセージを後ろに追加
                $(this).after('<span class = "error-info">メールアドレスが不正です</span>');
            }
        } else {
            //エラーじゃないのにメッセージがあったら
            if ($(this).next('span.error-info').length) {
                //エラーを消す
                $(this).next('span.error-info').remove();
            }
        }
    });
}

function submit_valdation() {
    $('form').submit(function () {
        $('input').next('span.error-info').remove();
        var error;
        if ($('input').val() == "") {
            $('input').after('<span class = "error-info">入力してください</span>');
            error = true;
            return false;
        }
        if (!error === true) {
            $('input#mail').next('span.error-info').remove();
            if (!$('input#mail').val().match(/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)) {
                $('input#mail').after('<span class = "error-info">メールアドレスが不正です</span>');
                error = true;
            }
            if (error) {
                return false;
            } else {
                return true;
            }
        }
    });
}