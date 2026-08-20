<?php
require_once 'CtrPersona.php';
require_once 'Cliente.php';

class CtrCliente extends CtrPersona {

    public function __construct(PDO $conexion) {
        // Llamamos al constructor del padre para inicializar la conexión
        parent::__construct($conexion);
    }

    public function crearCliente(Cliente $cliente): bool {
        // 1. Primero creamos el registro base en la tabla personas (usando el método del padre)
        $creadoBase = $this->crearPersona($cliente);

        if ($creadoBase) {
            // 2. Luego guardamos los datos específicos del cliente (el crédito)
            $sql = "INSERT INTO clientes (codigo_persona, credito) VALUES (:codigo, :credito)";
            $stmt = $this->conexion->prepare($sql);
            return $stmt->execute([
                ':codigo'  => $cliente->getCodigo(),
                ':credito' => $cliente->getCredito() // float
            ]);
        }
        return false;
    }
}
?>
