<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users Search</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
    <?php
    include "config/bbdd_config.php";

    try {
        $base= new PDO($url,$db_user,$db_password);
        $base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $base->exec("SET CHARACTER SET utf8");
        

        $sql= "SELECT * FROM $db_table 
            WHERE 
            nombre like :nom
            or apellido like :ape 
            or edad like :ed
            or telefono like :tel"
        ;

        $statemend = $base->prepare($sql);
        $statemend->bindParam(":nom",$form_name);
        $statemend->bindParam(":ape",$form_lastname);
        $statemend->bindParam(":ed",$form_age);
        $statemend->bindParam(":tel",$form_phone);
        $statemend->execute();

        $arrayData = $statemend->fetchAll(PDO::FETCH_ASSOC);
        
    } catch (Exception $e) {
        echo "Error: ".$e->getMessage()."<br> En la linea: ".$e->getLine();
    }

    ?>

    <header class="header-search">
        <h1 class="title-search">Search Result</h1>
        <div class="return"><a href="index.php"><button>Return</button></a></div>
    </header>

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
                        echo '<input type="hidden" name="id" value='.$user["id"].' class="inputs">';
                        echo '<input type="hidden" name="name" value='.$user["nombre"].' class="inputs">';
                        echo '<input type="hidden" name="last-name" value='.$user["apellido"].' class="inputs">';
                        echo '<input type="hidden" name="age" value='.$user["edad"].' class="inputs">';
                        echo '<input type="hidden" name="phone" value='.$user["telefono"].' class="inputs">';
                    echo '</td>';
                    echo '</tr>';
                    echo "</form>";
                }
            ?>
            </tbody>
        </table>
    </section>

    <footer class="footer"><P>GabrielR-Dev</P></footer>
    
</body>
</html>


