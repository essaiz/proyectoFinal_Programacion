<?php

namespace App\models\queries;

class ingresosQueries
{
    static function selectAll()
    {
        return "select * from ingresos";
    }
    static function selectsala()
    {
        return "select * from salas";
    }
    static function selectprograma()
    {
        return "select * from programas";
    }
    static function selectresponsables()
    {
        return "select * from responsables";
    }
    static function Between($fromDate, $toDate)
    {
        

        return "select * from ingresos where fechaIngreso between '$fromDate' and '$toDate'";
    }

    static function insert($ingreso){
        $nombreEstudiante = $ingreso->get('nombreEstudiante');
        $codigoEstudiante = $ingreso->get('codigoEstudiante');
        $fechaIngreso = $ingreso->get('fechaIngreso');
        $horaIngreso = $ingreso->get('horaIngreso');
        $horaSalida = $ingreso->get('horaSalida');
        $idPrograma = $ingreso->get('idPrograma');
        $idResponsable = $ingreso->get('idResponsable');
        $idSala = $ingreso->get('idSala');
        $created_at = $ingreso->get('created_at');
        $sql = "insert into ingresos (nombreEstudiante,codigoEstudiante,fechaIngreso,horaIngreso,horaSalida,idPrograma,
        idResponsable,idSala,created_at) values ";
        $sql .= "('$nombreEstudiante','$codigoEstudiante','$fechaIngreso','$horaIngreso','$horaSalida','$idPrograma'
        ,'$idResponsable','$idSala','$created_at')";
        return $sql;
    }
}