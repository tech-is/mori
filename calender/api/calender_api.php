<?php
/**
 * 
 * @param $ym 年月を格納
 * @return json形式でカレンダーのデータを格納        
 * 
 */
if(isset($_GET['year'])){
    $ym = $_GET['year'];
}
    // タイムゾーンを設定
    date_default_timezone_set('Asia/Tokyo');
    // 前月・次月リンクが押された場合は、GETパラメーターから年月を取得
    isset($ym) ? $ym : $ym = date('Y-m');
    
    // 現在の日時を取得
    $today = date('Y-m-d');

    // タイムスタンプを作成し、フォーマットをチェック
    $timestamp = strtotime($ym . '-01');
    if ($timestamp === false) {
        $ym = date('Y-m');
        $timestamp = strtotime($ym . '-01');
    }

    // カレンダーのタイトルを作成　例）2017年7月
    $html_title = date('Y年n月', $timestamp);

    // 前月・次月の年月を取得
    $prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
    $next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));

    // 該当月の日数を取得
    $day_count = date('t', $timestamp);

    $day_of_the_week = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));

    $weeks = [];
    $week = '';
    //内閣府から祝日を取得する
    $url = 'http://www8.cao.go.jp/chosei/shukujitsu/syukujitsu_kyujitsu.csv';
    $data = file_get_contents($url);
    if (!$data) {
        throw new Exception("祝日データ取得に失敗しました。");
    }
    // CSV が SJIS なので文字コードを変換しておく
    $data = mb_convert_encoding($data, 'UTF-8', 'SJIS');
    // 行ごとに分割
    $lines = explode("\n", $data);
    $dummy = array_shift($lines);
    $dummy = array_pop($lines);
    $holidays = [];
    foreach ($lines as $line) {
    $cols = explode(",", $line);
    $holidays[] = [trim($cols[0]), ":".trim($cols[1])];
    }

    $prevmonth = date('j', mktime(0, 0, 0, date('m', $timestamp), 0, date('Y', $timestamp)));
    for($a = $prevmonth - $day_of_the_week + 1 ; $a <= $prevmonth; $a++){
        $days = date('Y年m月j日', mktime(0, 0, 0, date('m', $timestamp)-1, $a, date('Y', $timestamp)));
        $week .= '<td class="not_current" data-date="'. $days . '" >' .$a. '</td>';
    }
    
    for ($day = 1; $day <= $day_count; $day++, $day_of_the_week++) {
        $days = date('Y年m月j日', mktime(0, 0, 0, date('m', $timestamp), $day, date('Y', $timestamp)));
        $day2 = sprintf('%02d', $day);
        $date = $ym . '-' . $day2;
        // echo $date . "\n";
        $result = array_search($date,array_column($holidays,'0'));
        if ($result === false){
            $datestr= $day;
        }else{
            $datestr='<font color=red>' . $day.$holidays[$result][1]. '</font>';
        }

        if ($today == $date) {
            // 今日の日付の場合は、class="today"をつける
            $week .= '<td class="today" data-date="' .$days. '">' . $datestr;
        } else {
            $week .= '<td data-date="' .$days. '">' . $datestr;
        }
        $week .= '</td>';
        // 週終わり、または、月終わりの場合
        if ($day_of_the_week % 7 == 6 || $day == $day_count) {
            if ($day == $day_count) {
                // 月の最終日の場合、空セルを追加
                // 例）最終日が木曜日の場合、金・土曜日の空セルを追加
                for($i=1; $i <= 6 - ($day_of_the_week % 7); $i++){
                $days = date('Y年m月j日', mktime(0, 0, 0, date('m', $timestamp)+1, $i, date('Y', $timestamp)));
                $week .='<td class="not_current" data-date="' .$days. '">'.$i.'</td>';
                }
            }
            // week配列にtrを追加する
            $weeks[] = '<tr>' . $week . '</tr>';
            // weekをリセット
            $week = '';
        }
    }
    // header('content-type: application/json; charset=utf-8');
    // print_r(json_encode($weeks, JSON_PRETTY_PRINT));
?>
<h3><?= $html_title?></h3>
<button class='btn btn-primary' data-year=<?=$prev?>>prev</button>
<button class='btn btn-primary' data-year=<?=date('Y-m')?>>Current</button>
<button class='btn btn-primary' data-year=<?=$next?>>next</button>
<br>
<br>
<table class="table table-bordered">
    <tr>
        <thead>
            <th>日</th>
            <th>月</th>
            <th>火</th>
            <th>水</th>
            <th>木</th>
            <th>金</th>
            <th>土</th>
        </thead>
    </tr>
    <?php
        foreach ($weeks as $week) {
            echo $week;
        }
    ?>
</table>
