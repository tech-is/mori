<?php
    if(!empty($_POST["submit"])){
    $sql = "INSERT INTO MEMBER ($key) VALUES (:$key)";
    $stmt = $pdo->prepare($sql);
    $stmt -> bindValue(":$key", $_POST[$key], PDO::PARAM_STR);
    $stmt -> execute();
    }
?>