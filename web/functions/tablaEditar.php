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
    <title>Editar Registros</title>
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <a href="/web/index.php">
                    <img src="../img/profesor.png" alt="logoprofe">
                </a>
            </div>
            <div class="enlaces">
                <a href="/web/index.php">Inicio</a>
                <a href="/web/functions/formAñadir.php">Añadir</a>
                <a href="/web/functions/tablaEditar.php">Editar</a>
            </div>
        </nav>
    </header>
    <table class="margenTablas">
    <tr><td>Nombre</td><td>Apellidos</td><td>Fecha_Nacimiento</td><td>Dirección</td><td>Teléfono</td><td>Acción</td></tr>
    <?php
    $resultado = mysqli_query($enlace, "SELECT * FROM profesor");
            while ( $registre = mysqli_fetch_array($resultado) ) {
                echo "<tr>";
                echo "<td>" . $registre['nombre'] . "</td>";
                echo "<td>" . $registre['apellidos'] . "</td>";
                echo "<td>" . $registre['fecha_nacimiento'] . "</td>";
                echo "<td>" . $registre['direccion'] . "</td>";
                echo "<td>" . $registre['telefono'] . "</td>";
                $edicion = "formEdicion.php?codigo_profe=" . $registre['codigo_profe'];
                $borrado = "eliminar.php?codigo_profe=" . $registre['codigo_profe'];
                $vista = "vista.php?codigo_profe=" . $registre['codigo_profe'];
                echo "<td>
                <a href='/web/functions/$edicion' onclick='return confirm(\"¿Estás seguro de que deseas editar este registro?\")'><img src='../img/editar.png' alt='botonEditar' class='enlaceEdit'></a>
                <a href='/web/functions/$vista'><img src='../img/vision.png' alt='botonVer' class='enlaceEdit'></a>
                <a href='/web/functions/$borrado' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este registro?\")'><img src='../img/borrar.png' alt='botonBorrar' class='enlaceEdit'></a>
                </td>";
                echo "</tr>";
            }
    ?>
    </table>
</body>
</html>
