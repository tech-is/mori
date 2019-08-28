<?php
require_once('./core/core.php');
$array = [["name","名前"],["kana","カナ"],["tel","電話"],["mail","メールアドレス"]];
?>
<script type="text/javascript" src="./js/error_check.js"></script>
<!DOCTYPE html>
<html lang="ja">
<head>
    <title>会員登録画面</title>
    <?php insert_CSS(); ?>
</head>
<body>
    <div class="container">
        <h1>会員登録フォーム</h1>
        <form action="Confirm.php" method="post" name="main" onSubmit="return check(this)">
            <?php insert_parts($array); ?>
            <div class ="form-group">
                <label>生まれ年
                <select name="year" required>
                <?php
                for($i=1900; $i<=2019; $i++){
                    echo '<option value="'.$i.'">'.$i.'</option>';}?>
                </select>
                </label>
            </div>
            <div class ="form-group">
                <label>性別
                <input type="radio" checked name="sex" value="male" id="male">男性
                <input type="radio" name="sex" value="female" id="female">女性
                </label>
            </div>
            <div class ="form-group">
                <label>メールマガジン送付
                <input type="checkbox" checked name="magazine" value='1' id="magazine"><br>
                </label>
            </div>
            <div class ="form-group">
                <input type="submit" name="confirm" value="登録">
            </div>
        </form>
    </div>
</body>
</html>