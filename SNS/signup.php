<?php 
include('./core/core.php');
?>
<link rel="stylesheet" type="text/css" href="./css/signup.css">
</head>
<body>
    <div class="container">
        <div class="Main-logo">
			<h1>SignUp</h1>
		</div>
        <form method = "post" action = "#" >
            <div class="form-group">
                    <label for="nickname">ニックネーム</label>
                    <input type="text" class="form-control require" id="nickname" placeholder="ニックネームを10文字以内">
            </div>
            <div class="form-group">
                <label for="mail">メールアドレス</label>
                <input type="text" class="form-control require" id="mail" placeholder="メールアドレスを入力" maxlength="200">
            </div>
            <p><button class="btn btn-primary" name="send">送信</button></p>
        </form>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
<script src='js/validation.js'></script>
</html>
