<?php
require_once 'Factura.php';

class CtrFactura {
    private PDO $conexion;

    public function __construct(PDO $conexion) {
        $this->conexion = $conexion;
    }

    public function crear(Factura $factura): bool {
        $sql = "INSERT INTO facturas (numero, fecha, total) VALUES (:numero, :fecha, :total)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            ':numero' => $factura->getNumero(),
            ':fecha'  => $factura->getFecha()->format('Y-m-d H:i:s'), // Usamos DateTime como lo vimos antes
            ':total'  => $factura->getTotal() // float
        ]);
    }

    // Aquí irían leer(), actualizar(), eliminar() y listar()
}
?>