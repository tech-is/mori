<?php
require_once(__DIR__ . '/core.php');
header("Content-Type: text/json");
if($_POST["mail"]===""||!preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $_POST["mail"])){
    ?>
    {
        "result": false,
        "message": "半角英数で入力してください",
        "field": "mail"
    }
    <?php
    exit;
}
$ret = login_API_session();
?>
{
    "result" : <?php if($ret){echo "true";}
                     else{echo "false";}
               ?>,
    "message": "メアドまたはパスワードが間違っています"
}