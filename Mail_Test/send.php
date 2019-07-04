<?php

mb_language("japanese");
mb_internal_encoding("UTF-8");

//ソースを全部読み込ませる
//パスは自分がPHPMailerをインストールした場所で
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/POP3.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/OAuth.php';
require 'PHPMailer/language/phpmailer.lang-ja.php';

//公式通り
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

//autoloderはcomposerでのインストールじゃないとないので
//あえて記述しません。

//SMTPの設定
$mailer = new PHPMailer();//インスタンス生成
$mailer->IsSMTP();//SMTPを作成
$mailer->Host = 'smtp.gmail.com';//Gmailを使うのでメールの環境に合わせてね
$mailer->CharSet = 'utf-8';//文字セットこれでOK
$mailer->SMTPAuth = TRUE;//SMTP認証を有効にする
$mailer->Username = ''; // Gmailのユーザー名
$mailer->Password = ''; // Gmailのパスワード
$mailer->SMTPSecure = 'tls';//SSLも使えると公式で言ってます
$mailer->Port = 587;//tlsは587でOK
$mailer->SMTPDebug = 2;//2は詳細デバッグ1は簡易デバッグ本番はコメントアウトして

//メール本体
$message="フォームで送ったよ!"."\n".$_POST['message01'];//メール本文
$mailer->From     = ''; //差出人の設定
$mailer->FromName = mb_convert_encoding("Tech i.s. 森","UTF-8","AUTO");//表示名おまじない付…
$mailer->Subject  = mb_convert_encoding($_POST['subject'],"UTF-8","AUTO");//件名の設定
$mailer->Body     = mb_convert_encoding($message,"UTF-8","AUTO");//メッセージ本体
$mailer->AddAddress($_POST['to']); // To宛先

//送信する
if($mailer->Send()){}
else{
    echo "送信に失敗しました" . $mailer->ErrorInfo;
}

?>