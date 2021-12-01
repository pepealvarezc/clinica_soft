<?php

class NotaVenta
{
    private $id;
    private $usuario_id;
    private $nota_descripcion;

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
        return $this;
    }

    public function getNotaDescripcion()
    {
        return $this->nota_descripcion;
    }

    public function setNotaDescripcion($nota_descripcion)
    {
        $this->nota_descripcion = $this->db->real_escape_string($nota_descripcion);
    }

    public function save()
    {
        $sql = "INSERT INTO nota_venta VALUES(NULL, {$this->getId()}, {$this->getUsuarioId()}, '{$this->getNotaDescripcion()}', CURDATE(), CURTIME())";
        $save = $this->db->query($sql);

        if ($save) {
            return ['result' => 'true'];
        } else {
            return ['result' => 'false'];
        }
    }

    public function getAll()
    {
        $sql = "SELECT * FROM nota_venta n INNER JOIN usuario u ON n.usuario_id = u.id_usuario  WHERE venta_id = {$this->getId()}";
        $data = $this->db->query($sql);
        $arr = array();
        while($obj = $data->fetch_object()){
            $arr[] = $obj;
        }
        return $arr;
    }
}