<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
<?php
require_once("./core/core.php");
$array = array("name" => "名前", "kana"=>"カナ", "tel" => "電話", "mail"=>"mail");
	// ファイルのアップロード
  if(!empty($_FILES)) {
      $fileName = $_FILES['image']['name'];
      if($fileName != "" ){
          $image = $fileName;
          move_uploaded_file($_FILES['image']['tmp_name'],'./temp/'.$image);
    }
  }
//送信ボタンが押されたら
$error=array();
if(!empty($_POST['confirm'])){
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
    //パスワード
    if($_POST["pass"]==="" || $_POST["pass1"]===""){
      $error[] = "「パスワード」パスワードが入力されていません<br>";
    }
}

  $page_flag = 0; //入力画面
  session_start();
  if (!empty($_POST['confirm']) && count($error) === 0){

  $page_flag = 1; //確認画面

  } elseif (!empty($_POST['submit'])) {
      $hash = Pass_Hash();
      // echo $_POST['token'];
      // echo $_SESSION['key'];
      if(isset($_POST['token']) && $_POST['token']===$_SESSION['key']){
      $sql = "INSERT INTO MEMBER (NAME, TEL, MAIL, YEAR, SEX, MAGAZINE, PASSWORD) VALUES (:name, :tel, :mail, :year, :sex, :magazine, :pass)";
      $stmt = $pdo->prepare($sql);
      $stmt -> bindValue(":name", $_POST["name"], PDO::PARAM_STR);
      $stmt -> bindValue(":tel", $_POST["tel"], PDO::PARAM_STR);
      $stmt -> bindValue(":mail", $_POST["mail"], PDO::PARAM_STR);
      $stmt -> bindValue(":year", $_POST["year"], PDO::PARAM_INT);
      $stmt -> bindValue(":sex", $_POST["sex"], PDO::PARAM_STR);
      $stmt -> bindValue(":magazine", $_POST["magazine"], PDO::PARAM_INT);
      $stmt -> bindValue(":pass", $hash, PDO::PARAM_STR);
      try{
        $stmt -> execute();
        }catch(PDOException $e){
        //エラー出力
        echo "メールアドレスがすでに使われています";
        exit;
        // echo "接続に失敗しました";
        // print_r($e);
        }
      }else{
          echo "CSRF攻撃を受けたので強制終了します";
          exit;
      }
    
  $page_flag = 2; //完了画面

  } else {

  $page_flag = 0; //入力画面

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
    .error{
        color : red;
    }
</style>
<link rel="stylesheet" 
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
      crossorigin="anonymous">
</head>

<body>
  <div class="container">
    <h1>会員登録フォーム</h1>
    <div class="error">
    <?php
    //エラー内容をここで出力する
    if(count($error)>0){
      foreach($error as $value){
        echo $value;
      }
    }
    ?>
    </div>
    <br>
    <?php if ($page_flag === 1) : ?>
    <!-- 確認ページ -->
    <?php
    //除染
    Clean();
    //ランダムキー生成
    $_SESSION['key'] = sha1(session_id() . '_' .microtime());
    // 二重読み込み防止
    $_SESSION['home'] = 1;
      ?>
      <form action="" method="post">        
      <p>名前:
      <?= $_POST['name'] ?></p>
      <p>カナ:
      <?= $_POST['kana'] ?></p>
      <p>電話:
      <?= $_POST['tel'] ?></p>
      <p>mail:
      <?= $_POST['mail'] ?></p>
      <p>生まれ年:
      <?= $_POST['year'] ?>年</p>
      <p>性別:
      <?php
        if($_POST['sex'] === "male"){
          echo "男性";
        }else{
          echo "女性";
        }
        ?>
      </p>
      <p>メールマガジン:
      <?=isset($_POST['magazine'])? '送付する': '' ?></p>
    
      <form action="" method="post">
        <input type="button" onclick="history.back();" value="戻る">
        <input class="btn btn-primary col-sm-5 pull-right" type="submit" name="submit" value="送信">
        <input type="hidden" name="name" value="<?= $_POST["name"] ?>">
        <input type="hidden" name="tel" value="<?= $_POST["tel"] ?>">
        <input type="hidden" name="mail" value="<?= $_POST["mail"] ?>">
        <input type="hidden" name="year" value="<?= $_POST["year"] ?>">
        <input type="hidden" name="sex" value="<?= $_POST["sex"] ?>">
        <input type="hidden" name="magazine" value="<?= $_POST['magazine'] ?>">
        <input type="hidden" name="token" value="<?= $_SESSION['key']?>">
        <input type="hidden" name="pass" value="<?= $_POST['pass']?>">
    <!-- 完了ページ -->
    <?php elseif ($page_flag === 2) : ?>
    <p>会員登録ありがとうございました。</p>
    <form method="POST" action="mailto">
    <div>
    <div>
    <input class="btn btn-primary col-sm-4 col-sm-offset-4" type="button" onClick="location.href='index.php'" value="ホームへ">
   　<?php else : ?>
     <!-- 入力ページ -->
   　<form action="" method="post" enctype="multipart/form-data">
     <?php
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
        <input type="checkbox" checked name="magazine" value='1' id="magazine"><br>
    </div>
    <br>
    <div class = "form-group">
        <label>パスワード</label>
        <input type="password" name="pass" class="form-control" maxlength="16"> 
    <div>
    
    <div class = "form-group">
        <label>パスワード確認</label>
        <input type="password" name="pass1" class="form-control" maxlength="16"> 
    <div>

    <div class ="form-group">
    <label for="image">免許証</label><br>
    <img src="<?php if(!empty($_FILES)){ echo './temp/' .$image; }?>">
    <br>
    <div class = "form-group">
    <input type="file" name="image">
    </div>
    <br>
    <div class ="form-group">
        <input type="submit" name="confirm" value="登録">
    </div>
 
	</div>
  </form>
  <?php endif; ?>
  </div>
</body>
</html>