<?php
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "padi");

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Con esto validamos los0
$sql = "SELECT * FROM login WHERE usuario = ? AND contraseña = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("ss", $usuario, $contraseña);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
    // Usuario válido, redirigir
    header("Location: /padi/html/Empresas.html");
}

// Si no es válido, seguir mostrando error
$stmt->close();
$conexion->close();
?>

<!DOCTYPE html>
<html lang='es'>
<head>
  <meta charset='UTF-8'>
  <title>Error de Inicio de Sesión</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
    }

    .mensaje {
      padding: 2rem;
      border-radius: 10px;
      text-align: center;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      background-color: #f8d7da;
      color: #721c24;
      border: 1px solid #f5c6cb;
      width: 300px;
    }
  </style>
</head>
<body>

  <div class='mensaje'>
    <h2>Datos incorrectos</h2>
    <p>Usuario o contraseña inválidos.</p>
  </div>

</body>
</html>