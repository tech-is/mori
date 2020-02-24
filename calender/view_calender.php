<?php
define('CURRENT_DIR', dirname(__FILE__));
define('CSV_DIR', CURRENT_DIR.'/csv');
define('CSV_FILEPATH', CSV_DIR.'/holidays.csv');

 // タイムゾーンを設定
date_default_timezone_set('Asia/Tokyo');

function create_csvfolder()
{
    if(!mkdir(CSV_DIR, 0775)) {
        throw new Exception("csvディレクトリの作成に失敗しました");
    }
}

function download_csv($url)
{
    $tmp = file_get_contents($url);
    $tmp = mb_convert_encoding($tmp, 'UTF-8', 'SJIS');
    $fp = fopen(CSV_FILEPATH, 'w');
    fwrite($fp, $tmp);
    fclose($fp);
}

function load_csv() 
{
    $file = new SplFileObject(CSV_FILEPATH);
    $file->setFlags(
        SplFileObject::READ_CSV | // CSV 列として行を読み込みます。
        SplFileObject::READ_AHEAD | // 先読み/巻き戻しで読み出します。
        SplFileObject::SKIP_EMPTY // ファイルの空行を読み飛ばします。(READ_AHEAD フラグ有効時)
    );
    foreach ($file as $row) {
        if ($file->key() > 0 && ! $file->eof()) {
            $date = str_replace('/', '-', $row[0]);
            $records[$date] = $row[1];
        }
    }
    if (!is_array($records) || empty($records)) {
        throw new Exception('CSVファイルの取得に失敗しました');
    } 
    $last = array_key_first($records);
    return $records;
}

function generate_calender($timestamp, $ym, $holidays)
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
    if(!is_dir(CSV_DIR)) {
        create_csvfolder();
    }
    // 前月・次月リンクが押された場合は、GETパラメーターから年月を取得
    $ym = !empty($_GET['ym']) ? $_GET['ym'] :date('Y-n');

   // タイムスタンプを作成し、フォーマットをチェック
    $timestamp = strtotime($ym. '-01');

   // カレンダーのタイトルを作成　例）2017年7月
    $title = date('Y年n月', $timestamp);

   // 前月・次月の年月を取得
    $prev = date('Y-n', mktime(0, 0, 0, date('n', $timestamp)-1, 1, date('Y', $timestamp)));
    $next = date('Y-n', mktime(0, 0, 0, date('n', $timestamp)+1, 1, date('Y', $timestamp)));

   //内閣府から祝日を取得する
    if (!is_file(CSV_FILEPATH)) {
        download_csv('https://www8.cao.go.jp/chosei/shukujitsu/syukujitsu.csv');
    }
    $holidays = load_csv();
    $weeks = generate_calender($timestamp, $ym, $holidays);

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
            <span class="title-wraper"><?= $title; ?></span>
            <a href="?ym=<?= $next; ?>">
                next &gt;&gt;
            </a>
        </div>
        <div class="my-4" style="text-align: right">
            <a href="view_calender.php">Current</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>日</th>
                    <th>月</th>
                    <th>火</th>
                    <th>水</th>
                    <th>木</th>
                    <th>金</th>
                    <th>土</th>
                </tr>
            </thead>
            <tbody>
            <?php
                foreach ($weeks as $week) {
                    echo $week;
                }
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>
