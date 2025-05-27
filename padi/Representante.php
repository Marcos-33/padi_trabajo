<?php
// Configuración de conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$clave = "";
$basededatos = "padi";

// Crear conexión
$conn = mysqli_connect($servidor, $usuario, $clave, $basededatos);

// Verificar conexión
if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Si se envió el formulario, procesar los datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $correo = mysqli_real_escape_string($conn, $_POST["correo"]);
    $dni = mysqli_real_escape_string($conn, $_POST["dni"]);
    $nombre = mysqli_real_escape_string($conn, $_POST["nombre"]);
    $telefono = mysqli_real_escape_string($conn, $_POST["telefono"]);
    $cargo = mysqli_real_escape_string($conn, $_POST["cargo"]);

    // Preparar consulta para insertar datos en la tabla representante
    $sql_insert = "INSERT INTO representante (nombre, dni, cargo, telefono, correo) 
                   VALUES ('$nombre', '$dni', '$cargo', '$telefono', '$correo')";

    if (mysqli_query($conn, $sql_insert)) {
        // Redirigir tras guardar con éxito para evitar reenvío de formulario al refrescar
        header("Location: PR.php");
        exit();
    } else {
        echo "Error al guardar: " . mysqli_error($conn);
    }
}

// Consulta para obtener las opciones del select desde la tabla "empresa"
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario Representante</title>
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



        

        <input type="submit" value="Enviar">
    </form>
</body>
</html>

<?php
// Cerrar conexión
mysqli_close($conn);
?>
