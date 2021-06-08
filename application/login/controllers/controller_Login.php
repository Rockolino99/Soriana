<?php
include_once '../../connection/connection_bd.php';
include_once '../models/Object_Login.php';

$database = new Database();
$db = $database->getConnection();

$login = new Login($db);

$login->user = $_POST['user'];
$login->pass = $_POST['pass'];

echo $login->login();//retorna detalle de ingreso o error :v
?>