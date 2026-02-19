<?php
session_start();
header('Content-Type: application/json');

$_GET['onlyData'] = true;
require_once '../pages/services-catalog.php';

$id = intval($_POST['id'] ?? 0);

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$found = null;
foreach ($services as $s) {
    if ($s->getId() == $id) {
        $found = $s;
        break;
    }
}

if (!$found) {
    echo json_encode(['error' => 'No existe servicio']);
    exit;
}

if (!isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id] = [
        'id' => $found->getId(),
        'nombre' => $found->getTitle(),
        'precio' => $found->getPrice(),
        'cantidad' => 1
    ];
} else {
    if ($_SESSION['cart'][$id]['cantidad'] < 10) {
        $_SESSION['cart'][$id]['cantidad']++;
    }
}

$subtotal = 0;
$items = 0;

foreach ($_SESSION['cart'] as $item) {
    $subtotal += $item['precio'] * $item['cantidad'];
    $items += $item['cantidad'];
}

$iva = $subtotal * 0.13;
$total = $subtotal + $iva;

echo json_encode([
    'cart' => $_SESSION['cart'],
    'subtotal' => $subtotal,
    'iva' => $iva,
    'total' => $total,
    'items' => $items
]);