<?php
function CSS(){
    require_once("./parts/CSS.php");
}

function Create(){
    try{
        $pdo = new PDO("mysql: host=127.0.0.1;dbname=teckis;charset=utf8", "root", "");
        $sql = 'INSERT INTO BBS (NAME, TEXT) VALUES(:name, :text)';
        $stmt = $pdo->prepare($sql);
        $stmt -> bindValue('name', $_POST['name']);
        $stmt -> bindValue('text', $_POST['text']);
        $stmt -> execute();
    }catch(PDOException $e){
    //エラー出力
        echo "<script>alert('書き込みに失敗しました');</script>";
     }
}

function Load_BBS(){
    try{
        $pdo = new PDO("mysql: host=127.0.0.1;dbname=teckis;charset=utf8", "root", "");
        $sql = 'SELECT * FROM BBS';
        $stmt = $pdo->prepare($sql);
        $stmt -> execute();
        require_once('./parts/bbs_table_parts.php');
    }catch(PDOException $e){
    //エラー出力
        echo "接続に失敗しました";
    }
}
?>