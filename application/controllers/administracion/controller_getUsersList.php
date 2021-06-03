<?php
require_once('../../connection/connection_bd.php');
require_once('../../models/object_administracion.php');

$database = new Database();
$db = $database->getConnection();

$admin = new Administracion($db);

$stmt = $admin->getUsersList();

if($stmt->rowCount() == 0)
    echo '<div class="alert alert-danger" role="alert">
            Sin usuarios
          </div>';
else {
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
        <button type="button" id="user<?php echo $row['idUsuario']; ?>" class="list-group-item list-group-item-action" onclick="dropUser(<?php echo $row['idUsuario']; ?>)">
            <?php echo $row['nombre']; ?>
        </button>
    <?php }
}
?>