<?php

namespace App\Models;

class Locacoes extends DB {

    private object $conn;

    public function __construct() {
        $this->conn = $this->conectar();
    }

    public function index() {
        $sql = "SELECT * FROM cad_locacoes WHERE ativo = 1 ORDER BY id_locacao DESC";
        $query = $this->conn->query($sql);

        if ($query && $query->num_rows > 0) {
            $obj = [];
            while ($row = $query->fetch_assoc()) {
                $obj[] = $row;
            }
            return $obj;
        }

        return 0;
    }

    public function adicionar(array $dados) {
        $locacao = $dados['locacao'];
        $inicio = $dados['inicio_locacao'];
        $fim = !empty($dados['fim_locacao']) ? $dados['fim_locacao'] : null;
        $descricao = $dados['descricao'];
        $ativo = 1;

        $sql = "INSERT INTO cad_locacoes (locacao, inicio_locacao, fim_locacao, descricao, ativo)
                VALUES (
                    '$locacao',
                    '$inicio',
                    " . ($fim ? "'$fim'" : "NULL") . ",
                    '$descricao',
                    '$ativo'
                )";

        $exec = $this->conn->query($sql);

        if ($exec) {
            return true;
        } else {
            echo "Erro ao inserir: " . $this->conn->error;
            echo "<br>SQL: $sql";
            exit;
        }
    }

    public function buscar($id) {
        $sql = "SELECT * FROM cad_locacoes WHERE id_locacao = $id LIMIT 1";
        $res = $this->conn->query($sql);

        if ($res && $res->num_rows > 0) {
            return $res->fetch_assoc();
        }
        return 0;
    }

    public function editar(array $dados) {
        $id = $dados['id_locacao'];
        $locacao = $dados['locacao'];
        $inicio = $dados['inicio_locacao'];
        $fim = !empty($dados['fim_locacao']) ? $dados['fim_locacao'] : null;
        $descricao = $dados['descricao'];

        $sql = "UPDATE cad_locacoes SET
                    locacao = '$locacao',
                    inicio_locacao = '$inicio',
                    fim_locacao = " . ($fim ? "'$fim'" : "NULL") . ",
                    descricao = '$descricao'
                WHERE id_locacao = $id";

        $exec = $this->conn->query($sql);

        if ($exec) {
            return true;
        } else {
            echo "Erro ao editar: " . $this->conn->error;
            echo "<br>SQL: $sql";
            exit;
        }
    }

    public function excluir($idExcluir) {
        $sql = "UPDATE cad_locacoes SET ativo = 0 WHERE id_locacao = $idExcluir";
        $exec = $this->conn->query($sql);

        if ($exec) {
            return true;
        } else {
            echo "Erro ao excluir: " . $this->conn->error;
            echo "<br>SQL: $sql";
            exit;
        }
    }
}
