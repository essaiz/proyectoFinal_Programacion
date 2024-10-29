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
$form = $AñadirViews->getFormIngresos($_get);


?>
