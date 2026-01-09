<?php
session_start();

$data = json_decode(file_get_contents('php://input'), true);
$products = $data['products'];
$folioVenta = uniqid();
$totalVenta = array_reduce($products, function($sum, $product) {
    return $sum + $product['total'];
}, 0);
$idUsuario = $_SESSION['Iduser'];

$conn = new mysqli('localhost', 'id22216022_rojo', '123456Rr.', 'id22216022_puntov');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$conn->begin_transaction();

try {
    foreach ($products as $product) {
        // Consulta para verificar si hay suficiente stock
        $stmtCheckStock = $conn->prepare("SELECT stockAct FROM producto WHERE clvProd = ?");
        $stmtCheckStock->bind_param("s", $product['codigo']);
        $stmtCheckStock->execute();
        $stmtCheckStock->bind_result($stock);
        $stmtCheckStock->fetch();
        $stmtCheckStock->close();

        if ($stock < $product['cantidad']) {
            // Si no hay suficiente stock, detener la venta y mostrar un mensaje de alerta
            echo json_encode(['success' => false, 'error' => 'Stock insuficiente para el producto ' . $product['codigo']]);
            $conn->rollback();
            exit(); // Salir del script
        }
    }

    $sqlVenta = "INSERT INTO venta (folioVenta, fechaVenta, totalVenta, idusuario) VALUES (?, NOW(), ?, ?)";
    $stmtVenta = $conn->prepare($sqlVenta);
    $stmtVenta->bind_param("sdi", $folioVenta, $totalVenta, $idUsuario);
    $stmtVenta->execute();

    $sqlDetalleVenta = "INSERT INTO detalleventa (precioVent, cantidadVent, folioVenta, clvProd) VALUES (?, ?, ?, ?)";
    $stmtDetalleVenta = $conn->prepare($sqlDetalleVenta);

    $sqlUpdateStock = "UPDATE producto SET stockAct = stockAct - ? WHERE clvProd = ?";
    $stmtUpdateStock = $conn->prepare($sqlUpdateStock);

    foreach ($products as $product) {
        $stmtDetalleVenta->bind_param("disi", $product['precio'], $product['cantidad'], $folioVenta, $product['codigo']);
        $stmtDetalleVenta->execute();

        $stmtUpdateStock->bind_param("is", $product['cantidad'], $product['codigo']);
        $stmtUpdateStock->execute();
    }

    $conn->commit();
    echo json_encode(['success' => true]);
} catch (Exception $e) {
    $conn->rollback();
    echo json_encode(['success' => false, 'error' => $e->getMessage()]);
}

$stmtVenta->close();
$stmtDetalleVenta->close();
$stmtUpdateStock->close();
$conn->close();
?>

