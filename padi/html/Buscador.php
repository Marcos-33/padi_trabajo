<?php
// Obtén información del servidor
$server_name = $_SERVER['SERVER_NAME'];
$server_ip = $_SERVER['SERVER_ADDR'];
$php_version = phpversion();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información del Servidor</title>
</head>
<body>
    <h1>Información del Servidor</h1>
    <ul>
        <li><strong>Nombre del Servidor:</strong> <?php echo $server_name; ?></li>
        <li><strong>Dirección IP del Servidor:</strong> <?php echo $server_ip; ?></li>
        <li><strong>Versión de PHP:</strong> <?php echo $php_version; ?></li>
    </ul>
    <form action="" method="get">
         <input type="text" name="busqueda"><br>
         <input type="submit" name="enviar" value="Buscar">
</form>
</body>
</html>