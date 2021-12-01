<?php


class ConsumoSustancias
{
    private $id;
    private $sustancia_id;
    private $consumo_sust;
    private $forma_cons;
    private $frecuencia_cons;
    private $cant_consumo_sust;
    private $edad_inicio_cons;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getSustanciaId()
    {
        return $this->sustancia_id;
    }

    public function setSustanciaId($sustancia_id)
    {
        $this->sustancia_id = $sustancia_id;
        return $this;
    }

    public function getConsumoSust()
    {
        return $this->consumo_sust;
    }

    public function setConsumoSust($consumo_sust)
    {
        $this->consumo_sust = $this->db->real_escape_string($consumo_sust);
        return $this;
    }

    public function getFormaCons()
    {
        return $this->forma_cons;
    }

    public function setFormaCons($forma_cons)
    {
        $this->forma_cons = $this->db->real_escape_string($forma_cons);
        return $this;
    }

    public function getFrecuenciaCons()
    {
        return $this->frecuencia_cons;
    }

    public function setFrecuenciaCons($frecuencia_cons)
    {
        $this->frecuencia_cons = $this->db->real_escape_string($frecuencia_cons);
        return $this;
    }

    public function getCantConsumoSust()
    {
        return $this->cant_consumo_sust;
    }

    public function setCantConsumoSust($cant_consumo_sust)
    {
        $this->cant_consumo_sust = $this->db->real_escape_string($cant_consumo_sust);
        return $this;
    }

    public function getEdadInicioCons()
    {
        return $this->edad_inicio_cons;
    }

    public function setEdadInicioCons($edad_inicio_cons)
    {
        $this->edad_inicio_cons = $edad_inicio_cons;
        return $this;
    }

    public function check($id, $id_pac)
    {
        $sql = "SELECT * FROM consumo_sustancia WHERE paciente_id = {$id} AND sustancia_id = {$id_pac}";
        $res = $this->db->query($sql);
        if ($res->fetch_object()) {
            return ['res' => 'true'];
        } else {
            return ['res' => 'false'];
        }
    }

    function getSustancia()
    {
        $sql = "SELECT * FROM sustancia ORDER BY id_sustancia ASC";
        return $this->db->query($sql);
    }

    public function getOne()
    {
        $sql = "SELECT 
                *
                FROM consumo_sustamcias
                WHERE paciente_id = {$this->getId()}";
        $data = $this->db->query($sql);
        return $data->fetch_object();
    }

    public function getAll()
    {
        $sql = "SELECT
                * FROM consumo_sustancia c
                INNER JOIN sustancia s ON c.id_consumo_sustancia = s.id_sustancia
                WHERE c.paciente_id = {$this->getId()}";
        return $this->db->query($sql);
    }

    public function save()
    {
        $paciente_id = $this->id;
        $sustacia_id = $this->sustancia_id;
        $consumo = $this->consumo_sust;
        $forma = $this->forma_cons;
        $frecuencia = $this->frecuencia_cons;
        $cantidad = $this->cant_consumo_sust;
        $edad = $this->edad_inicio_cons;

        $sql = "INSERT INTO consumo_sustancia VALUES";
        $sql .= "
                (
                    NULL,'$paciente_id','$sustacia_id',
                    '$consumo','$forma','$frecuencia',
                    '$cantidad','$edad'
                );";
        $save = $this->db->query($sql);
        if ($save) {
            //Se optiene la sustancia
            $query = "SELECT * FROM sustancia WHERE id_sustancia = '$sustacia_id'";
            $data = $this->db->query($query);
            $sustancia = $data->fetch_object();
            $sus = $sustancia->nombre_sust;

            return [
                'res' => 'true',
                'consumo' => $consumo,
                'forma' => $forma,
                'frecuencia' => $frecuencia,
                'catidad' => $cantidad,
                'edad' => $edad,
                'sus' => $sus
            ];
        }
    }

    public function edit()
    {
        $sustancia_id = $this->id;
        $tipo = $this->tipo_sust;
        $consumo = $this->consumo_sust;
        $forma = $this->forma_cons;
        $frecuencia = $this->frecuencia_cons;
        $cantidad = $this->cant_consumo_sust;
        $edad = $this->edad_inicio_cons;

        $sql = "UPDATE consumo_sustancias
                SET
                tipo_sust = '$tipo',
                consumo_sust = '$consumo',
                forma_cons = '$forma',
                frecuencia_cons = '$frecuencia',
                cant_consumo_sust = '$cantidad', 
                edad_inicio_cons = '$edad'
                WHERE paciente_id = {$this->getId()}";

        $save = $this->db->query($sql);

        if ($save) {
            return [
                'result' => 'true'
            ];
        }
    }

    public function delete()
    {
        $sql = "DELETE FROM consumo_sustancias WHERE paciente_id = {$this->getId()}";
        $result = $this->db->query($sql);
        if ($result) {
            return [
                'result' => 'success'
            ];
        }
    }
}