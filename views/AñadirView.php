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

    function getBusqueda($fromDate, $toDate){
        $rows = '';
        if (isset($_GET['From_date']) && isset($_GET['to_date'])) {
            $fromDate = $_GET['From_date'];
            $toDate = $_GET['to_date'];
        }
        $ingresos = $this->controller->buscador_fechas($fromDate, $toDate);
        $form =  '<form action="Añadirview.php" method="get">';
        $form .=     '<div class="form-container">' ;
        $form .=         '<div class="form-grup">';
        $form .=             '<label>Del día</label>';
        $form .=             '<input type="date" name="From_date" value="<?php if(isset($_GET[from date])) {echo $_GET[from_date]; }?>">';
        $form .=         '</div> ' ;
        $form .=         '<div class="form-grup">';
        $form .=             '<label>Hasta el día</label>';
        $form .=             '<input type="date" name="to_date" value="<?php if(isset($_GET[from date])) {echo $_GET[to_date]; }?>">';
        $form .=         '</div>'  ;
        $form .=         '<div class="form-grup">';
        $form .=             '<label> </label><br>';
        $form .=             '<button type="submit" lass="Boton_fecha">Buscar</button>';
        $form .=         '</div>';
        $form .=     '</div>';
        $form .= '</form>';
        return $form;
    }

    function getTable($fecha)
    {   
        $rows = '';
        $ingresos = $this->controller->getAllIngresos();
        if($fecha!='1'){
            foreach ($ingresos as $ingresos){
                if($fecha == $ingresos->get('fechaIngreso')){
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
                    $rows .= '   <td>' . $ingresos->get('created_at') . '</td>'; 
                    $rows .= '   <td>' . $ingresos->get('updated_at') . '</td>'; 
                    $rows .= '</tr>';
                }
            }
        }else if (count($ingresos) > 0) {
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
                    $rows .= '   <td>' . $ingresos->get('created_at') . '</td>'; 
                    $rows .= '   <td>' . $ingresos->get('updated_at') . '</td>'; 
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
        $table .= '         <th>Creado</th>';
        $table .= '         <th>Modificado</th>';
        $table .= '     </tr>';
        $table .= '  </thead>';
        $table .= ' <tbody>';
        $table .=  $rows;
        $table .= ' </tbody>';
        $table .= '</table>';
        return $table;
    }
    function getMsgNewIngresos($datosFormulario)
    {
        $datos = [
            "nombreEstudiante" => $datosFormulario['nombreEstudiante'],
            "codigoEstudiante" => $datosFormulario['codigoEstudiante'],
            "fechaIngreso" => $datosFormulario['fechaIngreso'],
            "horaIngreso" => $datosFormulario['horaIngreso'],
            "horaSalida" => $datosFormulario['horaSalida'],
            "idPrograma" => $datosFormulario['idPrograma'],
            "idResponsable" => $datosFormulario['idResponsable'],
            "idSala" => $datosFormulario['idSala'],
            "created_at" => $datosFormulario['created_at'],
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
    function getFormIngresos($data = [])
    {
        $nombreEstudiante = isset($data['nombre']) ? $data['nombre'] : '';
        $codigoEstudiante = isset($data['codigo']) ? $data['codigo'] : '';
        $fechaIngreso = isset($data['fechaIngreso']) ? $data['fechaIngreso'] : '';
        $horaIngreso = isset($data['horaIngreso']) ? $data['horaIngreso'] : '';
        $horaSalida = isset($data['horaSalida']) ? $data['horaSalida'] : '';
        $idPrograma = isset($data['programa']) ? $data['programa'] : '';
        $idResponsable = isset($data['idResponsable']) ? $data['idResponsable'] : '';
        $idSala = isset($data['idSala']) ? $data['idSala'] : '';
        $created_at = isset($data['created_at']) ? $data['created_at'] : '';
        $form = '<div class="container">';
        $form .= '<h2>Registrar Ingreso del Estudiante</h2>';
        $form .= '<form method="POST" action="confirmar.php">'; 
        $form .= '   <div class="form-group">';
        $form .= '       <label for="nombre">Nombre del Estudiante:</label>';
        $form .= '       <input type="text" id="nombreEstudiante" name="nombreEstudiante" value="' . $nombreEstudiante . '" required>';
        $form .= '   </div>';
        $form .= '   <div class="form-group">';
        $form .= '       <label for="codigo">codigo del Estudiante:</label>';
        $form .= '       <input type="number" id="codigoEstudiante" name="codigoEstudiante" value="' . $codigoEstudiante . '" required>';
        $form .= '   </div>';
        $form .= '   <div class="form-group">';
        $form .= '       <label for="fechaIngreso">fecha Ingreso:</label>';
        $form .= '       <input type="date" id="fechaIngreso" name="fechaIngreso" onchange="validarFecha()" value="' . $fechaIngreso . '" required>';
        $form .= '   </div>';
        $form .= '   <div class="form-group">';
        $form .= '       <label for="horaIngreso">hora Ingreso del Estudiante:</label>';
        $form .= '       <input type="time" id="horaIngreso" name="horaIngreso" value="' . $horaIngreso . '" required>';
        $form .= '   </div>';
        $form .= '   <div class="form-group">';
        $form .= '       <label for="horaSalida">hora salida del Estudiante:</label>';
        $form .= '       <input type="time" id="horaSalida" name="horaSalida" value="' . $horaSalida . '" required>';
        $form .= '   </div>';
        $form .= '   <div class="form-group">';
        $form .= '       <label for="idPrograma">Programa:</label>';
        $form .= '       <input type="text" id="idPrograma" name="idPrograma" value="' . $idPrograma . '" required>';
        $form .= '   </div>';
        $form .= '   <div class="form-group">';
        $form .= '       <label for="idResponsable">Responsable:</label>';
        $form .= '       <input type="text" id="idResponsable" name="idResponsable" value="' . $idResponsable . '" required>';
        $form .= '   </div>';
        $form .= '   <div class="form-group">';
        $form .= '       <label for="idSala">Sala:</label>';
        $form .= '       <input type="text" id="idSala" name="idSala" value="' . $idSala . '" required>';
        $form .= '   </div>';
        $form .= '   <div class="form-group">';
        $form .= '       <label for="created_at">Creado el dia:</label>';
        $form .= '       <input type="datetime-loca" id="created_at" name="created_at" value="' . $created_at . '" required>';
        $form .= '   </div>';
        $form .= '   <button type="submit" class="btn">Registrar Ingreso</button>';
        $form .= '</form>';
        $form .= '</div>';
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
