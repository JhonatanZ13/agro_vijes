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
                <div class="col mb-4">
                    <div class="card h-100">
                        <div id="carouselExampleIndicators" class="carousel slide" style="height: 200px; overflow: hidden;" data-interval="false" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="img/repollo.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/cebolla.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/tomates.jpg" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Repollo</h4>
                            <h5 class="card-title">Vendedor: Jhonatan Zambrano</h5>
                            <h5 class="card-title">Ubicacion: Cali</h5>
                            <p class="card-text">Fecha: <?=$fecha->diffForHumans()?>
                            </p>
                            <button class="btn btn-green w-100">Contactar <i class="fab fa-whatsapp"></i></button>

                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <div id="producto1" class="carousel slide" style="height: 200px; overflow: hidden;" data-interval="false" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#producto1" data-slide-to="0" class="active"></li>
                                <li data-target="#producto1" data-slide-to="1"></li>
                                <li data-target="#producto1" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item">
                                    <img src="img/cebolla.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/repollo.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item active">
                                    <img src="img/tomates.jpg" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#producto1" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#producto1" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Tomate</h4>
                            <h5 class="card-title">Vendedor: Jhonatan Zambrano</h5>
                            <h5 class="card-title">Ubicacion: Cali</h5>
                            <p class="card-text">Descripcion
                            </p>
                            <button class="btn btn-green w-100">Contactar <i class="fab fa-whatsapp"></i></button>
                        </div>
                    </div>
                </div>
                <div class="col mb-4">
                    <div class="card h-100">
                        <div id="producto2" class="carousel slide" style="height: 200px; overflow: hidden;" data-interval="false" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#producto2" data-slide-to="0" class="active"></li>
                                <li data-target="#producto2" data-slide-to="1"></li>
                                <li data-target="#producto2" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="img/cebolla.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/repollo.jpg" class="d-block w-100" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="img/tomates.jpg" class="d-block w-100" alt="...">
                                </div>
                            </div>
                            <a class="carousel-control-prev" href="#producto2" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#producto2" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title">Cebolla larga</h4>
                            <h5 class="card-title">Vendedor: Jhonatan Zambrano</h5>
                            <h5 class="card-title">Ubicacion: Cali</h5>
                            <p class="card-text">Descripcion
                            </p>
                            <button class="btn btn-green w-100">Contactar <i class="fab fa-whatsapp"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">

    </div>
</div>