<?php
$title = "Register";
include __DIR__ . '/layout/layout.php'; ?>
	<div class="container">
		<div class="Main-logo">
			<h1>本登録</h1>
		</div>
		<div class="normal-logo">
			<p>パスワードを半角英数で8文字以上入力してください</p>
		</div>
		<?= form_open("main/register_password"); ?>
		<div class="form-group">
			<div class ="error"><?= form_error("pass") ?></div>
			<input type="password" name="pass" class="form-control" placeholder="パスワード">
		</div>
		<div class="form-group">
			<div class ="error"><?= form_error("chkpass") ?></div>
			<input type="password" name="chkpass" class="form-control" placeholder="パスワード確認">
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-primary" name="submit">
		</div>
		<input type="hidden" name="key" value="<?=$key?>">
		<?= form_close(); ?>
	</div>
</body>
</html>

