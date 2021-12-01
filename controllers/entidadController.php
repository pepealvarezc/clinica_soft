<?php
require_once 'models/Entidad.php';
class entidadController
{
    public function showAll(){
        $ent = new Entidad();
        $entidad = $ent->getAll();
        require_once './admin/layout/header.php';
        require_once './admin/layout/sidebar.php';
        require_once './views/usuario/registro.php';
    }
}