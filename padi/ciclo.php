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
    // Escapar datos del formulario
    $familia = mysqli_real_escape_string($conn, $_POST["familia"]);
    $curso = mysqli_real_escape_string($conn, $_POST["curso"]);
    $ciclo = mysqli_real_escape_string($conn, $_POST["ciclo"]);

    // Consulta SQL
    $sql = "INSERT INTO ciclo (familia, curso, ciclo) 
            VALUES ('$familia', '$curso', '$ciclo')";

    if (mysqli_query($conn, $sql)) {
        echo "Datos guardados en la tabla ciclo.";
    } else {
        echo "Error al guardar: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario Ciclo</title>
    <style>
        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h2>Formulario de Ciclo</h2>
    <form method="post" action="">
        <label for="familia">Familia</label><br>
        <input type="text" id="familia" name="familia" required><br><br>

        <label for="curso">Curso</label><br>
        <input type="text" id="curso" name="curso" required><br><br>

        <label for="ciclo">Ciclo</label><br>
        <input type="text" id="ciclo" name="ciclo" required><br><br>

        <div class="button-group">
            <input type="submit" value="Enviar">
            <button type="button" onclick="window.location.href='tutor.php'">Siguiente</button>
        </div>
    </form>
</body>
</html>
