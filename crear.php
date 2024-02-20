<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="editar.php">editar</a>
    <form action="guardar.php" method="post" enctype="multipart/form-data">
        <label for="">Nombre</label>
        <input type="text" name="nombre">
        <label for="">Edad</label>
        <input type="text" name="edad">
        <br>
        <input type="file" name="imagen">
        <!-- <input type="submit" value="Subir Imagen" name="submit"> -->
        <input type="submit" value="enviar" name="enviar">
    </form>
    
    <script src="java.js"></script>
</body>
</html>