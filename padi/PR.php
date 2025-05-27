<?php  
session_start();

// Conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$clave = "";
$basededatos = "padi";

$conn = mysqli_connect($servidor, $usuario, $clave, $basededatos);

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = mysqli_real_escape_string($conn, $_POST["email"]);
    $web = mysqli_real_escape_string($conn, $_POST["web"]);
    $nombrefc = mysqli_real_escape_string($conn, $_POST["nombrefc"]);
    $plazas = mysqli_real_escape_string($conn, $_POST["plazas"]);
    $telefono = mysqli_real_escape_string($conn, $_POST["telefonos"]);
    $cif = mysqli_real_escape_string($conn, $_POST["cif"]);
    $representante_dni = mysqli_real_escape_string($conn, $_POST["mi_selector"]);

    if (empty($representante_dni)) {
        die("No se recibió el identificador del representante.");
    }

    $sql = "INSERT INTO empresa (correo, web, nombrefc, plazas, telefono, cif, Representante_dni) 
            VALUES ('$correo', '$web', '$nombrefc', '$plazas', '$telefono', '$cif', '$representante_dni')";

    if (mysqli_query($conn, $sql)) {
        // Redirigir a lugar.php tras éxito
        header("Location: lugar.php");
        exit();
    } else {
        echo "Error al guardar: " . mysqli_error($conn);
    }
}

// Obtener todos los DNI de representantes para el selector
$sql_select = "SELECT dni FROM representante";
$resultado = $conn->query($sql_select);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro de Empresa</title>
</head>
<body>
    <h2>Formulario de registro de empresa</h2>
    <form method="post" action="">
        <label for="nombrefc">Nombre fiscal o comercial:</label><br>
        <input type="text" id="nombrefc" name="nombrefc" required><br><br>

        <label for="cif">CIF:</label><br>
        <input type="text" id="cif" name="cif" required><br><br>

        <label for="plazas">Plazas:</label><br>
        <input type="text" id="plazas" name="plazas" required><br><br>

        <label for="telefonos">Teléfono:</label><br>
        <input type="text" id="telefonos" name="telefonos" required><br><br>

        <label for="email">Correo:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="web">Web:</label><br>
        <input type="text" id="web" name="web" required><br><br>

        <label for="mi_selector">Seleccione DNI del Representante:</label><br>
        <select name="mi_selector" id="mi_selector" required>
            <option value="">Seleccione un DNI</option>
            <?php
            if ($resultado && $resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo '<option value="' . htmlspecialchars($fila['dni']) . '">' . htmlspecialchars($fila['dni']) . '</option>';
                }
            } else {
                echo '<option value="">No se encontraron representantes</option>';
            }
            ?>
        </select><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>

<?php
mysqli_close($conn);
?>
