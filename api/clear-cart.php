<?php
session_start();
header('Content-Type: application/json');

unset($_SESSION['quote']);

echo json_encode([
    "success" => true
]);