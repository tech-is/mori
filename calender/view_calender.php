<?php
define('CURRENT_DIR', dirname(__FILE__));
define('CSV_PATH', CURRENT_DIR.'/csv/syukujitsu.csv');

 // タイムゾーンを設定
date_default_timezone_set('Asia/Tokyo');

function download_csv($url) {
    $tmp = file_get_contents($url);
    if (!$tmp){ 
        throw new Exception("csvダウンロードに失敗しました");
    }
    $tmp = mb_convert_encoding($tmp, 'UTF-8', 'SJIS');
    $fp = fopen(CSV_PATH, 'w');
    fwrite($fp, $tmp);
    fclose($fp);
    return;
}

function load_csv() {
    $row = 1;
    $array = [];
    if (($handle = (fopen(CSV_PATH, "r"))) !== FALSE) {
        while (($data = (fgetcsv($handle, 1000, ","))) !== FALSE) {
            if (is_array($data)) {
                $date = str_replace('/', '-', $data[0]);
                $array[$date] = $data[1];
            }
        }
        fclose($handle);
    } else {
        throw new Exception('CSVファイルの取得に失敗しました');
    }
    array_shift($array);
    return $array;
}

function generate_table($timestamp, $ym, $holidays)
{
    $today = date('Y-n-D');
    $week = '';
    $weeks = [];
    // 該当月の日数を取得
    $day_count = date('t', $timestamp);
    $day_of_the_week = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
    $prevmonth = date('j', mktime(0, 0, 0, date('m', $timestamp), 0, date('Y', $timestamp)));

    for ($a = $prevmonth - $day_of_the_week + 1 ; $a <= $prevmonth; $a++){
        $week .= '<td class="not_current">' .$a. '</td>';
    }

    for ($day = 1; $day <= $day_count; $day++, $day_of_the_week++) {
        $date = $ym . '-' .$day;
        if (array_key_exists($date, $holidays)){
            if ($holidays[$date] == "休日") {
                $datestr = "<span style='color:red'>{$day} {$holidays[$date]}</span>";
            } else {
                $datestr = "<a href='https://ja.wikipedia.org/wiki/{$holidays[$date]}' target='_blank'><span style='color:red'>{$day} {$holidays[$date]}</span></a>";
            }
        } else {
            $datestr = $day;
        }

        if ($date == $today) {
            // 今日の日付の場合は、class="today"をつける
            $week .= "<td class='today'>{$datestr}</td>";
        } else {
            $week .= "<td>{$datestr}</td>";
        }
        //週終わり、または、月終わりの場合
        if ($day_of_the_week % 7 == 6 || $day == $day_count) {
            if ($day == $day_count) {
                // 月の最終日の場合、空セルを追加
                for ($i=1; $i <= 6 - ($day_of_the_week % 7); $i++) {
                    $week .= '<td class="not_current">'. $i .'</td>';
                }
            }
            // weeks配列にtrを追加する
            $weeks[] = '<tr>' . $week . '</tr>';
            // weekをリセット
            $week = '';
        }
    }
    return $weeks;
}

try {
     // 前月・次月リンクが押された場合は、GETパラメーターから年月を取得
    isset($_GET['ym']) ? $ym = $_GET['ym'] : $ym = date('Y-n');

    // タイムスタンプを作成し、フォーマットをチェック
    $timestamp = strtotime($ym. '-01');

    if ($timestamp === false) {
        $ym = date('Y-n');
        $timestamp = strtotime($ym. '-01');
    }

    // カレンダーのタイトルを作成　例）2017年7月
    $html_title = date('Y年n月', $timestamp);

    // 前月・次月の年月を取得
    $prev = date('Y-n', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
    $next = date('Y-n', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));

    //内閣府から祝日を取得する
    if (!is_file(CURRENT_DIR.'/csv/syukujitsu.csv')) {
        download_csv('https://www8.cao.go.jp/chosei/shukujitsu/syukujitsu.csv');
    }
    $holidays = load_csv();
    $weeks = generate_table($timestamp, $ym, $holidays);
    
} catch (Exception $e) {
    echo '捕捉した例外: ',  $e->getMessage(), "\n";
    exit;
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Calender</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <style>
        th {
            width: 10rem;
            text-align: center;
        }
        td {
            width: 10rem;
            height: 8rem;
        }
        td.today {
            background: orange;
        }
        th:nth-of-type(1), td:nth-of-type(1) {
            color: red;
        }
        th:nth-of-type(7), td:nth-of-type(7) {
            color: blue;
        }
        td.not_current {
            color: #c6d3d3;
        }
        .title-wraper {
            font-size: 2rem;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="my-4 d-flex justify-content-between">
            <a href="?ym=<?= $prev; ?>">
                &lt;&lt; prev
            </a>
            <span class="title-wraper"><?= $html_title; ?></span>
            <a href="?ym=<?= $next; ?>">
                next &gt;&gt;
            </a>
        </div>
        <div class="my-4" style="text-align: right">
            <a href="view_calender.php">Current</a>
        </div>
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
