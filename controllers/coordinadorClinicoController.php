<?php


class coordinadorClinicoController
{
    public function panel(){
        require_once './admin/layout/header.php';
        require_once './admin/layout/sidebar.php';
        require_once './views/coordinadorClinico/panel.php';
    }
}