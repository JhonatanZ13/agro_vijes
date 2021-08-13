<div class="row">
    <div class="col-md-2 mt-3">
        <div class="container">
            <label for=""> <i class="fas fa-filter"></i> Filtrar productos</label>
            <form>
                <input class="form-control mr-2" type="search" placeholder="Buscar vendedor" aria-label="Search">
            </form>
            <select name="" id="" class="form-control mt-2">
                <option value="">Tipo de producto</option>
            </select>
            <select name="" id="" class="form-control mt-2">
                <option value="">Ubicacion</option>
            </select>
            <button class="btn btn-outline-success mt-2" type="submit">Filtrar</button>
        </div>
    </div>
    <div class="col-md-8">
        <div class="container shadow mt-3">
            <div class="row row-cols-1 row-cols-md-3">
                <?php

use Carbon\Carbon;

if (mysqli_num_rows($eje) > 0) {
                    $cont = 0;
                    foreach ($eje as $eje) {
                ?>
                        <div class="col mb-4">
                            <div class="card h-100">
                                <div id="carousel<?=$cont?>" class="carousel slide" style="height: 200px; overflow: hidden;" data-interval="false" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carousel<?=$cont?>" data-slide-to="0" class="active"></li>
                                        <li data-target="#carousel<?=$cont?>" data-slide-to="1"></li>
                                        <li data-target="#carousel<?=$cont?>" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img src="<?=$eje['foto1']?>" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?=$eje['foto2']?>" class="d-block w-100" alt="...">
                                        </div>
                                        <div class="carousel-item">
                                            <img src="<?=$eje['foto3']?>" class="d-block w-100" alt="...">
                                        </div>
                                    </div>
                                    <a class="carousel-control-prev" href="#carousel<?=$cont?>" role="button" data-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="carousel-control-next" href="#carousel<?=$cont?>" role="button" data-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title"><?=$eje['pro_titulo']?></h4>
                                    <h5 class="card-title">Vendedor: <?php echo $obj->Consultname('usu_nombres', 'usuario WHERE usu_id = '.$eje['pro_vendedor'])?></h5>
                                    <h5 class="card-title">Ubicacion: <?php echo $obj->Consultname('ciu_nombre', 'ciudad WHERE ciu_id = '.$eje['pro_ubicacion'])?></h5>

                                    <p class="card-text">Fecha: <?php 
                                        $fecha = new Carbon($eje['pro_fecha']);
                                        echo  $fecha->diffForHumans() ?>
                                    </p>
                                    <a href="https://wa.me/<?=$obj->ConsultTel($eje['usu_id'])?>?text=Me%20interesa%20tu%20producto%20<?=$eje['pro_titulo']?>%20que%20estás%20vendiendo." target="_blank"><button class="btn btn-green w-100">Contactar <i class="fab fa-whatsapp"></i></button></a>

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
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li class="page-item"><a class="page-link" href="#">1</a></li>
                    <li class="page-item"><a class="page-link" href="#">2</a></li>
                    <li class="page-item"><a class="page-link" href="#">3</a></li>
                    <li class="page-item">
                        <a class="page-link" href="#" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
    <?php
    if (isset($_SESSION['rol'])) {
        if ($_SESSION['rol'] == 1) {
    ?>
        <div class="col-md-2">
            <a href="<?php echo getUrl("Agro", "Agro", "publicarProducto"); ?>" class="btn-flotante">Publicar producto</a>
        </div>
    <?php
        }
    }
    ?>
</div>