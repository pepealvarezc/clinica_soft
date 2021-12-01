<?php

class contactosPacienteController
{
    public function save(){
        if(isset($_POST['action']) == 'create'){
            $nombre = isset($_POST['nombre']) ? filter_var($_POST['nombre'], FILTER_SANITIZE_STRING) : false;
            $telefono = isset($_POST['telefono']) ? filter_var($_POST['telefono'], FILTER_SANITIZE_STRING) : false;
            $correo = isset($_POST['correo']) ? filter_var($_POST['correo'], FILTER_SANITIZE_STRING) : false;
            $parentesco = isset($_POST['parentesco']) ? filter_var($_POST['parentesco'], FILTER_SANITIZE_STRING) : false;
            $paciente_id = isset($_POST['paciente_id']) ? filter_var($_POST['paciente_id'], FILTER_VALIDATE_INT) : false;
            $ingreso_id = isset($_POST['ingreso_id']) ? filter_var($_POST['ingreso_id'], FILTER_VALIDATE_INT) : false;
        }
    }
}