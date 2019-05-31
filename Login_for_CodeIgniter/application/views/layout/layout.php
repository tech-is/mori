<!DOCTYPE html>
<html>
<html lang="ja">
<head>
	<meta charset="utf-8">
	<title><?= $title ?></title>
	<?php include __DIR__ . '/CSS_layout.html'; ?>
</head>
<body>
	<nav class="navbar navbar-dark bg-dark">
		<a href="index" class="navbar-brand">Tech-M</a>
		<a class="navbar-item nav-link">
		<?php if(isset($_SESSION['name']))
		{
			echo $_SESSION['name'];
		}else{
			echo "Login";
		}
		?>
	</a>
	</nav>