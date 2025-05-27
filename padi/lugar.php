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

// Procesamiento del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['guardar'])) {
    $Comunidad = mysqli_real_escape_string($conn, $_POST["Comunidad"]);
    $Localidad = mysqli_real_escape_string($conn, $_POST["Localidad"]);
    $provincia = mysqli_real_escape_string($conn, $_POST["provincia"]);
    $Codigo_postal = mysqli_real_escape_string($conn, $_POST["Codigo_postal"]);
    $direccion = mysqli_real_escape_string($conn, $_POST["direccion"]);
    $empresa_cif = mysqli_real_escape_string($conn, $_POST["empresa_cif"]);

    $sql = "INSERT INTO lugar (Comunidad, Localidad, provincia, Codigo_postal, direccion, empresa_cif) 
            VALUES ('$Comunidad', '$Localidad', '$provincia', '$Codigo_postal', '$direccion', '$empresa_cif')";

    if (mysqli_query($conn, $sql)) {
        echo " Datos guardados en la tabla lugar.";
    } else {
        echo " Error al guardar: " . mysqli_error($conn);
    }
}

// Obtener CIFs
$cif_result = mysqli_query($conn, "SELECT cif, nombrefc FROM empresa");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario Lugar</title>
    <script>
        function actualizarCIF() {
            const select = document.getElementById("empresaSelect");
            const inputCif = document.getElementById("empresa_cif");
            inputCif.value = select.value;
        }

        function irACiclo() {
            window.location.href = "ciclo.php";
        }
    </script>
</head>
<body>
    <h2>Formulario de Lugar</h2>

    <form method="post" action="">
        <label for="Comunidad">Comunidad</label><br>
        <input type="text" id="Comunidad" name="Comunidad" required><br><br>

        <label for="Localidad">Localidad</label><br>
        <input type="text" id="Localidad" name="Localidad" required><br><br>

        <label for="provincia">Provincia</label><br>
        <input type="text" id="provincia" name="provincia" required><br><br>

        <label for="Codigo_postal">Código Postal</label><br>
        <input type="text" id="Codigo_postal" name="Codigo_postal" required><br><br>

        <label for="direccion">Dirección</label><br>
        <input type="text" id="direccion" name="direccion" required><br><br>

        <label for="empresaSelect">Empresa (CIF - Nombre)</label><br>
        <select id="empresaSelect" onchange="actualizarCIF()">
            <option value="">-- Selecciona --</option>
            <?php while ($row = mysqli_fetch_assoc($cif_result)) { ?>
                <option value="<?= htmlspecialchars($row['cif']) ?>">
                    <?= htmlspecialchars($row['cif'] . " - " . $row['nombrefc']) ?>
                </option>
            <?php } ?>
        </select><br><br>

        <!-- Campo oculto con el CIF seleccionado -->
        <input type="hidden" id="empresa_cif" name="empresa_cif" required>

        <!-- Botones -->
        <button type="submit" name="guardar">Guardar</button>
        <button type="button" onclick="irACiclo()">Ir a Ciclo</button>
    </form>
</body>
</html>

<?php mysqli_close($conn); ?>

