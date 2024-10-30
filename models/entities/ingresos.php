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
            $Ingresos->set('nombre', $row['nombreEstudiante']);
            $Ingresos->set('Codigo', $row['codigoEstudiante']);
            $Ingresos->set('Fecha ingreso', $row['fechaIngreso']);
            $Ingresos->set('Hora de ingreso', $row['horaIngreso']);


            array_push($Ingreso, $Ingresos);
        }
        $db->close();
        return $Ingresos;
    }

}