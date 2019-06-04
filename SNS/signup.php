<?php 
include('./core/core.php');
$array = ["userid" => "ユーザーID", "mail"=>"メールアドレス"];
?>
<link rel="stylesheet" type="text/css" href="./css/signup.css">
</head>
<body>
    <div class="container">
        <div class="Main-logo">
			<h1>SignUp</h1>
		</div>
        <form method = "post" action = "./core/dadebase.php">
            <?php foreach($array as $key => $val): ?>
            <div class="form-group">
                <p><input type="text" class="form-control" name="<?= $key ?>" placeholder="<?= $val ?>"></p>
            </div>
            <?php endforeach; ?>
            <p><button class="btn btn-primary" name="send">送信</button></p>
        </form>
    </div>
</body>
</html>
