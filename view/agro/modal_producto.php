<?php foreach ($ejecutar as $eje) { ?>
    <div class="modal-body">
        <!-- Cuerpo de la modal -->
        <div class="cointainer-fluid">
            <div id="carousel" class="carousel slide" style="height: 200px; overflow: hidden;" data-interval="false" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
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
                <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <h3 class="mt-2"><?= $eje['pro_titulo'] ?></h3>
            <hr>
            <p id="contenido_modal_info" style="font-size: 14pt; line-height: 20pt;">
                <strong>Vendedor:</strong> <?php echo $obj->Consultname('usu_nombres', 'usuario WHERE usu_id = ' . $eje['pro_vendedor']) ?><br>
                <strong>Ubicacion: </strong><?php echo $obj->Consultname('ciu_nombre', 'ciudad WHERE ciu_id = ' . $eje['pro_ubicacion']) ?><br>
                <strong>Precio: $</strong><?=$eje['precio']?> <?php echo $obj->Consultname('nombre_tipo_med', 'tipo_medida WHERE id_tipo_medida  = '.$eje['medida_peso'])?><br>
                <strong>Cantidad disponible: </strong><?=$eje['cantidad_disponible']?> <?php echo $obj->Consultname('abr_nombre', 'tipo_medida WHERE id_tipo_medida  = '.$eje['medida_peso'])?><br>
                <strong>Cantidad minima de venta: </strong><?=$eje['cant_min_venta']?> <?php echo $obj->Consultname('abr_nombre', 'tipo_medida WHERE id_tipo_medida  = '.$eje['medida_peso'])?><br>
                <strong>Contacto: </strong><a href="tel:+<?php echo $obj->Consultname('usu_telefono', 'usuario WHERE usu_id  = '.$eje['usu_id'])?>">+<?php echo $obj->Consultname('usu_telefono', 'usuario WHERE usu_id  = '.$eje['usu_id'])?></a><br>
                <strong>Fecha de publicacion:</strong> Hace 1 dia <br>
                <Strong>Descripcion:</Strong>
                <textarea placeholder="Descripcion" class="form-control mt-2" disabled><?=$eje['pro_desc']?></textarea>
            </p>
            <div class="row text-center mt-2">
                <div class="col-md-6 mt-2">
                    <button type="buttom" class="btn btn-green w-75">Contactar productor</button>
                </div>
                <div class="col-md-6 mt-2">
                    <button type="buttom" class="btn btn-danger w-75" data-dismiss="modal">Cerrar informacion</button>
                </div>
            </div>
            <div class="mt-2 mb-2"></div>
        </div>
    </div>
<?php } ?>