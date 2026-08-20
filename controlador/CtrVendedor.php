<?php
require_once 'CtrPersona.php';
require_once 'Vendedor.php';

class CtrVendedor extends CtrPersona {

    public function __construct(PDO $conexion) {
        parent::__construct($conexion);
    }

    public function crearVendedor(Vendedor $vendedor): bool {
        if ($this->crearPersona($vendedor)) {
            $sql = "INSERT INTO vendedores (codigo_persona, carne, direccion) VALUES (:codigo, :carne, :direccion)";
            $stmt = $this->conexion->prepare($sql);
            return $stmt->execute([
                ':codigo'    => $vendedor->getCodigo(),
                ':carne'     => $vendedor->getCarne(), // int
                ':direccion' => $vendedor->getDireccion()
            ]);
        }
        return false;
    }
}
?>