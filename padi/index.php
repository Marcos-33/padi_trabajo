<?php

    $servidor = "localhost";
    $usuario = "root";
    $clave = "";
    $basededatos = "padi";

    $enlace = mysqli_connect ($servidor, $usuario, $clave, $basededatos);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Iniciar Sesion</title>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .login-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }
        .login-container h2 {
            margin-bottom: 20px;
            text-align: center;
        }
        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 93%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .login-container button {
            width: 100%;
            padding: 10px;
            background-color:rgb(235, 159, 18);
            border: none;
            color: white;
            border-radius: 4px;
            cursor: pointer;
        }

    </style>
    </head>
    <body>
    <div class="login-container">
        <form class="formulario" action="login.php" method="POST">
            <h2>Iniciar Sesión</h2>
            <input type="text" name="usuario" placeholder="Usuario" required>
            <input type="password" name="contraseña" placeholder="Contraseña" required>
            <button type="submit">Ingresar</button>
        </form>
    </div>
</body>
</html>