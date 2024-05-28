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
    <form action="añadirUser.php" method="post">
        <fieldset>
            <h3 class="cabeceraForm">Ingresa los datos a insertar</h3>
            <h4>Datos Usuario</h4>
            <div class="campos">
                <label for="idnombre">Nombre</label>
                <input type="text" name="nombre" id="idnombre" autofocus="autofocus" placeholder="Nombre" required="requiered">
            </div>
            <div class="campos">
                <label for="idContraseña">Contraseña</label>
                <input type="text" name="contraseña" id="idContraseña" placeholder="contraseña" required="requiered">
            </div>
            <button>Enviar</button>
        </fieldset>
    </form>
</body>
</html>