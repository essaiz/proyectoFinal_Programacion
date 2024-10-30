<?php

namespace App\models\entities;

use App\models\db\ingresos_salas_db;
use App\models\queries\ingresosQueries;

class Ingreso
{
    private $id;
    private $codigoEstudiante;
    private $nombreEstudiante;
    private $fechaIngreso;
    private $horaIngreso;
    private $horaSalida;
    private $idPrograma;
    private $idResponsable;
    private $idSala;
    function set($prop, $value)
    {
        $this->{$prop} = $value;
    }

    function get($prop)
    {
        return $this->{$prop};
    }
    static function all()
    {
        $sql = ingresosQueries::selectAll();
        $db = new ingresos_salas_db();
        $result = $db->query($sql);
        $Ingreso = [];
        while ($row = $result->fetch_assoc()) {
            $Ingresos = new Ingreso();
            $Ingresos->set('id', $row['id']);
            $Ingresos->set('nombreEstudiante', $row['nombreEstudiante']);
            $Ingresos->set('codigoEstudiante', $row['codigoEstudiante']);
            $Ingresos->set('fechaIngreso', $row['fechaIngreso']);
            $Ingresos->set('horaIngreso', $row['horaIngreso']);
            $Ingresos->set('horaSalida', $row['horaSalida']);
            $Ingresos->set('idPrograma', $row['idPrograma']);
            $Ingresos->set('idResponsable', $row['idResponsable']);
            $Ingresos->set('idSala', $row['idSala']);
            array_push($Ingreso, $Ingresos);
        }
        $db->close();
        return $Ingresos;
    }
    function save (){
        $sql = ingresosQueries::insert($this);
        $db = new ingresos_salas_db();
        $result = $db->query($sql);
        $db->close();
        return $result;
    }

}