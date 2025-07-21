<?php

namespace App\Models;

class Modulos extends DB {

    private object $conn;
    private array $dados;

    public function __construct() {
        $this->conn = $this->conectar();
    }

    public function index() {
        $sql = "SELECT * FROM modulos_sys ORDER BY id_modulo DESC";
        $consulta = $this->conn->query($sql);

        if ($consulta && $consulta->num_rows > 0) {
            while ($row = $consulta->fetch_assoc()) {
                $obj[] = $row;
            }
            return $obj;
        } else {
            return 0;
        }
    }

    public function adicionar(array $dados) {
        $nome = $dados['nome_modulo'];
        $descricao = $dados['descricao'];
        
        $sql = "INSERT INTO modulos_sys (nome_modulo, descricao) 
                VALUES ('" . $this->conn->real_escape_string($nome) . "',
                        '" . $this->conn->real_escape_string($descricao) . "')";
                        
        $ret = $this->conn->query($sql);

        if ($ret) {
            return true;
        } else {
            echo "Erro ao adicionar: " . $this->conn->error;
            echo "<br>SQL: $sql";
            exit;
        }
    }


    public function liberar($id) {
        $sql = "UPDATE modulos_sys SET ativo = 1 WHERE id_modulo = $id";
        
        $ret = $this->conn->query($sql);

        if ($ret) {
            return true;
        } else {
            echo "Erro ao liberar: " . $this->conn->error;
            echo "<br>SQL: $sql";
            exit;
        }
    }

    public function excluir($id) {
        $sql = "DELETE FROM modulos_sys WHERE id_modulo = $id";
        $ret = $this->conn->query($sql);
        
        if ($ret) {
            return true;
        } else {
            echo "Erro ao excluir: " . $this->conn->error;
            echo "<br>SQL: $sql";
            exit;
        }
    }
}
