<?php
/**
 * この例は、簡単なフォームを処理する方法を示しています。
 */

session_start();
session_regenerate_id(true);

$msg = '';
//フォームの送信を処理しない限り、これを実行しないでください
if (isset($_POST['submit']) && validate()) {
    checkToken();
    $name  = trim(rm(esc($_POST['name'])));
    $email = trim(rm(esc($_POST['email'])));
    $message  = trim(esc($_POST['message']));

    date_default_timezone_set('Asia/Tokyo');
    mb_internal_encoding('UTF-8');

    require 'vendor/autoload.php';
    require 'setting.php';

    //新しいPHPMailerインスタンスを作成する
    $mail = new PHPMailer();
    // SMTPを使用するようにPHPMailerに指示する - メールサーバが必要
    // mail関数を使うよりも速くて安全です
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = MAIL_HOST;
    $mail->Username = MAIL_USERNAME;
    $mail->Password = MAIL_PASSWORD;
    $mail->SMTPSecure = MAIL_ENCRPT;
    $mail->Port = SMTP_PORT;

    // メール内容設定
    $mail->CharSet = 'UTF-8';
    $mail->Encoding = 'base64';
    $mail->From = MAIL_FROM;

    //自分のドメイン内の固定アドレスを送信元アドレスとして使用する
    // **ここでは送信者のアドレスを偽造するために使用しないでください**
    // メッセージがSPFチェックに失敗します
    $mail->setFrom( MAIL_FROM, MAIL_FROM_NAME );
    // お客さん宛に控えメール
    $mail->addAddress( $email, $name );
    // BCC宛てに自分のアドレスを設定
    $mail->AddBcc(MAIL_FROM);
    // reply-toヘッダーに送信者のアドレスを入れる
    // 指定されたアドレスが無効な場合、これは失敗します。
    // この場合、リクエスト全体を無視する必要があります
    if ($mail->addReplyTo($email, $name)) {
        $mail->Subject = mb_encode_mimeheader(MAIL_SUBJECT, 'ISO-2022-JP');
        //HTMLを使用しないでください
        $mail->isHTML(false);
        //簡単なメッセージ本文を作成する
        $mail->Body = <<<EOT
お問い合わせありがとうございます。
お名前: {$name}
Email: {$email}
メッセージ: {$message}
EOT;
        //エラーをチェックしてエラーがなければメッセージ送信
        if (!$mail->send()) {
            // 送信に失敗した理由は、$mail->ErrorInfoで出力
            // ユーザーにエラーを表示しないでください - エラーを処理し、サーバーにログオンします。
            $msg = '申し訳ありませんが、何かが間違っていました。 後でもう一度お試しください。';
        } else {
            $msg = 'メッセージが送信されました！ お問い合わせいただきありがとうございます。';
        }
    } else {
        $msg = '無効なメールアドレスです。メッセージは無視されます。';
    }
} else{
    setToken();
}
// ワンタイムトークン発行
function setToken() {
    $token = rtrim(base64_encode(openssl_random_pseudo_bytes(32)),'=');
    $_SESSION['token'] = $token;
}

// チェックトークン
function checkToken() {
    if (empty($_SESSION['token']) || ($_SESSION['token'] !== $_POST['token'])) {
        echo "不正なPOSTが行われました！";
        exit;
    }
}

// バリテーション
function validate() {
    // 名前とメッセージが空の場合
    if(empty($_POST['name']) && empty($_POST['message'])) {
        return false;
    }
    // メールアドレスの形式が正しくない場合
    if (false === filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            return false;
    }
    return true;
}


// 改行を消す(メールヘッダ・インジェクション対策);
function rm($str) {
  if(isset($str)) {
    str_replace(array("\r\n", "\r", "\n"), '', $str);
  }
  return $str;
}
// エスケープ処理
function esc($value, $enc = 'UTF-8') {
  if (is_array($value)) {
    return array_map('escape', $value);
  }
  return htmlspecialchars($value, ENT_QUOTES, $enc);
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせフォーム</title>
</head>
<body>
<h1>お問い合わせ</h1>
<?php if (!empty($msg)) {
    echo "<h2>$msg</h2>";
} ?>

<form action="" method="POST">
    <label for="name">お名前: <input type="text" name="name" id="name" value=""></label><br>
    <label for="email">Email: <input type="email" name="email" id="email" value=""></label><br>
    <label for="message">メッセージ: <textarea name="message" id="message" rows="8" cols="20"></textarea></label><br>
    <input type="submit" value="Send" name="submit">
    <input type="hidden" name="token" id="token" value="<?php echo esc($_SESSION['token']);?>">
</form>
</body>
</html>