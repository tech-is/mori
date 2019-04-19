<?php
//test
require_once("./core/core.php");
$array = [["name","名前"],["kana","カナ"],["tel","電話"],["mail","mail"]];
//送信ボタンが押されたら
$error=array();
if(isset($_POST['submit'])){
  // 名前
  if($_POST['name']===""){
    $error[] = "「名前」名前を入力してください<br>";
  }
  if(mb_strlen($_POST['name'])>20){
    $error[] = "「名前」20文字以内で入力してください<br>";
  }
  // カナ
  if($_POST["kana"]===""||!preg_match('/^[ァ-ヾ]+$/u',$_POST["kana"])){
    $error[] = "「カナ」カナで名前を入力してください<br>";
  }
  if(mb_strlen($_POST["kana"])>20){
    $error[] = "「カナ」20文字以内で入力してください<br>";
  }
  // 電話 
  if($_POST["tel"]===""||!preg_match('/[0-9]/',$_POST["tel"])){
    $error[] = "「電話」半角数字で入力してください<br>";
  }
  // メール
  if($_POST["mail"]===""||!preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $_POST["mail"])){
    $error[] = "「mail」半角英数で入力してください<br>";
  }
  if(mb_strlen($_POST["mail"])>32){
    $error[] = "「mail」メールアドレスが長すぎます<br>";
  }
  // エラーがなかった場合の処理
  if(count($error)===0){
  //確認ページヘ
  
  
  }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <title>会員登録画面</title>
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
<div class="container">
  <h1>会員登録フォーム</h1>
  <br>

<?php
  //エラー内容をここで出力する
  if(count($error)>0){
    foreach($error as $value){
      echo $value;
    } 
  }
?>

  <form action="index.php" method="post">
  <?php
  //テキストボックス
  insert_parts($array);
  ?>
  <div class ="form-group">
    <label for="year">生まれ年</label>
  <select name="year" required>
  <?php
  for($i=1900; $i<=2019; $i++){
    echo '<option value="'.$i.'">'.$i.'</option>';
  }
  ?>
  </select>
  <br>
  </div>
  <br>
  <div class ="form-group">
    <label for="sex">性別</label>
    <input type="radio" checked name="sex" value="male" id="male">男性
    <input type="radio" name="sex" value="female" id="female">女性<br>
  </div>
  <br>
  <div class ="form-group">
    <label for="magazine">メールマガジン送付</label>
    <input type="checkbox" checked name="magazine" value="送付する" id="magazine"><br>
  </div>
  <br>
  <div class ="form-group">
  <input type="submit" name="submit" value="登録">
  </div>
  </form>
</div>
</body>
</html>