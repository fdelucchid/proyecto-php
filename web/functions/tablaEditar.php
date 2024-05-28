<?php
/**
 * Script para crear una tabla con los registros de la base de datos a partir de una query a esta, generando enlaces para redirigir tambíen a los apartados de
 * editar/borrar/visualizar estos registros individualmente
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
                <a href="/web/functions/logout.php">Cerrar Sesión</a>
            </div>
        </nav>
    </header>
    <table class="margenTablas">
    <tr><td>Nombre</td><td>Apellidos</td><td>Fecha_Nacimiento</td><td>Dirección</td><td>Teléfono</td><td>Acción</td></tr>
    <?php
    session_start();
            
    if (!$_SESSION['usuario']) {
        header('Location: /web/functions/formLogin.php');
        exit();
    }
    // Query a la base de datos y bucle para la creacion de la tabla
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
    echo "</table>";
    echo "<table class='margenTablas'>";
    echo "<tr><td>Nombre</td><td>Ciclo</td><td>Curso</td><td>nombre_profesor</td><td>apellidos_profesor</td><td>Acción</td></tr>";
    $resultado1 = mysqli_query($enlace, "SELECT a.codigo_asig, a.nombre, a.ciclo, a.curso, p.nombre AS nombre_profesor, p.apellidos AS apellidos_profesor FROM asignaturas a
    LEFT JOIN profesor p ON p.codigo_profe = a.codigo_profe
    WHERE a.ciclo = 'ASIX' AND a.curso = 1");
            while ( $registre1 = mysqli_fetch_array($resultado1) ) {
                echo "<tr>";
                echo "<td>" . $registre1['nombre'] . "</td>";
                echo "<td>" . $registre1['ciclo'] . "</td>";
                echo "<td>" . $registre1['curso'] . "</td>";
                echo "<td>" . $registre1['nombre_profesor'] . "</td>";
                echo "<td>" . $registre1['apellidos_profesor'] . "</td>";
                $edicion1 = "formEdicion.php?codigo_asig=" . $registre1['codigo_asig'];
                $borrado1 = "eliminar.php?codigo_asig=" . $registre1['codigo_asig'];
                $vista1 = "vista.php?codigo_asig=" . $registre1['codigo_asig'];
                echo "<td>
                <a href='/web/functions/$edicion1' onclick='return confirm(\"¿Estás seguro de que deseas editar este registro?\")'><img src='../img/editar.png' alt='botonEditar' class='enlaceEdit'></a>
                <a href='/web/functions/$vista1'><img src='../img/vision.png' alt='botonVer' class='enlaceEdit'></a>
                <a href='/web/functions/$borrado1' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este registro?\")'><img src='../img/borrar.png' alt='botonBorrar' class='enlaceEdit'></a>
                </td>";
                echo "</tr>";
            }
    // En la parte superior a este comentarios veremos los enlaces para las distintas opciones de edicion de los registros individuales con su redireccion especifica

    if ($_SESSION['usuario'] == 'admin') {
        echo "<table class='margenTablas'>";
        echo "<tr><td>Nombre_Usuario</td></tr>";
        $resultado2 = mysqli_query($enlace, "SELECT * FROM usuarios");
            while ( $registre = mysqli_fetch_array($resultado2) ) {
                echo "<tr>";
                echo "<td>" . $registre['nombre_usuario'] . "</td>";
                echo "</tr>";
            }
    echo "</table>";
    }
    ?>
    </table>
</body>
</html>
