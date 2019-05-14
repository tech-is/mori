<?php
require_once(__DIR__ . "/core/core.php");
Logined_session();
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<style>
    body{
        padding : 50px;
    }
    .error{
        color : red;
    }
</style>
<!-- Bootstrap4.3.1 -->
<link rel="stylesheet" 
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
      crossorigin="anonymous">
<script>
function clearError() { //エラー処理
    document.getElementById("error").innerHTML = "";                
    document.getElementById("error-mail").innerHTML = "";                
    document.getElementById("error-pass").innerHTML = "";                
}

function Login(){ //ログイン処理
    clearError();
    var fd = new FormData(document.getElementById("foo"));
    var request = new XMLHttpRequest();
    request.open("POST", "http://localhost/LoginForm/core/login_API.php");
    request.responseType = 'json';
    request.onload = function(e) {
        var resp = request.response;
        if(resp.result) {
            location.href="./Main.php"
        } else {
            if(resp.field) {
                document.getElementById("error-" + resp.field).innerHTML = resp.message;                
            } else {
                document.getElementById("error").innerHTML = resp.message;
            }
        }
    }
    request.send(fd);
}
</script>
</head>
<body>
    <div class="container">
            <h1>ログインフォーム</h1>
        <br>
        <div class="error" id="error"></div>
        <div class="error">
        <p><?php if(isset($error_log)){ echo $error_log;}?></p>
        </div>
        <form id="foo" onsubmit="Login(); return false;" action="" method="post">
            <label for="mail">メアド</label>
            <br>
            <div id="error-mail" class="error">
            </div>
                <input type="text" class="form-control" name="mail" id="mail">
            <br>
            <label for="pass">パスワード</label>
            <br>
            <div id="error-pass" class="error">
            </div>
            <input type="text" class="form-control" name="pass" id="pass">
            <br>
            <div class ="form-group">
                <input type="submit" class="btn btn-primary" name="login" value="ログイン">
            </div>
        </form>
    </div> <!-- div class="container" --> 
</body>
</html>