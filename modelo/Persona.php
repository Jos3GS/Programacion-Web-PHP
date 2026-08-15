<?php

class Persona{
    /**
     *  Atributos
     */
    private string $codigo;
    private string $email;
    private string $nombre;
    private string $telefono;

    /**
     * Constructor de clase
     * @param string $codigo Código de la Persona
     * @param string $email Correo Electronico
     * @param string $nombre Nombre de la persona
     * @param string $telefono Telefono de la persona
     */
    public function __construct(string $codigo, string $email, string $nombre, string $telefono){
        $this->setCodigo($codigo);
        $this->setEmail($email);
        $this->setNombre($nombre);
        $this->setTelefono($telefono);
    }

    /**
     * GETTERS
     */
    public function getCodigo(): string{
        return $this->codigo;
    }
    public function getEmail(): string{
        return $this->email;
    }
    public function getNombre(): string{
        return $this->nombre;
    }
    public function getTelefono(): string{
        return $this->telefono;
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
    public function setEmail(string $email): void{
        if(!empty($email)){
            $this->email = $email;
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
    public function setTelefono(string $telefono): void{
        if(!empty($telefono)){
            $this->telefono = $telefono;
        }else{
            return;
        }
    }


}
?>