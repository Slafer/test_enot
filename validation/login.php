<?php
require '../inc/db.php';
$login = filter_var((trim($_POST['login'])), FILTER_SANITIZE_STRING);
$pass = filter_var((trim($_POST['pass'])), FILTER_SANITIZE_STRING);

$db = new db();
if (!$db->CheckUser($login, $pass))
{
    echo "Такой пользователь не найден";
    exit();
} setcookie('user', $login, time() + 3600, "/");

header('Location: /');