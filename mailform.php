<?php
mb_language("Japanese");
mb_internal_encoding("UTF-8");

echo $POST_["name"];

exit;
// 変数とタイムゾーンを初期化
	$auto_reply_subject = null;
	$auto_reply_text = null;
	date_default_timezone_set('Asia/Tokyo');

	// 件名を設定
	$auto_reply_subject = '会員仮登録完了のお知らせ';

	// 本文を設定
	$auto_reply_text = "会員の仮登録しました。以下の情報で登録致します。\n\n";
	$auto_reply_text .= "名前" .$POST_["name"]. "\n";
    $auto_reply_text .= "カナ" .$POST_["kana"]. "\n";
    $auto_reply_text .= "電話" .$POST_["tel"]. "\n";
    $auto_reply_text .= "Mail" .$POST_["mail"]. "\n";
    $auto_reply_text .= "生まれ年" .$POST_["year"]. "\n";
    $auto_reply_text .= "性別" .$_POST_["sex"]. "\n";
	$auto_reply_text .= "本登録は以下のURLをクリックし、仮パスワードを入力して下さい。
                         以上で登録は完了です。 \n\n";
    
    //未実装
    // $auto_reply_text .= "URL:http://";

	// メール送信
	mb_send_mail( $_POST['mail'], $auto_reply_subject, $auto_reply_text);
?>