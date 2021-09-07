<?php
date_default_timezone_set('America/Bogota');
include_once '../model/Agro/AgroModel.php';
require_once 'vendor/autoload.php';

use Carbon\Carbon;

Carbon::setlocale('es');


class AgroController
{
    public function getHome(){

        include_once "../view/home.php";
    }

    public function getProductos()
    {
        $obj = new AgroModel();
        if(isset($_GET['pro_id'])){
            $pro_id = $_GET['pro_id'];
            $sql = "SELECT pro_id FROM productos_publicados WHERE id_producto = $pro_id";
            $ejecutar = $obj->query($sql);
        }else{
            $sql = "SELECT pro_id FROM productos_publicados";
            $ejecutar = $obj->query($sql);
        }
        

        $productos_x_pagina = 6;
        $paginas = mysqli_num_rows($ejecutar) / $productos_x_pagina;
        $paginas = ceil($paginas);

        $indice = ($_GET['pagina'] - 1) * $productos_x_pagina;
        $sql = "SELECT * FROM productos_publicados ORDER BY pro_fecha DESC LIMIT $indice, $productos_x_pagina";
        
        if(isset($_GET['pro_id'])){
            $pro_id = $_GET['pro_id'];
            $sql = "SELECT * FROM productos_publicados WHERE id_producto = $pro_id ORDER BY pro_fecha DESC LIMIT $indice, $productos_x_pagina";
        }

        $eje = $obj->query($sql);
        
        include_once '../view/agro/productos.php';
    }

    public function getAboutUs(){

        include_once "../view/agro/about.php";
    }

    public function getLogin()
    {
        include_once '../view/agro/login.php';
    }


    public function login(){
        $obj = new AgroModel();
        $usu_correo = $_POST['usu_correo'];
        $usu_pass = $_POST['usu_pass'];
        if (isset($_POST['recuerdame'])) {
            $recuerdame = $_POST['recuerdame'];
        } else {
            $recuerdame = 0;
        }
        $sql = "SELECT * FROM usuario WHERE usu_correo = '$usu_correo' AND usu_pass = '$usu_pass'";
        //dd($sql);
        $ejecutar = $obj->query($sql);
        if (mysqli_num_rows($ejecutar) > 0) {
            $_SESSION['auth'] = 1;
            foreach ($ejecutar as $eje) {
                $_SESSION['id'] = $eje['usu_id'];
                $_SESSION['nombre'] = $eje['usu_nombres'];
                $_SESSION['apellido'] = $eje['usu_apellidos'];
                $_SESSION['rol'] = $eje['usu_rol'];
            }
            if ($recuerdame == 1) {
                if (isset($_COOKIE['usu_correo'])) {
                    unset($_COOKIE['usu_correo']); 
                    setcookie('usu_correo', $usu_correo, time() + 31556926, '/'); 
                }else{
                    setcookie('usu_correo', $usu_correo, time() + 31556926, '/'); 
                }
                if (isset($_COOKIE['usu_pass'])) {
                    unset($_COOKIE['usu_pass']); 
                    setcookie('usu_pass', $usu_pass, time() + 31556926, '/'); 
                }else{
                    setcookie('usu_pass', $usu_pass, time() + 31556926, '/'); 
                }
                if (isset($_COOKIE['autorizar'])) {
                    unset($_COOKIE['autorizar']); 
                    setcookie('autorizar', '1', time() + 31556926, '/'); 
                }else{
                    setcookie('autorizar', '1', time() + 31556926, '/'); 
                }
                if (isset($_COOKIE['recuerdame'])) {
                    unset($_COOKIE['recuerdame']); 
                    setcookie('recuerdame', '1', time() + 31556926, '/'); 
                }else{
                    setcookie('recuerdame', '1', time() + 31556926, '/'); 
                }
            }
            redirect(getUrl("Agro", "Agro", "getProductos",array('pagina' => 1)));
        } else {
            echo "datos incorrectos";
        }
    }

    public function logOut()
    {
        session_destroy();
        if (isset($_COOKIE['autorizar'])) {
            unset($_COOKIE['autorizar']); 
        }
        redirect(getUrl("Agro", "Agro", "getLogin", false));
    }

    public function formRegistrarAgricultor()
    {
        $obj = new AgroModel();

        $dep = "SELECT * FROM departamento";
        $consultdep = $obj->query($dep);
        $num1 = mysqli_num_rows($consultdep);

        $ciu = "SELECT * FROM ciudad WHERE dep_id = 76";
        $consultciu = $obj->query($ciu);
        $num2 = mysqli_num_rows($consultciu);

        $pro = "SELECT * FROM tipo_producto";
        $constultPro = $obj->query($pro);
        $num3 = mysqli_num_rows($constultPro);

        include_once '../view/agro/form_registro_agricultor.php';
    }

    public function registrarAgricultor()
    {
        $obj = new AgroModel();
        $usu_correo = $_POST['usu_correo'];
        $sql = "SELECT usu_correo FROM usuario WHERE usu_correo = '$usu_correo'";
        $verificarCorreo = $obj->query($sql);

        if(mysqli_num_rows($verificarCorreo)>0){
            $_SESSION['mensaje'] = "¡Este correo ya se encuentra registrado!";
            $_SESSION['tipo'] = "danger";
            redirect(getUrl("Agro","Agro","formRegistrarAgricultor"));
        }else{
            //Usuario
            $rol = $_POST['rol'];
            $usu_nombres = $_POST['usu_nombres'];
            $usu_apellidos = $_POST['usu_apellidos'];
            $usu_pass = $_POST['usu_pass'];
            $usu_telefono = $_POST['usu_telefono'];

            $nombre_foto = $_FILES['perfil_foto']['name'];
            $ruta_foto = "../web/archivos/fotos_perfil/" . $nombre_foto;
            move_uploaded_file($_FILES['perfil_foto']['tmp_name'], $ruta_foto);

            //Otros datos
            if ($rol != 2) {
                $perfil_empresa = $_POST['perfil_empresa'];
                $tipo_pro_id = $_POST['tipo_pro_id'];
                $dep_id = $_POST['dep_id'];
                $ciu_id = $_POST['ciu_id'];
                $perfil_desc = $_POST['perfil_desc'];
            }else{
                $perfil_empresa = "";
                $tipo_pro_id = "NULL";
                $dep_id = "";
                $ciu_id = "";
                $perfil_desc = "";
            }
            $id_usu = $obj->autoIncrement("usuario","usu_id");
            $sql = "INSERT INTO usuario VALUES(
                $id_usu, '$usu_nombres', '$usu_apellidos', '$usu_correo', '$usu_pass', '+57$usu_telefono', $rol, 1
            )";
            $Insertar = $obj->query($sql);

            $id_perfil = $obj->autoIncrement("perfil","perfil_id");
            $sql = "INSERT INTO perfil VALUES(
                $id_perfil, $id_usu, '$ruta_foto', '$perfil_empresa', '$tipo_pro_id', $dep_id, $ciu_id, '$perfil_desc'
            )";
            $InsertPer = $obj->query($sql);

            $_SESSION['mensaje'] = "¡Su registro fue exitoso, por favor inicie sesion!";
            $_SESSION['tipo'] = "success";
            redirect(getUrl("Agro","Agro","getLogin"));
        }
        

        
        
    }


    public function publicarProducto()
    {
        $obj = new AgroModel();
        $ciu = "SELECT * FROM ciudad WHERE dep_id = 76";
        $consultciu = $obj->query($ciu);
        $num2 = mysqli_num_rows($consultciu);

        include_once '../view/agro/publicarProducto.php';
    }

    public function insertProducto(){
        $obj = new AgroModel();
        $id = $obj->autoIncrement("productos_publicados", "pro_id");
        $id_usu = $_SESSION['id'];
        $pro_titulo = $_POST['pro_titulo'];
        $id_producto = $_POST['id_producto'];
        $precio = $_POST['precio'];
        $cantidad_disponible = $_POST['cantidad_disponible'];
        $cant_min_venta = $_POST['cant_min_venta'];
        $medida_peso  = $_POST['medida_peso'];
        $pro_desc = $_POST['pro_desc'];
        $pro_ubicacion = $_POST['pro_ubicacion'];

        $ruta_foto1 = "";
        $ruta_foto2 = "";
        $ruta_foto3 = "";


            $nombre_foto1 = $_FILES['foto1']['name'];
            $ruta_foto1 = "../web/archivos/imagenes_productos/" . $nombre_foto1;
            move_uploaded_file($_FILES['foto1']['tmp_name'], $ruta_foto1);

            $nombre_foto2 = $_FILES['foto2']['name'];
            $ruta_foto2 = "../web/archivos/imagenes_productos/" . $nombre_foto2;
            move_uploaded_file($_FILES['foto2']['tmp_name'], $ruta_foto2);

            $nombre_foto3 = $_FILES['foto3']['name'];
            $ruta_foto3 = "../web/archivos/imagenes_productos/" . $nombre_foto3;
            move_uploaded_file($_FILES['foto3']['tmp_name'], $ruta_foto3);

            if (empty($nombre_foto1)) {
                $ruta_foto1="../web/img/no_image.jpg";
            }
            if (empty($nombre_foto2)) {
                $ruta_foto2="../web/img/no_image.jpg";
            }
            if (empty($nombre_foto3)) {
                $ruta_foto3="../web/img/no_image.jpg";
            }

        $sql = "INSERT INTO productos_publicados VALUES($id, $id_producto, '$pro_titulo', '$pro_desc', $id_usu, '$pro_ubicacion', NOW(), '$precio', '$cantidad_disponible', '$cant_min_venta', $medida_peso, '$ruta_foto1','$ruta_foto2','$ruta_foto3', $id_usu)";
        $ejecutar = $obj->query($sql);
        //echo $sql;
        redirect(getUrl("Agro", "Agro", "getProductos",array('pagina' => 1)));
    }

    public function updateProducto(){
        $obj = new AgroModel();

        $id = $_POST['id_pro'];
        $pro_titulo = $_POST['pro_titulo'];
        $id_producto = $_POST['id_producto'];
        $precio = $_POST['precio'];
        $cantidad_disponible = $_POST['cantidad_disponible'];
        $cant_min_venta = $_POST['cant_min_venta'];
        $medida_peso  = $_POST['medida_peso'];
        $pro_desc = $_POST['pro_desc'];
        $pro_ubicacion = $_POST['pro_ubicacion'];

        $ruta_foto1 = "";
        $ruta_foto2 = "";
        $ruta_foto3 = "";

        $rutas_fotos = "";

        $nombre_foto1 = $_FILES['foto1']['name'];
        $ruta_foto1 = "../web/archivos/imagenes_productos/" . $nombre_foto1;
        move_uploaded_file($_FILES['foto1']['tmp_name'], $ruta_foto1);

        $nombre_foto2 = $_FILES['foto2']['name'];
        $ruta_foto2 = "../web/archivos/imagenes_productos/" . $nombre_foto2;
        move_uploaded_file($_FILES['foto2']['tmp_name'], $ruta_foto2);

        $nombre_foto3 = $_FILES['foto3']['name'];
        $ruta_foto3 = "../web/archivos/imagenes_productos/" . $nombre_foto3;
        move_uploaded_file($_FILES['foto3']['tmp_name'], $ruta_foto3);

        if (!empty($nombre_foto1)) {
            $rutas_fotos = $rutas_fotos.",foto1 = '$ruta_foto1'";
        }
        if (!empty($nombre_foto2)) {
            $rutas_fotos = $rutas_fotos.",foto2 = '$ruta_foto2'";
        }
        if (!empty($nombre_foto3)) {
            $rutas_fotos = $rutas_fotos.",foto3 = '$ruta_foto3'";
        }

        $sql = "UPDATE productos_publicados SET
            id_producto = $id_producto, 
            pro_titulo = '$pro_titulo', 
            pro_desc = '$pro_desc',
            pro_ubicacion = '$pro_ubicacion', 
            precio = '$precio', 
            cantidad_disponible = '$cantidad_disponible', 
            cant_min_venta = '$cant_min_venta', 
            medida_peso = $medida_peso
            $rutas_fotos
            WHERE pro_id = $id";
        $ejecutar = $obj->query($sql);
        //echo $sql;
        redirect(getUrl("Perfil", "Perfil", "misProductos"));
    }

    public function getProducto(){
        $obj = new AgroModel();
        $id = $_POST['pro_id'];

        $sql = "SELECT * FROM productos_publicados WHERE pro_id = $id";
        $ejecutar = $obj->query($sql);

        include_once "../view/agro/modal_producto.php";
    }
}
