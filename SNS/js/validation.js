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
            unforcus_mail_validation();
        }
    });
    submit_valdation();
});

function unforcus_mail_validation() {
    let error;
    let mail = 'input#mail';
    $(mail).nextAll('span.error-info').remove();
    if (!$(mail).val().match(/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)) {
        error = true;
    } else {
        $(mail).next('span.error-info').remove();
    };
    if (error) {
        //エラー時の処理
        if (!$(mail).next('span.error-info').length) {
            //メッセージを後ろに追加
            $(mail).after('<span class = "error-info">メールアドレスが不正です</span>');
        }
    } else {
        //エラーじゃないのにメッセージがあったら
        if ($(mail).next('span.error-info').length) {
            //エラーを消す
            $(mail).next('span.error-info').remove();
        }
    }
};

function submit_valdation() {
    $('form').submit(function () {
        let name = 'input#nickname';
        let error;
        $(name).next('span.error-info').remove();
        if ($(name).val() == "" || !$(name).val().match(/[^\s\t]/)) {
            error = true;
            $(name).after('<span class = "error-info">ニックネームが不正です</span>');
        } else {
            $(name).next('span.error-info').remove();
        }
        let mail = 'input#mail';
        $(mail).next('span.error-info').remove();
        if (!$(mail).val().match(/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)) {
            error = true;
            $(mail).after('<span class = "error-info">メールアドレスが不正です</span>');
        } else {
            $(mail).next('span.error-info').remove();
        };
        if (error) {
            return false
        } else {
            return true;
        }
    });
}
