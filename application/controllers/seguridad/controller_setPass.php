<?php
require_once('../../connection/connection_bd.php');
require_once('../../models/object_seguridad.php');

$database = new Database();
$db = $database->getConnection();

$seguridad = new Seguridad($db);

$seguridad->pass = $_POST['pass'];
$seguridad->idUsuario = $_POST['idUsuario'];

echo $seguridad->setPass();
?>