<div id="main" class="main">
    <div class="home">
        <div class="">
            <div class="hero-content wow fadeIn">
                <div class="flex-split">
                    <div class="container">
                        <div class="flex-inner flex-inverted align-center">
                            <div class="f-image f-image-inverted">
                                <img class="img-fluid" src="./img/fotos/camp.jpg" alt="Campesinos vijes">
                            </div>
                            <div class="f-text">
                                <div class="left-content">
                                    <h2>¿Que es agrovijes?</h2> <br>
                                    <h4 style="font-size: 14pt;">Somos una vitrina virtual que busca contibuir a la economia y desarrollo local del sector agrícola del Municipio de Vijes, desarrollando una pagina web para que sus provedores puedan llegar a sus clientes reduciendo intermediaciones y así mejorar la calidad de vida para estas personas.</h4>
                                    <br>
                                    <p class="condition_txt">Si ya tienes una cuenta ingresa o registrate.</p>
                                    <a class="btn-action nav-link js-scroll-trigger" href="<?= getUrl("Agro", "Agro", "getLogin"); ?>">Iniciar sesion</a>
                                    <a class="btn-action" href="<?= getUrl("Agro", "Agro", "formRegistrarAgricultor", false) ?>">Resgistrate</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="yd-cat">
        <div class="container">
            <div class="container">
                <div class="cat2">
                    <h2>¿Que estas buscando?</h2>
                </div>
                <hr>
                <p>
                <div class="cat2">
                    <a data-toggle="collapse" href="#hortalizas" role="button" aria-expanded="false" aria-controls="hortalizas">
                        <h4>Hortalizas</h4>
                    </a>
                </div>
                </p>
                <div class="collapse" id="hortalizas">
                    <div class="card card-body">
                        <div class="row mt-2">
                            <div class="col-md-3 mb-2">
                                <div class="p-2 text-center hover_cards" style="border: 1px solid green; border-radius: 5px;">
                                <a href="<?= getUrl("Agro", "Agro", "getProductos",array('pagina' => 1, 'pro_id' => 1)) ?>" class="text-dark"><h3>Tomate</h3></a>
                                </div>
                            </div>
                            <div class="col-md-3 mb-2">
                                <div class="p-2 text-center hover_cards" style="border: 1px solid green; border-radius: 5px;">
                                <a href="<?= getUrl("Agro", "Agro", "getProductos",array('pagina' => 1, 'pro_id' => 2)) ?>" class="text-dark"><h3>Cilantro</h3></a>
                                </div>
                            </div>
                            <div class="col-md-3 mb-2">
                                <div class="p-2 text-center hover_cards" style="border: 1px solid green; border-radius: 5px;">
                                <a href="<?= getUrl("Agro", "Agro", "getProductos",array('pagina' => 1, 'pro_id' => 3)) ?>" class="text-dark"><h3>Pimenton</h3></a>
                                </div>
                            </div>
                            <div class="col-md-3 mb-2">
                                <div class="p-2 text-center hover_cards" style="border: 1px solid green; border-radius: 5px;">
                                <a href="<?= getUrl("Agro", "Agro", "getProductos",array('pagina' => 1, 'pro_id' => 4)) ?>" class="text-dark"><h3>Habichuela</h3></a>
                                </div>
                            </div>
                            <div class="col-md-3 mb-2">
                                <div class="p-2 text-center hover_cards" style="border: 1px solid green; border-radius: 5px;">
                                <a href="<?= getUrl("Agro", "Agro", "getProductos",array('pagina' => 1, 'pro_id' => 5)) ?>" class="text-dark"><h3>Cebolla larga</h3></a>
                                </div>
                            </div>
                            <div class="col-md-3 mb-2">
                                <div class="p-2 text-center hover_cards" style="border: 1px solid green; border-radius: 5px;">
                                <a href="<?= getUrl("Agro", "Agro", "getProductos",array('pagina' => 1, 'pro_id' => 6)) ?>" class="text-dark"><h3>Pepino</h3></a>
                                </div>
                            </div>
                            <div class="col-md-3 mb-2">
                                <div class="p-2 text-center hover_cards" style="border: 1px solid green; border-radius: 5px;">
                                <a href="<?= getUrl("Agro", "Agro", "getProductos",array('pagina' => 1, 'pro_id' => 7)) ?>" class="text-dark hover_cards"><h3>Aji</h3></a>
                                </div>
                            </div>
                            <div class="col-md-3 mb-2">
                                <div class="p-2 text-center hover_cards" style="border: 1px solid green; border-radius: 5px;">
                                <a href="<?= getUrl("Agro", "Agro", "getProductos",array('pagina' => 1, 'pro_id' => 8)) ?>" class="text-dark"><h3>Zapallo</h3></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                <p>
                <div class="cat2">
                    <a data-toggle="collapse" href="#frutas" role="button" aria-expanded="false" aria-controls="frutas">
                        <h4>Frutas</h4>
                    </a>
                </div>
                </p>
                <div class="collapse" id="frutas">
                    <div class="card card-body">
                        <div class="row mt-2">
                            <div class="col-md-3 mb-2">
                                <div class="p-2 text-center hover_cards" style="border: 1px solid green; border-radius: 5px;">
                                    <h3>Aguacate</h3>
                                </div>
                            </div>
                            <div class="col-md-3 mb-2">
                                <div class="p-2 text-center hover_cards" style="border: 1px solid green; border-radius: 5px;">
                                    <h3>Banano</h3>
                                </div>
                            </div>
                            <div class="col-md-3 mb-2">
                                <div class="p-2 text-center hover_cards" style="border: 1px solid green; border-radius: 5px;">
                                    <h3>Lulo</h3>
                                </div>
                            </div>
                            <div class="col-md-3 mb-2">
                                <div class="p-2 text-center hover_cards" style="border: 1px solid green; border-radius: 5px;">
                                    <h3>Mango</h3>
                                </div>
                            </div>
                            <div class="col-md-3 mb-2">
                                <div class="p-2 text-center hover_cards" style="border: 1px solid green; border-radius: 5px;">
                                    <h3>Maracuya</h3>
                                </div>
                            </div>
                            <div class="col-md-3 mb-2">
                                <div class="p-2 text-center hover_cards" style="border: 1px solid green; border-radius: 5px;">
                                    <h3>Piña</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <p>
                <div class="cat2">
                    <a data-toggle="collapse" href="#tuberculos" role="button" aria-expanded="false" aria-controls="tuberculos">
                        <h4>Tubérculos</h4>
                    </a>
                </div>
                </p>
                <div class="collapse" id="tuberculos">
                    <div class="card card-body">
                        <div class="row mt-2">
                            <div class="col-md-3 mb-2">
                                <div class="p-2 text-center hover_cards" style="border: 1px solid green; border-radius: 5px;">
                                    <h3>Yuca</h3>
                                </div>
                            </div>
                            <div class="col-md-3 mb-2">
                                <div class="p-2 text-center hover_cards" style="border: 1px solid green; border-radius: 5px;">
                                    <h3>Arracacha</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>
                <p>
                <div class="cat2">
                    <a data-toggle="collapse" href="#legum_cere" role="button" aria-expanded="false" aria-controls="legum_cere">
                        <h4>Legumbres y cereales</h4>
                    </a>
                </div>
                </p>
                <div class="collapse" id="legum_cere">
                    <div class="card card-body">
                        <div class="row mt-2">
                            <div class="col-md-3 mb-2">
                                <div class="p-2 text-center hover_cards" style="border: 1px solid green; border-radius: 5px;">
                                    <h3>Frijol</h3>
                                </div>
                            </div>
                            <div class="col-md-3 mb-2">
                                <div class="p-2 text-center hover_cards" style="border: 1px solid green; border-radius: 5px;">
                                    <h3>Maiz</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr>

                <p>
                <div class="cat2">
                    <a data-toggle="collapse" href="#cafes" role="button" aria-expanded="false" aria-controls="cafes">
                        <h4>Cafés</h4>
                    </a>
                </div>
                </p>
                <div class="collapse" id="cafes">
                    <div class="card card-body">
                        <div class="row mt-2">
                            <div class="col-md-3 mb-2">
                                <div class="p-2 text-center hover_cards" style="border: 1px solid green; border-radius: 5px;">
                                    <h3>Cafes especiales (organico)</h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <br>
            </div>
        </div>
    </div>

    <div class="">
        <div id="reviews" class="yd_reviews">
            <div class="container">
                <div class="cat2">
                    <h2>Galeria de imagenes</h2>
                </div>
                <hr>
                <div class="yd_rev_inner">
                    <div class="row">

                        <div class="col-md-12">
                            <div class="rev-list owl-carousel owl-theme text-center">
                                <div class="rev-block">
                                    <img class="img-fluid" src="./img/fotos/banner.jpg" alt="imagen vijes">
                                </div>
                                <div class="rev-block">
                                    <img class="img-fluid" src="./img/fotos/vijes.jpg" alt="imagen vijes">
                                </div>
                                <div class="rev-block">
                                    <img class="img-fluid" src="./img/fotos/p-vijes.jpg" alt="imagen vijes">
                                </div>
                                <div class="rev-block">
                                    <img class="img-fluid" src="./img/fotos/iglesia.jpg" alt="imagen vijes">
                                </div>
                                <div class="rev-block">
                                    <img class="img-fluid" src="./img/fotos/campo.jpg" alt="imagen vijes">
                                </div>
                                <div class="rev-block">
                                    <img class="img-fluid" src="./img/fotos/campesinos_vijes.jpg" alt="imagen vijes">
                                </div>
                                <div class="rev-block">
                                    <img class="img-fluid" src="./img/fotos/yoamovijes.jpg" alt="imagen vijes">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="cat2 mt-3">
            <h4>¿Como llegar?</h4>
        </div>
        <div class="text-center">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7963.020244068249!2d-76.44755442388416!3d3.6981956957533035!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e39fe1648902b81%3A0x4f0b0805866d2afe!2sVijes%2C%20Valle%20del%20Cauca!5e0!3m2!1ses-419!2sco!4v1631032412804!5m2!1ses-419!2sco" id="" class="img-fluid col-md-12" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
    <hr>
</div>
<?php include_once "../view/partials/footer.php"; ?>