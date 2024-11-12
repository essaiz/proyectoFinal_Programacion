<?php 
require '../models/db/ingresos_salas_db.php';
require '../models/entities/ingresos.php';
require '../models/queries/ingresosquerys.php';
require '../controllers/controladores_ingreso.php';
require '../views/AñadirView.php';


use app\views\AñadirViews;

$AñadirViews = new  AñadirViews();
$title = empty($_GET['cod'])?'Añadir ingreso':'';
$form = $AñadirViews->getFormIngresos();


$añadirView = new AñadirViews();


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <title>Añadir Ingreso de Estudiante</title>
   
</head>
<body>
    <div class="container">
        <h1>Añadir Ingreso de Estudiante</h1>
        <?php echo $añadirView->getFormIngresos(); ?>

        <h2>Lista de Ingresos</h2>
        <?php 
        $fecha = '1';
        echo $añadirView->getTable($fecha); ?>
    </div>
    <script src="js/index.js"></script>
</body>

