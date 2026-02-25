<?php
session_start();
require_once '../classes/quote.class.php';

header('Content-Type: application/json');

if (!isset($_SESSION['quote']) || empty($_SESSION['quote'])) {
    echo json_encode(["error" => "No hay servicios en la cotización"]);
    exit;
}

$quote = new Quote();
$data = $quote->generar();

// ===== DATOS DEL CLIENTE =====
$nombre = $_POST['nombre'] ?? '';
$empresa = $_POST['empresa'] ?? '';
$email = $_POST['email'] ?? '';
$telefono = $_POST['telefono'] ?? '';

// ===== GENERAR CÓDIGO =====
$year = date("Y");

if (!isset($_SESSION['quote_counter'])) {
    $_SESSION['quote_counter'] = 1;
} else {
    $_SESSION['quote_counter']++;
}

$consecutivo = str_pad($_SESSION['quote_counter'], 4, "0", STR_PAD_LEFT);
$codigo = "COT-$year-$consecutivo";

// ===== FECHAS =====
$fecha_generacion = date("Y-m-d");
$fecha_validez = date("Y-m-d", strtotime("+7 days"));

if (!isset($_SESSION['historial_cotizaciones'])) {
    $_SESSION['historial_cotizaciones'] = [];
}

$_SESSION['historial_cotizaciones'][] = [
    "codigo" => $codigo,
    "cliente" => $nombre,
    "fecha" => $fecha_generacion,
    "total" => number_format($data["total"], 2),
    "cantidad" => count($data["items"])
];

// ===== RESPUESTA =====
echo json_encode([
    "codigo" => $codigo,
    "nombre" => $nombre,
    "empresa" => $empresa,
    "email" => $email,
    "telefono" => $telefono,
    "fecha_generacion" => $fecha_generacion,
    "fecha_validez" => $fecha_validez,
    "items" => $data["items"],
    "subtotal" => number_format($data["subtotal"], 2),
    "descuento" => number_format($data["descuento"], 2),
    "iva" => number_format($data["iva"], 2),
    "total" => number_format($data["total"], 2)
]);
