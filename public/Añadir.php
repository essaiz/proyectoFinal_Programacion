<?php 
require '../models/db/ingresos_salas_db.php';
require '../models/entities/ingresos.php';
require '../models/queries/ingresosquerys.php';
require '../controllers/controladores_ingreso.php';
//require '../views/ingresosView.php';
//require '../views/modalsView.php';

use app\views\AñadirViews;

$AñadirViews = new  AñadirViews();
$title = empty($_GET['cod'])?'Añadir ingreso':'';
//$form = $AñadirViews->getFormIngresos($_get);


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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