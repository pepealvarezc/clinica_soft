<?php
require_once 'models/ConsumoSustancias.php';

class consumoSustanciasController
{
    public function check(){
        if(isset($_GET['id'])){
            $id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : false;
            $id_pac = isset($_GET['id_pac']) ? filter_var($_GET['id_pac'], FILTER_VALIDATE_INT) : false;
            $check = new ConsumoSustancias();
            $data = $check->check($id, $id_pac);
        }
        echo json_encode($data);
    }

    public function registro()
    {
        if(isset($_GET['id'])){
            $id = $_GET['id'] ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : false;
            $consumo = new ConsumoSustancias();
            $consumo->setId($id);
            $sust = $consumo->getAll();
            $sustancia = $consumo->getSustancia();
            require_once 'admin/layout/header.php';
            require_once 'admin/layout/sidebar.php';
            require_once 'views/paciente/consumo_sustancia.php';
            require_once 'admin/layout/footer.php';
        }
    }

    public function save()
    {
        if (isset($_POST)) {
            $paciente_id = isset($_POST['paciente_id']) ? filter_var($_POST['paciente_id'], FILTER_VALIDATE_INT) : false;
            $sustancia_id = isset($_POST['sustancia_id']) ? filter_var($_POST['sustancia_id'], FILTER_VALIDATE_INT) : false;
            $radio = isset($_POST['consumo']) ? filter_var($_POST['consumo'], FILTER_SANITIZE_STRING) : false;
            $formaConsumo = isset($_POST['formaConsumo']) ? filter_var($_POST['formaConsumo'], FILTER_SANITIZE_STRING) : false;
            $frecuencia = isset($_POST['consumoFrecuencia']) ? filter_var($_POST['consumoFrecuencia'], FILTER_SANITIZE_STRING) : false;
            $cantidad = isset($_POST['cantidad']) ? filter_var($_POST['cantidad'], FILTER_SANITIZE_STRING) : false;
            $inicioConsumo = isset($_POST['inicioConsumo']) ? filter_var($_POST['inicioConsumo'], FILTER_VALIDATE_INT) : false;

            $consumo = new ConsumoSustancias();
            $consumo->setId($paciente_id);
            $consumo->setSustanciaId($sustancia_id);
            $consumo->setConsumoSust($radio);
            $consumo->setFormaCons($formaConsumo);
            $consumo->setFrecuenciaCons($frecuencia);
            $consumo->setCantConsumoSust($cantidad);
            $consumo->setEdadInicioCons($inicioConsumo);

            if ($_POST['action'] == 'create') {
                $save = $consumo->save();
            } else {
                $save = $paciente->edit();
            }
        }
        echo json_encode($save);
    }
}