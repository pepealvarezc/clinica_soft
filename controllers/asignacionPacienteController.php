<?php
require_once './models/AsignacionPaciente.php';
class asignacionPacienteController 
{
    public function insert(){
        if(isset($_POST)){
            $data = (unserialize(base64_decode($_POST['rol'])));
            $rol = $data['rol'];
            $usuario_id = $data['id_usuario']; 
            $paciente_id = $_POST['id_pac'];

            $asignacion = new AsignacionPaciente();
            $asignacion->setUsuarioId($usuario_id);
            $asignacion->setPacienteId($paciente_id);
            $data = $asignacion->save($rol);
        }
        echo json_encode($data);
    }

    public function delete(){
        if($_GET['id']){
            $id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : FALSE;
        }
    }
}
