<style>
    body {

        background-size: cover;
        background-repeat: no-repeat;
    }

    .bg-image-vertical {
        position: relative;
        overflow: hidden;
        background-repeat: no-repeat;
        background-position: right center;
        background-size: auto 100%;
    }

    @media (min-width: 1025px) {
        .h-custom-2 {
            height: 75%;
        }
    }
</style>
<section class="" style="height: 70vh;">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4 text-black">

                <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0">
                    <form style="width: 23rem; margin:auto;" action="<?= getUrl("Agro", "Agro", "login", false) ?>" method="POST">

                        <h3 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Iniciar sesion</h3>

                        <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example17">Correo electronico</label>
                            <input type="email" id="form2Example17" class="form-control form-control-lg" name="usu_correo" <?php if(isset($_COOKIE["usu_correo"])) { echo 'value="'.$_COOKIE["usu_correo"].'"';} ?> />
                        </div>

                        <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example27">Contraseña</label>
                            <input type="password" id="form2Example27" class="form-control form-control-lg" name="usu_pass" <?php if(isset($_COOKIE["usu_pass"])) { echo 'value="'.$_COOKIE["usu_pass"].'"';} ?> />

                        </div>

                        <div class="pt-1 mb-4">
                            <button class="btn btn-green btn-lg btn-block" type="submit">Entrar</button>
                        </div>
                        <div class="row container text-center">
                            <div class="col-md-6">
                                <input class="form-check-input me-2" type="checkbox" value="1" id="form2Example3" name="recuerdame" <?php if(isset($_COOKIE["recuerdame"])) { echo 'checked';} ?> />
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
            <div class="col-sm-8 px-0 d-none d-sm-block">
                <img src="img/vijesfondo.png" alt="Login image" class="w-100" style="object-fit: cover; object-position: left; height: 93vh;">
            </div>
        </div>
    </div>
</section>