<?php

class dbconnect {
    //定数の宣言
    const DB_NAME='teckis';
    const HOST='127.0.0.1';
    const UTF='utf8';
    const USER='root';
    const PASS='';
    //データベースに接続する関数
    public function pdo(){
        /*phpのバージョンが5.3.6よりも古い場合はcharset=".self::UTFが必要無くなり、array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES '.SELF::UTF')が必要になり、5.3.6以上の場合は必要ないがcharset=".self::UTFは必要になる。*/
        $dsn="mysql:dbname=".self::DB_NAME.";host=".self::HOST.";charset=".self::UTF;
        $user=self::USER;
        $pass=self::PASS;
        try{
        $pdo=new PDO($dsn,$user,$pass);
        }catch(Exception $e){
        echo 'error' .$e->getMesseage;
        die();
        }
        //エラーを表示してくれる。
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        return $pdo;
    }
    //SELECT文のときに使用する関数。
    public function select($sql){
        $hoge=$this->pdo();
        $stmt=$hoge->query($sql);
        $items=$stmt->fetchAll(PDO::FETCH_ASSOC);
        return $items;
    }
    //SELECT,INSERT,UPDATE,DELETE文の時に使用する関数。
    public function plural($sql,$item){
        $hoge=$this->pdo();
        $stmt=$hoge->prepare($sql);
        $stmt->execute(array(':id'=>$item));//sql文のVALUES等の値が?の場合は$itemでもいい。
        return $stmt;
    }
    //ページネーションのときに使用する関数
    public function pagenation($count){
        $db=$this->pdo();
        $sql = 'SELECT * FROM BBS LIMIT ' . $count;
        $stmt = $db->prepare($sql);
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
        header('content-type: application/json; charset=utf-8');
        print_r(json_encode($a, JSON_PRETTY_PRINT));
    }
}

    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        $count = $_GET['count'];
        $obj = new dbconnect();
        $obj->pagenation($count);
    }