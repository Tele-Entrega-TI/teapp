<?php

namespace App\Models;

class Movimentacao extends DB {

    private object $conn;

    public function __construct() {
        $this->conn = $this->conectar();
    }

    public function index() {
        $sql = "SELECT 
                    m.*, 
                    v.placa, 
                    v.modelo, 
                    f.apelido AS nome_funcionario
                FROM mvo_veiculos m
                LEFT JOIN cad_veiculos v ON m.id_veiculo = v.id_veiculo
                LEFT JOIN dados_profissionais dp ON m.id_funcionario = dp.id_funcionario
                LEFT JOIN cad_funcionarios f ON dp.id_funcionario = f.id_funcionario
                ORDER BY m.id_mvo DESC";

        $query = $this->conn->query($sql);

        if ($query && $query->num_rows > 0) {
            return $query->fetch_all(MYSQLI_ASSOC);
        }

        return 0;
    }

    public function listar_veiculos() {
        $sql = "SELECT * FROM cad_veiculos WHERE ativo = 1 ORDER BY placa ASC";
        $query = $this->conn->query($sql);

        if ($query && $query->num_rows > 0) {
            return $query->fetch_all(MYSQLI_ASSOC);
        }

        return [];
    }

    public function listar_funcionarios() {
        $sql = "SELECT 
                    dp.id_funcionario, 
                    f.apelido AS nome 
                FROM dados_profissionais dp
                LEFT JOIN cad_cargos c ON dp.id_cargo = c.id_cargo
                LEFT JOIN cad_funcionarios f ON dp.id_funcionario = f.id_funcionario
                WHERE c.nome IN ('Motorista', 'Motoboy') 
                  AND dp.ativo = 1
                ORDER BY f.apelido";

        $query = $this->conn->query($sql);

        if ($query && $query->num_rows > 0) {
            return $query->fetch_all(MYSQLI_ASSOC);
        }

        return [];
    }



    public function adicionar(array $dados) {
        $id_veiculo = $dados['id_veiculo'];
        $id_funcionario = $dados['id_funcionario'];
        $data_entrega = $dados['data_entrega'];
        $doc_moto = $dados['doc_moto'];
        $valor_aluguel = $dados['valor_aluguel'];
        $parcelas = $dados['parcelas'];
        $contrato_assinado = $dados['contrato_assinado'];

        $sql = "UPDATE mvo_veiculos 
                                 SET ativo = 0, data_situacao = NOW() 
                                 WHERE id_veiculo = '$id_veiculo' AND ativo = 1";
        $this->conn->query($sql);

        $sql = "UPDATE mvo_veiculos 
        SET ativo = 0, data_situacao = NOW() 
        WHERE id_funcionario = '$id_funcionario' AND ativo = 1";

        $this->conn->query($sql);

        $sql = "INSERT INTO mvo_veiculos (
                    id_veiculo, id_funcionario, data_entrega,
                    doc_moto, valor_aluguel, parcelas,
                    contrato_assinado, ativo
                ) VALUES (
                    '$id_veiculo', '$id_funcionario', '$data_entrega',
                    '$doc_moto', '$valor_aluguel', '$parcelas',
                    '$contrato_assinado', 1
                )";

        $query = $this->conn->query($sql);

        if ($query) {
            return 1;
        }

        return 0;
    }

    public function buscar($id) {
        $sql = "SELECT * FROM mvo_veiculos WHERE id_mvo = '$id' LIMIT 1";
        $query = $this->conn->query($sql);

        if ($query && $query->num_rows > 0) {
            return $query->fetch_assoc();
        }

        return 0;
    }

    public function finalizar($id_veiculo) {
        $sql = "UPDATE mvo_veiculos 
                SET ativo = 0, data_situacao = NOW() 
                WHERE id_veiculo = '$id_veiculo' AND ativo = 1";

        $query = $this->conn->query($sql);
        return $query ? 1 : 0;
    }
}
