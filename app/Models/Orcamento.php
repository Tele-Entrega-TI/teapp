<?php

namespace App\Models;

class Orcamento extends DB {
    private object $conn;
    private array $dados;

    public function __construct() {

        $this->conn = $this->conectar();
    }

    public function index() {

        $sql = "
            SELECT 
            o.id_orcamento,
            o.status_aprovado,
            o.data_cotacao,
            o.data_aprovacao,
            o.data_conclusao,
            f.nome    AS nome_oficina,
            v.placa   AS placa_veiculo,
            v.modelo  AS modelo_veiculo
            FROM cad_orcamento o
            LEFT JOIN cad_oficinas f ON o.id_oficina = f.id_oficina
            LEFT JOIN cad_veiculos  v ON o.id_veiculo  = v.id_veiculo
            WHERE o.ativo = 1
            ORDER BY o.id_orcamento DESC
        ";

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

    public function buscar(int $id) {

        $sql = "
            SELECT 
            o.id_orcamento,
            o.id_oficina,
            o.id_veiculo,
            o.status_aprovado,
            o.data_cotacao,
            o.data_aprovacao,
            o.data_conclusao,
            f.nome    AS nome_oficina,
            v.placa   AS placa_veiculo,
            v.modelo  AS modelo_veiculo
            FROM cad_orcamento o
            LEFT JOIN cad_oficinas f ON o.id_oficina = f.id_oficina
            LEFT JOIN cad_veiculos  v ON o.id_veiculo  = v.id_veiculo
            WHERE o.ativo = 1
              AND o.id_orcamento = {$id}
            LIMIT 1
        ";

        $query = $this->conn->query($sql);

        if ($query && $query->num_rows === 1) {
            return $query->fetch_assoc();
        }

        return 0;
    }

    public function listar_com_placa() {
        $sql = "
            SELECT 
                o.id_orcamento,
                o.data_cotacao,
                v.placa
            FROM cad_orcamento o
            LEFT JOIN cad_veiculos v ON o.id_veiculo = v.id_veiculo
            WHERE o.ativo = 1
            ORDER BY o.id_orcamento DESC
        ";

        $query = $this->conn->query($sql);

        if ($query && $query->num_rows > 0) {
            return $query->fetch_all(MYSQLI_ASSOC);
        }

        return [];
    }

    public function buscar_veiculo_por_orcamento($id_orcamento) {
        $sql = "SELECT id_veiculo FROM cad_orcamento WHERE id_orcamento = $id_orcamento";
        $query = $this->conn->query($sql);

        if ($query && $query->num_rows > 0) {
            $row = $query->fetch_assoc();
            return $row['id_veiculo'];
        }
        return 0;
    }


    public function adicionar(array $dados) {

        $id_oficina     = $dados['id_oficina'];
        $id_veiculo     = $dados['id_veiculo'];
        $status_aprovado = $dados['status_aprovado'];
        $data_cotacao   = $dados['data_cotacao'];
        $data_aprovacao = $dados['data_aprovacao'];
        $data_conclusao = $dados['data_conclusao'];

        $sql = "INSERT INTO cad_orcamento 
                    (id_oficina, id_veiculo, status_aprovado, data_cotacao, data_aprovacao, data_conclusao, ativo) 
                VALUES 
                    ('{$id_oficina}', '{$id_veiculo}', '{$status_aprovado}', '{$data_cotacao}', '{$data_aprovacao}', '{$data_conclusao}', 1)";

        $exec = $this->conn->query($sql);
        if ($exec) {
            return true;
        } else {
            echo "Erro ao inserir: " . $this->conn->error;
            echo "<br>SQL: $sql";
            exit;
        }
    }

    public function editar(array $dados) {
        $id_orcamento     = $dados['id_orcamento'];
        $id_oficina       = $dados['id_oficina'];
        $id_veiculo       = $dados['id_veiculo'];
        $status_aprovado  = $dados['status_aprovado'];
        $data_cotacao     = $dados['data_cotacao'];
        $data_aprovacao   = $dados['data_aprovacao'];
        $data_conclusao   = $dados['data_conclusao'];

        $sql = "UPDATE cad_orcamento
                   SET id_oficina      = '{$id_oficina}',
                       id_veiculo      = '{$id_veiculo}',
                       status_aprovado = '{$status_aprovado}',
                       data_cotacao    = '{$data_cotacao}',
                       data_aprovacao  = '{$data_aprovacao}',
                       data_conclusao  = '{$data_conclusao}'
                 WHERE id_orcamento     = {$id_orcamento}";

        $exec = $this->conn->query($sql);
        return ($exec && $this->conn->affected_rows > 0);
    }

    public function excluir(int $id) {
        $sql = "UPDATE cad_orcamento SET ativo = 0 WHERE id_orcamento = {$id}";
        $exec = $this->conn->query($sql);

        if ($exec && $this->conn->affected_rows > 0) {
            return true;
        }

        return 0;
    }
}
