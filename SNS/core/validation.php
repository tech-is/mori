<?php

function validation()
{
    $name = $_POST['nickname'];
    $mail = $_POST['mail'];
    $error = name_validation($name);
    $error = mail_validation($mail);
    if($error == true){
        
    }else{
 
    }
}

function name_validation($name)
{
    htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
    if($name === "")
    {
        return true;
    }
}

function mail_validation($mail)
{
    if($mail === "" || !preg_match('/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/', $_POST["mail"])) 
    {
        return true;
    } 
    else 
    {
        $error = unique_check();
        if($error == true){
            return true;
        }
    }
}

function unique_check()
{
    $database = new database();
    $sql = "SELECT * FROM teckis.member where mail = $mail";
    if($database->select($sql)) 
    {
        return true;
    }
}
