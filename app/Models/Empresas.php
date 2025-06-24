<?php

namespace App\Models;

class Empresas extends DB {

    private object $conn;
    private array $dados;

    public function __construct() {
        $this->conn = $this->conectar();
    }

    public function index() {
         $sql = "SELECT 
                id_empresa,
                nome_empresa,
                nome_fantasia,
                cnpj,
                endereco,
                cep,
                data_abertura,
                telefone,
                email
            FROM 
                empresas
            WHERE 
                ativo = 1";

            $query = $this->conn->query($sql);
                if ($query && $query->num_rows > 0) {
                    return $query->fetch_all(MYSQLI_ASSOC);
                }

                return 0;
    }



    public function buscar($id) {
        $sql = "SELECT * FROM empresas WHERE id_empresa = $id AND ativo = 1";
        $query = $this->conn->query($sql);

            if ($query && $query->num_rows > 0) {
                return $query->fetch_assoc();
        }

            return 0;
    }

    public function adicionar($dados) {
        $nome_fantasia = $dados['nome_fantasia'];
        $cnpj = $dados['cnpj'];
        $razao_social = $dados['razao_social'];
        $data_abertura = $dados['data_abertura'];
        $logradouro = $dados['logradouro'];
        $numero = $dados['numero'];
        $complemento = $dados['complemento'];
        $bairro = $dados['bairro'];
        $cidade = $dados['cidade'];
        $uf = $dados['uf'];
        $endereco = "$logradouro $numero $complemento $bairro $cidade-$uf";
        $cep = $dados['cep'];
        $tel = $dados['telefone'];
        $email = $dados['email'];

        $sql = "INSERT INTO empresas (
                    nome_fantasia, cnpj, nome_empresa, data_abertura, endereco, cep, telefone, email
                ) VALUES (
                    '$nome_fantasia', '$cnpj', '$razao_social', '$data_abertura', '$endereco', '$cep','$tel', '$email'
                )";

        return $this->conn->query($sql);
    }

    public function editar($dados) {
        $id = $dados['id_empresa'];
        $nome_fantasia = $dados['nome_fantasia'];
        $cnpj = $dados['cnpj'];
        $razao_social = $dados['razao_social'];
        $endereco = $dados['endereco'];
        $data_abertura = $dados['data_abertura'];
        $cep = $dados['cep'];
        $tel = $dados['telefone'];
        $email = $dados['email'];

        $sql = "UPDATE empresas
                SET nome_fantasia = '$nome_fantasia', cnpj = '$cnpj', nome_empresa = '$razao_social', data_abertura = '$data_abertura', endereco = '$endereco',
                    cep = '$cep', telefone = '$tel', email = '$email'
                WHERE id_empresa = $id";

        return $this->conn->query($sql);
    }

    public function excluir($id) {
        $sql = "UPDATE empresas SET ativo = 0 WHERE id_empresa = $id";
        return $this->conn->query($sql);
    }
}
