<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #084000;">
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
                <a class="nav-link text-light" href="#">Inicio</a>
            </li>
            <li class="nav-item activar">
                <a class="nav-link text-light" href="<?= getUrl("Agro", "Agro", "getMain", false) ?>">Productos</a>
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
                            <i class="fas fa-user"></i> <?= $_SESSION['nombre'] .' '. $_SESSION['apellido'] ?>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            <li><a class="dropdown-item" href="#">Perfil</a></li>
                            <li><a class="dropdown-item" href="<?=getUrl("Agro","Agro","logOut",false)?>">Cerrar sesion</a></li>
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