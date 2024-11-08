<?php 
require '../models/db/ingresos_salas_db.php';
require '../models/entities/ingresos.php';
require '../models/queries/ingresosquerys.php';
require '../controllers/controladores_ingreso.php';
require '../views/AñadirView.php';


use App\views\AñadirViews;

use app\views\AñadirViews;

$AñadirViews = new  AñadirViews();
$title = empty($_GET['cod'])?'Añadir ingreso':'';
//$form = $AñadirViews->getFormIngresos($_get);


$añadirView = new AñadirViews();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Añadir Ingreso de Estudiante</title>
   
</head>
<body>
    <div class="container">
        <h1>Añadir Ingreso de Estudiante</h1>
        <!-- formulario de ingreso -->
        <?php echo $añadirView->getFormIngresos(); ?>

        <!-- tabla de contactos -->
        <h2>Lista de Ingresos</h2>
        <?php //echo $añadirView->getTable(); ?>
    </div>
</body>
<style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</html>
=======
    <title>AñadirViews</title>
</head>
<body>
    <header>
        <h1>Añadir ingreso</h1>
    </header>
    <section>
        <?php  
        
        ?>
    </section>
</body>
</html>

