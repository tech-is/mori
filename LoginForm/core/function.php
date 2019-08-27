<?php
function login_API_session(){
    $login_mail=$_POST['mail'];
    $login_pass=$_POST['pass'];
    //データベース接続
    $pdo = new PDO("mysql: host=127.0.0.1;dbname=teckis;charset=utf8", "root", "");
    $sql = 'SELECT name, password FROM member WHERE mail = :mail';
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(":mail", $login_mail, PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row == false) {
        return false;
    } elseif (password_verify($login_pass, $row['password'])){
        $_SESSION["NAME"]=$row['name'];
        return true;
    } else {
        return false;
    }
}

function Logined_session()
{
    if (isset($_SESSION["NAME"])) {
        header("location: ./Main.php");
        exit;
    }
}

function logout_session()
{
    if (isset($_GET["logout"])) {
        session_destroy();
        header("location: ./index.php");
        exit;
    }
}

function Table(){
    //データベース接続
    $pdo = new PDO("mysql: host=127.0.0.1;dbname=teckis;charset=utf8", "root", "");
    $sql = "SELECT * FROM MEMBER";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
?>