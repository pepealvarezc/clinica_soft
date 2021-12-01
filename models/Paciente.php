<?php

class Paciente
{
    private $id_paciente;
    private $nombre_pa;
    private $apellido_paterno_pa;
    private $apellido_materno_pa;
    private $fecha_nacimiento_pa;
    private $lugar_nacimiento_pa;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getIdPaciente()
    {
        return $this->id_paciente;
    }

    public function setIdPaciente($id_paciente)
    {
        $this->id_paciente = $id_paciente;
        return $this;
    }

    public function getNombrePa()
    {
        return $this->nombre_pa;
    }

    public function setNombrePa($nombre_pa)
    {
        $this->nombre_pa = $this->db->real_escape_string($nombre_pa);
        return $this;
    }

    public function getApellidoPaternoPa()
    {
        return $this->apellido_paterno_pa;
    }

    public function setApellidoPaternoPa($apellido_paterno_pa)
    {
        $this->apellido_paterno_pa = $this->db->real_escape_string($apellido_paterno_pa);
        return $this;
    }

    public function getApellidoMaternoPa()
    {
        return $this->apellido_materno_pa;
    }

    public function setApellidoMaternoPa($apellido_materno_pa)
    {
        $this->apellido_materno_pa = $apellido_materno_pa;
        return $this;
    }

    public function getFechaNacimientoPa()
    {
        return $this->fecha_nacimiento_pa;
    }

    public function setFechaNacimientoPa($fecha_nacimiento_pa)
    {
        $this->fecha_nacimiento_pa = $fecha_nacimiento_pa;
        return $this;
    }

    public function getLugarNacimientoPa()
    {
        return $this->lugar_nacimiento_pa;
    }

    public function setLugarNacimientoPa($lugar_nacimiento_pa)
    {
        $this->lugar_nacimiento_pa = $this->db->real_escape_string($lugar_nacimiento_pa);
        return $this;
    }

    public function getOne()
    {
        $sql = "SELECT * FROM paciente WHERE id_paciente = {$this->getIdPaciente()}";
        $res = $this->db->query($sql);
        return $res->fetch_object();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM paciente ORDER BY id_paciente DESC";
        $data = $this->db->query($sql);
        return $data;
    }

    public function save()
    {
        $nombre = $this->nombre_pa;
        $apellido_pa = $this->apellido_paterno_pa;
        $apellido_ma = $this->apellido_materno_pa;
        $fecha_nac = $this->fecha_nacimiento_pa;
        $lugar = $this->lugar_nacimiento_pa;

        $sql = "INSERT INTO paciente VALUES(NULL, '$nombre', '$apellido_pa', '$apellido_ma', '$fecha_nac', '$lugar')";
        $save = $this->db->query($sql);

        if ($save) {
            return ['res' => 'true', 'id' => $id = $this->db->insert_id];
        } else {
            return ['res' => 'false'];
        }
    }

}
