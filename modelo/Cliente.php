<?php

class Cliente extends Persona {

    /**
     * Atributos
     */
    private float $credito;

    /**
     * @param string $codigo
     * @param string $email
     * @param string $nombre
     * @param string $telefono
     * @param float $credito
     */
    public function __construct(string $codigo, string $email, string $nombre, string $telefono, float $credito)
    {
        parent::__construct($codigo, $email, $nombre, $telefono);
        $this->setCredito($credito);
    }
    /**
     * GETTER
     */
    public function getCredito(): float{
        return $this->credito;
    }
    /**
     * SETTER
     */
    public function setCredito(float $credito): void{
        if(!empty($credito)){
            $this->credito = $credito;
        }else{
            return;
        }
    }


}
?>