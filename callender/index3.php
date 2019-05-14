<?php
//***************************** */
//カレンダー作り
//***************************** */

//月送り
$year = date("Y"); //現在の年数
  $month = date("n");
if(!empty($_GET["sengetu"])){
    $month=$month-1;
}elseif(!empty($_GET["jigetu"])){
    $month=$month+1;
}elseif(!empty($_GET["kongetu"])){
    $year = date("Y");
    $month = date("N");
}

  // 月末日を取得
  $last_day = date('j', mktime(0, 0, 0, $month + 1, 0, $year));
  $calender = array();
  $j = 0;

// 月末日までループ
for ($i = 1; $i < $last_day + 1; $i++) {
 
  // 曜日を取得
  $week = date('w', mktime(0, 0, 0, $month, $i, $year));

  // 1日の場合
  if ($i == 1) {
      // 1日目の曜日までをループ
      for ($s = 1; $s <= $week; $s++) {

          // 前半に空文字をセット
          $calendar[$j]['day'] = '';
          $j++;
      }
  }
  // 配列に日付をセット
  $calendar[$j]['day'] = $i;
  $j++;

  // 月末日の場合
  if ($i == $last_day) {

      // 月末日から残りをループ
      for ($e = 1; $e <= 6 - $week; $e++) {

          // 後半に空文字をセット
          $calendar[$j]['day'] = '';
          $j++;
      }
  }
}
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
    // print_r($holiday);
    // exit('プログラムを終了します');
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
   
        <h1> 
        <?php echo $year; ?>年<?= $month ?>月
        </h1>
    </div>
    <form action="" method="GET">
    <input type="submit" name="sengetu" value="<<">
    <input type="submit" name="kongetu" value="今月">
    <input type="submit" name="jigetu" value=">>">
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
        // print_r($value);
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