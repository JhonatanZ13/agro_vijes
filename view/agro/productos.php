<div id="main" class="main">
    <div class="yd-cat">
        <div class="row mt-5">
            <div class="col-md-2 mt-3">
                <div class="container">
                    <div class="cat2">
                        <h4><i class="fas fa-filter"></i> Filtrar productos</h4>
                    </div>
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
                <div class="container">
                    <div class="">
                        <div class="cat2">
                            <h2>Publicaciones recientes</h2>
                        </div>
                    </div>
                    <hr>
                    <div class="row row-cols-1 row-cols-md-3">
                        <?php

                        use Carbon\Carbon;

                        if (mysqli_num_rows($eje) > 0) {
                            $cont = 0;
                            foreach ($eje as $eje) {
                        ?>
                                <div class="col-md-4 mb-4">
                                    <div class="card h-100 shadow-sm" style="border: 2px solid green; overflow: hidden;">
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
                                        <div class="card-body bg-light">
                                            <h4 class="card-title"><?= $eje['pro_titulo'] ?></h4>
                                            <p style="font-size: 14pt; line-height: 20pt;">
                                                <strong> Vendedor:</strong> <?php echo $obj->Consultname('usu_nombres', 'usuario WHERE usu_id = ' . $eje['pro_vendedor']) ?><br>
                                                <strong>Ubicacion: </strong><?php echo $obj->Consultname('ciu_nombre', 'ciudad WHERE ciu_id = ' . $eje['pro_ubicacion']) ?><br>
                                                <strong>Precio: $</strong><?= $eje['precio'] ?> <?php echo $obj->Consultname('nombre_tipo_med', 'tipo_medida WHERE id_tipo_medida  = ' . $eje['medida_peso']) ?> <br>
                                                <strong>Cantidad disponible: </strong><?= $eje['cantidad_disponible'] ?> <?php echo $obj->Consultname('abr_nombre', 'tipo_medida WHERE id_tipo_medida  = ' . $eje['medida_peso']) ?> <br>
                                                <strong>Fecha:</strong> <?php
                                                                        $fecha = new Carbon($eje['pro_fecha']);
                                                                        echo  $fecha->diffForHumans() ?>
                                            </p>
                                            <div class="row">
                                                <div class="col-md-6 mt-2">
                                                    <a href="https://wa.me/<?= $obj->ConsultTel($eje['usu_id']) ?>?text=Me%20interesa%20tu%20producto%20<?= $eje['pro_titulo'] ?>%20podrias%20darme%20mas%20infromacion,%20Gracias." target="_blank"><button class="btn btn-green w-100">
                                                            <h3>Contactar <i class="fab fa-whatsapp"></i></h3>
                                                        </button></a>
                                                </div>
                                                <div class="col-md-6 mt-2">
                                                    <button type="button" class="btn btn-info w-100" id="modalBoton" data-id="<?= $eje['pro_id'] ?>">
                                                        <h3>Informacion <i class="fas fa-info-circle"></h3></i>
                                                    </button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                        <?php
                                $cont++;
                            }
                        } else {
                            echo "No se encontro ningun producto productos";
                        }
                        ?>
                    </div>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination justify-content-center">
                            <li class="page-item <?php echo $_GET['pagina']<=1 ? 'disabled' : '' ?>">
                                <a class="page-link" href="<?php echo getUrl("Agro","Agro","getProductos",array('pagina' => $_GET['pagina']-1));?>">Anterior</a>
                            </li>
                            <?php for ($i = 0; $i < $paginas; $i++) {

                            ?>
                                <li class="page-item <?php echo $_GET['pagina'] == $i+1 ? 'active' : '' ?>"><a class="page-link" href="<?php echo getUrl("Agro","Agro","getProductos",array('pagina' => $i+1));?>"><?=$i+1?></a></li>
                            <?php
                            }
                            ?>
                            <li class="page-item <?php echo $_GET['pagina']>=$paginas ? 'disabled' : '' ?>">
                                <a class="page-link" href="<?php echo getUrl("Agro","Agro","getProductos",array('pagina' => $_GET['pagina']+1));?>">Siguiente</a>
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
    </div>
</div>

<?php include_once "../view/partials/footer.php"; ?>