<?php
require_once 'Persona.php';

class CtrPersona {
    protected PDO $conexion;

    public function __construct(PDO $conexion) {
        $this->conexion = $conexion;
    }

    public function crearPersona(Persona $persona): bool {
        $sql = "INSERT INTO personas (codigo, email, nombre, telefono) VALUES (:codigo, :email, :nombre, :telefono)";
        $stmt = $this->conexion->prepare($sql);
        return $stmt->execute([
            ':codigo'   => $persona->getCodigo(),
            ':email'    => $persona->getEmail(),
            ':nombre'   => $persona->getNombre(),
            ':telefono' => $persona->getTelefono()
        ]);
    }

    // Métodos leerPersona(), actualizarPersona(), eliminarPersona()...
}
?>