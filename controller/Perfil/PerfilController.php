<?php
    date_default_timezone_set('America/Bogota');
    include_once '../model/Perfil/PerfilModel.php';
    require_once 'vendor/autoload.php';

    use Carbon\Carbon;

    Carbon::setlocale('es');
    class PerfilController{
        public function getPerfil(){
            include_once '../view/perfil/form_perfil.php';
        }

        public function misProductos(){
            $obj = new PerfilModel();
            $id = $_SESSION['id'];
            $sql = "SELECT * FROM productos_publicados WHERE usu_id = $id ORDER BY pro_fecha DESC";

            $eje = $obj->query($sql);

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