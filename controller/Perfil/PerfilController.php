<?php
date_default_timezone_set('America/Bogota');
include_once '../model/Perfil/PerfilModel.php';
require_once 'vendor/autoload.php';

use Carbon\Carbon;

Carbon::setlocale('es');
class PerfilController
{

    public function getPerfil()
    {
        $obj = new PerfilModel();
        $usu_id = $_SESSION['id'];
        $sql = "SELECT * FROM perfil WHERE usu_id = $usu_id";
        $eje = $obj->query($sql);

        $sql = "SELECT usu_rol, usu_telefono FROM usuario WHERE usu_id = $usu_id";
        $consult = $obj->query($sql);

        foreach ($consult as $con) {
            $rol = $con['usu_rol'];
            $tel = $con['usu_telefono'];
        }

        include_once '../view/perfil/form_perfil.php';
    }

    public function misProductos()
    {
        $obj = new PerfilModel();
        $id = $_SESSION['id'];
        $sql = "SELECT * FROM productos_publicados WHERE usu_id = $id ORDER BY pro_fecha DESC";
        $eje = $obj->query($sql);

        $sql = "SELECT COUNT(pro_id) AS cantidad FROM productos_publicados WHERE usu_id = $id";
        $cant_pro = $obj->query($sql);

        foreach ($cant_pro as $can) {
            $cantidad = $can['cantidad'];
        }

        include_once '../view/perfil/mis_productos.php';
    }

    public function editarProducto()
    {
        $obj = new PerfilModel();
        $id = $_GET['pro_id'];
        $sql = "SELECT * FROM productos_publicados WHERE pro_id = $id";
        $ejecutar = $obj->query($sql);

        include_once "../view/perfil/editarProducto.php";
    }

    public function postDelete()
    {
        $obj = new PerfilModel();
        $id = $_POST['pro_id'];

        $sql = "DELETE FROM productos_publicados WHERE pro_id = $id";
        $eje = $obj->query($sql);
    }

    public function editarPerfil()
    {
        $obj = new PerfilModel();
        $id = $_GET['usu_id'];
        if ($id == $_SESSION['id']) {
            $sqlusu = "SELECT * FROM usuario WHERE usu_id = $id";
            $usuario = $obj->query($sqlusu);
            $sqlperfil = "SELECT * FROM perfil WHERE usu_id = $id";
            $perfil = $obj->query($sqlperfil);

            include_once '../view/perfil/form_edit_perfil.php';
        } else {
            include_once '../view/partials/page401.php';
        }
    }

    public function actualizarPerfil()
    {
        $obj = new PerfilModel();
        $id = $_POST['usu_id'];
        if ($id == $_SESSION['id']) {

            $usu_correo = $_POST['usu_correo'];
            $sql = "SELECT usu_correo FROM usuario WHERE usu_correo = '$usu_correo' AND usu_id != $id";
            $verificarCorreo = $obj->query($sql);

            if (mysqli_num_rows($verificarCorreo) > 0) {
                $_SESSION['mensaje'] = "¡Este correo ya se encuentra registrado!";
                $_SESSION['tipo'] = "danger";
                redirect(getUrl("Perfil", "Perfil", "editarPerfil", array('usu_id'=> $id)));
            } else {
                //Usuario
                $rol = $_POST['rol'];

                if($rol == 1){
                    $rol = 4;
                }

                $usu_nombres = $_POST['usu_nombres'];
                $usu_apellidos = $_POST['usu_apellidos'];
                $usu_pass = $_POST['usu_pass'];
                $usu_telefono = $_POST['usu_telefono'];
                //Otros datos
                if ($rol == 2 || $rol == 4) {
                    $perfil_empresa = $_POST['perfil_empresa'];
                    $tipo_pro_id = $_POST['tipo_pro_id'];
                    $dep_id = $_POST['dep_id'];
                    $ciu_id = $_POST['ciu_id'];
                    $perfil_desc = $_POST['perfil_desc'];
                } else {
                    $perfil_empresa = "";
                    $tipo_pro_id = "NULL";
                    $dep_id = "";
                    $ciu_id = "";
                    $perfil_desc = "";
                }
                
                $nombre_foto = $_FILES['perfil_foto']['name'];
                if($nombre_foto != ""){
                    $ruta_foto = "../web/archivos/fotos_perfil/" . $nombre_foto;
                    move_uploaded_file($_FILES['perfil_foto']['tmp_name'], $ruta_foto);

                    $sqlperfil = "UPDATE perfil SET
                    perfil_foto = '$ruta_foto', 
                    perfil_empresa = '$perfil_empresa', 
                    tipo_pro_id = '$tipo_pro_id', 
                    dep_id = $dep_id, 
                    ciu_id = $ciu_id, 
                    perfil_desc = '$perfil_desc'
                    WHERE usu_id = $id
                    ";
                }else{
                    $sqlperfil = "UPDATE perfil SET
                    perfil_empresa = '$perfil_empresa', 
                    tipo_pro_id = '$tipo_pro_id', 
                    dep_id = $dep_id, 
                    ciu_id = $ciu_id, 
                    perfil_desc = '$perfil_desc'
                    WHERE usu_id = $id
                    ";
                }

                $sqlusu = "UPDATE usuario SET
                    usu_nombres = '$usu_nombres', 
                    usu_apellidos = '$usu_apellidos', 
                    usu_correo = '$usu_correo', 
                    usu_pass = '$usu_pass', 
                    usu_telefono = '$usu_telefono', 
                    usu_rol = $rol
                    WHERE usu_id = $id
                    ";
                $Insertar = $obj->query($sqlusu);
                $InsertPer = $obj->query($sqlperfil);

                $_SESSION['mensaje'] = "¡Se actuaizo correctamente su perfil!";
                $_SESSION['tipo'] = "success";
                redirect(getUrl("Perfil", "Perfil", "editarPerfil", array('usu_id'=> $id)));
            }
        } else {
            include_once '../view/partials/page401.php';
        }
    }
}
