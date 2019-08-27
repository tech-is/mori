<?php
    date_default_timezone_set('Asia/Tokyo');
    $week = ["日", "月", "火", "水", "木", "金", "土"];
    $error = "";
    if(isset($_GET["year"]) && isset($_GET["month"]) && isset($_GET["day"]))
    {
        if($_GET["year"] !=="" && $_GET["month"] !=="" && $_GET["day"] !== "")
        {
            $key = date("w", mktime(0, 0, 0, $_GET["month"], $_GET["day"], $_GET["year"]));
            $message = $week[$key];
        }else{
            $error = "日付が入っていません";
        }
    }
?>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
    <p>日付を入力してください</p>
    <?= isset($message)? $message."曜日です" : $error ;?>
    <form action="" method="GET">
    <input type="text" name="year" placeholder="年" require>
    <input type="text" name="month" placeholder="月" require>
    <input type="text" name="day" placeholder="日" require>
    <p><button type="submit">OK</button></p>
    </form>
</body>
</html>