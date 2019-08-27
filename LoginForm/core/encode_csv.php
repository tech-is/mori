<?php
function dlCsv(){
    //先頭にカラムを挿入
    global $members;
    $array = array("ID", "名前", "電話番号", "メールアドレス", "生まれ年", "性別", "メールマガジン", "PASS_TMP", "PASSWORD");
    array_unshift($members, $array);
    //配列をcsvに出力
    $f = fopen('php://output', 'w');
    foreach ($members as $line) {
        mb_convert_variables('SJIS', 'UTF-8', $line);
        fputcsv($f, $line);
    }
    fclose($f);
    //ダウンロード
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=download.csv');
    header('Content-Transfer-Encoding: binary');
    exit;
}
?>