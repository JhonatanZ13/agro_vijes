<div id="main" class="main">
    <div class="yd-cat">
        <div class="container shadow mt-5">
            <div class="mt-5s"></div>
            <div class="cat2">
                <h2>Publicar nuevo producto</h2>
            </div>
            <form action="<?php echo getUrl("Agro", "Agro", "insertProducto"); ?>" method="POST" enctype="multipart/form-data" class="needs-validation" novalidate>
                <div class="form-group row">
                    <div class="col-md-6 mt-3">
                        <label for="">Seleccione el producto (*)</label>
                        <select name="id_producto" id="select_ciu" class="form-control mt-2" required>
                            <option value="">Selecione</option>
                            <?php
                            echo $obj->CargaSelectGeneral("*", "productos");
                            ?>
                        </select>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="exampleFormControlInput1">Titulo de la publicacion (*)</label>
                        <input type="text" class="form-control mt-2" name="pro_titulo" required>
                        <small class="form-text text-muted mt-2">
                            Tu titulo no debe exceder los 120 caracteres.
                        </small>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-md-6 mt-3">
                        <label for="exampleFormControlInput1">Cantidad disponible (kg)</label>
                        <input type="number" class="form-control mt-2" name="cantidad_disponible" required>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="exampleFormControlInput1">Cantidad minima de venta (kg)</label>
                        <input type="number" class="form-control mt-2" name="cant_min_venta" required>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="exampleFormControlInput1">Precio</label>
                        <input type="number" class="form-control mt-2" name="precio" required>
                    </div>
                    <div class="col-md-6 mt-3">
                        <label for="exampleFormControlInput1">Tipo medida</label>
                        <select name="medida_peso" id="select_ciu" class="form-control mt-2" required>
                            <option value="">Selecione</option>
                            <?php
                            echo $obj->CargaSelectGeneral("*", "tipo_medida");
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Ubicacion</label>
                    <select name="pro_ubicacion" id="select_ciu" class="form-control mt-2" required>
                        <option value="">Selecione</option>
                        <?php
                        if ($num2 > 0) {
                            while ($dato = mysqli_fetch_row($consultciu)) {
                                if ($dato[0] == 1055) {
                                    echo "<option selected value='" . $dato[0] . "'>" . $dato[1] . "</option>";
                                } else {
                                    echo "<option value='" . $dato[0] . "'>" . $dato[1] . "</option>";
                                }
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Descripcion</label>
                    <textarea class="form-control mt-2" id="exampleFormControlTextarea1" rows="3" name="pro_desc"></textarea>
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
                                    <img src="img/placeholder.jpg" id="prevfirma" style="width: 200px;" alt="Foto de perfil"> <br>
                                </div>
                                <div class="mt-2">
                                    <input type="file" name="foto1" id="subirFirma" accept="image/*" style="display: none;">
                                </div>
                            </div>
                        </label>
                        <label for="subirFirma2">
                            <div class="col-md-4 text-center">
                                <div style="border: 1px dashed black; width: 200px; overflow: hidden;">
                                    <img src="img/placeholder.jpg" id="prevfirma2" style="width: 200px;" alt="Foto de perfil"> <br>
                                </div>
                                <div class="mt-2">
                                    <input type="file" name="foto2" id="subirFirma2" accept="image/*" style="display: none;">
                                </div>
                            </div>
                        </label>
                        <label for="subirFirma3">
                            <div class="col-md-4 text-center">
                                <div style="border: 1px dashed black; width: 200px; overflow: hidden;">
                                    <img src="img/placeholder.jpg" id="prevfirma3" style="width: 200px;" alt="Foto de perfil"> <br>
                                </div>
                                <div class="mt-2">
                                    <input type="file" name="foto3" id="subirFirma3" accept="image/*" style="display: none;">
                                </div>
                            </div>
                        </label>
                    </div>
                    <div class="mt-5">
                        <a href="<?php echo getUrl("Agro", "Agro", "getProductos",array('pagina' => 1)); ?>"><button class="btn btn-danger" type="button">Cancelar</button></a>
                        <button class="btn btn-green" type="submit">Publicar producto</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include_once "../view/partials/footer.php"; ?>