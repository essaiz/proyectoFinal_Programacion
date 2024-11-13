<?php
require '../models/db/ingresos_salas_db.php';
require '../models/entities/ingresos.php';
require '../models/queries/ingresosquerys.php';
require '../controllers/controladores_ingreso.php';
require '../views/AñadirView.php';

use app\views\AñadirViews;

$AñadirViews = new AñadirViews();
$smg = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $datosFormulario = $_POST;
    $smg = $AñadirViews->getMsgNewIngresos($datosFormulario);
} else {
    $smg = "No se enviaron datos.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estado de acción</title>
    <link rel="stylesheet" href="styles/index.css">
</head>
<body>
<header>
    <h1>Estado de acción</h1>
</header>
<section class="main-section">
    <?php if (!empty($smg)) : ?>
        <div class="form-group">
            <?php echo $smg; ?>
        </div>
    <?php endif; ?>
    <div class="options-container">
        <a href="inicio.php" class="btn-option">Volver al inicio</a>
    </div>
</section>
</body>
</html>

</body>
</html>
