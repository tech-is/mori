<?php
$title ="Main";
include __DIR__ . '/layout/layout.php';
$array = [["name", "名前"], ["body", "本文"], ["date", "書込日時"]];
?>
<div class="container">
    <div class="Main-logo">
        <h1>ようこそ！<?= $_SESSION['name'] ?>さん</h1>
    </div>
    <?= form_open();?>
        <p><input type="text" name="name" class="form-control" placeholder="名無しさん" value="<?= $_SESSION['name'] ?>"></p>
        <p><textarea name="body" class="form-control maxlength="100"></textarea></p>
    <?= form_close(); ?>
    <p><?php /*print_r ($this->session->all_userdata()); */?></p>
    <!-- <p><a href="logout"><button class="btn btn-primary" name="logout">ログアウト</button></a></p> -->
    <table class="table table-border">
        <tr>
            <?php foreach($array as $value): ?>
                <th><?=$value[1]?></th>
            <?php endforeach; ?>
        </tr>
        <tr>

        </tr>
    </table>
</div>
</body>
</html>