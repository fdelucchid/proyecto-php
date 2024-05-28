<?php
session_start();
            
if (!$_SESSION['usuario']) {
    header('Location: /web/functions/formLogin.php');
    exit();
}
// Conexión a la BD verificando que este sea satisfactoria
$enlace=mysqli_connect("localhost", "fran", "alumne", "proyecto_php");
if (!$enlace) {
    echo "Error en la conexion a la base de datos: " . mysqli_connect_error();
    exit;
}

// Guardado de los datos obtenidos del formulario en variables
$nombre = $_POST['nombre'];
$contraseña = $_POST['contraseña'];

// Sentencia de insert con las variables guardadas en el paso anterior
$insertar = "INSERT INTO usuarios (nombre_usuario, contraseña) VALUES ('$nombre', '$contraseña');";
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