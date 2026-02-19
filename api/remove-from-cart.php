<?php
session_start();
header('Content-Type: application/json');

$id = $_POST['id'] ?? null;

if($id && isset($_SESSION['cart'][$id])){
    unset($_SESSION['cart'][$id]);
}

$subtotal = 0;

if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $item){
        $subtotal += $item['precio'] * $item['cantidad'];
    }
}

$iva = $subtotal * 0.13;
$total = $subtotal + $iva;

echo json_encode([
    'cart' => $_SESSION['cart'] ?? [],
    'subtotal' => $subtotal,
    'iva' => $iva,
    'total' => $total
]);
