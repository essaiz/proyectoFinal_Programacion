<?php

namespace App\views;

use App\controllers\IngresoController;

class AñadirViews
{
    private $controller;

    function __construct()
    {
        $this->controller = new IngresoController();
    }

    function getTable()
    {
        $rows = '';
        $contactos = $this->controller->getAllContactos();
        if (count($contactos) > 0) {
            foreach ($contactos as $contacto) {
                $id = $contacto->get('id');
                $rows .= '<tr>';
                $rows .= '   <td>' . $contacto->get('nombre') . '</td>';
                $rows .= '   <td>' . $contacto->get('email') . '</td>';
                $rows .= '   <td>' . $contacto->get('telefono') . '</td>';
                $rows .= '   <td>';
                $rows .= '      <a href="formularioContacto.php?cod=' . $id . '">modificar</a>';
                $rows .= '   </td>';
                $rows .= '   <td>';
                $rows .= '      <button onClick="eliminarContacto(' . $id . ')">Borrar</button>';
                $rows .= '   </td>';
                $rows .= '</tr>';
            }
        } else {
            $rows .= '<tr>';
            $rows .= '   <td colspan="3">No hay datos registrados</td>';
            $rows .= '</tr>';
        }
        $table = '<table>';
        $table .= '  <thead>';
        $table .= '     <tr>';
        $table .= '         <th>Nombre</th>';
        $table .= '         <th>Email</th>';
        $table .= '         <th>Teléfono</th>';
        $table .= '     </tr>';
        $table .= '  </thead>';
        $table .= ' <tbody>';
        $table .=  $rows;
        $table .= ' </tbody>';
        $table .= '</table>';
        return $table;
        
    }
}