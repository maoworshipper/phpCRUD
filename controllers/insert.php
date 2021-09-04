<?php
require('../config/dbconex.php');

extract($_POST);
date_default_timezone_set('America/Bogota');
$fhora = date("Y-m-d H:i:s");

try {
    $consulta = $link->prepare("INSERT INTO tasks (tarea, fecha, estado) VALUES (:tarea, :fhora, 0)");
    $consulta->bindParam(':tarea', $tarea);
    $consulta->bindParam(':fhora', $fhora);
    $consulta->execute();
    echo "1";
} catch (PDOException $p) {
    echo "No fue posible guardar la información - Error: " . $p->getMessage();
}