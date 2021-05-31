<?php
    $tipos = ["Gerente","Segridad","Cajero +","Cajero"];
    $colores = ["primary", "warning", "success", "danger"];
?>

<h2 class="text-center">SEGURIDAD</h2>

<div class="container mt-5">

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Nombre de usuario</th>
                <th scope="col">Contraseña</th>
                <th scope="col">Tipo</th>
                <th scope="col">Opciones</th>
            </tr>
        </thead>
        <tbody>
            <?php for($i = 0; $i<4; $i++) { ?>
                <tr>
                    <td>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon2"><i class="fas fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Nombre de usuario" aria-label="Nombre de usuario" aria-describedby="basic-addon2">
                        </div>
                    </td>
                    <td>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Contraseña" aria-label="Contraseña" aria-describedby="basic-addon1">
                        </div>
                    </td>
                    <td>
                        <div class="input-group" style="height: 100%;">
                            <span class="badge badge-<?php echo $colores[$i]; ?>"  style="height: 100%;"><?php echo $tipos[$i]; ?></span>
                        </div>
                    </td>
                    <td>
                        <div class="input-group mx-auto">
                            <button class="btn btn-success" title="Guardar"><i class="fas fa-save"></i></button>
                        </div>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

</div>