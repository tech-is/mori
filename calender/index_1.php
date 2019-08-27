<?php
/**
 * @return カレンダーをhtmlテーブルで作成
 *         
 */
    // タイムゾーンを設定
    date_default_timezone_set('Asia/Tokyo');

    /**
     * 前月・次月リンクが押された場合は、GETパラメーターから年月を取得
     */
    isset($_GET['ym']) ? $ym = $_GET['ym'] : $ym = date('Y-m');

    /**
     * 現在の日時を取得
     */
    $today = date('Y-m-d');

    /**
     * タイムスタンプを作成し、フォーマットをチェック
     */
    $timestamp = strtotime($ym . '-01');
    if ($timestamp === false) {
        $ym = date('Y-m');
        $timestamp = strtotime($ym . '-01');
    }

    // カレンダーのタイトルを作成　例）2017年7月
    $html_title = date('Y年n月', $timestamp);

    /**
     * 前月・次月の年月を取得
     */
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
    // カンマで分割
    $cols = explode(",", $line);
    $holidays[] = [trim($cols[0]), ":<a href='https://ja.wikipedia.org/wiki/".trim($cols[1])."'>".trim($cols[1])."</a>"];
    }

    $prevmonth = date('j', mktime(0, 0, 0, date('m', $timestamp), 0, date('Y', $timestamp)));
    for($a = $prevmonth - $day_of_the_week + 1 ; $a <= $prevmonth; $a++){
        $week .= '<td class="not_current">' .$a. '</td>';
    }
    for ($day = 1; $day <= $day_count; $day++, $day_of_the_week++) {
        $day2 = sprintf('%02d', $day);
        $date = $ym . '-' . $day2;
        $result = array_search($date,array_column($holidays,'0'));
        if ($result === false){
            $datestr= $day;
        }else{
            $datestr='<font color=red>' . $day.$holidays[$result][1]. '</font>';
        }

        if ($today == $date) {
            // 今日の日付の場合は、class="today"をつける
            $week .= '<td class="today">' . $datestr;
        } else {
            $week .= '<td>' . $datestr;
        }
        $week .= '</td>';
        // 週終わり、または、月終わりの場合
        if ($day_of_the_week % 7 == 6 || $day == $day_count) {
            if ($day == $day_count) {
                // 月の最終日の場合、空セルを追加
                for($i=1; $i <= 6 - ($day_of_the_week % 7); $i++){
                $week .= '<td class="not_current">'. $i .'</td>';
                }
            }
            // week配列にtrを追加する
            $weeks[] = '<tr>' . $week . '</tr>';
            // weekをリセット
            $week = '';
        }
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./css/calender.css">
</head>
<body>
    <div class="container">
    <h3><a href="?ym=<?= $prev; ?>">&lt; prev</a> <?= $html_title; ?> <a href="?ym=<?= $next; ?>">next &gt;</a></h3>
    <p style="text-align: right;"><a href="index_1.php">Current</a></p>
        <table class="table table-bordered">
            <tr>
                <th>日</th>
                <th>月</th>
                <th>火</th>
                <th>水</th>
                <th>木</th>
                <th>金</th>
                <th>土</th>
            </tr>
            <?php
                foreach ($weeks as $week) {
                     echo $week;
                }
            ?>
        </table>
    </div>
</body>
</html>
