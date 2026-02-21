<?php
session_start();
header('Content-Type: application/json');

require_once '../classes/Quote.class.php';

$id = (int)($_POST['id'] ?? 0);

if ($id <= 0) {

    echo json_encode([
        "error" => "ID inválido"
    ]);
    exit;
}

// crear quote desde sesión
$quote = new Quote();

// obtener items actuales
$items = $quote->getItems();

// eliminar solo ese item
if (isset($items[$id])) {

    unset($items[$id]);

    // guardar cambios en sesión
    $_SESSION['quote'] = $items;

}

// generar nuevos totales
$quote = new Quote();
$resultado = $quote->generar();

// retornar JSON
echo json_encode([
    "cart" => $resultado["items"],
    "subtotal" => $resultado["subtotal"],
    "iva" => $resultado["iva"],
    "total" => $resultado["total"]
]);
