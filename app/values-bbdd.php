<?php

include "config/bbdd_config.php";

try {
    $base = new PDO($url,$db_user,$db_password);
    $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $base->exec("SET CHARACTER SET utf8");

    $sql = "UPDATE $db_table SET telefono = 'Sin registro' WHERE telefono = 0";

    $statemend = $base->prepare($sql);
    $statemend->execute();

} catch (Exception $e) {
    echo "Error en la linea: " . $e->getLine(). "<br> Mensaje: " . $e->getMessage();
}
