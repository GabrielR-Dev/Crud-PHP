<?php

include "config/bbdd_config.php";

try {
    $base = new PDO($url,$db_user,$db_password);
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $base->exec("SET CHARACTER SET utf8");

    $sql = "INSERT INTO $db_table (nombre, apellido, edad, telefono) VALUES (:nam,:las,:age,:pho)";

    $statemend = $base->prepare($sql);
    
    $statemend->bindParam(":nam",$form_name);
    $statemend->bindParam(":las",$form_lastname);
    $statemend->bindParam(":age",$form_age);
    $statemend->bindParam(":pho",$form_phone);

    $statemend->execute();
    $statemend->closeCursor();
    header("location: index.php");

} catch (Exception $e) {
    echo "Error: ".$e->getMessage()."<br> en la linea: ".$e->getLine();
}
