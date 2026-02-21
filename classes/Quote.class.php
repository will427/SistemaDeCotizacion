<?php

class Quote
{
    private $items;
    private $subtotal;
    private $descuento;
    private $iva;
    private $total;

    public function __construct()
    {
        if (isset($_SESSION['quote']) && is_array($_SESSION['quote'])) {
            $this->items = $_SESSION['quote'];
        } else {
            $this->items = [];
        }
    }

    // agregar servicio
    public function agregarItem($service)
    {
        $id = $service->getId();

        if (isset($this->items[$id])) {

            if ($this->items[$id]['cantidad'] < 10) {
                $this->items[$id]['cantidad']++;
            }

        } else {

            $this->items[$id] = [
                "id" => $service->getId(),
                "nombre" => $service->getTitle(),
                "precio" => $service->getPrice(),
                "cantidad" => 1
            ];

        }

        $this->guardar();
    }

    // actualizar cantidad
    public function actualizarCantidad($id, $cantidad)
    {
        if (isset($this->items[$id])) {

            $cantidad = max(1, min(10, (int)$cantidad));

            $this->items[$id]['cantidad'] = $cantidad;

        }

        $this->guardar();
    }

    // obtener items
    public function getItems()
    {
        return $this->items;
    }

    // calcular subtotal
    private function calcularSubtotal()
    {
        $this->subtotal = 0;

        foreach ($this->items as $item) {
            $this->subtotal += $item['precio'] * $item['cantidad'];
        }

        return $this->subtotal;
    }

    // calcular descuento (OPCIÓN A)
    private function calcularDescuento()
    {
        $subtotal = $this->calcularSubtotal();

        if ($subtotal >= 2500) {
            $this->descuento = $subtotal * 0.15;
        }
        elseif ($subtotal >= 1000) {
            $this->descuento = $subtotal * 0.10;
        }
        elseif ($subtotal >= 500) {
            $this->descuento = $subtotal * 0.05;
        }
        else {
            $this->descuento = 0;
        }

        return $this->descuento;
      error_log("SUBTOTAL: " . $subtotal);
error_log("DESCUENTO: " . $this->descuento);
    }

    // calcular IVA (después del descuento)
    private function calcularIVA()
    {
        $base = $this->calcularSubtotal() - $this->calcularDescuento();

        $this->iva = $base * 0.13;

        return $this->iva;
    }

    // calcular total
    private function calcularTotal()
    {
        $base = $this->calcularSubtotal() - $this->calcularDescuento();

        $this->total = $base + $this->calcularIVA();

        return $this->total;
    }

    // generar cotización completa
    public function generar()
    {
        return [
            "items" => $this->items,
            "subtotal" => $this->calcularSubtotal(),
            "descuento" => $this->calcularDescuento(),
            "iva" => $this->calcularIVA(),
            "total" => $this->calcularTotal()
        ];
    }

    // guardar sesión
    private function guardar()
    {
        $_SESSION['quote'] = $this->items;
    }
}