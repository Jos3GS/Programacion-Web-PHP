<?php
require_once 'Empresa.php';

class CtrEmpresa {
    private PDO $conexion;

    public function __construct(PDO $conexion) {
        $this->conexion = $conexion;
    }

    public function crear(Empresa $empresa): bool {
        $sql = "INSERT INTO empresas (codigo, nombre) VALUES (:codigo, :nombre)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            ':codigo' => $empresa->getCodigo(),
            ':nombre' => $empresa->getNombre()
        ]);
    }

    // Aquí irían leer(), actualizar(), eliminar() y listar()
}
?>