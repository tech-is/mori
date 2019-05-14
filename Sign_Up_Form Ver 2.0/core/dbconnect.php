<?php
try{
    $pdo = new PDO("mysql: host=127.0.0.1;dbname=teckis;charset=utf8", "root", "");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    die('現在登録することができません');
}
?>