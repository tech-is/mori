<?php
   function Encode_POST_values(){
       foreach($_POST as $key=>$value){
          $_POST[$key]=htmlspecialchars($value, ENT_QUOTES, "UTF-8");
       }
   }
?>