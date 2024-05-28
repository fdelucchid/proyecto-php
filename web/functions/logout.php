<?php
session_start();
session_destroy();
header('Location: /web/functions/formLogin.php');
exit();
?>