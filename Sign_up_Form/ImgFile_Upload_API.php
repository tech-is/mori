<?php
header('content-type: application/json; charset=utf-8');
$a = [
    "user" => [
        "name" => "wada",
        "age" => "18",
        "type" => "0",
        "profile" => "",
    ]
];

print_r (json_encode($a, JSON_PRETTY_PRINT));
?>
