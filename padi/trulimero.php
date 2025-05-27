<?php
// Conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$clave = "";
$basededatos = "padi";

$conn = mysqli_connect($servidor, $usuario, $clave, $basededatos);

// Verificar conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escapar cada dato del formulario usando los nombres correctos
    $correo = mysqli_real_escape_string($conn, $_POST["correo"]);
    $dni = mysqli_real_escape_string($conn, $_POST["dni"]);
    $nombre = mysqli_real_escape_string($conn, $_POST["nombre"]);
    $telefono = mysqli_real_escape_string($conn, $_POST["telefono"]);
    $cargo = mysqli_real_escape_string($conn, $_POST["cargo"]);

    // Consulta SQL corregida (y nombre correcto del campo "telefono")
    $sql = "INSERT INTO representante (nombre, dni, cargo, telefono, correo) 
            VALUES ('$nombre', '$dni', '$cargo', '$telefono', '$correo')";

    if (mysqli_query($conn, $sql)) {
        echo "Datos guardados en la tabla representante.";
    } else {
        echo "Error al guardar: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Representante</title>
</head>
<body>
    <h2>Formulario de Representante</h2>
    <form method="post" action="">
        <label for="correo">Correo:</label><br>
        <input type="email" id="correo" name="correo" required><br><br>

        <label for="dni">DNI:</label><br>
        <input type="text" id="dni" name="dni" required><br><br>

        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="telefono">Teléfono:</label><br>
        <input type="text" id="telefono" name="telefono" required><br><br>

        <label for="cargo">Cargo:</label><br>
        <input type="text" id="cargo" name="cargo" required><br><br>

        <a href="PR.php"><input type="submit" value="Enviar"></a>
    </form>
</body>
</html>