<?php
//祝日の設定
// function get_array_holiday(){    
    //祝日のcsvを読み込み
    $csv = file_get_contents('http://www8.cao.go.jp/chosei/shukujitsu/syukujitsu_kyujitsu.csv');
    $csv_1 = mb_convert_encoding($csv, "UTF-8", "SJIS");
    $pieces = explode("\r\n", $csv_1);
    $dummy = array_shift($pieces);
    $dummy = array_pop($pieces);
    // print_r($pieces);
    
    $horidays = array(); //日付
    $horiname = array(); //祝日名
    foreach ($pieces as $value) {
        $temp = explode(',', $value);
        $holidays[] = $temp[0];  //日付を設定
        $holiname[] = $temp[1];  //祝日名を設定    
      }
    print_r($holidays);
    // $holi = array_search("2019-05", $holidays);
    // echo $holi;
    
    // foreach($holiday as $value){
    //     if($value)
    // }
    
// }

?>