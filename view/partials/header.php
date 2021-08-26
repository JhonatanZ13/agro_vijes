<nav class="navbar navbar-expand-md fixed-top wt-border" style="background-color: #084000;">
    <div class="container">
        <a class="navbar-brand text-white" href="<?= getUrl("Agro", "Agro", "getHome") ?>">AGROVIJES</a>
        <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent"  >
            <ul class="navbar-nav ml-auto navbar-right" style="background-color: #084000;">
            <li class="nav-item"><a class="nav-link js-scroll-trigger text-white" href="<?= getUrl("Agro", "Agro", "getHome") ?>">Inicio</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger text-white" href="<?= getUrl("Agro", "Agro", "getProductos",array('pagina' => 1)) ?>">Productos</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger text-white" href="<?= getUrl("Agro", "Agro", "getAboutUs") ?>">Sobre nosotros</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger text-white" href="#reviews">Contacto</a></li>
                <?php
                if (isset($_SESSION['auth'])) {
                    if ($_SESSION['auth'] == 1) {
                ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user"></i>&nbsp;<?= $_SESSION['nombre'] . ' ' . $_SESSION['apellido'] ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li><a class="dropdown-item text-dark" href="<?= getUrl("Perfil", "Perfil", "getPerfil", false) ?>">Perfil</a></li>
                                <li><a class="dropdown-item text-dark" href="<?= getUrl("Agro", "Agro", "logOut", false) ?>">Cerrar sesion</a></li>
                            </ul>
                        </li>
                    <?php
                    }
                }
                ?>
                    
            </ul>
        </div>
    </div>
</nav>

<!-- <nav class="navbar navbar-expand-lg navbar-light w-100" style="background-color: #084000; position: fixed; z-index: 1000;">
    <a class="navbar-brand" href="#">
        <img src="img/logo2.png" width="40" height="40" alt="">
        <b style="color: white;">AGRO VIJES</b>
    </a>
    <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav mr-auto ml-5 my-2 my-lg-0 navbar-nav-scroll" style="max-height: 100px;">
            <li class="nav-item active activar">
                <a class="nav-link text-light" href="<?= getUrl("Agro", "Agro", "getHome") ?>">Inicio</a>
            </li>
            <li class="nav-item activar">
                <a class="nav-link text-light" href="<?= getUrl("Agro", "Agro", "getProductos", false) ?>">Productos</a>
            </li>
            <li class="nav-item activar">
                <a class="nav-link text-light" href="#">Sobre nosotros</a>
            </li>
            <li class="nav-item activar">
                <a class="nav-link text-light" href="#">Contacto</a>
            </li>
        </ul>
        <form class="d-flex">
            <input class="form-control mr-2" type="search" placeholder="Buscar producto" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
        <ul class="navbar-nav my-2 ml-5 my-lg-0" style="max-height: 100px;">
            <?php
            if (isset($_SESSION['auth'])) {
                if ($_SESSION['auth'] == 1) {
            ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-light" href="#" id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-user"></i> <?= $_SESSION['nombre'] . ' ' . $_SESSION['apellido'] ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="<?= getUrl("Perfil", "Perfil", "getPerfil", false) ?>">Perfil</a></li>
                            <li><a class="dropdown-item" href="<?= getUrl("Agro", "Agro", "logOut", false) ?>">Cerrar sesion</a></li>
                        </ul>
                    </li>
                <?php
                }
            } else {
                ?>
                <li class="nav-item">
                    <a class="nav-link text-light" href="<?= getUrl("Agro", "Agro", "getLogin", false); ?>"><i class="fas fa-user"></i> Ingresar o registrarse</a>
                </li>
            <?php
            }
            ?>

        </ul>
    </div>
</nav>
<br>
<br>
<br> -->