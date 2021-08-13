<div class="container shadow mt-3" style="">
    <form action="<?php echo getUrl("Agro", "Agro", "registrarAgricultor") ?>" autocomplete="off" enctype="multipart/form-data" method="POST" id="form">
        <div class="container">
            <div class="navbar bg-light mt-2 text-center">
                <h4 class="display-5">Registrarme como agricultor</h4>
            </div>

            <div class="">
                <div class="steps" id="stepWizard">
                    <div class="step position-relative">
                        <div class="step-heading position-static" id="step1">
                            <a class="text-green" role="button" data-toggle="collapse" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                <div class="num d-inline-flex text-white align-items-center justify-content-center position-relative rounded-circle bg-green">1</div>
                                <div class="pl-3 d-inline-flex title">
                                    <h4>Datos personales</h4>
                                </div>
                            </a>
                        </div>

                        <div class="line position-absolute"></div>

                        <div id="collapse1" class="pl-5 collapse show" aria-labelledby="step1" data-parent="#stepWizard">
                            <div class="step-body">

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <div class="col-md-12">
                                            <label for="exampleInputEmail1">Nombres</label>
                                            <input type="text" class="form-control" name="usu_nombres">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="exampleInputEmail1">Apellidos</label>
                                            <input type="text" class="form-control" name="usu_apellidos">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="exampleInputEmail1">Correo electronico</label>
                                            <input type="text" class="form-control" name="usu_correo">
                                        </div>
                                        <div class="col-md-12">
                                            <label for="exampleInputEmail1">Telefono</label>
                                            <input type="text" class="form-control" name="usu_telefono">
                                        </div>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label for="exampleInputEmail1">Contraseña</label>
                                                    <input type="text" class="form-control" name="usu_pass">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Repetir Contraseña</label>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-12 m-auto">
                                            <div>
                                                <label class="font-weight-bold">Foto de perfil</label>
                                                <div class="mt-2">
                                                    <img src="img/profile.jpg" id="prevfirma" style="width: 200px;" alt="Foto de perfil"> <br>
                                                    <div class="mt-2">
                                                    <input type="file" name="perfil_foto" id="subirFirma">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <a class="text-green" role="button" data-toggle="collapse" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
                                            <button class="btn btn-green" type="button">Siguiente</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="step position-relative">
                        <div class="step-heading position-static" id="step2">
                            <a class="text-green" role="button" data-toggle="collapse" href="#collapse2" aria-expanded="true" aria-controls="collapse2">
                                <div class="num d-inline-flex text-white align-items-center justify-content-center position-relative rounded-circle bg-green">2</div>
                                <div class="pl-3 d-inline-flex title">
                                    <h4>Otros datos</h4>
                                </div>
                            </a>
                        </div>

                        <div class="line position-absolute"></div>

                        <div id="collapse2" class="pl-5 collapse" aria-labelledby="step2" data-parent="#stepWizard">
                            <div class="step-body">

                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <label for="">Organizacion o empresa que representa</label>
                                        <input type="text" class="form-control" name="perfil_empresa">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">¿Tipo de producto que produces?</label>
                                        <select name="tipo_pro_id" id="" class="form-control">
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
                                    <div class="col-md-12 mt-3">
                                        <h5>Ubicacion</h5>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Departamento</label>
                                        <select name="dep_id" id="select_dep" class="form-control" data-url="<?php echo getUrl("Agro", "Agro", "selectCiu", false, "ajax"); ?>">
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
                                    <div class="col-md-6">
                                        <label for="">Municipio</label>
                                        <select name="ciu_id" id="select_ciu" class="form-control">
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
                                    <div class="col-md-12 mt-2">
                                        <label for="">Descripcion</label>
                                        <textarea class="form-control" name="perfil_desc"></textarea>
                                    </div>

                                    <div class="col-md-12 mt-2">
                                        <label for="">Agregue fotos de su producto (maximo 6).</label>
                                        <input type="file" name="ruta[]" multiple="multiple">
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        <a class="text-green" role="button" data-toggle="collapse" href="#collapse1" aria-expanded="true" aria-controls="collapse1">
                                            <button class="btn btn-danger" type="button">Atras</button>
                                        </a>
                                        <button class="btn btn-green">Registrame</button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="" style="height: 100px;"></div>
                </div>
            </div>
        </div>
    </form>
</div>