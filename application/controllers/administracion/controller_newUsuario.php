<?php
require_once('../../connection/connection_bd.php');
require_once('../../models/object_administracion.php');

$database = new Database();
$db = $database->getConnection();

$admin = new Administracion($db);

$admin->nombre = $_POST['nombre'];
$admin->user = $_POST['user'];
$admin->idArea = $_POST['idArea'];

echo $admin->addUsuario();
?>