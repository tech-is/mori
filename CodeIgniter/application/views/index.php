<!DOCTYPE html>
<html lang="ja">
<head>
    <title>一言掲示板</title>
<!-- CSS -->
<style type=text/css>
	.container{
            padding: 80px;
    }
</style>
<!-- Bootstrap4.3.1 -->
<link rel="stylesheet" 
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" 
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
      crossorigin="anonymous">
</head>
<div style="background-color: #efefef;">
    <div class="container">
    <h1>一言掲示板</h1>
		<br>
		<?= form_open('welcome/send'); ?><!-- <form> -->
			<p><label for="name" class="control-label">名前</label>
			<input type="text" class="form-control" name="name" maxlength="30"></p>
			<label for="body" class="control-label">本文</label>
			<?php echo validation_errors('<font color="red">', '</font>'); ?>
			<p><textarea name="body"
					class="form-control"
					maxlength="100"
					></textarea></p>
			<p><input type="submit" class="btn btn-primary" name="submit" value="書き込み"></p>
		<?= form_close(); ?> <!-- </form> -->
		<br>
	<h2>書き込みログ</h2>
		<br>
		<!-- 取得したデータを表示する -->
		<?= $this->table->generate($rows); ?>
		<?php echo $this->pagination->create_links(); ?>

	</div> <!-- <div class="container"> -->
</div> <!-- div style="background-color: #efefef;"> -->
</body>
</html>
