<?php

class AsignacionPaciente
{
    private $id;
    private $usuario_id;
    private $paciente_id;

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
    }

    public function getUsuarioId()
    {
        return $this->usuario_id;
    }

    public function setUsuarioId($usuario_id)
    {
        $this->usuario_id = $usuario_id;
    }

    public function getPacienteId()
    {
        return $this->paciente_id;
    }

    public function setPacienteId($paciente_id)
    {
        $this->paciente_id = $paciente_id;
    }

    public function getOne()
    {
        $query = "SELECT
                    *
                    FROM 
                    asignacion_usuario_paciente a
                    INNER JOIN 
                    usuario u 
                    ON a.usuario_id = u.id_usuario
                    INNER JOIN 
                    paciente_datos_generales p
                    ON a.paciente_id = p.id_paciente
                    WHERE
                    a.paciente_id = {$this->getPacienteId()}
                    ";

        return $this->db->query($query);
    }

    public function getAll()
    {
        $sql = "SELECT * FROM asignacion_usuario_paciente WHERE id_asignacion = {$this->getUsuarioId()}";
        $save = $this->db->query($sql);
        $test = $save->fetch_object();
        // var_dump($test);
    }

    public function save($rol)
    {
        $query = "SELECT
                    *
                    FROM 
                    asignacion_usuario_paciente a
                    INNER JOIN 
                    usuario u 
                    ON a.usuario_id = u.id_usuario
                    INNER JOIN 
                    paciente_datos_generales p
                    ON a.paciente_id = p.id_paciente
                    WHERE
                    a.paciente_id = {$this->getPacienteId()}
                    AND
                    a.rol_us = '{$rol}'
                    ";

        $res = $this->db->query($query);

        if (mysqli_num_rows($res) == 0) {
            $sql = "INSERT INTO asignacion_usuario_paciente VALUES(NULL, {$this->getUsuarioId()}, '{$rol}' ,{$this->getPacienteId()}, CURDATE())";
            $save = $this->db->query($sql);
            $id = $this->db->insert_id;

            $query = "SELECT
            *
            FROM 
            asignacion_usuario_paciente a
            INNER JOIN 
            usuario u 
            ON a.usuario_id = u.id_usuario
            INNER JOIN 
            paciente_datos_generales p
            ON a.paciente_id = p.id_paciente
            WHERE
            a.paciente_id = {$this->getPacienteId()}
            AND
            a.id_asignacion = $id";

            $data = $this->db->query($query);
            $obj = $data->fetch_object();
            $nom = $obj->nombre_us;
            $role = $obj->rol;

            if ($save && $data) {
                return array(
                    'result' => 'true',
                    'nombre' => $nom,
                    'rol' => $role
                );
            } else {
                return array(
                    'result' => 'Hubo algun error'
                );
            }
        } else {
            return array('result' => 'error');
        }
    }
}
