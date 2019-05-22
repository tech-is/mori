<?php
$title = "Login";
include __DIR__ . '/layout/layout.php'; ?>
	<div class="container">
		<h1 class="Login-logo">User Login</h1>
		<p class="normal-logo">UserIDとパスワードを入力してください</p>
		<?= form_open(); ?>
		<!-- ID -->
		<div class = "form-group">
			<div class = "row justify-content-center">
				<div id = "form">
					<p><input type = "text" placeholder = "UserID" name = "UserID" class="form-control" required></p>
				</div>
			</div>
		</div>
		<!-- </div> -->
		<!-- パスワード -->
		<div class ="form-group">
			<div class="row justify-content-center">
				<div id="form">
				<p><input type="password" placeholder="Password" class="form-control" required></p>
				</div>
			</div>
		</div>
		<!-- </div> -->
		<!-- remember -->
		<div class="row justify-content-center">
			<div class="form-check">
				<p><input type="checkbox" class="form-check-input" value="remember">
				<label class="form-check-label" for="remember">Remember me on this computer</label>
				</label></p>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="btn-group">
				<p><button type="submit" class="btn btn-primary">Login</button></p>
			</div>
		</div>
		<?= form_close(); ?>
		<br><br>
		<p class="a-tag"><a href="">IDかパスワードを忘れたら？</a></p>
		<p class="a-tag"><a href="">新規会員登録</a></p>
	</div>
</body>
</html>
<!-- end -->
