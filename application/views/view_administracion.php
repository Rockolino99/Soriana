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
                <section id="one"><!--Lista-->
                    lista de usuarios
                </section>
                <section id="two" style="display: none;"><!--Nuevo-->
                    <form>
                        <div class="form-group">
                            <label for="nombreUser">Nombre</label>
                            <input type="text" class="form-control" id="nombreUser" aria-describedby="emailHelp" placeholder="Nombre">
                        </div>
                        <div class="form-group">
                            <label for="username">Usuario</label>
                            <input type="text" class="form-control" id="username" placeholder="Usuario">
                        </div>
                        <div class="form-group">
                            <label for="selectArea">Área</label>
                            <select type="text" class="form-control" id="selectArea" placeholder="Password">
                                <option value="0" disabled selected>Seleccione</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
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
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </section>
            </div>

        </div>
    </div>
</div>
<script src="application/assets/js/administracion.js"></script>