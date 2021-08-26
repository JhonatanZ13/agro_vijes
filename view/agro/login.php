<div id="main" class="main mt-5">
    <div id="reviews" class="yd_reviews">
        <div class="">
            <div class="yd_rev_inner">
                <div class="row">
                    <div class="col-md-5">
                        <div class="rev-intro">
                            <form style="width: auto;" action="<?= getUrl("Agro", "Agro", "login", false) ?>" method="POST">

                                <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px; font-weight: bold; font-size: 23pt;">Iniciar sesion</h3>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example17">Correo electronico</label>
                                    <input type="email" id="form2Example17" class="form-control form-control-lg" name="usu_correo" <?php if (isset($_COOKIE["usu_correo"])) {
                                                                                                                                        echo 'value="' . $_COOKIE["usu_correo"] . '"';
                                                                                                                                    } ?> />
                                </div>

                                <div class="form-outline mb-4">
                                    <label class="form-label" for="form2Example27">Contraseña</label>
                                    <input type="password" id="form2Example27" class="form-control form-control-lg" name="usu_pass" <?php if (isset($_COOKIE["usu_pass"])) {
                                                                                                                                        echo 'value="' . $_COOKIE["usu_pass"] . '"';
                                                                                                                                    } ?> />

                                </div>

                                <div class="pt-1 mb-4">
                                    <button class="btn btn-green btn-lg btn-block" type="submit">Entrar</button>
                                </div>
                                <div class="row container text-center">
                                    <div class="col-md-6">
                                        <input class="form-check-input me-2" type="checkbox" value="1" id="form2Example3" name="recuerdame" <?php if (isset($_COOKIE["recuerdame"])) {
                                                                                                                                                echo 'checked';
                                                                                                                                            } ?> />
                                        <label class="form-check-label" for="form2Example3">
                                            Recuerdame
                                        </label>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="small mb-5 pb-lg-2"><a class="text-muted" href="">¿Olvido su contraseña?</a></p>
                                    </div>
                                </div>
                                <p class="text-center">¿No tienes una cuenta?</p>
                                <div class="pt-1 mb-4">
                                    <a href="<?= getUrl("Agro", "Agro", "formRegistrarAgricultor", false) ?>"><button class="btn btn-green btn-lg btn-block" type="button">Soy agricultor(a)</button></a>
                                </div>
                                <div class="pt-1 mb-4">
                                    <button class="btn btn-green btn-lg btn-block" type="button">Soy comprador(a)</button>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="col-md-7">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once "../view/partials/footer.php"; ?>