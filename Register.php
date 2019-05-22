<?php
//array["name"] = 名前
$array=array("UserID"=>"UserID", "name"=>"名前", "kana"=>"カナ", "tel"=>"電話番号", "zip"=>"郵便番号", "adress"=>"住所");
?>
<html>
<head>
<title>Register</title>
<style>
	.container {
		padding-top: 80px;
	}

	.Login-logo {
		text-align: center;
		color: #000;
		font-size: 50px;
		font-weight: 600;
		display: block;
	}

	.normal-logo {
		text-align: center;
		color: #000;
		font-weight: 600;
		display: block;
	}
</style>
<!-- bootstrap/4.3.1 -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<!-- font-awesome -->
<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
<!-- END -->
</head>
<body>
<nav class="navbar navbar-dark bg-dark">
<a href="#" class="navbar-brand">Tech-is</a>
</nav>
<div class="container">
    <h1 class="Login-logo">Register</h1>
    <br>
    <p class="normal-logo">必要事項を記入してください</p>
    <form method="POST" action="#">
        <?php foreach($array as $key => $val): ?>
            <div class="row justify-content-center">
            <p><input type=text name=<?=$key?> placeholder=<?=$val?> class="form-control" required></p>
            </div>
        <?php endforeach; ?>
        <div class="row justify-content-center">
            <p><input type=text name=<?=$key?> placeholder="住所 例：愛媛県松山市港町1-2-1" class="form-control" required></p>
        </div>
    <div class="row justify-content-center">
        <table>
        <tbody>
        <tr><th>生年月日</th>
        <td><pre></td>
        <td>西暦</td>
        <td><pre></td>
        <td><select name="year" required>
        <?php $date = date('Y');?>
        <?php for($y=1910; $y<=$date; $y++):?>
            <option><?=$y?></option>
        <?php endfor ?>
        </select></td><td>年</td>
        <td><select>
        <?php for($m=1; $m<=12; $m++):?> 
        <option><?=$m?></option>
        <?php endfor;?>
        </select></td><td>月</td></tr>
        </thead>
        </table>
    </div>
</div>
</html>