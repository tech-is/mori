<?php
$array = array("name"=>"名前", "kana"=>"カナ", "tel"=>"電話番号", "mail"=>"メールアドレス",);
$title = "Signup";
include __DIR__ . '/layout/layout.php'; ?>
    <div class="container">
        <div class="Main-logo">
            <h1>SignUp</h1>
        </div>
        <?= form_open("main/signup_validation"); ?>
        <?php foreach($array as $key => $val): ?>
            <div class ="form-group">
                <div class="error">
                    <?= form_error($key); ?>
                </div>
                <input type=text name=<?=$key?> class="form-control" placeholder=<?=$val?>>
            </div>
        <?php endforeach; ?>
        <div class ="form-group">
            <label for="year">生まれ年</label>
            <select name="year" required>
                <?php
                for($i=1900; $i<=2019; $i++){
                    echo '<option value="'.$i.'">'.$i.'</option>';}
                ?>
            </select>
        </div>
        <div class ="form-group">
            <p><label for="sex">性別</label>
            <input type="radio" name="sex" value="male" checked>男性</p>
            <p><input type="radio" name="sex" value="female">女性</p>
        </div>
        <div class ="form-group">
            <label for="magazine">メールマガジン送付</label>
            <input type="checkbox" checked name="magazine" value='1'><br>
        </div>
        <div class ="from-group">
            <button name="submit" class="btn btn-primary">登録</button>
        </div>
        <?= form_close(); ?>
    </div>
</body>

</html>
