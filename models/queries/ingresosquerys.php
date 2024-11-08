<?php

namespace App\models\queries;

class ingresosQueries
{
    static function selectAll()
    {
        return "select * from contactos";
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
        $sql = "insert into contactos (nombre,telefono,email) values ";
        $sql .= "('$nombre','$telefono','$email')";
        return $sql;
    }
}