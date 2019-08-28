<?php

// メール情報
// 一応仮で入れてありますが適宜変えて下さい。
// メールホスト名
define('MAIL_HOST','its-mail.sakura.ne.jp');

// メールユーザー名・アカウント名
define('MAIL_USERNAME','contact@its-office.jp');

// メールパスワード
define('MAIL_PASSWORD','**************');

 // SMTPプロトコル(sslまたはtls)
define('MAIL_ENCRPT','tls');

// 送信ポート(ssl:465, tls:587)
define('SMTP_PORT', 587);

// メールアドレス
define('MAIL_FROM','contact@its-office.jp');

// 表示名
define('MAIL_FROM_NAME','アイティーエス');

// メールタイトル
define('MAIL_SUBJECT','お問い合わせいただきありがとうございます');