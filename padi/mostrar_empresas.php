<?php
$host = "localhost";
$usuario = "root";
$contrasena = "";
$basedatos = "padi";

$conn = new mysqli($host, $usuario, $contrasena, $basedatos);

if ($conn->connect_error) {
    die("Conexión fallida. Intente más tarde.");
}

$sql = "
SELECT 
    empresa.`nombrefc` AS nombre_empresa,
    empresa.cif,
    empresa.plazas,
    empresa.telefono AS telefono_empresa,
    empresa.correo AS correo_empresa,
    empresa.web,

    representante.nombre AS nombre_representante,
    representante.dni AS dni_representante,
    representante.cargo AS cargo_representante,
    representante.telefono AS telefono_representante,
    representante.correo AS correo_representante,

    lugar.Comunidad,
    lugar.Localidad,
    lugar.provincia,
    lugar.`Codigo postal`,
    lugar.direccion,

    tutor.nombre AS nombre_tutor,
    tutor.Apellidos AS apellidos_tutor,
    tutor.dni AS dni_tutor,
    tutor.puesto,
    tutor.correo AS correo_tutor,
    tutor.telefono AS telefono_tutor,

    ciclo.familia,
    ciclo.curso,
    ciclo.ciclo AS nombre_ciclo

FROM empresa

LEFT JOIN representante ON empresa.Representante_dni = representante.dni
LEFT JOIN lugar ON lugar.empresa_cif = empresa.cif AND lugar.empresa_Representante_dni = empresa.Representante_dni
LEFT JOIN tutor ON tutor.empresa_cif = empresa.cif AND tutor.empresa_Representante_dni = empresa.Representante_dni
LEFT JOIN ciclo ON tutor.ciclo_id = ciclo.id
";

$resultado = $conn->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>
        <th>Empresa</th><th>CIF</th><th>Plazas</th><th>Teléfono Empresa</th><th>Correo Empresa</th><th>Web</th>
        <th>Representante</th><th>DNI Representante</th><th>Cargo</th><th>Tel. Representante</th><th>Correo Representante</th>
        <th>Comunidad</th><th>Localidad</th><th>Provincia</th><th>CP</th><th>Dirección</th>
        <th>Tutor</th><th>Apellidos Tutor</th><th>DNI Tutor</th><th>Puesto</th><th>Correo Tutor</th><th>Tel. Tutor</th>
        <th>Familia Ciclo</th><th>Curso</th><th>Ciclo</th>
    </tr>";

    while($fila = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>{$fila['nombre_empresa']}</td>";
        echo "<td>{$fila['cif']}</td>";
        echo "<td>{$fila['plazas']}</td>";
        echo "<td>{$fila['telefono_empresa']}</td>";
        echo "<td>{$fila['correo_empresa']}</td>";
        echo "<td>{$fila['web']}</td>";
        echo "<td>{$fila['nombre_representante']}</td>";
        echo "<td>{$fila['dni_representante']}</td>";
        echo "<td>{$fila['cargo_representante']}</td>";
        echo "<td>{$fila['telefono_representante']}</td>";
        echo "<td>{$fila['correo_representante']}</td>";
        echo "<td>{$fila['Comunidad']}</td>";
        echo "<td>{$fila['Localidad']}</td>";
        echo "<td>{$fila['provincia']}</td>";
        echo "<td>{$fila['Codigo postal']}</td>";
        echo "<td>{$fila['direccion']}</td>";
        echo "<td>{$fila['nombre_tutor']}</td>";
        echo "<td>{$fila['apellidos_tutor']}</td>";
        echo "<td>{$fila['dni_tutor']}</td>";
        echo "<td>{$fila['puesto']}</td>";
        echo "<td>{$fila['correo_tutor']}</td>";
        echo "<td>{$fila['telefono_tutor']}</td>";
        echo "<td>{$fila['familia']}</td>";
        echo "<td>{$fila['curso']}</td>";
        echo "<td>{$fila['nombre_ciclo']}</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "No hay datos.";
}

$conn->close();
?>
