<?php
require_once("./core/core.php");
require_once("./security/security.php");
// $array = [["NAME","name"],["KANA","kana"],["TEL","tel"],["MAIL","mail"],["YEAR","year"],["SEX","sex"]];

/*
//データベースに書き込む
if(isset($_POST["submit"])) {
  $sql = "INSERT INTO MEMBER (NAME) VALUES (:name)";
  $stmt = $pdo->prepare($sql);
  $stmt -> bindValue(":name", $_POST["name"], PDO::PARAM_STR);
  $stmt -> execute();
  header("Location: http://localhost/index3.php");
  exit; 
}
*/
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <style>
    body{
        padding : 50px;
    }
  </style>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php
Clean();
// 二重読み込み防止
session_start();
$_SESSION['home'] = 1;
?>
<p>会員登録フォーム</p>
<p>名前　　　<?= $_POST['name'] ?></p>
<p>カナ　　　<?= $_POST['kana'] ?></p>
<p>電話　　　<?= $_POST['tel'] ?></p>
<p>mail　　　<?= $_POST['mail'] ?></p>
<p>生まれ年　<?= $_POST['year'] ?>年</p>
<p>性別　　  <?php
              if($_POST['sex'] == "male"){
                echo "男性";
              }else{
                echo "女性";
              }
              ?>
              </p>
<p>メールマガジン　<?=isset($_POST['magazine'])? '送付する': '' ?></p>
<form action="" method=post>
  <input type="hidden" name="name" value="<?= $_POST['name'] ?>">
  <input type="button" onclick="history.back();" value="戻る">
  <button type="submit" name="submit">送信する</button>
</form>

<pre>
<?php
//デバック画面
print_r($_POST);
?>
</pre>

</body>
</html>
