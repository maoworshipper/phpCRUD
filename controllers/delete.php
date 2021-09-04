<?php
require('../config/dbconex.php');

extract($_POST);

try {
    $consulta = $link->prepare("DELETE FROM tasks WHERE id = :id");
    $consulta->bindParam(':id', $id);
    $consulta->execute();
    echo "1";
} catch (PDOException $p) {
    echo "No fue posible eliminar la información - Error: " . $p->getMessage();
}