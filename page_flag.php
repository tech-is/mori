<?php
    $page_flag = 0; 
    
    //入力画面で確認ボタンが押されたとき確認画面に飛ぶ
    if(!empty($_POST['submit'])){
    $page_flag = 1;
    
    //確認画面で送信ボタンが押されたとき完了画面に飛ぶ
    }elseif(!empty$_POST['confirm']){
        $page_flag = 2
    }
    
    }else{
    $page_flag = 0;
    }
?>

