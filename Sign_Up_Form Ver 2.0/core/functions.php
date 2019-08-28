<?php
//$array = [["name","slug"],["name","slug"]["name","slug"]];
function insert_parts($array)
{
    foreach($array as $val){
        include("parts/form-parts.php");
    }
}

function insert_CSS()
{
    require("parts/CSS.php");
}

function Encode_POST_values()
{
    foreach($_POST as $key=>$value){
        $_POST[$key]=htmlspecialchars($value, ENT_QUOTES, "UTF-8");
    }
}

function Send_DB($pdo, $hash)
{
    $sql = "INSERT INTO MEMBER (NAME, KANA, TEL, MAIL, YEAR, SEX, MAGAZINE, PASSWORD)
            VALUES (:name, :kana, :tel, :mail, :year, :sex, :magazine, :pass)";
    $stmt = $pdo->prepare($sql);
    $stmt -> bindValue(":name", $_POST["name"], PDO::PARAM_STR);
    $stmt -> bindValue(":kana", $_POST["kana"], PDO::PARAM_STR);
    $stmt -> bindValue(":tel", $_POST["tel"], PDO::PARAM_INT);
    $stmt -> bindValue(":mail", $_POST["mail"], PDO::PARAM_STR);
    $stmt -> bindValue(":year", $_POST["year"], PDO::PARAM_INT);
    $stmt -> bindValue(":sex", $_POST["sex"], PDO::PARAM_STR);
    $stmt -> bindValue(":magazine", $_POST["magazine"], PDO::PARAM_INT);
    $stmt -> bindValue(":pass", $hash, PDO::PARAM_STR);
    try {
        $stmt -> execute();
    } catch(PDOException $e) {
        echo "メールアドレスがすでに使われています";
        exit;
    }
}