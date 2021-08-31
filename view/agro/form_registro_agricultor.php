<style>
    section {
        display: flex;
        flex-flow: row wrap;
    }

    section>div {
        flex: 1;
        padding: 0.5rem;
    }

    input[type="radio"] {
        display: none;
    }

    .labelbuttom {
        height: 100%;
        display: block;
        background: white;
        border: 2px solid hsla(150, 75%, 50%, 1);
        border-radius: 20px;
        padding: 1rem;
        margin-bottom: 1rem;
        text-align: center;
        position: relative;
    }

    .labelbuttom:hover {
        cursor: pointer;
    }

    input[type="radio"]:checked+label {
        background: hsla(150, 75%, 50%, 1);
        color: hsla(215, 0%, 100%, 1);


    }

    input[type="radio"]#control_05:checked+label {
        background: red;
        border-color: red;
    }

    p {
        font-weight: 900;
    }


    @media only screen and (max-width: 700px) {
        section {
            flex-direction: column;
        }
    }
</style>
<div id="main" class="main">
    <div class="yd-cat">
        <div class="mt-5">
            <form action="<?php echo getUrl("Agro", "Agro", "registrarAgricultor") ?>" autocomplete="off" enctype="multipart/form-data" method="POST" id="form">
                <div class="container mt-2">
                    <div class="cat2">
                        <h2>Formulario de registro</h2>
                    </div>
                    <?php if(isset($_SESSION['mensaje'])){ ?>
                        <div class="alert alert-<?=$_SESSION['tipo']?> alert-dismissible " role="alert" id="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                            </button>
                            <strong>
                            <?php 
                                echo $_SESSION['mensaje'];
                                unset($_SESSION['mensaje']);
                                unset($_SESSION['tipo']);
                            ?>
                            </strong>
                        </div>
                    <?php }?>
                    <div class="cat2 mt-3">
                        <h4>Elija su rol</h4>
                    </div>
                    <section>
                        <div>
                            <input type="radio" id="control_01" name="rol" value="2" required>
                            <label for="control_01" class="labelbuttom">
                                <p style="font-size: 24pt; font-weight: bold;">Agricultor</p>
                            </label>
                        </div>
                        <div>
                            <input type="radio" id="control_02" name="rol" value="3" required>
                            <label for="control_02" class="labelbuttom">
                                <p style="font-size: 24pt; font-weight: bold;">Comprador</p>
                            </label>
                        </div>
                        <div>
                            <input type="radio" id="control_03" name="rol" value="4" checked required>
                            <label for="control_03" class="labelbuttom">
                                <p style="font-size: 24pt; font-weight: bold;">Ambos</p>
                            </label>
                        </div>
                    </section>
                    <hr>
                    <div class="form-group">
                        <div class="cat2 mt-3">
                            <h4>Datos basicos</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mt-3">
                                <label for="exampleInputEmail1">Nombres</label>
                                <input type="text" class="form-control mt-2" name="usu_nombres" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="exampleInputEmail1">Apellidos</label>
                                <input type="text" class="form-control mt-2" name="usu_apellidos" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="exampleInputEmail1">Correo electronico</label>
                                <input type="text" class="form-control mt-2" name="usu_correo" required>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="exampleInputEmail1">Telefono</label>
                                <input type="text" class="form-control mt-2" name="usu_telefono" required>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 mt-3">
                                        <label for="exampleInputEmail1">Contraseña</label>
                                        <input type="text" class="form-control mt-2" name="usu_pass" required>

                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">Repetir Contraseña</label>
                                        <input type="text" class="form-control mt-2" required>
                                    </div>
                                </div>
                                <small class="form-text text-muted mt-2">
                                    Tu contraseña debe tener entre 8 y 20 caracteres.
                                </small>
                            </div>

                        </div>
                        <hr>
                        <div class="cat2 mt-3">
                            <h4>Agregar foto de perfil</h4>
                        </div>
                        <div class="mt-3">
                            <div class="mt-2">
                                <label for="subirFirma">
                                    <div style="width: 200px; height: 200px; border: 1px dashed black; border-radius: 50%; overflow: hidden;">
                                        <img src="img/profile.jpg" id="prevfirma" style="width: 200px; height: 200px;" alt="Foto de perfil"> <br>
                                    </div>
                                    <div class="mt-2">
                                        <input type="file" name="perfil_foto" accept="image/*" id="subirFirma" style="display: none;">
                                    </div>
                                </label>
                            </div>
                        </div>
                        <hr>
                        <div id="ocultarComprador">
                            <div class="cat2 mt-3">
                                <h4>Otros datos</h4>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 mt-3">
                                    <label for="">Organizacion o empresa que representa</label>
                                    <input type="text" class="form-control mt-2" name="perfil_empresa">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">¿Tipo de producto que produces?</label>
                                    <select name="tipo_pro_id" id="" class="form-control mt-2">
                                        <option value="">Selecione</option>
                                        <?php
                                        if ($num1 > 0) {
                                            while ($dato = mysqli_fetch_row($constultPro)) {
                                                echo "<option value='" . $dato[0] . "'>" . $dato[1] . "</option>";
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Departamento</label>
                                    <select name="dep_id" id="select_dep" class="form-control mt-2" data-url="<?php echo getUrl("Agro", "Agro", "selectCiu", false, "ajax"); ?>">
                                        <option value="0">Selecione</option>
                                        <?php
                                        if ($num1 > 0) {
                                            while ($dato = mysqli_fetch_row($consultdep)) {
                                                if ($dato[0] == 76) {
                                                    echo "<option selected value='" . $dato[0] . "'>" . $dato[1] . "</option>";
                                                } else {
                                                    echo "<option value='" . $dato[0] . "'>" . $dato[1] . "</option>";
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Municipio</label>
                                    <select name="ciu_id" id="select_ciu" class="form-control mt-2">
                                        <option value="0">Selecione</option>
                                        <?php
                                        if ($num2 > 0) {
                                            while ($dato = mysqli_fetch_row($consultciu)) {
                                                if ($dato[0] == 1055) {
                                                    echo "<option selected value='" . $dato[0] . "'>" . $dato[1] . "</option>";
                                                } else {
                                                    echo "<option value='" . $dato[0] . "'>" . $dato[1] . "</option>";
                                                }
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="">Descripcion</label>
                                    <textarea class="form-control mt-2" name="perfil_desc"></textarea>
                                </div>

                                <!-- <div class="col-md-12 mt-2">
                                <label for="">Agregue fotos de su producto (maximo 4).</label>
                                <p>
                                    <button class="btn btn-primary mt-3" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                        Agregar fotos
                                    </button>
                                </p>
                                <div class="collapse mt-2" id="collapseExample">
                                    <div class="card card-body">
                                        <div class="mt-3 row m-auto">
                                            <div class="mt-2 col-md-3 col-sm-2">
                                                <label for="subirfotos">
                                                    <div style="width: 200px; height: 200px; border: 1px dashed black; overflow: hidden;">
                                                        <img src="img/no_image.jpg" id="prevfirmaP1" style="width: 200px; height: 200px;" alt="Fotos"> <br>
                                                    </div>
                                                    <div class="mt-2">
                                                        <input type="file" name="ruta1" id="subirfotos" style="display: none;" multiple>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="mt-2 col-md-3 col-sm-2">
                                                <label for="subirfotos2">
                                                    <div style="width: 200px; height: 200px; border: 1px dashed black; overflow: hidden;">
                                                        <img src="img/no_image.jpg" id="prevfirmaP2" style="width: 200px; height: 200px;" alt="Fotos"> <br>
                                                    </div>
                                                    <div class="mt-2">
                                                        <input type="file" name="ruta2" id="subirfotos2" style="display: none;" multiple>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="mt-2 col-md-3 col-sm-2">
                                                <label for="subirfotos3">
                                                    <div style="width: 200px; height: 200px; border: 1px dashed black; overflow: hidden;">
                                                        <img src="img/no_image.jpg" id="prevfirmaP3" style="width: 200px; height: 200px;" alt="Fotos"> <br>
                                                    </div>
                                                    <div class="mt-2">
                                                        <input type="file" name="ruta3" id="subirfotos3" style="display: none;" multiple>
                                                    </div>
                                                </label>
                                            </div>
                                            <div class="mt-2 col-md-3 col-sm-2">
                                                <label for="subirfotos4">
                                                    <div style="width: 200px; height: 200px; border: 1px dashed black; overflow: hidden;">
                                                        <img src="img/no_image.jpg" id="prevfirmaP4" style="width: 200px; height: 200px;" alt="Fotos"> <br>
                                                    </div>
                                                    <div class="mt-2">
                                                        <input type="file" name="ruta4" id="subirfotos4" style="display: none;" multiple>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->

                            </div>
                        </div>
                        <div class="mt-4">
                            <a class="text-green" href="<?= getUrl("Agro", "Agro", "getHome") ?>">
                                <button class="btn btn-danger" type="button">Cancelar</button>
                            </a>
                            <button type="submit" class="btn btn-green">Registrame</button>
                        </div>

                    </div>
                    
                </div>
        </div>
        </form>
    </div>
</div>
</div>

<?php include_once "../view/partials/footer.php"; ?>