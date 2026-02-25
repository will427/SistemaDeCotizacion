<?php
session_start();
header('Content-Type: application/json');

require_once '../classes/Quote.class.php';

$quote = new Quote();
$resultado = $quote->generar();

// contar items (suma de cantidades)
$itemsCount = 0;
foreach ($resultado['items'] as $item) {
    $itemsCount += $item['cantidad'];
}

echo json_encode([
    "cart" => $resultado["items"],
    "subtotal" => $resultado["subtotal"],
    "descuento" => $resultado["descuento"],
    "iva" => $resultado["iva"],
    "total" => $resultado["total"],
    "items" => $itemsCount
]);
