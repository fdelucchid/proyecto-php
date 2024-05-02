<?php
/**
 * En este script a través de la obtención del id del profesor individual por la variable de la URL obtenida en el script tablaEditar.php, eliminaremos su registros de 
 * la BD y mostraremos un mensaje al usuario de verificación, tanto se salió bien, como si no.
 * 
 * Previo a esto nuevamente realizaremos la conexión a la BD
 * 
 * @package funcion-editar
 */

$enlace=mysqli_connect("localhost", "fran", "alumne", "proyecto_php");
if (!$enlace) {
    echo "Error en la conexion a la base de datos: " . mysqli_connect_error();
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
</head>
<body>
    <?php
    $codigo =  $_GET['codigo_profe'];
    $borrar = "DELETE FROM profesor WHERE codigo_profe = $codigo";

    $resultado = mysqli_query($enlace, $borrar);
    if (!$resultado) {
        echo "La eliminación del registro a tenido un problema";
        exit;
    } else {
        echo "Los datos se han eliminado correctamente";
    }
    ?>
    <a href="/web/functions/tablaEditar.php">Regresar</a>

</body>
</html>