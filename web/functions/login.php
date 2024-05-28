<?php
$enlace=mysqli_connect("localhost", "fran", "alumne", "proyecto_php");
if (!$enlace) {
    echo "Error en la conexion a la base de datos: " . mysqli_connect_error();
    exit;
}

session_start();

$usuario = $_POST['nombre'];
$contraseña = $_POST['contraseña'];

$resultado = mysqli_query($enlace, "SELECT * FROM usuarios WHERE nombre_usuario = '$usuario' AND contraseña = '$contraseña'");

if (mysqli_num_rows($resultado) > 0) {
    $_SESSION['usuario'] = $usuario;
    header('Location: ../index.php');
    exit();
} else {
    echo "Nombre de usuario o contraseña incorrecto";
    echo "<br>";
    echo "<a href='/web/functions/formLogin.php'>Volver</a>";
}
?>