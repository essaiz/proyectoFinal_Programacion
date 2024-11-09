<?php
require '../models/db/ingresos_salas_db.php';
require '../models/entities/ingresos.php';
require '../models/queries/ingresosquerys.php';
require '../controllers/controladores_ingreso.php';
require '../views/AñadirView.php';

use  app\views\AñadirViews;
$AñadirViews = new AñadirViews();
$datosFormulario = $_POST;
$smg = $AñadirViews->getMsgNewIngresos($datosFormulario);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<header>
        <h1>Estado de acción</h1>
    </header>
    <section>
        <?php echo $smg;?>
        <br>
        <a href="inicio.php">Volver al inicio</a>
    </section>
</body>
</html>