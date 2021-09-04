<?php
require('../config/dbconex.php');

$datos = "<table><thead><tr><th>Tarea</th><th>Fecha</th><th>Completar</th><th>Eliminar</th></tr></thead><tbody>";

try {
    $consulta = $link->prepare("SELECT * FROM tasks");
    $consulta->execute();

    //$accion = $link->query($consulta);
    while ($tareas = $consulta->fetch(PDO::FETCH_ASSOC)) {
        if($tareas['estado'] == 0){
            $datos .= "<tr id='tarea" . $tareas['id'] . "'><td>" . $tareas['tarea'] . "</td><td>" . $tareas['fecha'] . "</td><td><button id='btn" . $tareas['id'] . "' onclick='actualizar(" . $tareas['id'] . ")'>Completada</button></td><td><button onclick='eliminar(" . $tareas['id'] . ")'>Eliminar</button></td></tr>";    
        }
        else {
            $datos .= "<tr id='tarea" . $tareas['id'] . "' class='completada'><td>" . $tareas['tarea'] . "</td><td>" . $tareas['fecha'] . "</td><td><button id='btn" . $tareas['id'] . "' onclick='actualizar(" . $tareas['id'] . ")' disabled>Completada</button></td><td><button onclick='eliminar(" . $tareas['id'] . ")'>Eliminar</button></td></tr>";
        }
    }

    $datos .= "</tbody></table>";
    echo $datos;
} catch (PDOException $p) {
    echo "No fue posible obtener la información - Error: " . $p->getMessage();
}