<?php
require_once('../../connection/connection_bd.php');
require_once('../../models/object_seguridad.php');

$database = new Database();
$db = $database->getConnection();

$seguridad = new Seguridad($db);

$stmt = $seguridad->getUsers();

$tipos = ["Gerente","Segridad","Cajero +","Cajero"];
$colores = ["primary", "warning", "success", "danger"];
$i = 0;

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
    <tr>
        <td>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon2"><i class="fas fa-user"></i></span>
                </div>
                <input id="nombre<?echo $i+1;?>" type="text" class="form-control" placeholder="Nombre"
                    aria-label="Nombre" aria-describedby="basic-addon2" value="<?php echo $row['nombre']; ?>" disabled>
            </div>
        </td>
        <td>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon2"><i class="far fa-user"></i></span>
                </div>
                <input id="user<?echo $i+1;?>" type="text" class="form-control" placeholder="Usuario"
                    aria-label="Usuario" aria-describedby="basic-addon2" value="<?php echo $row['user']; ?>" disabled>
            </div>
        </td>
        <td>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                </div>
                <input id="pass<?echo $i+1;?>" type="text" class="form-control" aria-label="Contraseña" aria-describedby="basic-addon1"
                    value="<?php if($row['pass']!=null) echo $row['pass']; ?>" placeholder="Sin">
            </div>
        </td>
        <td>
            <div class="input-group" style="height: 100%;">
                <span class="badge badge-<?php echo $colores[$i]; ?>" style="height: 100%;"><?php echo $tipos[$i]; ?></span>
            </div>
        </td>
        <td>
            <div class="input-group mx-auto">
                <button class="btn btn-success" title="Actualizar" onclick="validateUsers(<?php echo $i+1; ?>)"><i class="fas fa-save"></i></button>
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
        alertify.error("Por favor, ingrese una contraseña para " + $('#nombre'+id).val())
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
                alertify.success('Contaseña cambiada exitosamente')
            else
                alertify.error('Algo saló mal, intente de nuevo')
        }
    })
}
</script>