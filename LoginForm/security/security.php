<?php
   function Clean(){ //XSS対策
       foreach($_POST as $key=>$value){
       $_POST[$key]=htmlspecialchars($value, ENT_QUOTES, "UTF-8");
       }
   }
//    function Token(){ //ランダムトークン生成
//        $_SESSION['key'] = sha1(session_id() . '_' .microtime()){
//        }
//    }
?>