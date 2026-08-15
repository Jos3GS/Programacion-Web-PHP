<?php
class Empresa{
    /**
     * Atributos
     */
    private string $codigo;
    private string $nombre;

    /**
     * constructor de la clase
     * @param string $codigo
     * @param string $nombre
     */
    public function __construct(string $codigo, string $nombre){
        $this->setCodigo($codigo);
        $this->setNombre($nombre);
    }
    /**
     *  GETTERS
     */
    public function getCodigo(): string{
        return $this->codigo;
    }
    public function getNombre(): string{
        return $this->nombre;
    }
    /**
     * SETTERS
     */
    public function setCodigo(string $codigo): void{
        if(!empty($codigo)){
            $this->codigo = $codigo;
        }else{
            return;
        }
    }
    public function setNombre(string $nombre): void{
        if(!empty($nombre)){
            $this->nombre = $nombre;
        }else{
            return;
        }
    }
}
?>