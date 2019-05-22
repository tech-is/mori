<?php/*
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['count'])) {
        try {
            $pdo = new PDO("mysql: host=127.0.0.1; dbname=teckis; charset=utf8", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('現在登録することができません');
        }
        $sql = 'SELECT * FROM BBS LIMIT ' . $_GET['count'];
        $stmt = $pdo->prepare($sql);
        // $stmt->bindValue(':count', 5);
        // $stmt->bindValue('count', (int)$_GET['count']);
        $stmt->execute();
        $a = [
            "count" => 1,
            "bbs" => []
        ];

        while ($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
            $a["bbs"][] = [
                "id" => $row["ID"],
                "name" => $row["NAME"],
                "text" => $row["TEXT"],
            ];
        }
    }
    header('content-type: application/json; charset=utf-8');

    print_r(json_encode($a, JSON_PRETTY_PRINT));
} elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
     try {
            $pdo = new PDO("mysql: host=127.0.0.1; dbname=teckis; charset=utf8", "root", "");
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('現在登録することができません');
        }

        $stmt = $pdo->prepare($sql);
        $stmt->execute();
}*/

include("db_class_api.php");

$obj = new dbconnect();
$obj->pagenation(5);
