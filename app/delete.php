<?php
include "../config/bbdd_config.php";


try {

    $base = new PDO($url,$db_user,$db_password);
    $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $base->exec("SET CHARACTER SET utf8");

    $sql = "DELETE FROM `data_users` WHERE id= $id";

    $statemend = $base->prepare($sql);
    $statemend->execute();

    header("location: ../index.php");
    $statemend->closeCursor();    

} catch (Exception $e) {
    echo "Error: ".$e->getMessage()."<br> en la linea: ".$e->getLine();
}