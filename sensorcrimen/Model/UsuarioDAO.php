<?php

/**
 * Description of UsuarioDAO
 *
 * @author Ram
 */
include_once './Conexion.php';

class UsuarioDAO {

    private $con;
    private $select = "Select * from usuario where id=";

    private function conectar() {
        $conexion = new Conexion();
        $this->con = $conexion->getConexion();
    }

    private function desconectar() {
        $this->con->close();
    }

    function select($id) {
        $this->conectar();
        $sql = $this->select . $id;
        $this->desconectar();
        $result = $this->con->query($sql);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $usuario = new Usuario($row["idusuario"], $row["email"], $row["nombre"], $row["genero"], $row["nacimiento"], $row["clave"], $tipoUsuario);
            return $usuario;
        } else {
            return null;
        }
    }

}
