<div class="container shadow mt-3">
    <div class="jumbotron">
        <h4 class="display-4">Mis productos</h4>
    </div>
    <div class="row row-cols-1 row-cols-md-3">
        <?php

        use Carbon\Carbon;

        if (mysqli_num_rows($eje) > 0) {
            $cont = 0;
            foreach ($eje as $eje) {
        ?>
                <div class="col mb-4">
                    <div class="card h-100">
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
                            <h4 class="card-title"><?= $eje['pro_titulo'] ?></h4>
                            <h5 class="card-title">Vendedor: <?php echo $obj->Consultname('usu_nombres', 'usuario WHERE usu_id = ' . $eje['pro_vendedor']) ?></h5>
                            <h5 class="card-title">Ubicacion: <?php echo $obj->Consultname('ciu_nombre', 'ciudad WHERE ciu_id = ' . $eje['pro_ubicacion']) ?></h5>

                            <p class="card-text">Fecha: <?php
                                                        $fecha = new Carbon($eje['pro_fecha']);
                                                        echo  $fecha->diffForHumans() ?>
                            </p>

                            <button class="btn btn-green">Editar producto</button>
                            <button class="btn btn-danger" type="button" id="modalEliminar" data-id='<?= $eje['pro_id']?>' data-url='<?= getUrl("Perfil", "Perfil", "postDelete", false, "ajax"); ?>'>Eliminar producto</button>
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