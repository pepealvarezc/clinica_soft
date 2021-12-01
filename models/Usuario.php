<?php

class Usuario
{
    private $id_usuario;
    private $entidad_id;
    private $nombre_us;
    private $apellidos_us;
    private $email_us;
    private $password;
    private $rol;
    private $estado_us;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getIdUsuario()
    {
        return $this->id_usuario;
    }

    public function setIdUsuario($id_usuario)
    {
        $this->id_usuario = $id_usuario;

        return $this;
    }

    public function getEntidadId()
    {
        return $this->entidad_id;
    }

    public function setEntidadId($entidad_id)
    {
        $this->entidad_id = $entidad_id;
    }

    public function getNombreUs()
    {
        return $this->nombre_us;
    }

    public function setNombreUs($nombre_us)
    {
        $this->nombre_us = $this->db->real_escape_string($nombre_us);
    }

    public function getApellidosUs()
    {
        return $this->apellidos_us;
    }

    public function setApellidosUs($apellidos_us)
    {
        $this->apellidos_us = $this->db->real_escape_string($apellidos_us);
    }

    public function getEmailUs()
    {
        return $this->email_us;
    }

    public function setEmailUs($email_us)
    {
        $this->email_us = $this->db->real_escape_string($email_us);
    }

    public function getPassword()
    {
        return password_hash($this->db->real_escape_string($this->password), PASSWORD_BCRYPT, ['cost' => 4]);
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getRol()
    {
        return $this->rol;
    }

    public function setRol($rol)
    {
        $this->rol = $rol;
    }

    public function getEstadoUs()
    {
        return $this->estado_us;
    }

    public function setEstadoUs($estado_us)
    {
        $this->estado_us = $estado_us;

        return $this;
    }

    public function Inactive()
    {
        $status = $this->estado_us;

        $sql = "UPDATE usuario 
                SET estado_us = '$status'
                WHERE id_usuario = {$this->getIdUsuario()}";
        $response = $this->db->query($sql);

        if ($response) {
            return [
                'result' => 'true',
                'status' => $status
            ];
        }
    }

    public function changePassword()
    {
        $sql = "UPDATE usuario SET password='{$this->getPassword()}' WHERE id_usuario='{$this->getIdUsuario()}'";
        $this->db->query($sql);
        return [
            'result' => 'true'
        ];
    }

    public function getOne()
    {
        $sql = "SELECT 
                e.*, u.*
                FROM usuario u
                INNER JOIN entidad e ON u.entidad_id = e.id_entidad
                WHERE id_usuario = {$this->getIdUsuario()}";
        $data = $this->db->query($sql);
        return $data->fetch_object();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM usuario ORDER BY id_usuario DESC";
        return $this->db->query($sql);
    }

    public function save()
    {
        $id_entidad = $this->entidad_id;
        $nombre = $this->nombre_us;
        $apellidos = $this->apellidos_us;
        $email = $this->email_us;
        $rol_us = $this->rol;
        //$estado_us = 'Activo';

        $sql = "INSERT INTO usuario VALUES(NULL,'$id_entidad', '$nombre', '$apellidos', '$email', '{$this->getPassword()}', '$rol_us', 1 , CURDATE(), NULL);";
        $save = $this->db->query($sql);

        echo $this->db->error;
        if ($save) {
            return [
                'result' => 'true'
            ];
        }
    }

    public function edit()
    {
        $id_entidad = $this->entidad_id;
        $nombre = $this->nombre_us;
        $apellidos = $this->apellidos_us;
        $email = $this->email_us;
        $rol_us = $this->rol;

        $sql = "UPDATE usuario
                SET
                entidad_id = '$id_entidad',
                nombre_us = '$nombre',
                apellidos_us = '$apellidos',
                email_us = '$email',
                rol = '$rol_us' 
                WHERE id_usuario = {$this->getIdUsuario()}";

        $save = $this->db->query($sql);

        if ($save) return [
            'result' => 'true'
        ];
    }

    public function delete()
    {
        $sql = "DELETE FROM usuario WHERE id_usuario = {$this->getIdUsuario()}";
        $result = $this->db->query($sql);
        if ($result) {
            return [
                'result' => 'success'
            ];
        }
    }

    public function login()
    {
        $result = false;
        $email = $this->email_us;
        $password = $this->password;
        // Comprobar si existe el usuario
        $sql = "SELECT * FROM usuario WHERE email_us = '$email'";
        $login = $this->db->query($sql);

        if ($login && $login->num_rows == 1) {
            $usuario = $login->fetch_object();
            // Verificar la contraseña
            $verify = password_verify($password, $usuario->password);
            if ($verify) {
                $result = $usuario;
                return ['res' => 'true', 'data' => $result];
            } else {
                return ['res' => 'false', 'data' => $result];
            }
        }
    }
}
