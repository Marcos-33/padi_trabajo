<?php
// Conexión
$host = "localhost";
$user = "root";
$password = "";
$database = "padi";
$conn = new mysqli($host, $user, $password, $database);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Obtener empresas
$sql = "
    SELECT 
        e.nombrefc,
        l.Localidad,
        r.nombre AS representante,
        e.telefono
    FROM empresa e
    LEFT JOIN lugar l ON e.cif = l.empresa_cif
    LEFT JOIN representante r ON e.Representante_dni = r.dni
";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="">
    <title>Empresas</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            
        }
        .container {
            display: flex;
            flex-direction: row;
            margin-top: 20px;
        }
        .filter {
            width: 30%;
            padding: 20px;
            border-right: 2px solid #ccc;
        }
        .table-section {
            width: 70%;
            padding: 20px;
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #888;
            padding: 8px;
            text-align: left;
        }
        input[type="text"] {
            width: 90%;
            padding: 8px;
            margin-top: 10px;
            margin-bottom: 20px;
        }
    </style>
    <!-- se encarga de filtrar la informacion-->
    <script>
        function filtrarEmpresas() {
            let filtro = document.getElementById("busqueda").value.toLowerCase();
            let filas = document.querySelectorAll("#tablaEmpresas tbody tr");

            filas.forEach(fila => {
                let texto = fila.innerText.toLowerCase();
                fila.style.display = texto.includes(filtro) ? "" : "none";
            });
        }
    </script>
</head>
<body>

<h2 style="text-align: center;">Gestión de Empresas</h2>

<div class="container">
    
    <div class="filter">
        <h3>Buscar Empresa</h3>
    <!--onkeyup escucha en todo momento y cuando y cuando se suelta uan tecla manda la accion de filtrar -->
        <input type="text" id="busqueda" onkeyup="filtrarEmpresas()" placeholder="Escribe un nombre...">
    </div>

  
    <div class="table-section">
        <table id="tablaEmpresas">
            <thead>
                <tr>
                    <th>Nombre Empresa</th>
                    <th>Localidad</th>
                    <th>Representante</th>
                    <th>Teléfono</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result && $result->num_rows > 0) {
                    while ($fila = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($fila["nombrefc"]) . "</td>";
                        echo "<td>" . htmlspecialchars($fila["Localidad"]) . "</td>";
                        echo "<td>" . htmlspecialchars($fila["representante"]) . "</td>";
                        echo "<td>" . htmlspecialchars($fila["telefono"]) . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No se encontraron empresas.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<a href="Representante.php" class="boton">Nueva empresa</a> <br>

<a href="html/index.html" class="boton">Volver al inicio</a>



</body>
</html>

<?php
$conn->close();
?>
