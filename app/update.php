<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<header class="header-search">
    <h1 class="title-search">Update Error</h1>
    <div class="return"><a href="../index.php"><button>Return</button></a></div>
</header>

<?php
$form_id = $_POST["id"];
$form_name = $_POST["name"];
$form_lastname = $_POST["last-name"];
$form_age = $_POST["age"];
$form_phone = $_POST["phone"];

include "../config/bbdd_config.php";

echo "<section class='message'>";
include "validation.php";
echo "</section>";

if($validation == true){

    try {
        $base = new PDO($url,$db_user,$db_password);
        $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");

        $sql = "UPDATE `data_users` SET nombre= :nam, apellido=:las, edad= :age, telefono= :pho WHERE id=:id";

        $statemend = $base->prepare($sql);

        $statemend->bindParam(":id",$form_id);
        $statemend->bindParam(":nam",$form_name);
        $statemend->bindParam(":las",$form_lastname);
        $statemend->bindParam(":age",$form_age);
        $statemend->bindParam(":pho",$form_phone);

        $statemend->execute();
        $statemend->closeCursor();
        header("location: ../index.php");
    
    } catch (Exception $e) {
        echo "Error: ".$e->getMessage()."<br> En la linea: ".$e->getLine();
    }
}
?>

</body>
</html>