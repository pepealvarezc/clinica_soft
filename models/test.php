private $hijos;
    private $edades_hijos;
    private $fecha_nac_pac;
    private $lugar_nacimiento;
    private $domicilio_pac;
    private $uso_drogas_pac;
    private $acompanado_por;
    private $edo_act_ingreso;
    private $medio_entero;


$e_civil = $this->edo_civil;
$p_hijos = $this->hijos;
$edades = $this->edades_hijos;
$fecha = $this->fecha_nac_pac;
$lugar = $this->lugar_nacimiento;
$dom = $this->domicilio_pac;
$esc = $this->escolaridad_pac;
$ocupacion = $this->ocupacion_pac;
$drogas = $this->uso_drogas_pac;
$acompanado = $this->acompanado_por;
$estado = $this->edo_act_ingreso;
$medio = $this->medio_entero;


<div class="col-4">
                            <label for="hijos">Hijos:</label>
                            <input type="text" class="form-control form-control-sm" id="hijos" value="<?= isset($data) && is_object($data) ? $data->hijos : '' ?>">
                        </div>

                        <div class="col-4">
                            <label for="edades">Edades:</label>
                            <input type="text" class="form-control form-control-sm" id="edades" value="<?= isset($data) && is_object($data) ? $data->edades_hijos : '' ?>">
                        </div>