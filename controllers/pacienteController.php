<?php
require_once './models/Paciente.php';
require_once './models/PacienteIngreso.php';
require_once './models/Entidad.php';
require_once './models/Usuario.php';
require_once './models/AsignacionPaciente.php';
require_once './models/ContactosPaciente.php';
require_once './models/Venta.php';

class pacienteController
{
    public function expediente()
    {
        if (isset($_GET['id'])) {
            //Get paciente
            $paciente_id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : false;
            $paciente = new Paciente();
            $paciente->setIdPaciente($paciente_id);
            $pac = $paciente->getOne();
            //reingreso
            $reingreso = new PacienteIngreso();
            $reingreso->setPacienteId($paciente_id);
            $res = $reingreso->reingreso();
            require_once './admin/layout/header.php';
            require_once './admin/layout/sidebar.php';
            require_once './views/paciente/expediente.php';
        }
    }

    public function generatePdf()
    {
        if (isset($_GET)) {
            $id = $_GET['id'];
            $ingreso = new PacienteIngreso();
            $ingreso->setPacienteId($id);
            $data = $ingreso->reingreso();
            $data = $data->fetch_object();
            $arr = [
                'idIngresoPaciente' => $data->id_ingreso_paciente,
                'idPaciente' => $data->paciente_id
            ];
        }
        echo json_encode($arr);
    }

    public function reingreso()
    {
        if (isset($_GET['id'])) {
            $reingreso = true;
            $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);
            $paciente = new Paciente();
            $paciente->setIdPaciente($id);
            $ident = $paciente->getOne();
            require_once './admin/layout/header.php';
            require_once './admin/layout/sidebar.php';
            require_once './views/paciente/ingreso.php';
        }
    }

    public function registros()
    {
        $paciente = new Paciente();
        $data = $paciente->getAll();

        //registros con reingreso
        $reingresos = new PacienteIngreso();
        $rein = $reingresos->reingreso();
        require_once './admin/layout/header.php';
        require_once './admin/layout/sidebar.php';
        require_once './views/paciente/registros.php';
    }

    public function registro()
    {
        if (isset($_GET['idv'])) {
            $ventaId = filter_var($_GET['idv'], FILTER_VALIDATE_INT);
            $paciente = new PacienteIngreso();
            $paciente->setVentaId($ventaId);
            $data = $paciente->getIngresoVenta();
            if ($data) {
                $paciente_id = $data->paciente_id;
                $ingreso_id = $data->id_ingreso_paciente;
                $contactos = new ContactosPaciente();
                $contactos->setPacienteId($paciente_id);
                $contactos->setIngresoId($ingreso_id);
                $obj = $contactos->getAll();
                $arr;
                while ($d = $obj->fetch_assoc()) {
                    $arr[] = $d;
                }
            }
        }
        $entidad = new Entidad();
        $tratamiento = $entidad->getAll();

        //fecha de ingreso
        $dataNow = Utils::getDate();

        require_once './admin/layout/header.php';
        require_once './admin/layout/sidebar.php';
        require_once './views/paciente/ingreso.php';
    }

    public function save()
    {
        if (isset($_POST)) {
            $nombre_pa = isset($_POST['nombre']) ? filter_var($_POST['nombre'], FILTER_SANITIZE_STRING) : false;
            $apellido_pa = isset($_POST['apellido_p']) ? filter_var($_POST['apellido_p'], FILTER_SANITIZE_STRING) : false;
            $apellido_ma = isset($_POST['apellido_m']) ? filter_var($_POST['apellido_m'], FILTER_SANITIZE_STRING) : false;
            $fecha_nac = isset($_POST['fecha_nac']) ? filter_var($_POST['fecha_nac'], FILTER_SANITIZE_STRING) : false;
            $lugar_nac = isset($_POST['lugar_nac']) ? filter_var($_POST['lugar_nac'], FILTER_SANITIZE_STRING) : false;
            $edad = isset($_POST['edad']) ? filter_var($_POST['edad'], FILTER_VALIDATE_INT) : false;
            $civil = isset($_POST['civil']) ? filter_var($_POST['civil'], FILTER_SANITIZE_STRING) : false;
            $hijos = isset($_POST['hijos']) ? filter_var($_POST['hijos'], FILTER_SANITIZE_STRING) : false;
            $edades = isset($_POST['edades']) ? filter_var($_POST['edades'], FILTER_SANITIZE_STRING) : false;
            $ocupacion = isset($_POST['ocupacion']) ? filter_var($_POST['ocupacion'], FILTER_SANITIZE_STRING) : false;
            $escolaridad = isset($_POST['escolaridad']) ? filter_var($_POST['escolaridad'], FILTER_SANITIZE_STRING) : false;
            $vive_con = isset($_POST['vive_con']) ? filter_var($_POST['vive_con'], FILTER_SANITIZE_STRING) : false;
            $calle = isset($_POST['calle']) ? filter_var($_POST['calle'], FILTER_SANITIZE_STRING) : false;
            $ext = isset($_POST['ext']) ? filter_var($_POST['ext'], FILTER_SANITIZE_STRING) : false;
            $interior = isset($_POST['interior']) ? filter_var($_POST['interior'], FILTER_SANITIZE_STRING) : false;
            $colonia = isset($_POST['colonia']) ? filter_var($_POST['colonia'], FILTER_SANITIZE_STRING) : false;
            $ciudad = isset($_POST['ciudad']) ? filter_var($_POST['ciudad'], FILTER_SANITIZE_STRING) : false;
            $cp = isset($_POST['cp']) ? filter_var($_POST['cp'], FILTER_SANITIZE_STRING) : false;

            $estado_vive = isset($_POST['estado_vive']) ? filter_var($_POST['estado_vive'], FILTER_SANITIZE_STRING) : false;
            $pais = isset($_POST['pais']) ? filter_var($_POST['pais'], FILTER_SANITIZE_STRING) : false;
            $se_entrero = isset($_POST['se_entrero']) ? filter_var($_POST['se_entrero'], FILTER_SANITIZE_STRING) : false;
            $recomendado = isset($_POST['recomendado']) ? filter_var($_POST['recomendado'], FILTER_SANITIZE_STRING) : false;
            $resp = isset($_POST['resp']) ? filter_var($_POST['resp'], FILTER_SANITIZE_STRING) : false;
            $actitud = isset($_POST['actitud']) ? filter_var($_POST['actitud'], FILTER_SANITIZE_STRING) : false;
            $observaciones = isset($_POST['observaciones']) ? filter_var($_POST['observaciones'], FILTER_SANITIZE_STRING) : false;
            $adiccion = isset($_POST['adiccion']) ? filter_var($_POST['adiccion'], FILTER_SANITIZE_STRING) : false;

            $estado_civil = isset($_POST['estado_civil']) ? filter_var($_POST['estado_civil'], FILTER_SANITIZE_STRING) : false;
            $ingreso = isset($_POST['ingreso']) ? filter_var($_POST['ingreso'], FILTER_SANITIZE_STRING) : false;
            $precio_trat = isset($_POST['precio_trat']) ? filter_var($_POST['precio_trat'], FILTER_SANITIZE_STRING) : false;
            $precio_letra = isset($_POST['precio_letra']) ? filter_var($_POST['precio_letra'], FILTER_SANITIZE_STRING) : false;
            $moneda = isset($_POST['moneda']) ? filter_var($_POST['moneda'], FILTER_SANITIZE_STRING) : false;
            $duracion = isset($_POST['duracion']) ? filter_var($_POST['duracion'], FILTER_SANITIZE_STRING) : false;
            $deposito_ip = isset($_POST['deposito_ip']) ? filter_var($_POST['deposito_ip'], FILTER_SANITIZE_STRING) : false;
            $deposito_letra = isset($_POST['deposito_letra']) ? filter_var($_POST['deposito_letra'], FILTER_SANITIZE_STRING) : false;
            $forma_pago = isset($_POST['forma_pago']) ? filter_var($_POST['forma_pago'], FILTER_SANITIZE_STRING) : false;
            $usuaio_id = $_SESSION['identity']->id_usuario;
            $paciente_id = isset($_POST['paciente_id']) ? filter_var($_POST['paciente_id'], FILTER_VALIDATE_INT) : false;

            // Se comprueba si existe el id de venta
            if(isset($_POST['ventaId']) && !empty($_POST['ventaId'])){
                $ventaId = filter_var($_POST['ventaId'], FILTER_VALIDATE_INT);
            }else {
                $ventaId = "NULL";
            }

            //estadia del paciente
            $entidad_id = isset($_POST['tratamiento']) ? filter_var($_POST['tratamiento'], FILTER_VALIDATE_INT) : false;
            $estadia = isset($_POST['estadia']);

            //var_dump($estadia);
            $fechaEstadia = Utils::getTime($estadia);
            //var_dump($fechaEstadia);

            $paciente = new Paciente();
            $paciente->setNombrePa($nombre_pa);
            $paciente->setApellidoPaternoPa($apellido_pa);
            $paciente->setApellidoMaternoPa($apellido_ma);
            $paciente->setFechaNacimientoPa($fecha_nac);
            $paciente->setLugarNacimientoPa($lugar_nac);

            $pacienteIngreso = new PacienteIngreso();
            $pacienteIngreso->setEdadPa($edad);
            $pacienteIngreso->setEstadoCivilIp($civil);
            $pacienteIngreso->setHijosIp($hijos);
            $pacienteIngreso->setEdadesHijosIp($edades);
            $pacienteIngreso->setOcupacionIp($ocupacion);
            $pacienteIngreso->setEscolaridadIp($escolaridad);
            $pacienteIngreso->setViveConIp($vive_con);
            $pacienteIngreso->setCalleViveIp($calle);
            $pacienteIngreso->setExtViveIp($ext);
            $pacienteIngreso->setInteriorIp($interior);
            $pacienteIngreso->setColoniaIp($colonia);
            $pacienteIngreso->setCiudadViveIp($ciudad);
            $pacienteIngreso->setCodigoPostalIp($cp);

            $pacienteIngreso->setEstadoViveIp($estado_vive);
            $pacienteIngreso->setPaisViveIp($pais);
            $pacienteIngreso->setModoSeEntero($se_entrero);
            $pacienteIngreso->setRecomendadoPor($recomendado);
            $pacienteIngreso->setRespLegal($resp);
            $pacienteIngreso->setEstadoActitud($actitud);
            $pacienteIngreso->setObservacionesIngreso($observaciones);

            $pacienteIngreso->setAdiccionIp($adiccion);
            $pacienteIngreso->setEntidadId($entidad_id);
            $pacienteIngreso->setIngresoIp(Utils::getDateFormatted($ingreso));
            $pacienteIngreso->setPrecioTratamientoIp($precio_trat);
            $pacienteIngreso->setPrecioLetra($precio_letra);
            $pacienteIngreso->setMonedaIp($moneda);
            $pacienteIngreso->setDuracionIp($duracion);
            $pacienteIngreso->setDepositoIp($deposito_ip);
            $pacienteIngreso->setDepositoLetra($deposito_letra);
            $pacienteIngreso->setFormaPagoIp($forma_pago);
            $pacienteIngreso->setVentaId($ventaId);
            $pacienteIngreso->setFechaEstadia($fechaEstadia);

            if ($_POST['action'] == 'create') {
                $save = $paciente->save();
                $last_id = $save['id'];

                if ($save) {
                    //Se inserta el ingreso del paciente
                    $pacienteIngreso->setId($usuaio_id);
                    $pacienteIngreso->setPacienteId($last_id);
                    $save = $pacienteIngreso->save();

                    if ($save['res']) {
                        $ingreso_id = $save['ingreso_id'];
    
                        //una vez cumplido el registro del paciente se
                        // procede a restar el cupo de las entidades
                        $id_ent = $save['entidad_id'];
                        $entidad = new Entidad();
                        $entidad->setIdEntidad($id_ent);
                        $entidad->subtraction();
    
                        //Se insertan los contactos del paciente
                        $contacto = new ContactosPaciente();
                        $arr = json_decode($_POST['arrData'], true);
    
                        foreach ($arr as $row) {
                            $contacto->setPacienteId($last_id);
                            $contacto->setIngresoId($ingreso_id);
                            $contacto->setNombreCp(filter_var($row['nombreCp'], FILTER_SANITIZE_STRING));
                            $contacto->setTelefonoCp(filter_var($row['telCp'], FILTER_SANITIZE_STRING));
                            $contacto->setCorreoCp(filter_var($row['correoCp'], FILTER_SANITIZE_STRING));
                            $contacto->setParentescoCp(filter_var($row['parentescoCp'], FILTER_SANITIZE_STRING));
                            $test = $contacto->save();
                        }
    
                        // Si existe el id de la venta y se crea un nuevo registro
                        // del paciente se manda a llamar la funcion para finalizar el status
                        if ($ventaId) {
                            $status = new Venta();
                            $status->setId($ventaId);
                            $status->finalizarSeguimiento();
                        }
                    } else {
                        $save = [
                            'res' => false,
                            'message' => 'Error en la petición'
                        ];
                    }

                }
            } else if ($_POST['action'] == 'reingreso') {
                $pacienteIngreso->setId($usuaio_id);
                $pacienteIngreso->setPacienteId($paciente_id);
                $save = $pacienteIngreso->save();
            } else {
                $id = isset($_POST['paciente_id']) ? filter_var($_POST['paciente_id'], FILTER_VALIDATE_INT) : false;
                $paciente->setId($id);
                $save = $paciente->edit();
            }
        }
        echo json_encode($save);
    }
}
