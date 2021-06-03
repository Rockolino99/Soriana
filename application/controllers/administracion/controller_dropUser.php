<?php
require_once('../../connection/connection_bd.php');
require_once('../../models/object_administracion.php');

$database = new Database();
$db = $database->getConnection();

$admin = new Administracion($db);
$admin->idUsuario = $_POST['idUsuario'];

echo $admin->dropUser();

?>