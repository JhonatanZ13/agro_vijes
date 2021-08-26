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
        $sql = "SELECT * FROM productos_publicados ORDER BY pro_fecha DESC";
        $ejecutar = $obj->query($sql);

        $productos_x_pagina = 6;
        $paginas = mysqli_num_rows($ejecutar) / $productos_x_pagina;
        $paginas = ceil($paginas);

        $indice = ($_GET['pagina'] - 1) * $productos_x_pagina;
        $sql = "SELECT * FROM productos_publicados ORDER BY pro_fecha DESC LIMIT $indice, $productos_x_pagina";
        $eje = $obj->query($sql);
        
        
        $fecha = new Carbon("2021-07-27 15:30:00");
        include_once '../view/agro/productos.php';
    }

    public function getAboutUs(){

        include_once "../view/agro/about.php";
    }

    public function getLogin()
    {
        include_once '../view/agro/login.php';
    }
    public function login()
    {

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
                setcookie("usu_correo", $usu_correo, time() + 31556926, '/');
                setcookie("usu_pass", $usu_pass, time() + 31556926, '/');
                setcookie("recuerdame", '1', time() + 31556926, '/');
            }
            redirect(getUrl("Agro", "Agro", "getHome", false));
        } else {
            echo "datos incorrectos";
        }
    }

    public function logOut()
    {
        session_destroy();
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

        //Usuario
        $usu_nombres = $_POST['usu_nombres'];
        $usu_apellidos = $_POST['usu_apellidos'];
        $usu_correo = $_POST['usu_correo'];
        $usu_pass = $_POST['usu_pass'];
        $usu_telefono = $_POST['usu_telefono'];

        $nombre_foto = $_FILES['perfil_foto']['name'];
        $ruta_foto = "../web/archivos/fotos_perfil/" . $nombre_foto;
        move_uploaded_file($_FILES['perfil_foto']['tmp_name'], $ruta_foto);

        //Otros datos
        $perfil_empresa = $_POST['perfil_empresa'];
        $tipo_pro_id = $_POST['tipo_pro_id'];
        $dep_id = $_POST['dep_id'];
        $ciu_id = $_POST['ciu_id'];
        $perfil_desc = $_POST['perfil_desc'];

        for ($i = 0; $i < count($_FILES["ruta"]["name"]); $i++) {
            $tmp_nombre = $_FILES["ruta"]["tmp_name"][$i];
            $folder = "../web/archivos/fotos_productos/";
            move_uploaded_file($_FILES["ruta"]["tmp_name"][$i], "$folder" . $_FILES["ruta"]["name"][$i]);
        }

        /* foreach ($_FILES['ruta']['tmp_name'] as $key => $tmp_name) {
            if($_FILES["ruta"]["name"][$key]) {
                $nombre_archivo =$_FILES['ruta']['name'][$key];
                $tmp_nombre =$_FILES['ruta']['tmp_name'][$key];
                $ruta[$key]="../web/archivos/fotos_productos/".$nombre_archivo;
                move_uploaded_file($tmp_nombre,$ruta[$key]);
            }
        } */
    }

    public function CargaSelectGeneral($campo, $tabla)
    {
        $obj = new AgroModel();
        $sql = "SELECT $campo FROM $tabla";

        $consultar = $obj->query($sql);
        $num = mysqli_num_rows($consultar);

        if ($num > 0) {
            while ($dato = mysqli_fetch_row($consultar)) {
                echo "<option value='" . $dato[0] . "'>$dato[1]  </option>";
            }
        }
    }

    public static function CargaSelected($campo, $tabla, $condicion)
    {
        $obj = new AgroModel();

        $sql = "SELECT $campo FROM $tabla";

        $consultar = $obj->query($sql);
        $num = mysqli_num_rows($consultar);
        $result = "";
        if ($num > 0) {
            while ($dato = mysqli_fetch_row($consultar)) {
                if ($dato[0] == $condicion) {
                    echo "<option selected value='" . $dato[0] . "'>" . $dato[1] . "</option>";
                } else {
                    echo "<option value='" . $dato[0] . "'>" . $dato[1] . "</option>";
                }
            }
        }
        return $result;
    }

    public function selectCiu()
    {
        $dep_id = $_POST['dep_id'];
        $result = self::CargaSelectGeneral("*", "ciudad WHERE dep_id = $dep_id");
        return $result;
    }


    public function publicarProducto()
    {
        $obj = new AgroModel();
        $ciu = "SELECT * FROM ciudad WHERE dep_id = 76";
        $consultciu = $obj->query($ciu);
        $num2 = mysqli_num_rows($consultciu);

        include_once '../view/agro/publicarProducto.php';
    }

    public function insertProducto()
    {
        $obj = new AgroModel();
        $id = $obj->autoIncrement("productos_publicados", "pro_id");
        $id_usu = $_SESSION['id'];
        $pro_titulo = $_POST['pro_titulo'];
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

        $sql = "INSERT INTO productos_publicados VALUES($id, '$pro_titulo', '$pro_desc', $id_usu, '$pro_ubicacion', NOW(), '$ruta_foto1','$ruta_foto2','$ruta_foto3', $id_usu)";
        $ejecutar = $obj->query($sql);
        //echo $sql;
        redirect(getUrl("Agro","Agro","getMain"));
    }

    public function getProducto(){
        $obj = new AgroModel();
        $id = $_POST['pro_id'];

        $sql = "SELECT * FROM productos_publicados WHERE pro_id = $id";
        $ejecutar = $obj->query($sql);

        include_once "../view/agro/modal_producto.php";
    }
}

?>
