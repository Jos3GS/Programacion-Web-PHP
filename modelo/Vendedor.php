<?php

class Vendedor extends Persona{
    /**
     * Atributos
     */
    private int $carnet;
    private string $direccion;

    /**
     * Constructor de la clase
     * @param string $codigo
     * @param string $email
     * @param string $nombre
     * @param string $telefono
     * @param int $carnet
     * @param string $direccion
     */
    public function __construct(string $codigo, string $email, string $nombre, string $telefono, int $carnet, string $direccion)
    {
        parent::__construct($codigo, $email, $nombre, $telefono);
        $this->setCarnet($carnet);
        $this->setDireccion($direccion);
    }

    /**
     * GETTERS
     */
    public function getCarnet(): int{
        return $this->carnet;
    }
    public function getDireccion(): string{
        return $this->direccion;
    }
    /**
     * SETTERS
     */
    public function setCarnet(int $carnet): void
    {
        if(!empty($carnet)){
            $this->carnet = $carnet;
        }else{
            return;
        }
    }
    public function setDireccion(string $direccion): void
    {
        if(!empty($direccion)){
            $this->direccion = $direccion;
        }else{
            return;
        }
    }
}
?>