<?php
/**
 * En este script, mediante la obtención de los datos obtenidos del formulario del script formAñadir.php, insertaremos los datos del nuevo profesor en la base de datos,
 * añadiendo tambíen un mensaje de confirmación luego de realizar la sentencia INSERT
 * 
 * Previo a esto realizamos la conexion a la BD
 * 
 * @package funcion-añadir
 */

// Conexión a la BD verificando que este sea satisfactoria
$enlace=mysqli_connect("localhost", "fran", "alumne", "proyecto_php");
if (!$enlace) {
    echo "Error en la conexion a la base de datos: " . mysqli_connect_error();
    exit;
}

// Guardado de los datos obtenidos del formulario en variables
$nombre = $_POST['nombre'];
$apellido = $_POST['apellidos'];
$fechaN = $_POST['fecha_nacimiento'];
$dir = $_POST['direccion'];
$tel = $_POST['telefono'];

// Sentencia de insert con las variables guardadas en el paso anterior
$insertar = "INSERT INTO profesor (nombre, apellidos, fecha_nacimiento, direccion, telefono) VALUES ('$nombre', '$apellido', '$fechaN', '$dir', '$tel');";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Añadir</title>
</head>
<body>
    <?php
    // Mensaje de confirmación
    $resultado = mysqli_query($enlace, $insertar);
    if (!$resultado) {
        echo "El insert ha tenido un problema";
        exit;
    } else {
        echo "Los datos se han insertado correctamente";
    }
    ?>
    <a href="/web/index.php">Regresar</a>
</body>
</html>