<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Añadir</title>
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
</head>
    <body>
        <form action="login.php" method="post">
            <fieldset>
                <h3 class="cabeceraForm">Ingresa los datos de inicio de sesion</h3>
                <h4>Datos usuario</h4>
                <div class="campos">
                    <label for="idnombre">Nombre de Usuario</label>
                    <input type="text" name="nombre" id="idnombre" autofocus="autofocus" placeholder="Nombre" required="requiered">
                </div>
                <div class="campos">
                    <label for="idContraseña">Contraseña</label>
                    <input type="text" name="contraseña" id="idContraseña" placeholder="Contraseña" required="requiered">
                </div>
                <button>Enviar</button>
            </fieldset>
        </form>
    </body>
</html>