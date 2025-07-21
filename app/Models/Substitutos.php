<?php

namespace App\Models;

class Substitutos extends DB {

    private object $conn;

    public function __construct() {
        $this->conn = $this->conectar();
    }

    public function index() {
        $sql = "SELECT 
                    s.*, 
                    f1.nome AS nome_faltou,
                    f2.nome AS nome_substituto,
                    l.locacao AS nome_locacao
                FROM cad_subs s
                LEFT JOIN cad_funcionarios f1 ON s.id_funcionario_falta = f1.id_funcionario
                LEFT JOIN cad_funcionarios f2 ON s.id_funcionario_substituto = f2.id_funcionario
                LEFT JOIN dados_profissionais dp ON dp.id_funcionario = f1.id_funcionario AND dp.ativo = 1
                LEFT JOIN cad_locacoes l ON dp.id_locacao = l.id_locacao
                WHERE s.ativo = 1
                ORDER BY s.id_substituto DESC";

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


    public function adicionar(array $dados){
        $id_funcionario_falta = $dados['id_funcionario_falta'];
        $id_funcionario_substituto = $dados['id_funcionario_substituto'];
        $custo_sub = $dados['custo_sub'];
        $data = $dados['data'];
        $id_locacao = $dados['id_locacao'];
        $ativo = $dados['ativo'];

        $sql = "INSERT INTO cad_subs
            (id_funcionario_falta, id_funcionario_substituto, custo_sub, data, id_locacao, ativo)
            VALUES
            ('$id_funcionario_falta', '$id_funcionario_substituto', '$custo_sub', '$data', '$id_locacao', '$ativo')";

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
        $sql = "SELECT * FROM cad_subs WHERE id_substituto = $id";
        $res = $this->conn->query($sql);

        if ($res && $res->num_rows > 0) {
            return $res->fetch_assoc();
        }
        return 0;
    }

    public function listar_funcionarios() {
        $sql = "SELECT id_funcionario, nome FROM cad_funcionarios WHERE ativo = 1 ORDER BY nome ASC";
        $res = $this->conn->query($sql);

        if ($res && $res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $obj[] = $row;
            }
            return $obj;
        }
        return 0;
    }

    public function listar_locacoes() {
        $sql = "SELECT id_locacao, locacao FROM cad_locacoes WHERE ativo = 1 ORDER BY locacao ASC";
        $res = $this->conn->query($sql);

        if ($res && $res->num_rows > 0) {
            while ($row = $res->fetch_assoc()) {
                $obj[] = $row;
            }
            return $obj;
        }
        return 0;
    }


    public function editar(array $dados){
        $sql = "UPDATE cad_subs SET
            id_funcionario_falta = '{$dados['id_funcionario_falta']}',
            id_funcionario_substituto = '{$dados['id_funcionario_substituto']}',
            custo_sub = '{$dados['custo_sub']}',
            data = '{$dados['data']}',
            id_locacao = '{$dados['id_locacao']}',
            ativo = '{$dados['ativo']}'
            WHERE id_substituto = {$dados['id_substituto']}";

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
        $sql = "UPDATE cad_subs SET ativo = 0 WHERE id_substituto = $idExcluir";
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
