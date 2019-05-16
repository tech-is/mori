<?php
//***************************** */
//カレンダー作り
//***************************** */

// タイムゾーンを設定
date_default_timezone_set('Asia/Tokyo');

//月送り
if (isset($_GET['ym'])) {
  $ym = $_GET['ym'];
} else {
  // 今月の年月を表示
  $ym = date('Y-m');
}

// 今日の日付 フォーマット
$today = date('Y-m-j', time());

// 前月・次月の年月を取得
$prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
$next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));

// 該当月の日数を取得
$day_count = date('t', $timestamp);

// 曜日を取得
$day_of_a_week = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));

$week　= str_repeat('<td></td>', $day_of_a_week);

//祝日設定処理
$horidays = array();
$horiname = array();
// 内閣府ホームページの"国民の祝日について"よりデータを取得する
$res = file_get_contents('http://www8.cao.go.jp/chosei/shukujitsu/syukujitsu_kyujitsu.csv'); //回線が不安定な時にエラー出ます
$res = mb_convert_encoding($res, "UTF-8", "SJIS"); //文字コード変換
$pieces = explode("\r\n", $res);
$dummy = array_shift($pieces); //先頭の空欄削除
$dummy = array_pop($pieces); //末尾の空欄削除

foreach($pieces as $key => $value) {
  $temp = explode(',', $value);
  $holiday[$temp[0]] = $temp[1]; //keyに日付valueに祝日名を格納
    }
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h1><?= $year; ?>年<?= $month ?>月</h1>
    </div>
    <form action="" method="GET">
    <input type="submit" name="prev" value="<<">
    <input type="submit" name="now" value="今月">
    <input type="submit" name="next" value=">>">
    </form>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
          <tr>
            <th class="danger"><span class="text-danger">日</span></th>
            <th>月</th>
            <th>火</th>
            <th>水</th>
            <th>木</th>
            <th>金</th>
            <th class="info"><span class="text-info">土</span></th>
          </tr>
        </thead>
        <tbody>
    <?php
      $j = 0;
       // echo date('w', mktime(0, 0, 0, 5, 1, 2019));
       // print_r($calendar);
      echo "<tr>";
      foreach ($calendar as $value){
        if(!empty($value['day'])){
          $d = date('Y-m-d', mktime(0, 0, 0, $month, $value['day'], $year)); //
          // echo $d.", ";
          $w = date('w', mktime(0, 0, 0, $month, $value['day'], $year)); //
          // echo $w.",";
            //祝日の時
            if(array_key_exists($d, $holiday) ) {
              if($w==6){
                echo '<td class="danger"><span class="text-danger">'.$value['day'].$holiday[$d].'</span></td>';
                echo '</tr><tr>';
              }else{
                echo '<td class="danger"><span class="text-danger">'.$value['day'].$holiday[$d].'</span></td>';
              }
            //日曜日の時
            }elseif($w==0){
             echo '<td class="danger"><span class="text-danger">'.$value['day'].'</span></td>';
            //土曜日の時
            }elseif($w==6){
             echo '<td class="info"><span class="text-info">'.$value['day'].'</td>';
             echo '</tr><tr>';
            //それ以外の曜日
            }else{
             echo '<td>'.$value['day'].'</td>';
            }
        }else{
             echo "<td></td>";
        }
      }
     ?>
     </tbody>
    </table> 
    </div>
</body>
</html>