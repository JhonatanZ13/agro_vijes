<?php

    include_once '../lib/helpers.php';
    include_once '../view/partials/head.php';
    include_once '../view/partials/header.php';

    if (isset($_GET['modulo'])) {
        resolve();
    }else{
       echo '<a href="'.getUrl("Agro","Agro","getMain", false).'"> Ir </a>';

    }
    include_once '../view/partials/footer.php';
?>
    