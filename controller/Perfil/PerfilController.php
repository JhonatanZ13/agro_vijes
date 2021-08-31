<?php
    date_default_timezone_set('America/Bogota');
    include_once '../model/Perfil/PerfilModel.php';
    require_once 'vendor/autoload.php';

    use Carbon\Carbon;

    Carbon::setlocale('es');
    class PerfilController{

        public function getPerfil(){
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

        public function misProductos(){
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

        public function editarProducto(){
            $obj = new PerfilModel();
            $id = $_GET['pro_id'];
            $sql = "SELECT * FROM productos_publicados WHERE pro_id = $id";
            $ejecutar = $obj->query($sql);
            
            include_once "../view/perfil/editarProducto.php";
        }

        public function postDelete(){
            $obj = new PerfilModel();
            $id = $_POST['pro_id'];

            $sql = "DELETE FROM productos_publicados WHERE pro_id = $id";
            $eje = $obj->query($sql);
        }
    } 