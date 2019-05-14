<?php
require_once('./core/core.php');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<title>登録完了画面</title>
<?php insert_CSS(); ?>
</head>
<body>
<div class="container">
<h1><p>仮登録が完了しました</p></h1>
<br>
    <p>会員仮登録ありがとうございました。</p>
    <p>本登録詳細はメールを送付しましたので、</p>
    <p>メール先のリンクにて本登録完了をお願いいたします。</p>
<form method="get" action="index.php">
    <input type="submit" name="home" value="ホームへ">
</form>
</div>
</body>
</html>