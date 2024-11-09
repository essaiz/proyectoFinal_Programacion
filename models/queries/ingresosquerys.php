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

    static function insert($ingreso){
        $nombre = $ingreso->get('nombreEstudiante');
        $email = $ingreso->get('codigoEstudiante');
        $telefono = $ingreso->get('fechaIngreso');
        $telefono = $ingreso->get('horaIngreso');
        $telefono = $ingreso->get('horaSalida');
        $telefono = $ingreso->get('idPrograma');
        $telefono = $ingreso->get('idResponsable');
        $telefono = $ingreso->get('idSala');
        $sql = "insert into ingresos (nombre,telefono,email) values ";
        $sql .= "('$nombre','$telefono','$email')";
        return $sql;
    }
}