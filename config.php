<?php
define('HOST', '127.0.0.1');
define('DATABASE', 'IPG');
define('USER', 'root');
define('PASSWORD', 'root');
$connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
if (!$connect) {
    die('Непральный Логин или Пароль');
}
mysqli_set_charset($connect, 'utf8');