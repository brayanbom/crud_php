
<?php

include 'bd.php';
if($_POST["enviar"] == "enviar")
{
    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    
    // Subir la imagen al servidor
    /* accedo al nombre del archivo */
    $file_name = $_FILES['imagen']['name'];
    /* la imagen se guarda en un lugar temporal, y con esto indico donde esta guardado */
    $file_tmp = $_FILES['imagen']['tmp_name'];
    /* indico en que carpeta se va a mover la imagen */
    move_uploaded_file($file_tmp, "uploads/".$file_name);
    
    $ruta_imagen = "uploads/".$file_name;

    // Guardar la ruta de la imagen en la base de datos
    $query = conexion();
    $data = $query->prepare("INSERT INTO usuarios (nombre, edad, ruta_imagen) VALUES (:nombre, :edad, :ruta_imagen)");
    $data->bindParam(':nombre', $nombre);
    $data->bindParam(':edad', $edad);
    $data->bindParam(':ruta_imagen', $ruta_imagen);
    $resultado = $data->execute();

    if($resultado) {
        header('location: index.php');
    } else {
        echo "Error al ingresar los datos";
    }
}elseif($_POST["editar"] == "editar"){

    $nombre = $_POST["nombre"];
    $edad = $_POST["edad"];
    $id = $_POST["id"];

    // Verificar si se ha subido una nueva imagen
    if ($_FILES['imagen']['name']) {
        $file_name = $_FILES['imagen']['name'];
        $file_tmp = $_FILES['imagen']['tmp_name'];
        move_uploaded_file($file_tmp, "uploads/".$file_name);
        $ruta_imagen = "uploads/".$file_name;
    } else {
        // Si no se subió una nueva imagen, mantener la imagen existente
        $query = conexion();
        $data = $query->prepare("SELECT ruta_imagen FROM usuarios WHERE id = :id");
        $data->bindParam(':id', $id);
        $data->execute();
        $result = $data->fetch(PDO::FETCH_ASSOC);
        $ruta_imagen = $result["ruta_imagen"];
    }

    $query = conexion();
    $data = $query->prepare("UPDATE usuarios SET nombre = :nombre, edad = :edad, ruta_imagen = :ruta_imagen WHERE id = :id");
    $data->bindParam(':nombre', $nombre);
    $data->bindParam(':edad', $edad);
    $data->bindParam(':id', $id);
    $data->bindParam(':ruta_imagen', $ruta_imagen);
    $resultado = $data->execute();

    if ($resultado) {
        header('location: index.php');
    } else {
        echo "Error al actualizar los datos";
    }

}elseif($_POST["eliminar"] == "eliminar")
{
    $id = $_POST["id"];

    // Obtener la ruta de la imagen a eliminar
    $query = conexion();
    $data = $query->prepare("SELECT ruta_imagen FROM usuarios WHERE id = :id");
    $data->bindParam(':id', $id);
    $data->execute();
    $result = $data->fetch(PDO::FETCH_ASSOC);
    $ruta_imagen = $result["ruta_imagen"];

    // Eliminar la referencia a la imagen en la base de datos
    $query = conexion();
    $data = $query->prepare("DELETE FROM usuarios WHERE id = :id");
    $data->bindParam(':id', $id);
    $resultado = $data->execute();

    if ($resultado) {
        // Eliminar la imagen del servidor
        if (unlink($ruta_imagen)) {
            header('location: index.php');
        } else {
            echo "Error al eliminar la imagen del servidor";
        }
    } else {
        echo "Error al eliminar la referencia de la imagen en la base de datos";
    }
    
}
