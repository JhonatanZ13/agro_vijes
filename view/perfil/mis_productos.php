<div id="main" class="main">
    <div class="yd-cat">
        <div class="container shadow mt-3">
            <div class="mt-5">
                <div class="cat2">
                    <h2>Mis productos publicados</h2>
                </div>
                <div class="cat2">
                    <h4>Cantidad de productos: <?= $cantidad ?></h4>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-md-3">
                <?php

                use Carbon\Carbon;

                if (mysqli_num_rows($eje) > 0) {
                    $cont = 0;
                    foreach ($eje as $eje) {
                ?>
                        <div class="col-md-4 mb-4">
                            <div class="card h-100shadow-sm" style="border: 2px solid green; overflow: hidden;">
                                <div id="carousel<?= $cont ?>" class="carousel slide" style="height: 200px; overflow: hidden;" data-interval="false" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel<?= $cont ?>" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel<?= $cont ?>" data-slide-to="1"></li>
                                        <li data-target="#carousel<?= $cont ?>" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="<?= $eje['foto1'] ?>" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?= $eje['foto2'] ?>" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?= $eje['foto3'] ?>" class="d-block w-100" alt="...">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carousel<?= $cont ?>" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel<?= $cont ?>" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <div class="cat2">
                                        <h3 class="mt-2 font-weight-bold" style="font-size: 16pt;"><?= $eje['pro_titulo'] ?></h3>
                                    </div>
                                    <p style="font-size: 14pt; line-height: 20pt;">
                                        <strong style="font-weight: bold;">Vendedor:</strong> <?php echo $obj->Consultname2("CONCAT(usu_nombres,' ',usu_apellidos) as nombres", 'usuario WHERE usu_id = ' . $eje['pro_vendedor']) ?><br>
                                        <strong style="font-weight: bold;">Ubicacion: </strong><?php echo $obj->Consultname('ciu_nombre', 'ciudad WHERE ciu_id = ' . $eje['pro_ubicacion']) ?><br>
                                        <strong style="font-weight: bold;">Precio: $</strong><?= $eje['precio'] ?> <?php echo $obj->Consultname('nombre_tipo_med', 'tipo_medida WHERE id_tipo_medida  = ' . $eje['medida_peso']) ?> <br>
                                        <strong style="font-weight: bold;">Cantidad disponible: </strong><?= $eje['cantidad_disponible'] ?> <?php echo $obj->Consultname('abr_nombre', 'tipo_medida WHERE id_tipo_medida  = ' . $eje['medida_peso']) ?> <br>
                                    </p>
                                    <div class="row">
                                        <div class="col-md-6 mt-2">
                                            <a href="<?php echo getUrl("Perfil", "Perfil", "editarProducto", array('pro_id' => $eje['pro_id'])) ?>"><button class="btn btn-green w-100">
                                                    <h3>Editar</h3>
                                                </button></a>
                                        </div>
                                        <div class="col-md-6 mt-2">
                                            <button class="btn btn-danger w-100" type="button" id="modalEliminar" data-id='<?= $eje['pro_id'] ?>' data-url='<?= getUrl("Perfil", "Perfil", "postDelete", false, "ajax"); ?>'>Eliminar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer text-muted">
                                    <?php
                                    $fecha = new Carbon($eje['pro_fecha']);
                                    echo  $fecha->diffForHumans() ?>
                                </div>
                            </div>
                        </div>
                <?php
                        $cont++;
                    }
                } else {
                    echo "No hay productos";
                }
                ?>

            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
<?php include_once "../view/partials/footer.php"; ?>