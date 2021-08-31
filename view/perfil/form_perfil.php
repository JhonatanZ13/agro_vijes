<div id="main" class="main">
    <div class="yd-cat">
        <div class="mt-4"></div>
        <div class="">
            <div class="container">
                <?php foreach ($eje as $eje) { ?>
                    <div class="hero-content wow fadeIn">
                        <div class="flex-split">
                            <div class="mt-2 row p-2">
                                <div class="col-md-4">
                                    <div class="col-md-12 m-auto bg-light text-center" 
                                        style="border: 1px solid gray; border-radius: 50%; width: 300px; height: 300px; overflow: hidden; background-color: #fff; display: flex;align-items: center;justify-content: center;">
                                        <div style="text-align: center;">
                                        <img src="<?=$eje['perfil_foto']?>" class="img-fluid" width="300px">
                                        </div>
                                        <!-- ./Archivos/fotos_perfil/no-avatar.png -->
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="cat2 text-center">
                                        <br>
                                        <h2><?= $obj->Consultname2("CONCAT(usu_nombres,' ',usu_apellidos) as nombres", 'usuario WHERE usu_id = ' . $eje['usu_id'])?></h2>
                                        <br>
                                        <h4><i class="fas fa-tractor"></i> <b>Agricultor</b></h4>
                                        <br>
                                        <h4><i class="fas fa-map-marker-alt"></i> <?php echo $obj->Consultname('ciu_nombre', 'ciudad WHERE ciu_id = ' . $eje['ciu_id']) ?>, <?php echo $obj->Consultname('dep_nombre', 'departamento WHERE dep_id = ' . $eje['dep_id']) ?></h4>
                                        <br>
                                        <h4><i class="fab fa-whatsapp-square"></i></i> <?=$tel?> </h4>
                                    </div>
                                    <div class="text-center">
                                        <button class="btn btn-green">Editar perfil</button>
                                        <a href="<?php echo getUrl("Perfil", "Perfil", "misProductos"); ?>"><button class="btn btn-primary ml-3">Mis productos</button></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <p class="p-2 font-weight-bold">
                            Descripcion:
                            <br>
                            
                        </p>
                        <textarea class="form-control" style="resize: none;" disabled><?=$eje['perfil_desc']?></textarea>
                        <div id="espacios_responsive"></div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<?php include_once "../view/partials/footer.php"; ?>