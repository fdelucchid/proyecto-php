<?php
/**
 * En este script, mediante la obtención del id del profesor y sus datos actualizados que traemos del envío del formulario en el script de formEdicion.php, 
 * actualizaremos los datos en la BD.
 * 
 * Previo a esto realizamos la conexion a la BD y al terminar hacemos una verificación que avise al usuario si los datos se actualizaron correctamente, o hubo un fallo
 * y no se pudo realizar.
 * 
 * @package funcion-editar
 */

// Conexión a la BD verificando que este sea satisfactoria
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
    <title>Editar</title>
</head>
<body>
    <?php
    // Obtencion de la variable de la URL
    $codigo =  $_GET['codigo_profe'];
    $codigo1 =  $_GET['codigo_asig'];

    // Modificación de los datos mediante la sentencia UPDATE filtrada por el id del profesor
    if ($codigo !== null) {
        $update = "UPDATE profesor SET nombre = '" . $_POST['nombre'] . "',
        apellidos = '" . $_POST['apellidos'] . "',
        fecha_nacimiento = '" . $_POST['fecha_nacimiento'] . "',
        direccion = '" . $_POST['direccion'] . "',
        telefono = '" . $_POST['telefono'] . "'
        WHERE codigo_profe=$codigo";
    } else {
        $update = "UPDATE asignaturas SET nombre = '" . $_POST['nombre'] . "',
        ciclo = '" . $_POST['ciclo'] . "',
        curso = '" . $_POST['curso'] . "',
        codigo_profe = '" . $_POST['codigo_profe'] . "'
        WHERE codigo_asig=$codigo1";
    }
    // Verificación para el usuario de la correcta actualización de los datos
    $resultado = mysqli_query($enlace, $update);
    if (!$resultado) {
        echo "La actualización de los datos ha tenido un problema";
        exit;
    } else {
        echo "Los datos se han insertado correctamente";
    }
    ?>
    <a href="/web/functions/tablaEditar.php">Regresar</a>

</body>
</html>