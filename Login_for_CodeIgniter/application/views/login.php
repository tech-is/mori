<?php
$title = "Login";
include __DIR__ . '/layout/layout.php';
?>
    <div class="container">
        <div class="Main-logo">
            <h1>User Login</h1>
        </div>
        <div class="normal-logo">
            <p>UserIDとパスワードを入力してください</p>
        </div>
        <div class="error">
            <p><?php isset($error) ? print $error : print "" ; ?></p>
        </div>
        <?= form_open("main/login_validation"); ?>
        <!-- メールアドレス -->
        <div class ="form-group">
            <div class="error">
                <?= form_error("mail"); ?>
            </div>
            <input type = "text" name="mail" placeholder = "メールアドレス" class="form-control">
        </div>
        <!-- パスワード -->
        <div class ="form-group">
            <div class="error">
                <?= form_error("pass"); ?>
            </div>
            <input type="password" name="pass" placeholder="パスワード" class="form-control">
        </div>
        <!-- remember -->
        <div class="form-check">
            <p>
                <input type="checkbox" class="form-check-input" value="remember">
                <label class="form-check-label" for="remember">ログインを保持</label>
            </p>
        </div>
        <div class="btn-group">
            <p><button type="submit" class="btn btn-primary">Login</button></p>
        </div>
        <?= form_close(); ?>
        <p class="a-tag"><a href="">IDかパスワードを忘れたら？</a></p>
        <p class="a-tag"><?= anchor ('main/signup/', '新規会員登録');?></p>
    </div>
</body>
</html>
<!-- end -->
