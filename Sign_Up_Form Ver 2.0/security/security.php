<?php
   function Clean(){
       foreach($_POST as $key=>$value){
       $_POST[$key]=htmlspecialchars($value, ENT_QUOTES, "UTF-8");
       }
   }
   function Pass_Hash(){
    $pass = $_POST["pass"];
    return password_hash($pass, PASSWORD_DEFAULT);
    }
?>