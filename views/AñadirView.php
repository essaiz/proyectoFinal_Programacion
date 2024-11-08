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
            foreach ($ingresos as $ingresos) {
                $id = $ingresos->get('id');
                $rows .= '<tr>';
                $rows .= '   <td>' . $ingresos->get('nombreEstudiante') . '</td>';
                $rows .= '   <td>' . $ingresos->get('codigoEstudiante') . '</td>';
                $rows .= '   <td>' . $ingresos->get('fechaIngreso') . '</td>';
                $rows .= '   <td>' . $ingresos->get('horaIngreso') . '</td>';
                $rows .= '   <td>' . $ingresos->get('horaSalida') . '</td>';
                $rows .= '   <td>' . $ingresos->get('idPrograma') . '</td>';
                $rows .= '   <td>' . $ingresos->get('idResponsable') . '</td>';            
                $rows .= '   <td>' . $ingresos->get('idSala') . '</td>';
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
        $table .= '         <th>Codigo</th>';
        $table .= '         <th>fecha Ingreso</th>';
        $table .= '         <th>hora Ingreso</th>';
        $table .= '         <th>hora Salida</th>';
        $table .= '         <th>Programa</th>';
        $table .= '         <th>Responsable</th>';
        $table .= '         <th>Sala</th>';
        $table .= '     </tr>';
        $table .= '  </thead>';
        $table .= ' <tbody>';
        $table .=  $rows;
        $table .= ' </tbody>';
        $table .= '</table>';
        return $table;
    }
    function getFormIngresos($data = [])
    {
        $nombre = isset($data['nombre']) ? $data['nombre'] : '';
        $codigo = isset($data['codigo']) ? $data['codigo'] : '';
        $programa = isset($data['programa']) ? $data['programa'] : '';
        $sala = isset($data['sala']) ? $data['sala'] : '';
        $registrador = isset($data['registrador']) ? $data['registrador'] : '';
        $rows = '';
        $ingresos = $this->controller->getAllIngresos();
        $form = '<div class="container">';
        $form .= '<h2>Registrar Ingreso del Estudiante</h2>';
        $form .= '<form method="POST" action="procesar_ingreso.php">'; 
        $form .= '   <div class="form-group">';
        $form .= '       <label for="codigo">Código del Estudiante:</label>';
        $form .= '       <input type="text" id="codigo" name="codigo" value="' . $codigo . '" required>';
        $form .= '   </div>';
        $form .= '   <div class="form-group">';
        $form .= '       <label for="nombre">Nombre del Estudiante:</label>';
        $form .= '       <input type="text" id="nombre" name="nombre" value="' . $nombre . '" required>';
        $form .= '   </div>';
        $form .= '   <div class="form-group">';
        $form .= '       <label for="programa">Programa:</label>';
        $form .= '       <input type="text" id="programa" name="programa" value="' . $programa . '" required>';
        $form .= '   </div>';
        $form .= '   <div class="form-group">';
        $form .= '       <label for="sala">Sala:</label>';
        $form .= '       <input type="text" id="sala" name="sala" value="' . $sala . '" required>';
        $form .= '   </div>';
        $form .= '   <div class="form-group">';
        $form .= '       <label for="registrador">Nombre del Registrador:</label>';
        $form .= '       <input type="text" id="registrador" name="registrador" value="' . $registrador . '" required>';
        $form .= '   </div>';
        $form .= '   <button type="submit" class="btn">Registrar Ingreso</button>';
        $form .= '</form>';
        $form .= '</div>';

        // CSS
        $form .= '<style>
            .container {
                max-width: 500px;
                margin: auto;
                padding: 20px;
                background: #ffffff;
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                text-align: left;
            }
            h2 {
                color: #0056b3;
                margin-bottom: 20px;
                text-align: center;
            }
            .form-group {
                margin-bottom: 15px;
            }
            label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }
            input[type="text"] {
                width: 100%;
                padding: 8px;
                border: 1px solid #ccc;
                border-radius: 4px;
                font-size: 16px;
            }
            .btn {
                display: block;
                width: 100%;
                padding: 12px;
                background-color: #0056b3;
                color: #ffffff;
                border: none;
                border-radius: 5px;
                font-size: 16px;
                cursor: pointer;
                transition: background-color 0.3s;
            }
            .btn:hover {
                background-color: #003f8a;
            }
        </style>';

        return $form;
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
