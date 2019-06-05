$(function () {
    //バリデーション
    $('input').on('blur', function () {
        var error;
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
        }
    });
    // $('input#mail').on('blur', function () {
    //     value = $(this).val();
    //     if (!match(/^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/)) {
    //         error = true;
    //     };
    //     if (error) {
    //         //エラー時の処理
    //         if (!$(this).nextAll('span.error-info').length) {
    //             //メッセージを後ろに追加
    //             $(this).after('<span class = "error-info">メールアドレスが不正です</span>');
    //         }
    //         return false;
    //     } else {
    //         //エラーじゃないのにメッセージがあったら
    //         if ($(this).nextAll('span.error-info').length) {
    //             //エラーを消す
    //             $(this).nextAll('span.error-info').remove();
    //         }
    //     }
    // })
});