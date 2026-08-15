<?php

class ProductosPorFactura{
    /**
     * Atributos
     */
    private int $cantidad;
    private float $subtotal;

    /**
     * Constructor de la clase
     */
    public function __construct(){
        $this->setCantidad(0);
        $this->setSubtotal(0.0);
    }
    /**
     * GETTERS
     */
    public function getCantidad(): int{
        return $this->cantidad;
    }
    public function getSubtotal(): float{
        return $this->subtotal;
    }

    /**
     * SETTERS
     */
    public function setCantidad(int $cantidad): void{
        if(!empty($cantidad)){
            $this->cantidad = $cantidad;
        }else{
            return;
        }
    }
    public function setSubtotal(float $subtotal): void{
        if(!empty($subtotal)){
            $this->subtotal = $subtotal;
        }else{
            return;
        }
    }
}
?>