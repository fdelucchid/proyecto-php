<?php
    session_start();
    
    if (!$_SESSION['usuario']) {
        header('Location: /web/functions/formLogin.php');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Añadir</title>
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
    <form action="añadir.php" method="post">
        <fieldset>
            <h3 class="cabeceraForm">Ingresa los datos a insertar</h3>
            <h4>Datos profesor</h4>
            <div class="campos">
                <label for="idnombre">Nombre</label>
                <input type="text" name="nombre" id="idnombre" autofocus="autofocus" placeholder="Nombre" required="requiered" pattern="^[A-Z][a-z]+$">
            </div>
            <div class="campos">
                <label for="idApellido">Apellidos</label>
                <input type="text" name="apellidos" id="idApellido" placeholder="Apellidos" required="requiered" pattern="^[A-Z][a-z]+(\s[A-Z][a-z]+)?$">
            </div>
            <div class="campos">
                <label for="idFecha">Fecha de Nacimiento</label>
                <input type="date" name="fecha_nacimiento" id="idFecha" required="requiered">
            </div>
            <div class="campos">
                <label for="idDir">Dirección</label>
                <input type="text" name="direccion" id="idDir" placeholder="Ej: Carrer de Sant Pera 3, 3º 2º" required="requiered">
            </div>
            <div class="campos">
                <label for="idtel">Teléfono</label>
                <input type="tel" name="telefono" id="idtel" placeholder="Ej: 692990872" required="requiered" pattern="[0-9]{9}">
            </div>
            <button>Enviar</button>
        </fieldset>
    </form>
</body>
</html>