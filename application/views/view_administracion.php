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
                <li><a class="active" href="#/one2">Lista</a></li>
                <li><a href="#/two2">Nuevo</a></li>
            </ul>

            <div id="content2"><!--Lista-->
                <section id="one2">
                    lista de productos xd
                </section>
                <section id="two2" style="display: none;"><!--Lista-->
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
                                <option value="0" disabled selected>Seleccione</option>
                            </select>
                        </div>
                        <button type="button" class="btn btn-primary">Submit</button>
                    </form>
                </section>
            </div>

        </div>
    </div>
</div>
<script src="application/assets/js/administracion.js"></script>