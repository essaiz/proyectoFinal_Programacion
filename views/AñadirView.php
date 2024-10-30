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
        $ingresos = $this->controller->getAllIngresos();
        if (count($ingresos) > 0) {
            foreach ($ingresos as $ingreso) {
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
    function getMsgNewIngreso($datosFormulario)
    {
        $datos = [
            "Codigo estudiante" => $datosFormulario['codigoEstudiante'],
            "Nombre estudiante" => $datosFormulario['nombreEstudiante'],
            "Numero programa" => $datosFormulario['idPrograma'],
            "Fecha de ingreso" => $datosFormulario['fechaIngreso'],
            "Hora de ingreso" => $datosFormulario['horaIngreso'],
            "Hora de salida " => $datosFormulario['horaSalida'],
            "Responsable" => $datosFormulario['idResponsable'],
            "Numero de sala" => $datosFormulario['idSala'],


        ];
        $confirmarAccion = $this->controller->saveContacto($datos);
        $msg = '<h2>Resultado de la operación</h2>';
        if ($confirmarAccion) {
            $msg .= '<p>Datos del contacto guardados.</p>';
        } else {
            $msg .= '<p>No se pudo guardar la información del contacto</p>';
        }
        return $msg;
    }
}