<?php
$codigo = $_GET['codigo'];

// Conexión a la base de datos
$conn = new mysqli('localhost', 'id22216022_rojo', '123456Rr.', 'id22216022_puntov');

// Verificar la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Preparar la consulta SQL con el filtro de estatus
$sql = "SELECT clvProd, nombreProd, precioAct FROM producto WHERE clvProd = ? AND estatus = 1";
$stmt = $conn->prepare($sql);

// Vincular el parámetro
$stmt->bind_param("s", $codigo);

// Ejecutar la consulta
$stmt->execute();
$result = $stmt->get_result();

// Verificar si hay resultados
if ($result->num_rows > 0) {
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode(null);
}

// Cerrar la declaración y la conexión
$stmt->close();
$conn->close();
?>
