<?php

class Utils
{
    public static function validate($data)
    {
        $action = 'create';
        if ($data) {
            $action = 'edit';
        }
        return $action;
    }

    public static function editData($edit)
    {
        $action = 'create';
        if ($edit) {
            $action = 'edit';
        }
        return $action;
    }

    public static function getAllNotes($id)
    {
        require_once './models/NotaVenta.php';
        $notas = new NotaVenta();
        $notas->setId($id);
        return $res = $notas->getAll();
    }

    public static function getDate()
    {
        $date = getdate();
        $month = $date['mon'] < 10 ? '0' . $date['mon'] : $date['mon'];
        $mday = $date['mday'] < 10 ? '0' . $date['mday'] : $date['mday'];
        return $mday . '/' . $month . '/' . $date['year'];
    }

    public static function getDateFormatted($date)
    {
        $newDate = date_parse($date);
        return $newDate['year'].'-'.$newDate['month'].'-'.$newDate['day'];
    }

    public static function getTime($estadia)
    {
        $fecha = date("Y-m-d");
        return date("h:i:s", strtotime($fecha . "+ $estadia days"));
    }

}
