<?php

namespace App\Models;

class Funcionarios extends DB {
	
	private object $conn;
	private array $dados;

	public function __construct() {

		$this->conn = $this->conectar();
	}

	public function index() {
		$sql = "SELECT * FROM cad_funcionarios WHERE ativo = 1 ORDER BY id_funcionario DESC";
		$consulta = $this->conn->query($sql);

		if($consulta && $consulta->num_rows > 0) {
			while($row = $consulta->fetch_assoc()) {
				$obj[] = $row;
			}
			return $obj;
		} else {
			return 0;
		}
	}

	public function adicionar(array $dados){
        $nome = $dados['nome'];
        $apelido = $dados['apelido'];
        $sexo = $dados['sexo'];
        $cpf = $dados['cpf'];
        $rg = $dados['rg'];
        $nome_mae = $dados['nome_mae'];
        $nome_pai = $dados['nome_pai'];
        $data_nascimento = $dados['data_nascimento'];
        $email = $dados['email'];
        $telefone = $dados['telefone'];
        $cargo = $dados['cargo'];
        $endereco = $dados['endereco'];
        $habilitacao = $dados['habilitacao'];
        $ctps = $dados['ctps'];
        $org_emissor = $dados['org_emissor'];
        $pis = $dados['pis'];
        $data_admissao = $dados['data_admissao'];

        $sql = "INSERT INTO cad_funcionarios
            (nome, apelido, sexo, cpf, rg, nome_mae, nome_pai, data_nascimento, email, telefone, cargo, endereco, habilitacao, ctps, org_emissor, pis, data_admissao)
            VALUES
            ('$nome', '$apelido', '$sexo', '$cpf', '$rg', '$nome_mae', '$nome_pai', '$data_nascimento', '$email', '$telefone', '$cargo', '$endereco', '$habilitacao', '$ctps', '$org_emissor', '$pis', '$data_admissao')";

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
        $sql = "SELECT * FROM cad_funcionarios WHERE id_funcionario = $id";
        $res = $this->conn->query($sql);

        if ($res && $res->num_rows > 0) {
            return $res->fetch_assoc();
        }
        return 0;
    }

    public function editar(array $dados){
        $sql = "UPDATE cad_funcionarios SET
            nome = '{$dados['nome']}',
            apelido = '{$dados['apelido']}',
            sexo = '{$dados['sexo']}',
            cpf = '{$dados['cpf']}',
            rg = '{$dados['rg']}',
            nome_mae = '{$dados['nome_mae']}',
            nome_pai = '{$dados['nome_pai']}',
            data_nascimento = '{$dados['data_nascimento']}',
            email = '{$dados['email']}',
            telefone = '{$dados['telefone']}',
            cargo = '{$dados['cargo']}',
            endereco = '{$dados['endereco']}',
            habilitacao = '{$dados['habilitacao']}',
            ctps = '{$dados['ctps']}',
            org_emissor = '{$dados['org_emissor']}',
            pis = '{$dados['pis']}',
            data_admissao = '{$dados['data_admissao']}'
            WHERE id_funcionario = {$dados['id_funcionario']}";

        $exec = $this->conn->query($sql);

        if ($exec) {
            return true;
        } else {
            echo "Erro ao editar: " . $this->conn->error;
            echo "<br>SQL: $sql";
            exit;
        }
    }

    public function listar_ativos() {
        $sql = "SELECT id_funcionario, nome, cpf 
                FROM cad_funcionarios 
                WHERE ativo = 1 
                ORDER BY nome ASC";

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


    public function excluir($idExcluir) {
        $sql = "UPDATE cad_funcionarios SET ativo = 0 WHERE id_funcionario = $idExcluir";
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