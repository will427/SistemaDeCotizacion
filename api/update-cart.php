<?php
session_start();
header('Content-Type: application/json');

require_once '../classes/Quote.class.php';

$id  = (int)($_POST['id'] ?? 0);
$qty = (int)($_POST['qty'] ?? 1);

if ($id <= 0) {

    echo json_encode([
        "error" => "ID inválido"
    ]);
    exit;

}

// crear quote desde sesión
$quote = new Quote();

// actualizar cantidad
$quote->actualizarCantidad($id, $qty);

// generar totales
$resultado = $quote->generar();

// retornar JSON
echo json_encode([
    "cart" => $resultado["items"],
    "subtotal" => $resultado["subtotal"],
    "descuento" => $resultado["descuento"],
    "iva" => $resultado["iva"],
    "total" => $resultado["total"]
]);