<?php
// Conexión a la base de datos
$host = "localhost";
$usuario = "root"; // Cambia si tu usuario es diferente
$contrasena = "";  // Cambia si tienes contraseña
$base_datos = "padi";

$conn = new mysqli($host, $usuario, $contrasena, $base_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Insertar datos cuando el formulario se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $conn->real_escape_string($_POST["nombre"]);
    $email = $conn->real_escape_string($_POST["email"]);

    $sql = "INSERT INTO usuarios (nombre, email) VALUES ('$nombre', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Registro guardado correctamente.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario PHP + MySQL</title>
</head>
<body>
    <h2>Formulario de registro</h2>
    <form method="post" action="">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="email">Correo electrónico:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>