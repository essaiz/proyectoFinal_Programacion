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

    function getFormIngresos($data = [])
    {
        $nombre = isset($data['nombre']) ? $data['nombre'] : '';
        $codigo = isset($data['codigo']) ? $data['codigo'] : '';
        $programa = isset($data['programa']) ? $data['programa'] : '';
        $sala = isset($data['sala']) ? $data['sala'] : '';
        $registrador = isset($data['registrador']) ? $data['registrador'] : '';
        
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
}
