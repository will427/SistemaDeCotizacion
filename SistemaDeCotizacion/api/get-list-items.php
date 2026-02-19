<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
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