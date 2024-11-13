<?php 
require '../models/db/ingresos_salas_db.php';
require '../models/entities/ingresos.php';
require '../models/queries/ingresosquerys.php';
require '../controllers/controladores_ingreso.php';
require '../views/AñadirView.php';

use  app\views\AñadirViews;
$AñadirViews = new AñadirViews();
if (isset($_GET['From_date']) && isset($_GET['to_date'])) {
    $fromDate = $_GET['From_date'];
    $toDate = $_GET['to_date'];
}
$smg = $AñadirViews->mwsBusqueda($fromDate, $toDate);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <title>Busqueda</title>
</head>
<body>
    <h1>Datos encontrados: </h1>

    <?php echo $smg;?>
    <a href="inicio.php">Volver al inicio</a>

</body>
</html>