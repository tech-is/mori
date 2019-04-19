<?php
   function Clean(){
       foreach($_POST as $key=>$value){
       $_POST[$key]=htmlspecialchars($value, ENT_QUOTES, "UTF-8");
       }
   }
?>