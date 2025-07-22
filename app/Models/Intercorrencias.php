<?php

namespace App\Models;

class Intercorrencias extends DB {

    private object $conn;
    private array $dados;

    public function __construct() {
        $this->conn = $this->conectar();
    }

    public function index() {
         $sql = "SELECT 
                i.id_intercorrencia,
                i.id_funcionario,
                i.id_motivo,
                i.data_ocorrencia,
                i.descricao,
                i.gravidade,
                i.gerou_custo,
                i.id_sub,
                ca1.nome AS funcionario_substituido,
                ca2.nome AS funcionario_substituto,
                desc_motivo
            FROM 
                intercorrencias AS i
            INNER JOIN cad_funcionarios AS ca1 ON i.id_funcionario = ca1.id_funcionario
            INNER JOIN cad_funcionarios AS ca2 ON i.id_sub = ca2.id_funcionario
            INNER JOIN cad_motivo ON i.id_motivo = cad_motivo.id_motivo
            WHERE 
                i.ativo = 1";

            $query = $this->conn->query($sql);
                if ($query && $query->num_rows > 0) {
                    return $query->fetch_all(MYSQLI_ASSOC);
                }

                return 0;
    }



    public function buscar($id) {
        $sql = "SELECT * FROM intercorrencias WHERE id_intercorrencia = $id AND ativo = 1";
        $query = $this->conn->query($sql);

            if ($query && $query->num_rows > 0) {
                return $query->fetch_assoc();
        }

            return 0;
    }

    public function adicionar($dados) {
        $id_funcionario = $dados['id_funcionario'];
        $id_motivo = $dados['id_motivo'];
        $data_ocorrencia = $dados['data_ocorrencia'];
        $descricao = $dados['descricao'];
        $gravidade = $dados['gravidade'];
        $gerou_custo = $dados['gerou_custo'];
        $id_sub = $dados['id_sub'];

        $sql = "INSERT INTO intercorrencias (
                    id_funcionario, id_motivo, data_ocorrencia, descricao, gravidade, gerou_custo, id_sub
                ) VALUES (
                    '$id_funcionario', '$id_motivo', '$data_ocorrencia', '$descricao', '$gravidade', '$gerou_custo','$id_sub'
                )";

        return $this->conn->query($sql);
    }

    public function editar($dados) {
        $id_funcionario = $dados['id_funcionario'];
        $id_motivo = $dados['id_motivo'];
        $data_ocorrencia = $dados['data_ocorrencia'];
        $descricao = $dados['descricao'];
        $gravidade = $dados['gravidade'];
        $gerou_custo = $dados['gerou_custo'];
        $id_sub = $dados['id_sub'];
        $id = $dados["id_intercorrencia"];

        $sql = "UPDATE intercorrencias
                SET id_funcionario = '$id_funcionario', id_motivo = '$id_motivo', data_ocorrencia = '$data_ocorrencia', descricao = '$descricao', gravidade = '$gravidade',
                    gerou_custo = '$gerou_custo', id_sub = '$id_sub'
                WHERE id_intercorrencia = $id";

        return $this->conn->query($sql);
    }

    public function excluir($id) {
        $sql = "UPDATE intercorrencias SET ativo = 0 WHERE id_intercorrencia = $id";
        return $this->conn->query($sql);
    }
}
