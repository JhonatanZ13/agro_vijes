<?php

    include_once '../lib/helpers.php';
    include_once '../view/partials/head.php';
    include_once '../view/partials/header.php';
    

    if (isset($_GET['modulo'])) {
        resolve();
    }else{
       redirect(getUrl("Agro","Agro","getHome"));

    }
    include_once '../view/partials/modal.php';
    include_once '../view/partials/scripts.php';
?>
    