<?php
class Producto {
    /**
     * Atributos privados según el modelo UML
     */
    private string $codigo;
    private string $nombre;
    private int $stock;
    private float $valorUnitario;
    /**
     * Metodo Constructor (Equivalente a + Producto() en el UML)
     */
    public function __construct(string $codigo, string $nombre, int $stock, float $valorUnitario) {
        $this->setCodigo($codigo);
        $this->setNombre($nombre);
        $this->setStock($stock);
        $this->setValorUnitario($valorUnitario);
    }

    /**
     * GETTERS
     */

    public function getCodigo(): string {
        return $this->codigo;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getStock(): int {
        return $this->stock;
    }

    public function getValorUnitario(): float {
        return $this->valorUnitario;
    }

    /**
     * SETTERS
     */
    public function setCodigo(string $codigo): void {
        if (!empty($codigo)) {
            $this->codigo = $codigo;
        }else{
            return;
        }
    }

    public function setNombre(string $nombre): void {
        if (!empty($nombre)) {
            $this->nombre = $nombre;
        }else{
            return;
        }
    }

    public function setStock(int $stock): void {
        if (!empty($stock)) {
            $this->stock = $stock;
        }else{
            return;
        }
    }

    public function setValorUnitario(float $valorUnitario): void {
        if (!empty($valorUnitario)) {
            $this->valorUnitario = $valorUnitario;
        }else{
            return;
        }
    }
}

?>