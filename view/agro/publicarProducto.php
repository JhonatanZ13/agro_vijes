<div class="container shadow mt-2">
    <div class="jumbotron">
        <h4 class="display-4">Publicar nuevo producto</h4>
    </div>
    <form action="<?php echo getUrl("Agro","Agro","insertProducto"); ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="exampleFormControlInput1">Titulo / Nombre producto</label>
            <input type="text" class="form-control" name="pro_titulo">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Descripcion</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="pro_desc"></textarea>
        </div>
        <div class="form-group">
            <label for="">Municipio</label>
            <select name="pro_ubicacion" id="select_ciu" class="form-control">
                <option value="0">Selecione</option>
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
        <div>
            <label class="font-weight-bold">Agregar productos de los productos (*Maximo 3 fotos)</label>
            <div class="mt-2 row container m-auto">
                <div class="col-md-4 text-center">
                    <img src="img/no_image.jpg" id="prevfirma" style="width: 200px;" alt="Foto de perfil"> <br>
                    <div class="mt-2">
                        <input type="file" name="foto1" id="subirFirma">
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <img src="img/no_image.jpg" id="prevfirma2" style="width: 200px;" alt="Foto de perfil"> <br>
                    <div class="mt-2">
                        <input type="file" name="foto2" id="subirFirma2">
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <img src="img/no_image.jpg" id="prevfirma3" style="width: 200px;" alt="Foto de perfil"> <br>
                    <div class="mt-2">
                        <input type="file" name="foto3" id="subirFirma3">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-group col-md-12 mt-5 text-center">
            <button class="btn btn-green ml-3" type="submit">Publicar producto</button>
            <button class="btn btn-danger" type="button">Cancelar</button>
        </div>
        <br>
        <br>
    </form>
</div>