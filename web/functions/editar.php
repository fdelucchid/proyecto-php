<?php
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
    $codigo =  $_GET['codigo_profe'];
    $update = "UPDATE profesor SET nombre = '" . $_POST['nombre'] . "',
    apellidos = '" . $_POST['apellidos'] . "',
    fecha_nacimiento = '" . $_POST['fecha_nacimiento'] . "',
    direccion = '" . $_POST['direccion'] . "',
    telefono = '" . $_POST['telefono'] . "'
    WHERE codigo_profe=$codigo";

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