<?php 
require '../models/db/ingresos_salas_db.php';
require '../models/entities/ingresos.php';
require '../models/queries/ingresosquerys.php';
require '../controllers/controladores_ingreso.php';
require '../views/AñadirView.php';

use app\views\AñadirViews;

$añadirView = new AñadirViews();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles/index.css">
    <title>Menú de Salas</title>
    
</head>
<body>
    <header>
        <h1>Menú Principal</h1>
        <p>Bienvenido al sistema de registro de ingresos a las salas de cómputo.</p>
    </header>
    <section>
        <a href="añadir.php">Añadir ingreso de estudiante</a>
        <br><br>
        <a href="consultar.php">Consultar ingresos</a>
        <h2>Lista de Ingresos del dia</h2>
        <?php 
        date_default_timezone_set('America/Mexico_City'); // Cambia por tu zona horaria
        echo "Fecha actual: " . date("Y-m-d");
        $fecha = date('Y-m-d');
        echo $añadirView->getTable($fecha); ?>
        <br>
        <div>
            <div>
                <label>Del dia </label>
                <input type="date" name="From_date" value="<?php if(isset($_GET['from date'])) {echo $_GET['from_date']; }?>">
            </div>  
            <div>
                <label>Hasta el dia</label>
                <input type="date" name="to_date" value="<?php if(isset($_GET['from date'])) {echo $_GET['to_date']; }?>">
            </div>  
            <div>
                <label> </label><br>
                <button type="submit" class="Botton_fecha">Buscar</button>
            </div>
        </div>

    </section>
</body>
<style>
        
    </style>
</html>
