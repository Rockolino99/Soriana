<link rel="stylesheet" href="application/assets/css/administracion.css">
<div class="container">
    <div class="row">
        <div class="wrap col">
            <h3 class="text-center mt-3">Usuarios</h3>
            <ul class="tabs group">
                <li><a class="active" href="#/one">Lista</a></li>
                <li><a href="#/two">Nuevo</a></li>
            </ul>

            <div id="content">
                <section id="one"><!--Lista de usuarios-->
                <div class="list-group" id="usersList">
                </div>
                </section>
                <section id="two" style="display: none;"><!--Nuevo-->
                    <form>
                        <div class="form-group">
                            <label for="nombreUser">Nombre</label>
                            <input type="text" class="form-control" id="nombreUser" aria-describedby="emailHelp" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label for="username">Usuario</label>
                            <input type="text" class="form-control" id="username" placeholder="Usuario" onkeyup="toLowerCase(this)">
                        </div>
                        <div class="form-group">
                            <label for="selectArea">Área</label>
                            <select type="text" class="form-control" id="selectArea" placeholder="Password">
                                <option value="0" disabled selected>Seleccione</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-primary" onclick="validateUser()">Guardar</button>
                    </form>
                </section>
            </div>

        </div>
        <div class="wrap col">
            <h3 class="text-center mt-3">Productos</h3>
            <ul class="tabs2 group">
                <li style="width: 25%;"><a class="active" href="#/one2">Lista</a></li>
                <li style="width: 25%;"><a href="#/two2">Nuevo</a></li>
                <li style="width: 25%;"><a href="#/three2">Editar</a></li>
                <li style="width: 25%;"><a href="#/four2">Proveedores</a></li>
            </ul>

            <div id="content2">
                <section id="one2"><!--Lista-->
                    <table id="table_listaInventario" class="display">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Precio</th>
                                <th>Existencia</th>
                                <th>Proveedor</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                    </table>
                </section>
                <section id="two2" style="display: none;"><!--Nuevo-->
                    <form>
                        <div class="form-group">
                            <label for="nombreProducto">Nombre</label>
                            <input type="text" class="form-control" id="nombreProducto" placeholder="Nombre">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="precioProducto">Precio</label>
                                    <input type="number" class="form-control" id="precioProducto" placeholder="Precio">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="cantidadProducto">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidadProducto" placeholder="Cantidad">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="selectProveedor">Proveedor</label>
                            <select type="text" class="form-control" id="selectProveedor">
                            </select>
                        </div>
                        <button type="button" class="btn btn-primary" id="newInventarioBtn">Agregar</button>
                    </form>
                </section>
                <section id="three2" style="display: none;"><!--Edicion-->
                    <h1>Edicion</h1>
                </section>
                <section id="four2" style="display: none;"> <!--Proveedores-->
                    <div class="form-group">
                        <label for="newProveedor">Nuevo proveedor</label>
                        <input type="text" class="form-control" id="newProveedor" placeholder="Nombre">
                    </div>
                    <button type="button" id="validateProveedor" class="btn btn-primary">Agregar</button>
                </section>
            </div>

        </div>
    </div>
</div>
<script src="application/assets/js/administracion.js"></script>