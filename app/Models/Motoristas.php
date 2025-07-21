<?php

namespace App\Models;

class Motoristas extends DB {

    private object $conn;
    private array $dados;

    public function __construct() {
        $this->conn = $this->conectar();
    }

    public function index() {
         $sql = "SELECT 
                m.id_motorista,
                m.nome_motorista,
                m.cpf,
                m.categoria,
                m.validade_cnh,
                l.empresa AS empresa_registrada,
                l.locacao AS empresa_locada,
                v.placa AS veiculo_atual
            FROM 
                cad_motoristas m
            LEFT JOIN 
                cad_locacoes l ON m.id_motorista = l.id_motorista AND l.ativo = 1
            LEFT JOIN 
                mvo_veiculos mv ON m.id_motorista = mv.id_funcionario AND mv.ativo = 1
            LEFT JOIN 
                cad_veiculos v ON mv.id_veiculo = v.id_veiculo
            WHERE 
                m.ativo = 1
            ORDER BY 
                m.nome_motorista";

            $query = $this->conn->query($sql);
                if ($query && $query->num_rows > 0) {
                    return $query->fetch_all(MYSQLI_ASSOC);
                }

                return 0;
    }



    public function buscar($id) {
        $sql = "SELECT * FROM cad_motoristas WHERE id_motorista = $id AND ativo = 1";
        $query = $this->conn->query($sql);

            if ($query && $query->num_rows > 0) {
                return $query->fetch_assoc();
        }

            return 0;
    }

    public function adicionar($dados) {
        $nome = $dados['nome_motorista'];
        $cpf = $dados['cpf'];
        $rg = $dados['rg'];
        $cnh = $dados['cnh'];
        $categoria = $dados['categoria'];
        $validade = $dados['validade_cnh'];
        $nasc = $dados['data_nascimento'];
        $tel = $dados['telefone'];
        $email = $dados['email'];
        $endereco = $dados['endereco'];

        $sql = "INSERT INTO cad_motoristas (
                    nome_motorista, cpf, rg, cnh, categoria, validade_cnh,
                    data_nascimento, telefone, email, endereco
                ) VALUES (
                    '$nome', '$cpf', '$rg', '$cnh', '$categoria', '$validade',
                    '$nasc', '$tel', '$email', '$endereco'
                )";

        return $this->conn->query($sql);
    }

    public function editar($dados) {
        $id = $dados['id_motorista'];
        $nome = $dados['nome_motorista'];
        $cpf = $dados['cpf'];
        $rg = $dados['rg'];
        $cnh = $dados['cnh'];
        $categoria = $dados['categoria'];
        $validade = $dados['validade_cnh'];
        $nasc = $dados['data_nascimento'];
        $tel = $dados['telefone'];
        $email = $dados['email'];
        $endereco = $dados['endereco'];

        $sql = "UPDATE cad_motoristas
                SET nome_motorista = '$nome', cpf = '$cpf', rg = '$rg', cnh = '$cnh', categoria = '$categoria',
                    validade_cnh = '$validade', data_nascimento = '$nasc', telefone = '$tel', email = '$email', endereco = '$endereco'
                WHERE id_motorista = $id";

        return $this->conn->query($sql);
    }

    public function excluir($id) {
        $sql = "UPDATE cad_motoristas SET ativo = 0 WHERE id_motorista = $id";
        return $this->conn->query($sql);
    }
}
