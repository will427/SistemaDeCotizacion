<?php
session_start();
header('Content-Type: application/json');

require_once '../classes/Quote.class.php';
require_once '../classes/Service.class.php';

$_GET['onlyData'] = true;
require_once '../pages/services-catalog.php';

$id = (int)($_POST['id'] ?? 0);

if ($id <= 0) {

    echo json_encode([
        "error" => "ID inválido"
    ]);
    exit;
}

// buscar servicio
$found = null;

foreach ($services as $s) {

    if ($s->getId() == $id) {

        $found = $s;
        break;

    }

}

if (!$found) {

    echo json_encode([
        "error" => "Servicio no encontrado"
    ]);
    exit;

}

// crear quote desde sesión
$quote = new Quote();

// agregar item
$quote->agregarItem($found);

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