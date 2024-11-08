<?php 
require '../models/db/ingresos_salas_db.php';
require '../models/entities/ingresos.php';
require '../models/queries/ingresosquerys.php';
require '../controllers/controladores_ingreso.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    </section>
</body>
<style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
        }
        header {
            margin-bottom: 20px;
        }
        a {
            font-size: 18px;
            color: #007bff;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</html>
