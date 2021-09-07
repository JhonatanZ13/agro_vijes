<nav class="navbar navbar-expand-md fixed-top wt-border" style="background-color: #084000;">
    <div class="container">
        <a class="navbar-brand text-white" href="<?= getUrl("Agro", "Agro", "getHome") ?>">AGROVIJES</a>
        <button class="navbar-toggler bg-light" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent"  >
            <ul class="navbar-nav ml-auto navbar-right" style="background-color: #084000;">
            <li class="nav-item"><a class="nav-link js-scroll-trigger text-white" href="<?= getUrl("Agro", "Agro", "getHome") ?>">Inicio</a></li>
            <li class="nav-item"><a class="nav-link js-scroll-trigger text-white" href="<?= getUrl("Agro", "Agro", "getAboutUs") ?>">Sobre nosotros</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger text-white" href="<?= getUrl("Agro", "Agro", "getProductos",array('pagina' => 1)) ?>">Productos</a></li>
                <?php
                    if (isset($_SESSION['rol'])) {
                        if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2 || $_SESSION['rol'] == 4) {
                    ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger text-white" href="<?php echo getUrl("Agro", "Agro", "publicarProducto"); ?>">Publicar producto</a></li>
                    <?php
                        }
                    }
                ?>
                <?php
                    if (isset($_SESSION['rol'])) {
                        if ($_SESSION['rol'] == 1) {
                    ?>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger text-white" href="<?php echo getUrl("Admin", "Admin", "getPanelAdmin"); ?>">Panel de control</a></li>
                    <?php
                        }
                    }
                ?>
               
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