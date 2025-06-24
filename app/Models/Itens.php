<?php

namespace App\Models;

class Itens extends DB {
    private object $conn;
    private array $dados;

    public function __construct() {

        $this->conn = $this->conectar();
    }

    public function index() {
        $sql = "
        SELECT
            i.id_item,
            i.item,
            i.descricao,
            i.valor,
            o.id_orcamento,
            v.placa,
            o.data_cotacao
        FROM cad_itens_orcamento i
        LEFT JOIN cad_orcamento o ON i.id_orcamento = o.id_orcamento
        LEFT JOIN cad_veiculos v ON o.id_veiculo = v.id_veiculo
        ORDER BY i.id_item DESC
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


    public function adicionar(array $dados) {
        $id_orcamento = $dados['id_orcamento'];
        $item         = $dados['item'];
        $descricao    = $dados['descricao'];
        $valor        = $dados['valor'];

        $sql = "
            INSERT INTO cad_itens_orcamento 
                (id_orcamento, item, descricao, valor)
            VALUES 
                ('{$id_orcamento}', '{$item}', '{$descricao}', '{$valor}')
        ";

        $exec = $this->conn->query($sql);
    
        if ($exec) {
            return true;
        } else {
            echo "Erro ao inserir: " . $this->conn->error;
            echo "<br>SQL: $sql";
            exit;
        }
    }

}
