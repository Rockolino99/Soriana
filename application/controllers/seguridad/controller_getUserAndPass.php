<?php
require_once('../../connection/connection_bd.php');
require_once('../../models/object_seguridad.php');

$database = new Database();
$db = $database->getConnection();

$seguridad = new Seguridad($db);

$stmt = $seguridad->getUsers();

$tipos = array(
    "1" => "Cajas",
    "2" => "Jefatura Cajas",
    "3" => "Seguridad",
    "4" => "Administracion"
);
$colores = array(
    "1" => "background-color: #e74c3c; color: white;",
    "2" => "background-color: #2980b9; color: white;",
    "3" => "background-color: #27ae60; color: white;",
    "4" => "background-color: #f1c40f; color: black;"
);

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $i = $row['idUsuario'];
    ?>
    <tr>
        <td>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon2"><i class="fas fa-user"></i></span>
                </div>
                <input id="nombre<?echo $i;?>" type="text" class="form-control" placeholder="Nombre"
                    aria-label="Nombre" aria-describedby="basic-addon2" value="<?php echo $row['nombre']; ?>" disabled>
            </div>
        </td>
        <td>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon2"><i class="far fa-user"></i></span>
                </div>
                <input id="user<?echo $i;?>" type="text" class="form-control" placeholder="Usuario"
                    aria-label="Usuario" aria-describedby="basic-addon2" value="<?php echo $row['user']; ?>" disabled>
            </div>
        </td>
        <td>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                </div>
                <input id="pass<?php echo $i;?>" type="text" class="form-control" aria-label="Contraseña" aria-describedby="basic-addon1"
                    value="<?php if($row['pass']!=null) echo $row['pass']; ?>">
            </div>
        </td>
        <td>
            <div class="input-group" style="height: 100%;">
                <span class="area" style="<?php echo $colores[$row['idArea']]; ?>"><?php echo $tipos[$row['idArea']]; ?></span>
            </div>
        </td>
        <td>
            <div class="input-group mx-auto">
                <button class="btn btn-success" title="Actualizar" onclick="validateUsers(<?php echo $i; ?>, '<?php echo $row['nombre']; ?>')"><i class="fas fa-save"></i></button>
            </div>
        </td>
    </tr>
<?php
    $i++;
}
?>

<script>
function validateUsers(id, nombre) {
    pass = $('#pass'+id)
    if(pass.val() == "") {
        toastr.error("Por favor, ingrese una contraseña para " + nombre)
        pass.focus()
        return
    }

    $.ajax({
        type: 'post',
        data: {
            idUsuario: id,
            pass: pass.val()
        },
        url: 'application/controllers/seguridad/controller_setPass.php',
        success: res => {
            if(res == '1')
                toastr.success('Contaseña cambiada exitosamente')
            else
                toastr.error('Algo saló mal, intente de nuevo')
        }
    })
}
</script>