<div id="main" class="main">
    <div class="yd-cat">
        <div class="container shadow mt-5">
            <div class="mt-5s"></div>
            <div class="cat2">
                <h2>Editar producto</h2>
            </div>
            <?php foreach ($ejecutar as $eje) { ?>
            <form action="<?php echo getUrl("Agro", "Agro", "updateProducto"); ?>" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="id_pro" value="<?=$eje['pro_id']?>">
                <div class="form-group row">
                    <div class="col-md-6 mt-3">
                        <label for="">Seleccione el producto</label>
                        <select name="id_producto" id="select_ciu" class="form-control mt-2">
                            <option value="0">Selecione</option>
                            <?php
                            echo $obj->CargaSelected("*", "productos", $eje['id_producto']);
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="exampleFormControlInput1">Titulo de la publicacion</label>
                        <input type="text" class="form-control mt-2" name="pro_titulo" value="<?=$eje['pro_titulo']?>">
                        <small class="form-text text-muted mt-2">
                            Tu titulo no debe exceder los 120 caracteres.
                        </small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 mt-3">
                        <label for="exampleFormControlInput1">Cantidad disponible (kg)</label>
                        <input type="number" class="form-control mt-2" name="cantidad_disponible" value="<?=$eje['cantidad_disponible']?>">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="exampleFormControlInput1">Cantidad minima de venta (kg)</label>
                        <input type="number" class="form-control mt-2" name="cant_min_venta" value="<?=$eje['cant_min_venta']?>">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="exampleFormControlInput1">Precio</label>
                        <input type="number" class="form-control mt-2" name="precio" value="<?=$eje['precio']?>">
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="exampleFormControlInput1">Tipo medida</label>
                        <select name="medida_peso" id="select_ciu" class="form-control mt-2">
                            <option value="0">Selecione</option>
                            <?php
                            echo $obj->CargaSelected("*", "tipo_medida", $eje['medida_peso']);
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Ubicacion</label>
                    <select name="pro_ubicacion" id="select_ciu" class="form-control mt-2">
                        <option value="0">Selecione</option>
                        <?php
                            echo $obj->CargaSelected("*", "ciudad", $eje['pro_ubicacion']);
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descripcion</label>
                    <textarea class="form-control mt-2" id="exampleFormControlTextarea1" rows="3" name="pro_desc"><?=$eje['pro_desc']?></textarea>
                    <small class="form-text text-muted mt-2">
                        Tu descripcion no debe exceder los 300 caracteres.
                    </small>
                </div>

                <div>
                    <div class="cat2">
                        <h4>Agregar fotos de los productos (*Maximo 3 fotos)</h4>
                    </div>
                    <div class="mt-2 row text-center">
                        <label for="subirFirma">
                            <div class="col-md-4 text-center">
                                <div style="border: 1px dashed black; width: 200px; overflow: hidden;">
                                    <img src="<?=$eje['foto1']?>" id="prevfirma" style="width: 200px;" alt="Foto de perfil"> <br>
                                </div>
                                <div class="mt-2">
                                    <input type="file" name="foto1" id="subirFirma" accept="image/*" style="display: none;">
                                </div>
                            </div>
                        </label>
                        <label for="subirFirma2">
                            <div class="col-md-4 text-center">
                                <div style="border: 1px dashed black; width: 200px; overflow: hidden;">
                                    <img src="<?=$eje['foto2']?>" id="prevfirma2" style="width: 200px;" alt="Foto de perfil"> <br>
                                </div>
                                <div class="mt-2">
                                    <input type="file" name="foto2" id="subirFirma2" accept="image/*" style="display: none;">
                                </div>
                            </div>
                        </label>
                        <label for="subirFirma3">
                            <div class="col-md-4 text-center">
                                <div style="border: 1px dashed black; width: 200px; overflow: hidden;">
                                    <img src="<?=$eje['foto3']?>" id="prevfirma3" style="width: 200px;" alt="Foto de perfil"> <br>
                                </div>
                                <div class="mt-2">
                                    <input type="file" name="foto3" id="subirFirma3" accept="image/*" style="display: none;">
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="">
                    <button class="btn btn-green btn-lg mt-5" type="submit">Actualizar producto</button>
                        <a href="<?php echo getUrl("Agro", "Agro", "getProductos",array('pagina' => 1)); ?>"><button class="btn btn-danger btn-lg mt-5" type="button">Cancelar</button></a>
                        
                    </div>
                </div>
            </form>
            <?php } ?>
        </div>
    </div>
</div>
<?php include_once "../view/partials/footer.php"; ?>