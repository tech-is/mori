<?php

//Messaging APIで取得した情報をjson整形して返す
function init(){
	$jsonString = file_get_contents('php://input');
	$json = json_decode($jsonString);
	return $json;
}

//各種情報の取得 [0] => ユーザーID,[1] => リプライトークン,[2] =>　受信したメッセージ
function info($json){
	return [$json->{"events"}[0]->{"source"}->{"userId"},$json->{"events"}[0]->{"replyToken"},$json->{"events"}[0]->{"message"}->{"text"}];
}

//メッセージを送信する関数
function send_mes($access_token,$reply,$type){
	$ch = curl_init('https://api.line.me/v2/bot/message/'.$type);
	curl_setopt($ch, CURLOPT_POST,true); 
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST,'POST'); 
	curl_setopt($ch, CURLOPT_RETURNTRANSFER,true); 
	curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($reply)); 
	curl_setopt($ch, CURLOPT_HTTPHEADER,array('Content-Type: application/json; charser=UTF-8','Authorization: Bearer '.$access_token)); 
	$result = curl_exec($ch);
}