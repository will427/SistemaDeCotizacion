<?php
session_start();
header('Content-Type: application/json');

if (!isset($_SESSION['cart'])) {
    echo json_encode([
        "cart" => [],
        "subtotal" => 0,
        "iva" => 0,
        "total" => 0
    ]);
    exit;
}

$id  = (int)($_POST['id'] ?? 0);
$qty = (int)($_POST['qty'] ?? 1);

if (isset($_SESSION['cart'][$id])) {
    $_SESSION['cart'][$id]['cantidad'] = max(1, min(10, $qty));
}

$subtotal = 0;
foreach ($_SESSION['cart'] as $item) {
    $subtotal += $item['precio'] * $item['cantidad'];
}

$iva = $subtotal * 0.13;
$total = $subtotal + $iva;

echo json_encode([
    "cart" => $_SESSION['cart'],
    "subtotal" => $subtotal,
    "iva" => $iva,
    "total" => $total
]);
