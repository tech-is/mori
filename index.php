<?php
session_start();
$_SESSION["name"] = "hoge";
// $data = $this->get_reserve();
echo $_SESSION["name"];