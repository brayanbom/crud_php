<?php
include 'datos.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/estilos.css">
</head>
<body>
    <a href="crear.php">crear</a>
    <div class="padre">
        <ul>
            <?php foreach($result as $data): ?>
            <li>
                
                <?php echo $data["nombre"] ?>
                <img width="45" src="<?php echo $data["ruta_imagen"] ?>" alt="">
                <a   href="editar.php?id=<?php echo $data["id"]?>">editar</a>
                <form action="guardar.php" method="post" >
                    <input type="hidden" name="id" value="<?php echo $data["id"]?>">
                    <input type="submit" name="eliminar" value="eliminar">

                </form> 
            </li>
            <?php endforeach ?>
        </ul>
    </div>
</body>
</html>