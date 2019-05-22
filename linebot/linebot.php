<?php
require_once __DIR__ . "/function.php";
//Messaging APIで取得した情報をjson整形して返す
init();
//各種情報の取得 [0] => ユーザーID,[1] => リプライトークン,[2] =>　受信したメッセージ
info($json);
//メッセージを送信する
send_mes($access_token, $reply, $type);
?>

