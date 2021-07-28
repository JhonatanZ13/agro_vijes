<?php
    date_default_timezone_set('America/Bogota');
    include_once '../model/Agro/AgroModel.php';
    require_once 'vendor/autoload.php';
    use Carbon\Carbon;
    Carbon::setlocale('es');
 

    class AgroController{

        public function getMain(){
            $fecha = new Carbon("2021-07-27 15:30:00");
            include_once '../view/agro/inicio.php';
        }

        public function getLogin(){
            include_once '../view/agro/login.php';
        }
        public function login(){

            $obj = new AgroModel();
            $usu_correo = $_POST['usu_correo'];
            $usu_pass = $_POST['usu_pass'];
            if(isset($_POST['recuerdame'])){
                $recuerdame = $_POST['recuerdame'];
            }else{
                $recuerdame = 0;
            }
            $sql = "SELECT * FROM usuario WHERE usu_correo = '$usu_correo' AND usu_pass = '$usu_pass'";
            //dd($sql);
            $ejecutar = $obj->query($sql);
            if(mysqli_num_rows($ejecutar) > 0){
                $_SESSION['auth'] = 1;
                foreach ($ejecutar as $eje) {
                    $_SESSION['nombre'] = $eje['usu_nombres'];
                    $_SESSION['apellido'] = $eje['usu_apellidos'];
                }
                if($recuerdame == 1){
                    setcookie("usu_correo",$usu_correo,time()+31556926 ,'/');
                    setcookie("usu_pass",$usu_pass,time()+31556926 ,'/');
                    setcookie("recuerdame",'1',time()+31556926 ,'/');
                }
                redirect(getUrl("Agro","Agro","getMain",false));
            }
        }
        public function logOut(){
            session_destroy();
            redirect(getUrl("Agro","Agro","getLogin",false));
        }
    }
