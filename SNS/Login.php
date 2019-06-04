<?php include('./parts/header_layout.html'); ?>
<link rel="stylesheet" type="text/css" href="./css/login.css">
</head>
<body>
    <div class="container">
		<div class="Main-logo">
			<h1>User Login</h1>
		</div>
		<div class="normal-logo">
			<p>UserIDとパスワードを入力してください</p>
		</div>
		<div id="error"></div>
		<!-- メールアドレス -->
        <form method="post" action="">
		<div class ="form-group">
			<input type = "text" name="mail" placeholder = "メールアドレス" class="form-control">
		</div>
		<!-- パスワード -->
		<div class ="form-group">
			<input type="password" name="pass" placeholder="パスワード" class="form-control">
		</div>
		<!-- remember -->
		<div class="form-check">
			<p><input type="checkbox" class="form-check-input" value="remember">
				<label class="form-check-label" for="remember">ログインを保持</label>
			</label></p>
		</div>
		<div class="btn-group">
			<p><button type="submit" class="btn btn-primary">Login</button></p>
		</div>
        </form>
		<p class="a-tag"><a href="">IDかパスワードを忘れたら？</a></p>
		<p class="a-tag"><a href="./signup.php">新規会員登録</a></p>
	</div>
</body>
</html> 