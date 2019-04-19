<?php
  $page_flag = 0; //入力画面

  if (!empty($_POST['confirm'])) {

    $page_flag = 1; //確認画面

  } elseif (!empty($_POST['submit'])) {

    $page_flag = 2; //完了画面

  } else {

    $page_flag = 0; //入力画面
  }

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>フォーム</title>
  <link rel="stylesheet" href="/bootstrap.min.css">
</head>
<body>
  <div class="navbar navbar-inverse">
    <div class="container">
      <div class="navbar-header">
        <a href="/" class="text-muted"><h1 class="h3">Simple Form</h1></a>
      </div>
    </div>
  </div>
  <!-- <div class="container">
  <?php if ($page_flag === 1) : ?>
    <form class="col-sm-9 col-sm-offset-2" action="" method="post">
      <div class="form-horizontal">
        <div class="form-group">
          <label class="col-sm-3 control-label">氏名</label>
          <div class="col-sm-9">
            <?php if (isset($_POST['name'])) {
              echo $_POST['name'];
            } ?>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">メールアドレス</label>
          <div class="col-sm-9">
            <?php if (isset($_POST['email'])) {
              echo $_POST['email'];
            } ?>
          </div>
        </div>
        <div class="form-group">
          <label class="col-sm-3 control-label">お問い合わせ内容</label>
          <div class="col-sm-9">
            <?php if (isset($_POST['body'])) {
              echo nl2br($_POST['body']);
            } ?>
          </div>
        </div>
        <p class="col-sm-4 col-sm-offset-4 clearfix">
          <input class="btn btn-primary col-sm-5 pull-left" type="submit" name="back" value="戻る">
          <input class="btn btn-primary col-sm-5 pull-right" type="submit" name="submit" value="送信">
        </p>
      </div>
      <input type="hidden" name="name" value="<?php echo $_POST['name'] ?>">
      <input type="hidden" name="email" value="<?php echo $_POST['email'] ?>">
      <input type="hidden" name="body" value="<?php echo $_POST['body'] ?>">
    </form>
  <?php elseif ($page_flag === 2) : ?>
    <p>送信完了しました！</p>
    <input class="btn btn-primary col-sm-4 col-sm-offset-4" type="button" onClick="location.href='index.php'" value="ホームへ">
  <?php else : ?>
    <form class="col-sm-9 col-sm-offset-2" action="" method="post">
      <div class="form-horizontal">
        <div class="form-group">
          <label for="inputName" class="col-sm-3 control-label">氏名</label>
          <div class="col-sm-9">
            <input id="inputName" class="form-control" type="text" name="name" value="<?php if(!empty($_POST['name'])){echo $_POST['name'];} ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="inputName" class="col-sm-3 control-label">メールアドレス</label>
          <div class="col-sm-9">
            <input id="inputName" class="form-control" type="email" name="email" value="<?php if(!empty($_POST['email'])){echo $_POST['email'];} ?>">
          </div>
        </div>
        <div class="form-group">
          <label for="inputBody" class="col-sm-3 control-label">お問い合わせ内容</label>
          <div class="col-sm-9">
            <textarea id="inputBody" class="form-control" name="body" rows="8" cols="80"><?php if(!empty($_POST['body'])){echo $_POST['body'];} ?></textarea>
          </div>
        </div>
        <input class="btn btn-primary col-sm-4 col-sm-offset-4" type="submit" name="confirm" value="確認画面へ">
      </div>
    </form>
  <?php endif; ?>
  </div> -->
</body>
</html>