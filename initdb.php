<?php
// require_once __DIR__ . '/../parts/common.php';
require_once('common.php');

// チェック
$initialized = false;
try {
    $db = new PDO(getDNS(), 'root');
    $stmt = $db->query('SHOW TABLES FROM userdb');
    if($stmt->fetch(PDO::FETCH_ASSOC)){
        $initialized = true;
    }
} catch (PDOException $e) {
    $initialized = false;
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] != $_SESSION['csrf_token']) {
        echo 'Error : Invalid CSRF Token.';
        exit(1);
    }
    $dbs = [
        'userdb' => [
            'users' => [
                'id' => [
                    'type' => 'INT',
                    'option' => 'AUTO_INCREMENT PRIMARY KEY'
                ],
                'account' => [
                    'type' => 'VARCHAR(50)',
                    'option' => 'UNIQUE'
                ],
                'admin' => [
                    'type' => 'BOOLEAN',
                    'option' => ''
                ],
                'name' => [
                    'type' => 'VARCHAR(50)',
                    'option' => ''    
                ],
                'password' => [
                    'type' => 'VARCHAR(100)',
                    'option' => ''
                ],
                'mail' => [
                    'type' => 'VARCHAR(50)',
                    'option' => ''
                ],
                'gender' => [
                    'type' => 'BOOLEAN',
                    'option' => ''
                ]
            ]
        ]
    ];
    if (!isset($_POST['admin']) || !isset($_POST['passwd']) || !isset($_POST['passwd_confirmation'])) {
        echo 'Error : Invalid Parameters.';
        exit(1);
    }
    if ($_POST['passwd'] != $_POST['passwd_confirmation']) {
        echo 'Error : The new password and confirmed password do not match.';
        exit(1);
    }
    $admin_user = $_POST['admin'];
    $admin_name = $admin_user;
    $admin_pass_hash = password_hash($_POST['passwd'], PASSWORD_BCRYPT, ['cost' => 11]);
    $is_admin = true;
    $admin_mail = '';
    $admin_gender = 0;

    try {
        $db = new PDO(getDNS(), 'root');
        foreach ($dbs as $dbname => $tables) {
            echo 'DB Name: ' . $dbname . '<br>';
            $db = new PDO(getDNS($dbname), 'root');
            // データベース作成
            $db->exec('CREATE DATABASE IF NOT EXISTS '.$dbname);
            foreach ($tables as $tablename => $cols) {
                // table作成
                $cols_sql_list = array();
                foreach ($cols as $colname => $colopt) {
                    $cols_sql_list[] = $colname . ' ' . $colopt['type'] . ' ' . $colopt['option'];
                }
                $sql = 'CREATE TABLE ' . $tablename. ' (' . implode(',', $cols_sql_list) . ') engine=innodb default charset=utf8';
                echo '<pre>' . "\n";
                $stmt = $db->query($sql);
                print_r($stmt);
                echo '</pre>';
            }
            $db = null;
        }
        echo "管理者ユーザー追加<br>\n";
        echo 'pass: '.$admin_pass_hash."<br>\n";
    
        // 管理者ユーザーの追加
        $dbname = 'userdb';
        $tablename = 'users';
        $db = new PDO(getDNS($dbname), 'root');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $db->prepare('INSERT INTO ' . $tablename . ' (account, admin, name, password, mail, gender) VALUES (:account, :admin, :name, :password, :mail, :gender)');
        //$stmt->bindParam(':tablename', $tablename, PDO::PARAM_STR);
        $stmt->bindParam(':account', $admin_user, PDO::PARAM_STR);
        $stmt->bindParam(':admin', $is_admin, PDO::PARAM_BOOL);
        $stmt->bindParam(':name', $admin_name, PDO::PARAM_STR);
        $stmt->bindParam(':password', $admin_pass_hash, PDO::PARAM_STR);
        $stmt->bindParam(':mail', $admin_mail, PDO::PARAM_STR);
        $stmt->bindParam(':gender', $admin_gender, PDO::PARAM_INT);
        $stmt->execute();
        $db = null;
        echo '<br>';
    } catch (PDOException $e) {
        header('Content-Type: text/plain; charset=UTF-8', true, 500);
        exit($e->getMessage()); 
    }
    header('Location: ' . basename(__FILE__));
    exit(0);
}
?>
<html>
<head>
    <title>データベースの初期化</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!--<link rel="stylesheet" type="text/css" href="calendar.css">-->
</head>
<body>
<?php if ($initialized === false) { ?>
<form action="<?= basename(__FILE__) ?>" method="POST">
<input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
Administrator : <input type="text" name="admin"><br>
Password : <input type="password" name="passwd"><br>
Password(確認) : <input type="password" name="passwd_confirmation"><br>
<button type="submit">初期化</button>
</form>
<?php } else { ?>
すでに初期化済みです。
<?php } ?>
</body>
</html>