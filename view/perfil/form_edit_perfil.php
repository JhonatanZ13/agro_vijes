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
            <?php foreach ($usuario as $usu) { ?>
            <form action="<?php echo getUrl("Perfil", "Perfil", "actualizarPerfil") ?>" autocomplete="off" enctype="multipart/form-data" method="POST" id="form" class="needs-validation" novalidate>
                <div class="container mt-2">
                    <div class="cat2">
                        <h2>Editar perfil</h2>
                    </div>
                    <?php if (isset($_SESSION['mensaje'])) { ?>
                        <div class="alert alert-<?= $_SESSION['tipo'] ?> alert-dismissible " role="alert" id="alert">
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
                    <?php } ?>
                    <div class="cat2 mt-3">
                        <h4>Elija su rol</h4>
                    </div>
                    <section>
                        <?php 
                            $che1 = "";
                            $che2 = "";
                            $che3 = "";
                            if($usu['usu_rol'] == 2){
                                $che1 = "checked";
                            }elseif($usu['usu_rol'] == 3){
                                $che2 = "checked";
                            }elseif($usu['usu_rol'] == 4){
                                $che3 = "checked";
                            }
                        ?>
                        <div>
                            <input <?php echo $che1; ?> type="radio" id="control_01" name="rol" value="2" required>
                            <label for="control_01" class="labelbuttom">
                                <p style="font-size: 24pt; font-weight: bold;">Agricultor</p>
                            </label>
                        </div>
                        <div>
                            <input <?php echo $che2; ?> type="radio" id="control_02" name="rol" value="3" required>
                            <label for="control_02" class="labelbuttom">
                                <p style="font-size: 24pt; font-weight: bold;">Comprador</p>
                            </label>
                        </div>
                        <div>
                            <input <?php echo $che3; ?> type="radio" id="control_03" name="rol" value="4" required>
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
                                <input type="hidden" name="usu_id" value="<?php echo $usu['usu_id'] ?>">
                                <label for="exampleInputEmail1">Nombres</label>
                                <input value="<?php echo $usu['usu_nombres'] ?>" type="text" class="form-control mt-2" name="usu_nombres" required>
                                <div class="invalid-feedback">
                                    Por favor ingrese sus nombres.
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Apellidos</label>
                                <input value="<?php echo $usu['usu_apellidos'] ?>" type="text" class="form-control mt-2" name="usu_apellidos" required>
                                <div class="invalid-feedback">
                                    Por favor ingrese sus apellidos.
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Correo electronico</label>
                                <input value="<?php echo $usu['usu_correo'] ?>" type="text" class="form-control mt-2" name="usu_correo" required>
                                <div class="invalid-feedback">
                                    Por favor ingrese su correo electronico
                                </div>
                            </div>
                            <div class="col-md-6 mt-3">
                                <label for="">Telefono</label>
                                <input value="<?php echo $usu['usu_telefono'] ?>" type="text" class="form-control mt-2" name="usu_telefono" required>
                                <div class="invalid-feedback">
                                    Por favor ingrese su telefono.
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6 mt-3">
                                        <label for="">Contraseña</label>
                                        <input value="<?php echo $usu['usu_pass'] ?>" type="password" class="form-control mt-2" name="usu_pass" required>

                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="">Repetir Contraseña</label>
                                        <input value="<?php echo $usu['usu_pass'] ?>" type="password" class="form-control mt-2" required>
                                    </div>
                                </div>
                                <small class="form-text text-muted mt-2">
                                    Tu contraseña debe tener entre 8 y 20 caracteres.
                                </small>
                            </div>

                        </div>
                        <hr>
                        <?php foreach ($perfil as $per) { ?>
                        <div class="cat2 mt-3">
                            <h4>Agregar foto de perfil</h4>
                        </div>
                        <div class="mt-3">
                            <div class="mt-2">
                                <label for="subirFirma">
                                    <div style="width: 200px; height: 200px; border: 1px dashed black; border-radius: 50%; overflow: hidden;">
                                        <img src="<?php echo $per['perfil_foto'] ?>" id="prevfirma" style="width: 200px; height: 200px;" alt="Foto de perfil"> <br>
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
                                    <input value="<?php echo $per['perfil_empresa'] ?>" type="text" class="form-control mt-2" name="perfil_empresa">
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">¿Tipo de producto que produces?</label>
                                    <select name="tipo_pro_id" id="" class="form-control mt-2" required>
                                        <option value="">Selecione</option>
                                        <?php
                                            echo $obj->CargaSelected("*","productos","".$per['tipo_pro_id']);
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Departamento</label>
                                    <select name="dep_id" id="select_dep" class="form-control mt-2" data-url="<?php echo getUrl("Agro", "Agro", "selectCiu", false, "ajax"); ?>" required>
                                        <option>Selecione</option>
                                        <?php
                                            echo $obj->CargaSelected("*","departamento","".$per['dep_id']);
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor elija un departamento.
                                    </div>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="">Municipio</label>
                                    <select name="ciu_id" id="select_ciu" class="form-control mt-2" required>
                                        <option value="0">Selecione</option>
                                        <?php
                                            echo $obj->CargaSelected("*","ciudad","".$per['ciu_id']);
                                        ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        Por favor elija un municipio.
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <label for="">Descripcion</label>
                                    <textarea class="form-control mt-2" name="perfil_desc"><?php echo $per['perfil_desc'] ?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="invalid-feedback" id="ver">
                                Por favor verifique el formulario de registro.
                            </div>
                            <a class="text-green" href="<?= getUrl("Perfil", "Perfil", "getPerfil") ?>">
                                <button class="btn btn-danger" type="button">Cancelar</button>
                            </a>
                            <button type="submit" class="btn btn-green">Actualizar perfil</button>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</div>

<?php include_once "../view/partials/footer.php"; ?>