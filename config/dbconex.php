<?php
try {
    $link = new PDO('mysql:host=localhost;dbname=tododb;charset=utf8', 'todousr', '6jGsvM!@pZ6iBYYm');
} 
catch (PDOException $e) {
    echo "No fue posible conectarse a la base de datos - Error: " . $e->getMessage();
}
?>