<?php
ob_start();
header('Content-Type: text/html; charset=utf-8');
$servername = "localhost";
$user = "root";
$pass = "";
$db = "php_projekt";
$dbc = mysqli_connect($servername, $user, $pass, $db) or die("Error" . mysqli_connect_error());
mysqli_set_charset($dbc, "utf8");
if ($dbc) {

}
ob_end_flush();