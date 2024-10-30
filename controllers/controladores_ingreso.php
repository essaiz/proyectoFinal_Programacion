<?php

namespace App\controllers;

use App\models\entities\Contacto;

class IngresoController 
{
    function getAllIngresos()
    {
        //return Ingreso::all();
    }
    function saveContacto($datos)
    {
        $contacto = new Contacto();
        $contacto->set('nombre', $datos['nombre']);
        $contacto->set('email', $datos['email']);
        $contacto->set('telefono', $datos['telefono']);
        return $contacto->save();
    }
}