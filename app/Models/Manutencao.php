<?php

namespace App\Models;

class Manutencao extends DB {
    private object $conn;

    public function __construct() {
        $this->conn = $this->conectar();
    }

    public function index() {
        $sql = "
            SELECT 
                m.id_manutencao,
                m.id_orcamento,
                m.aprovado,
                m.data,
                v.placa AS placa_veiculo,
                v.modelo AS modelo_veiculo,
                g.nome AS nome_funcionario
            FROM cad_manutencao m
            LEFT JOIN cad_veiculos v ON m.id_veiculo = v.id_veiculo
            LEFT JOIN cad_gestores g ON m.id_funcionario_gestor = g.id_gestor
            ORDER BY m.id_manutencao DESC
        ";

        $query = $this->conn->query($sql);

        if ($query && $query->num_rows > 0) {
            return $query->fetch_all(MYSQLI_ASSOC);
        }

        return 0;
    }


    public function adicionar(array $dados) {
        $id_veiculo            = $dados['id_veiculo'];
        $id_orcamento          = !empty($dados['id_orcamento']) ? $dados['id_orcamento'] : 'NULL';
        $id_funcionario_gestor = $dados['id_funcionario_gestor'];
        $data                  = $dados['data'];
        $aprovado              = $dados['aprovado'] ?? 0;

        $sql = "
            INSERT INTO cad_manutencao (
                id_veiculo,
                id_orcamento,
                id_funcionario_gestor,
                data,
                aprovado
            ) VALUES (
                '$id_veiculo',
                " . ($id_orcamento !== 'NULL' ? "'$id_orcamento'" : "NULL") . ",
                '$id_funcionario_gestor',
                '$data',
                '$aprovado'
            )
        ";

        return $this->conn->query($sql);
    }

    public function excluir($id) {
        $sql = "DELETE FROM cad_manutencao WHERE id_manutencao = $id";
        return $this->conn->query($sql);
    }
}
