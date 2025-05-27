<?php
session_start(); // Para mostrar mensaje después de recargar

// Conexión a la base de datos
$servidor = "localhost";
$usuario = "root";
$clave = "";
$basededatos = "padi";

$conn = mysqli_connect($servidor, $usuario, $clave, $basededatos);
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // Activar errores

if (!$conn) {
    die("Conexión fallida: " . mysqli_connect_error());
}

// Procesamiento del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = mysqli_real_escape_string($conn, $_POST["nombre"]);
    $apellidos = mysqli_real_escape_string($conn, $_POST["apellidos"]);
    $dni = mysqli_real_escape_string($conn, $_POST["dni"]);
    $puesto = mysqli_real_escape_string($conn, $_POST["cargo"]);
    $correo = mysqli_real_escape_string($conn, $_POST["correo"]);
    $telefono = mysqli_real_escape_string($conn, $_POST["telefono"]);
    $empresa_cif = mysqli_real_escape_string($conn, $_POST["empresa_cif"]);
    $ciclo_id = mysqli_real_escape_string($conn, $_POST["ciclo_id"]);

    if (empty($empresa_cif) || empty($ciclo_id)) {
        die("Error: Debes seleccionar una empresa y un ciclo.");
    }

    // Validar que la empresa existe
    $checkEmpresa = mysqli_query($conn, "SELECT cif FROM empresa WHERE cif = '$empresa_cif'");
    if (mysqli_num_rows($checkEmpresa) === 0) {
        die("Error: La empresa seleccionada no existe.");
    }

    // Preparar e insertar datos
    $stmt = $conn->prepare("INSERT INTO tutor (nombre, apellidos, dni, puesto, correo, telefono, empresa_cif, ciclo_id)
                            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if ($stmt) {
        $stmt->bind_param("sssssssi", $nombre, $apellidos, $dni, $puesto, $correo, $telefono, $empresa_cif, $ciclo_id);
        if ($stmt->execute()) {
            $stmt->close();
            $conn->close();
            $_SESSION["success"] = "Tutor guardado con éxito";
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        } else {
            echo "Error al guardar: " . $stmt->error;
        }
    } else {
        echo "Error en la preparación de la consulta: " . $conn->error;
    }
}

// Obtener datos para los select
$empresas = mysqli_query($conn, "SELECT cif, nombrefc FROM empresa");
$ciclos = mysqli_query($conn, "SELECT id, ciclo FROM ciclo");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Tutor</title>
</head>
<body>
    <h2>Formulario para el Tutor</h2>

    <?php
    if (isset($_SESSION["success"])) {
        echo "<p style='color: green; font-weight: bold;'>" . $_SESSION["success"] . "</p>";
        unset($_SESSION["success"]);
    }
    ?>

    <form method="post" action="">
        <label for="correo">Correo:</label><br>
        <input type="email" id="correo" name="correo" required><br><br>

        <label for="dni">DNI:</label><br>
        <input type="text" id="dni" name="dni" required><br><br>

        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>

        <label for="apellidos">Apellidos:</label><br>
        <input type="text" id="apellidos" name="apellidos" required><br><br>

        <label for="telefono">Teléfono:</label><br>
        <input type="text" id="telefono" name="telefono" required><br><br>

        <label for="cargo">Cargo:</label><br>
        <input type="text" id="cargo" name="cargo" required><br><br>

        <label for="empresa_cif">Empresa (CIF - Nombre):</label><br>
        <select id="empresa_cif" name="empresa_cif" required>
            <option value="">-- Selecciona una empresa --</option>
            <?php while ($row = mysqli_fetch_assoc($empresas)) { ?>
                <option value="<?= htmlspecialchars($row['cif']) ?>">
                    <?= htmlspecialchars($row['cif'] . " - " . $row['nombrefc']) ?>
                </option>
            <?php } ?>
        </select><br><br>

        <label for="ciclo_id">Seleccione Ciclo:</label><br>
        <select id="ciclo_id" name="ciclo_id" required>
            <option value="">-- Selecciona un ciclo --</option>
            <?php while ($row = mysqli_fetch_assoc($ciclos)) { ?>
                <option value="<?= htmlspecialchars($row['id']) ?>">
                    <?= htmlspecialchars($row['ciclo']) ?>
                </option>
            <?php } ?>
        </select><br><br>

        <input type="submit" value="Guardar Tutor">
    </form>

    <br>
    <button type="button" onclick="window.location.href='busca.php'">Ir a Busca</button>
</body>
</html>
