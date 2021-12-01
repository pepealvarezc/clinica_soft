<?php

class ContactosPaciente
{
    private $id_contactos_paciente;
    private $paciente_id;
    private $ingreso_id;
    private $nombre_cp;
    private $telefono_cp;
    private $correo_cp;
    private $parentesco_cp;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getIdContactosPaciente()
    {
        return $this->id_contactos_paciente;
    }

    public function setIdContactosPaciente($id_contactos_paciente)
    {
        $this->id_contactos_paciente = $id_contactos_paciente;
        return $this;
    }

    public function getPacienteId()
    {
        return $this->paciente_id;
    }

    public function setPacienteId($paciente_id)
    {
        $this->paciente_id = $paciente_id;
        return $this;
    }

    public function getIngresoId()
    {
        return $this->ingreso_id;
    }

    public function setIngresoId($ingreso_id)
    {
        $this->ingreso_id = $ingreso_id;
        return $this;
    }

    public function getNombreCp()
    {
        return $this->nombre_cp;
    }

    public function setNombreCp($nombre_cp)
    {
        $this->nombre_cp = $this->db->real_escape_string($nombre_cp);
        return $this;
    }

    public function getTelefonoCp()
    {
        return $this->telefono_cp;
    }

    public function setTelefonoCp($telefono_cp)
    {
        $this->telefono_cp = $this->db->real_escape_string($telefono_cp);
        return $this;
    }

    public function getCorreoCp()
    {
        return $this->correo_cp;
    }

    public function setCorreoCp($correo_cp)
    {
        $this->correo_cp = $this->db->real_escape_string($correo_cp);
        return $this;
    }

    public function getParentescoCp()
    {
        return $this->parentesco_cp;
    }

    public function setParentescoCp($parentesco_cp)
    {
        $this->parentesco_cp = $this->db->real_escape_string($parentesco_cp);
        return $this;
    }

    public function getAll()
    {
        $sql = "SELECT 
                * FROM contactos_paciente
                WHERE paciente_id = {$this->getPacienteId()}
                AND ingreso_paciente_id = {$this->getIngresoId()}";
        return $this->db->query($sql);
    }

    public function save()
    {
        $paciente_id = $this->paciente_id;
        $ingreso_id = $this->ingreso_id;
        $nombre = $this->nombre_cp;
        $tel = $this->telefono_cp;
        $correo = $this->correo_cp;
        $par = $this->parentesco_cp;

        $sql = "INSERT INTO contactos_paciente values
                  (
                    NULL, '$paciente_id', '$ingreso_id', '$nombre',
                    '$tel', '$correo', '$par'
                  )";
        $save = $this->db->query($sql);

        if ($save) {
            return ['res' => 'true'];
        } else {
            return ['res' => 'false'];
        }
    }

}