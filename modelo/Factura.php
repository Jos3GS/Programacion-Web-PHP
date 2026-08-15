<?php

class Factura{
    /**
     * Atributos
     */
    private datetime $fecha;
    private int $numero;
    private float $total;

    /**
     * Constructor de la clase
     * @param datetime $fecha
     * @param int $numero
     * @param int $total
     */
    public function __construct(datetime $fecha, int $numero, int $total){
        $this->setFecha($fecha);
        $this->setNumero($numero);
        $this->setTotal($total);
    }

    /**
     * GETTERS
     */
    public function getFecha(): datetime{
        return $this->fecha;
    }
    public function getNumero(): int{
        return $this->numero;
    }
    public function getTotal(): float{
        return $this->total;
    }

    /**
     * SETTERS
     */
    public function setFecha(datetime $fecha): void{
        $this->fecha = $fecha;
    }
    public function setNumero(int $numero): void{
        if(!empty($numero)){
            $this->numero = $numero;
        }else{
            return;
        }
    }
    public function setTotal(float $total): void{
        if(!empty($total)){
            $this->total = $total;
        }else{
            return;
        }
    }
}
?>