header('content-type: application/json; charset=utf-8');
$a = [
    "user" => [
        "name" => "wada",
        "age" => "18",
        "type" => "0",
        "profile" => "",
    ]
];

echo json_encode($a);
