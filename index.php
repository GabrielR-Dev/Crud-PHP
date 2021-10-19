<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PseudoCrud</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php

        // Obtener usuarios de BBDD en la primer carga
        include_once "config/bbdd_config.php";
        
        try {
            $base = new PDO($url,$db_user,$db_password);
            $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $base->exec("SET CHARACTER SET utf8");

            $sql = "SELECT * FROM $db_table";

            $statemend = $base->prepare($sql);
            $statemend->execute();
            
            $arrayData = $statemend->fetchAll(PDO::FETCH_ASSOC);

            include "app/values-bbdd.php";
            
        } catch (Exception $e) {
            echo "Error: ".$e->getMessage()."<br> En la linea: ".$e->getLine();
        }
        // Obtener usuarios de BBDD en la primer carga
        
        // Obtener los datos de la busqueda
        if(isset($_POST["search"])){
            $form_name = $_POST["name"];
            $form_lastname = $_POST["last-name"];
            $form_age = $_POST["age"];
            $form_phone = $_POST["phone"];
            die(include "app/search.php");
        } 
        // Obtener los datos de la busqueda
    
    ?>

    <header class="header">
        <h1 class="title">CRUD PHP</h1>
    </header>

    <!-- Formulario -->
    <!-- <section class="section-form contac-form"> -->
    <section class="section-form">
        <form class="query" action="<?php $_SERVER["PHP_SELF"];?>" method="POST">
            <label for="name">Name: </label><input type="text" name="name" require>
            <label for="last-name">Last Name: </label><input type="text" name="last-name" require>
            <label for="age">Age: </label><input type="number" name="age">
            <label for="phone">Phone: </label><input type="number" name="phone">
            <div class="actions">
                <input type="submit" value="Search" name="search" class="inputs">
                <input type="submit" value="Send" name="send" class="inputs">
            </div>
        </form>
    </section>
    <!-- Formulario -->

    <!-- Info Validaciones -->
    <section class="message">
        <?php 
            if (isset($_POST["send"])){
                $form_name = $_POST["name"];
                $form_lastname = $_POST["last-name"];
                $form_age = $_POST["age"];
                $form_phone = $_POST["phone"];
                    
                include "app/validation.php";
                
                // Si los datos ingresados en el form son correctos se registra en la BBDD
                if($validation == true){
                    include "app/send.php";
                }
                // Si los datos ingresados en el form son correctos se registra en la BBDD
            }
        ?>
    </section>
    <!-- Info Validaciones -->

    <!-- Tabla con Resultado de BBDD -->
    <section class="section-info">
        <table class="section-table">
            <thead class="section-table-head">
                <th>Name</th>
                <th>Last Name</th>
                <th>Age</th>
                <th>Phone</th>
                <th>Actions</th>
            </thead>
            <tbody class="section-table-body" id="table">

                <?php foreach($arrayData as $user){
                    echo "<form action='app/edit-delete.php' method='POST'>";
                    echo "<tr>";
                    echo "<td>".$user['nombre'];"</td>";
                    echo "<td>".$user['apellido'];"</td>";
                    echo "<td>".$user['edad'];"</td>";    
                    echo "<td>".$user['telefono'];"</td>";
                    echo "<td>";
                    echo '<input type="submit" name="Select" value="Edit" class="inputs">';
                    echo '<input type="submit" name="Select" value="Delete" class="inputs">';
                        // Datos para el Submit Edit
                        echo '<input type="hidden" name="id" value='.$user["id"].' class="inputs">';
                        echo '<input type="hidden" name="name" value='.$user["nombre"].' class="inputs">';
                        echo '<input type="hidden" name="last-name" value='.$user["apellido"].' class="inputs">';
                        echo '<input type="hidden" name="age" value='.$user["edad"].' class="inputs">';
                        echo '<input type="hidden" name="phone" value='.$user["telefono"].' class="inputs">';
                        // Datos para el Submit Edit
                    echo '</td>';
                    echo '</tr>';
                    echo "</form>";

                }
                ?>
            </tbody>
        </table>
    </section>
    <!-- Tabla con Resultado de BBDD -->

    <footer class="footer">
        <P>GabrielR-Dev</P>
        <section class="repo">
                <div class="btn"><a href="https://www.linkedin.com/feed/?trk=guest_homepage-basic_nav-header-signin">Perfil en Linkedin</a></div>
                <div class="btn"><a href="https://github.com/GabrielR-Dev">Perfil en GitHub</a></div>
                <div class="btn"><a href="https://github.com/GabrielR-Dev/Crud-PHP">Repositorio del Proyecto</a></div>
        </section>
    </footer>
</body>
</html>