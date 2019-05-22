<!-- mail_form.html -->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; UTF-8" />
<title>sample</title>
</head>
<body>
メールを送信します<br>
<!-- send.phpにPOSTします -->
<form action="send.php" method="post">
宛先メール:<input type="TEXT" name="to" id="to" placeholder="メールアドレス" ><br>
<br>
件名:<input type="TEXT" name="subject" id="subject" Placeholder="件名"><br>
<br>
本文<br>
<textarea name="message01" id="message01" cols="40" rows="10" placeholder="本文"></textarea>
<br>
<input type="submit" value="送信" />
</form>
</body>
</html>