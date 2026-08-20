<?php
require_once 'ProductosPorFactura.php';

class CtrProductosPorFactura {
    private PDO $conexion;

    public function __construct(PDO $conexion) {
        $this->conexion = $conexion;
    }

    public function agregarProductoAFactura(int $numeroFactura, string $codigoProducto, ProductosPorFactura $detalle): bool {
        $sql = "INSERT INTO productos_por_factura (numero_factura, codigo_producto, cantidad, subtotal) 
                VALUES (:numero_factura, :codigo_producto, :cantidad, :subtotal)";
        $stmt = $this->conexion->prepare($sql);

        return $stmt->execute([
            ':numero_factura'  => $numeroFactura,
            ':codigo_producto' => $codigoProducto,
            ':cantidad'        => $detalle->getCantidad(), // int
            ':subtotal'        => $detalle->getSubtotal()  // float
        ]);
    }

    // Método para listar todos los productos de una factura específica
    public function listarPorFactura(int $numeroFactura): array {
        $sql = "SELECT * FROM productos_por_factura WHERE numero_factura = :numero";
        $stmt = $this->conexion->prepare($sql);
        $stmt->execute([':numero' => $numeroFactura]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>