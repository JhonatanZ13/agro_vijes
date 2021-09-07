<?php if ($_COOKIE['autorizar'] == 1 && $_SESSION['auth'] == 1) {
    redirect(getUrl("Agro", "Agro", "getHome"));
} else {
?>

    <div id="main" class="main">
        <div id="reviews" class="yd_reviews">
            <div class="">
                <div class="yd_rev_inner">
                    <div class="row">
                        <div class="col-md-6 m-auto">
                            <div class="rev-intro">
                                <form class="border col-md-8 m-auto col-sm-10" action="<?= getUrl("Agro", "Agro", "login", false) ?>" method="POST" style="border-radius: 20px;">
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
                                    <div class="cat2 text-center">
                                        <h2>Iniciar sesion</h2>
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example17">Correo electronico</label>
                                        <input required type="email" id="form2Example17" class="form-control form-control-lg mt-2" name="usu_correo" <?php if (isset($_COOKIE["usu_correo"])) {
                                                                                                                                                echo 'value="' . $_COOKIE["usu_correo"] . '"';
                                                                                                                                            } ?> />
                                    </div>

                                    <div class="form-outline mb-4">
                                        <label class="form-label" for="form2Example27">Contraseña</label>
                                        <input required type="password" id="form2Example27" class="form-control form-control-lg mt-2" name="usu_pass" <?php if (isset($_COOKIE["usu_pass"])) {
                                                                                                                                                    echo 'value="' . $_COOKIE["usu_pass"] . '"';
                                                                                                                                                } ?> />

                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button class="btn btn-green btn-lg btn-block" type="submit">Iniciar sesion</button>
                                    </div>
                                    <div class="row text-center">
                                        <div class="col-md-6 mt-2">
                                            <input class="form-check-input me-2" type="checkbox" value="1" id="form2Example3" name="recuerdame" <?php if (isset($_COOKIE["recuerdame"])) {
                                                                                                                                                    echo 'checked';
                                                                                                                                                } ?> />
                                            <label class="form-check-label" for="form2Example3">
                                                Recuerdame
                                            </label>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <a class="text-muted" href="">¿Olvido su contraseña?</a>
                                        </div>
                                    </div>
                                    <p class="text-center mt-5">¿No tienes una cuenta?</p>
                                    <div class="pt-1 mb-4 mt-3">
                                        <a href="<?= getUrl("Agro", "Agro", "formRegistrarAgricultor", false) ?>"><button class="btn btn-green btn-lg btn-block" type="button">Registrarme</button></a>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php

    include_once "../view/partials/footer.php";
} ?>