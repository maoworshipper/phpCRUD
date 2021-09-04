<?php
require('../config/dbconex.php');

extract($_POST);

try {
    $consulta = $link->prepare("UPDATE tasks SET estado=1 WHERE id = :id");
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    echo "1";
} catch (PDOException $p) {
    echo "No fue posible guardar la información - Error: " . $p->getMessage();
}