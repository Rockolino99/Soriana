<?php
include_once '../../connection/connection_bd.php';
include_once '../../models/object_inventario.php';

$database = new Database();
$db = $database->getConnection();

$inventario = new Inventario($db);

$stmt = $inventario->getInventario();

//$arreglo['data'] = "";

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

    $row = array_map('utf8_encode', $row);
    $arreglo['data'][] = $row;
}

echo json_encode($arreglo);

?>