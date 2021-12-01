<?php


class dispocisionCambioController
{
    public function registro(){
        if(isset($_GET['id'])){
            $id = $_GET['id'] ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : false;
            require_once 'admin/layout/header.php';
            require_once 'admin/layout/sidebar.php';
            require_once 'views/paciente/dispocision_cambio.php';
            require_once 'admin/layout/footer.php';
        }
    }
}