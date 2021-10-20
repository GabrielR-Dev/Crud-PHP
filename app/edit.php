<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Edit</title>
    <link rel="stylesheet" href="../CSS/style.css">
</head>
<body>

    <header class="header-search">
        <h1 class="title-search">Edit User</h1>
        <div class="return"><a href="../index.php"><button>Return</button></a></div>
    </header>
    <section class="section-form">
        <form class="query" action="update.php" method="POST">
            <input type="hidden" name="id" value =<?php echo $id;?>>
            <label for="name">Name: </label><input type="text" name="name" value ="<?php echo $name;?>">
            <label for="last-name">Last Name: </label><input type="text" name="last-name" value ="<?php echo $lastname;?>">
            <label for="age">Age: </label><input type="number" name="age" value =<?php echo $age;?>>
            <label for="phone">Phone: </label><input type="text" name="phone" value =<?php echo $phone;?>>
            <div class="actions">
                <input type="submit" value="Update" name="update" class="inputs">
            </div>
        </form>
    </section>


    <footer class="footer"><P>GabrielR-Dev</P></footer>    
</body>
</html>