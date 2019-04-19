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