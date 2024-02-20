<?php include "datos.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>editar php</title>
</head>
<body>
    <!-- <a href="editar.php">editar</a> -->

    

    <?php foreach ($result as $value): ?>
        <?php if($value["id"] == $_GET["id"]): ?>
            <form action="guardar.php" method="post" enctype="multipart/form-data">
                <label for="">Nombre</label>
                <input type="text" name="nombre" value="<?php echo $value["nombre"] ?>">
                <label for="">Edad</label>
                <input type="text" name="edad" value="<?php echo $value["edad"] ?>">
                <input type="hidden"  name="id" value="<?php echo $value["id"]?>">
                
                <p>imagen actual:</p>
                <img src="<?php echo $value["ruta_imagen"]?>" alt="">
                <p>nueva imagen</p>
                <input type="file" name="imagen">

                <input type="submit" value="editar" name="editar">
            </form> 
        <?php endif ?>

    <?php endforeach ?>

    

    <script src="java.js"></script>
</body>
</html>