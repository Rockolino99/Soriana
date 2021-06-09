<?php

include_once '../../connection/connection_bd.php';
include_once '../../models/object_seguridad.php';

$database = new Database();
$db = $database->getConnection();

$seguridad = new Seguridad($db);

$seguridad->pass = $_POST['pass'];

$stmt = $seguridad->getBossPass();

if($stmt == '0')
    echo 0;//Error en consulta
else {
    $idArea = $stmt->fetch(PDO::FETCH_ASSOC)['idArea'];
    if($idArea == '2')
        echo 1;//Es jefe de cajas
    else echo 0;//No es deje o no existe
}

?>