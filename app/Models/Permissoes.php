<?php
namespace App\Models;

class Permissoes extends DB {

    private object $conn;

    public function __construct() {
        $this->conn = $this->conectar();
    }

    public function index() {
        $sql = "SELECT * FROM permissoes WHERE ativo = 1 ORDER BY nome_permissao ASC";
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

    public function adicionar($dados) {
        $nome_permissao = $dados['nome_permissao'];
        $descricao = $dados['descricao'];

        $sql = "INSERT INTO permissoes (nome_permissao, descricao)
                VALUES (
                    '" . $this->conn->real_escape_string($nome_permissao) . "',
                    '" . $this->conn->real_escape_string($descricao) . "'
                )";

        return $this->conn->query($sql);
    }

}
