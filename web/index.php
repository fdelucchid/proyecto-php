<!DOCTYPE html>
<html>
    <head>
        <title>Primera web PHP</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    </head>
    <body>
        <header class="headerIndex">
            <nav>
                <div class="logo">
                    <a href="/web/index.php">
                        <img src="img/profesor.png" alt="logoprofe">
                    </a>
                </div>
                <div class="enlaces">
                    <a href="/web/index.php">Inicio</a>
                    <a href="/web/functions/formAñadir.php">Añadir</a>
                    <a href="/web/functions/tablaEditar.php">Editar</a>
                </div>
            </nav>
            <h2>Registros del Instituto</h2>
        </header>
        <main>
            <h1>Datos de los profesores</h1>
            <table>
            <tr><td>Nombre</td><td>Apellidos</td><td>Fecha_Nacimiento</td><td>Teléfono</td></tr>
            <?php
            $conector = mysqli_connect("localhost", "fran", "alumne", "proyecto_php");
            if (!$conector) {
                echo "Error a la conexión: " . mysqli_connect_error();
                exit;
            }
            $resultado = mysqli_query($conector, "SELECT * FROM profesor");
            while ( $registre = mysqli_fetch_array($resultado) ) {
                echo "<tr>";
                echo "<td>" . $registre['nombre'] . "</td>";
                echo "<td>" . $registre['apellidos'] . "</td>";
                echo "<td>" . $registre['fecha_nacimiento'] . "</td>";
                echo "<td>" . $registre['telefono'] . "</td>";
                echo "</tr>";
            }
            ?>
            </table>
        </main>
    </body>
</html>
