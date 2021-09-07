<div class="main" id="main">
    <!-- Counter Section -->
    <div class="yd-stats">
        <div class="hero-content wow fadeIn">
            <div class="flex-split pb-3">
                <div class="container">
                    <div class="">
                        <div class="row text-center">
                            <div class="col-6 col-sm-3">
                                <div class="counter-up">
                                    <div class="counter-icon">
                                        <i class="fas fa-users fa-3x"></i>
                                    </div>
                                    <h3><span class="counter">47</span></h3>
                                    <div class="counter-text">
                                        <h2>Total usuarios</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-sm-3">
                                <div class="counter-up">
                                    <div class="counter-icon">
                                        <i class="far fa-newspaper fa-3x"></i>
                                    </div>
                                    <h3><span class="counter">33</span></h3>
                                    <div class="counter-text">
                                        <h2>Productos publicados</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Counter Section Ends -->
    <div class="container">
        <div>
            <button class="btn btn-outline-dark">Crear usuario administrador</button>
        </div>
        <hr>
        <div class="mt-3">
            <div class="cat2">
                <h2>ADMINISTRAR USUARIOS</h2>
            </div>
            <table id="usuarios" class="table table-bordered table-striped" style="width:100%">
                <thead class="bg-dark text-white">
                    <tr>
                        <td>ID</td>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Telefono</th>
                        <th>Rol</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Jhonatan</td>
                        <td>Zambrano</td>
                        <td>3168445287</td>
                        <td>Admin</td>
                        <th>
                            <div class="dropdown float-right">
                                <button class="btn btn-green dropdown-toggle ml-1" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Estado
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Activo</a>
                                    <a class="dropdown-item" href="#">Inactivo</a>
                                </div>
                                <button class="btn btn-danger">Eliminar</button>
                            </div>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>