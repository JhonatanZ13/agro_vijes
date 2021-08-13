<?php

    include_once '../lib/conf/connection.php';

    class MasterModel extends Connection{

        public function query($sql){
            $result = mysqli_query($this->getConnect(),$sql);
            return $result;
        }
        
        public function autoIncrement($table,$field){
            $sql="SELECT MAX($field) FROM $table";
            $result=$this->query($sql);
            $account=mysqli_fetch_row($result);

            return end($account)+1;
        }

        public function ConsultTel($id){
    
            $sql = "SELECT usu_telefono FROM usuario WHERE usu_id = $id";
            $result=$this->query($sql);
            foreach ($result as $e) {
                $re = $e['usu_telefono'];
            }
            return $re;
        }

        public function ConsultName($campo,$tabla){
    
            $sql = "SELECT * FROM $tabla";
            $result=$this->query($sql);
            foreach ($result as $e) {
                $re = $e[$campo];
            }
            return $re;
        }
    }
?>