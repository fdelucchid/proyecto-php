<?php
/**
 * En este script realizamos la creación de un formulario de metodo post, para editar los datos del registro seleccionado en el script de tablaEditar.php.
 * 
 * El formulario es para que el usuario pueda cambiar los datos visualmente, finalmente el envío redirige a la ultima fase para la edición del registro en el script
 * de editar.php enviando nuevamente el id del profesor mediante una variable en la URL
 * 
 * Previo al formulario realizamos la conexión a la BD y la obtención de la variable pasada por URL, que será el id del profesor que desamos obtener. Mediante este,
 * completaremos el formulario, obteniendo los datos específicos del profesor, haciendo una query en la que filtramos por este id obtenido y guardandolos en una variable
 * de la que extraeremos los datos de cada columna y los mostraremos en el formulario.
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
    <title>Formulario Editar Registros</title>
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
</head>
<body>
    <?php
    // Obtencion de la variable de la URL y guardado de la información especfífica filtrando en la query por el id del profesor obtenido
    $codigo = $_GET['codigo_profe'];
    $resultado = mysqli_query($enlace, "SELECT * FROM profesor WHERE codigo_profe=$codigo");
    $registre = mysqli_fetch_array($resultado);
    ?>
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
    <form action="editar.php?codigo_profe=<?php echo $codigo ?>" method="post">
        <fieldset>
            <h3 class="cabeceraForm">Formulario de edición</h3>
            <div class="campos">
                <label for="idnombre">Nombre</label>
                <input type="text" name="nombre" id="idnombre" placeholder="Nombre" required="requiered" pattern="^[A-Z][a-z]+$" value="<?php echo $registre['nombre']; ?>">
            </div>
            <div class="campos">
                <label for="idApellido">Apellidos</label>
                <input type="text" name="apellidos" id="idApellido" placeholder="Apellidos" required="requiered" pattern="^[A-Z][a-z]+(\s[A-Z][a-z]+)?$" value="<?php echo $registre['apellidos']; ?>">
            </div>
            <div class="campos">
                <label for="idFecha">Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" id="idFecha" required="requiered" value="<?php echo $registre['fecha_nacimiento']; ?>">
            </div>
            <div class="campos">
                <label for="idDir">Dirección</label>
                <input type="text" name="direccion" id="idDir" placeholder="Ej: Carrer de Sant Pera 3, 3º 2º" required="requiered" value="<?php echo $registre['direccion']; ?>">
            </div>
            <div class="campos">
                <label for="idtel">Teléfono</label>
                <input type="tel" name="telefono" id="idtel" placeholder="Ej: 692990872" required="requiered" pattern="[0-9]{9}" value="<?php echo $registre['telefono']; ?>">
            </div>
            <button onclick='return confirm("¿Quieres guardar los cambios realizados? Asegúrate de ingresar los datos correctamente")'>Enviar</button>
        </fieldset>
    </form>
</body>
</html>