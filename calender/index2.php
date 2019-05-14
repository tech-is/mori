<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ホームページで使うカレンダー（祝日つき）（PHPプログラムのベース）</title>
    <meta charset="utf-8">
    <meta name="description" content="ホームページで使うカレンダー（祝日つき）（PHPプログラムのベース）">
    <meta name="author" content="shimamura">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
<body>
<?php
  //Control 日付作成処理
  // １ヶ月分の日付を格納
  $days = array();
  // １年分の日付を格納
  $cals = array();
  //今月の最終日を格納
  $lastday = date('Y-m-t');

  //祝日設定処理
  $conf_horiday = true;
  if ($conf_horiday) {
    $horidays = array();
    $horiname = array();
    // 内閣府ホームページの"国民の祝日について"よりデータを取得する
    $res = file_get_contents('http://www8.cao.go.jp/chosei/shukujitsu/syukujitsu_kyujitsu.csv');
    $res = mb_convert_encoding($res, "UTF-8", "SJIS");
    $pieces = explode("\r\n", $res);
    $dummy = array_shift($pieces);
    $dummy = array_pop($pieces);

    foreach ($pieces as $key => $value) {
      $temp = explode(',', $value);
      $horidays[] = $temp[0];  //日付を設定
      $horiname[] = $temp[1];  //祝日名を設定
    }
  }

  for ($i = 0; $i <= 365; $i++) {
    //日付を１日ずつ増やしていく mktime(hour, minute, second, month, day, year)
    $day = date('Y-m-d', mktime(0, 0, 0, date('m'), date('1') + $i, date('Y')));
    //日付を格納する
    $days[$i]['day'] = $day;
    //祝日を設定する
    if ($conf_horiday) {
      $ind = array_search($day,$horidays);
      if ($ind){
        $days[$i]['hori'] = $horiname[$ind];
      } else {
        $days[$i]['hori'] = '';
      }
    } else {
      $days[$i]['hori'] = '';
    }
    //その他必要な処理をここに追加する
    //$days[$i]['hoge'] = '';

    if ($day == $lastday){
      //月末日の処理
      //次の月末日で更新する
      $target_day = date("Y-m-1", strtotime($lastday));
      $lastday = date("Y-m-t",strtotime($target_day . "+1 month"));
      //月ごとに格納する
      $cals[] = $days;
      $days = array();
    }
  }
?>




  <div class="container">
    <h1>カレンダー（祝日つき）</h1>
<?php
  //View 表示処理
  //$weeklavel = array("日", "月", "火", "水", "木", "金", "土");
  //echo $weeklavel[$ww];
  foreach ($cals as $key => $mm) {
    foreach ($mm as $key => $dd) {
      //月を表示する
      $dayD = new DateTime($dd['day']);
      echo '<h3>'.$dayD->format('Y').'年'.$dayD->format('n').'月</h3>';
      break;
    }
?>
    <div class="table-responsive">
      <!-- table class="table table-bordered" style="table-layout:fixed;" -->
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
          <tr>
<?php
    $j = 0;
    $first = true;
    foreach ($mm as $key => $dd) {
      $dayD = new DateTime($dd['day']);
      $ww = $dayD->format('w');

      if ($first){
        //月の初めの開始位置を設定する
        for ($j = 0; $j < $ww; $j++) {
          //$jはこの後も使用する
          echo '<td></td>';
        }
        $first = false;
      }
      if ($dd['hori']){
        //祝日
        echo '<td class="danger"><span class="text-danger">'.$dayD->format('j').$dd['hori'].'</span></td>';
      } elseif($j == 0) {
        //日曜日
        echo '<td class="danger"><span class="text-danger">'.$dayD->format('j').'</span></td>';
      } elseif($j == 6) {
        //土曜日
        echo '<td class="info"><span class="text-info">'.$dayD->format('j').'</span></td>';
      } else {
        //その他平日
        echo '<td>'.$dayD->format('j').'</td>';
      }

      $j = $j + 1;
      if ($j >= 7){
        //土曜日で折り返す
        echo '</tr><tr>';
        $j = 0;
      }
    }  //月ごとの foreach ここまで
?>
          </tr>
        </tbody>
      </table>
    </div><!-- table-responsive end -->
<?php
  }  //１年分の foreach ここまで
?>
  </div><!-- container end -->
</body>
</html>