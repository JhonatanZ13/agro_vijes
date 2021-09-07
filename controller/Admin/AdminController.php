<?php
    include_once '../model/Admin/AdminModel.php';

    class AdminController{
        public function getPanelAdmin(){
            $obj = new AdminModel();

            include_once '../view/admin/admin_panel.php';
        }
    }

?>