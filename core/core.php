<?php
$pdo = new PDO("mysql: host=127.0.0.1;dbname=teckis;charset=utf8", "***", "***"); 
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
require_once("functions.php");
require_once("./security/security.php");
?>
