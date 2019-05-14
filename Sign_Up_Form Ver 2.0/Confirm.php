<?php
session_start();
require_once('./core/core.php');
Encode_POST_values();
$_SESSION['key'] = sha1(session_id() . '_' . uniqid());
foreach($_POST as $key => $value){
    $_SESSION[$key] = $value;
}
if(isset($_POST['submit'])){
    if(isset($_POST['token']) && $_POST['token']===$_SESSION['key']){
        str_replace(array('-', 'ー', '−', '―', '‐'), '', $_POST['tel']);
        // Send_DB($pdo, $hash);
        require('./mailer/mail.php');
        session_destroy();
        header('Location: ./thanks.php');
        exit;
    }else{	
        echo "CSRF攻撃を受けたので強制終了します";
        exit;
    }
}
?>
<html>
<!DOCTYPE html>
<html lang="ja">
<head>
    <title>確認画面</title>
    <?php insert_CSS(); ?>
</head>
<body>
    <div class="container">
        <h1>確認画面</h1><br>
        <p>名前:<?= $_SESSION['name'] ?></p>
        <p>カナ:<?= $_SESSION['kana'] ?></p>
        <p>電話番号:<?= $_SESSION['tel'] ?></p>
        <p>メールアドレス:<?= $_SESSION['mail'] ?></p>
        <p>生まれ年:<?= $_SESSION['year'] ?>年</p>
        <p>性別:<?php if($_SESSION['sex'] === "male"){ echo "男性"; }else{ echo "女性"; } ?></p>
        <p>メールマガジン:<?php if($_SESSION['magazine'] == 1){echo "送付する";} else {echo "送付しない";} ?></p>
        <form action="" method="post">
        <?php foreach($_SESSION as $key=>$val): ?>
        <input type="hidden" name="<?= $key ?>" value="<?= $val ?>">
        <?php endforeach; ?> 
        <input type="hidden" name="token" value="<?= $_SESSION['key']?>">
        <input type="button" onclick="history.back();" value="戻る">
        <input type="submit" name="submit" value="登録">
        </form>
    </div> <!-- <div class="container"> -->
</body>
</html>