<?php
session_name('SMZSESSION');
session_start();
if (!isset($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(openssl_random_pseudo_bytes(16));
}

function login() {
    if (!isset($_SESSION)) {
        echo 'Error: No Session.';
    }
    if (!isset($_SESSION['login'])) {
        require_once __DIR__ . '/../login.php';
        exit(0);
    }
    return $_SESSION['login'];
}
function isPost() {
    if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
        return false;
    }
    if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] != $_SESSION['csrf_token']) {
        echo 'Error : Invalid CSRF Token.';
        exit(1);
    }
    return true;
}

$MYSQL_HOST = 'localhost';
function getDNS($dbname = '') {
    global $MYSQL_HOST;
    return 'mysql:host=' . $MYSQL_HOST . (strlen($dbname) > 0 ? ';dbname='.$dbname : '') . ';charset=utf8mb4';
}

/**
 * htmlspecialcharsのラッパー関数
 * @param string $str
 * @return string
 */
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

?>
