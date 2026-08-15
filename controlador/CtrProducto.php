<?php

/**
 * Requerimos el modelo Producto que creamos anteriormente
 * */
require_once 'Producto.php';

class CtrProducto {

    /**
     * Conexión a la base de datos mediante PDO
     * */
    private PDO $conexion;

    /**
     * Constructor que recibe la conexión a la base de datos (Inyección de dependencias)
     */
    public function __construct(PDO $conexion) {
        $this->conexion = $conexion;
    }

    /**
     * C - CREATE (Crear)
    */
    public function crear(Producto $producto): bool {
        try {
            $sql = "INSERT INTO productos (codigo, nombre, stock, valorUnitario) VALUES (:codigo, :nombre, :stock, :valorUnitario)";
            $stmt = $this->conexion->prepare($sql);

            return $stmt->execute([
                ':codigo'        => $producto->getCodigo(),
                ':nombre'        => $producto->getNombre(),
                ':stock'         => $producto->getStock(),
                ':valorUnitario' => $producto->getValorUnitario()
            ]);
        } catch (PDOException $e) {
            error_log("Error al crear producto: " . $e->getMessage());
            return false;
        }
    }

    /**
     * R - READ (Leer un solo producto por código)
     */
    public function leer(string $codigo): ?Producto {
        try {
            $sql = "SELECT * FROM productos WHERE codigo = :codigo LIMIT 1";
            $stmt = $this->conexion->prepare($sql);
            $stmt->execute([':codigo' => $codigo]);

            $fila = $stmt->fetch(PDO::FETCH_ASSOC);

            /**
             * Si encuentra el producto, retorna una instancia del modelo Producto
             */
            if ($fila) {
                return new Producto(
                    $fila['codigo'],
                    $fila['nombre'],
                    $fila['stock'],
                    $fila['valorUnitario']
                );
            }
        } catch (PDOException $e) {
            error_log("Error al leer producto: " . $e->getMessage());
        }
        /**
         * Retorna null si no lo encuentra o hay error
         */
        return null;
    }

    /**
     * U - UPDATE (Actualizar)
     */
    public function actualizar(Producto $producto): bool {
        try {
            $sql = "UPDATE productos SET nombre = :nombre, stock = :stock, valorUnitario = :valorUnitario WHERE codigo = :codigo";
            $stmt = $this->conexion->prepare($sql);

            return $stmt->execute([
                ':codigo'        => $producto->getCodigo(),
                ':nombre'        => $producto->getNombre(),
                ':stock'         => $producto->getStock(),
                ':valorUnitario' => $producto->getValorUnitario()
            ]);
        } catch (PDOException $e) {
            error_log("Error al actualizar producto: " . $e->getMessage());
            return false;
        }
    }

    /**
     * D - DELETE (Eliminar)
    */
    public function eliminar(string $codigo): bool {
        try {
            $sql = "DELETE FROM productos WHERE codigo = :codigo";
            $stmt = $this->conexion->prepare($sql);

            return $stmt->execute([':codigo' => $codigo]);
        } catch (PDOException $e) {
            error_log("Error al eliminar producto: " . $e->getMessage());
            return false;
        }
    }

    /**
     * LISTAR (Obtener todos los productos)
     */
    public function listar(): array {
        $listaProductos = [];
        try {
            $sql = "SELECT * FROM productos";
            $stmt = $this->conexion->query($sql);

            while ($fila = $stmt->fetch(PDO::FETCH_ASSOC)) {
                /**
                 * llenamos el arreglo con objetos de la clase Producto
                 */
                $listaProductos[] = new Producto(
                    $fila['codigo'],
                    $fila['nombre'],
                    $fila['stock'],
                    $fila['valorUnitario']
                );
            }
        } catch (PDOException $e) {
            error_log("Error al listar productos: " . $e->getMessage());
        }
        return $listaProductos;
    }
}

?>