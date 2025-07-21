<?php

namespace App\Models;

class Cargos extends DB {
	
	private object $conn;
	private array $dados;

	public function __construct() {

		$this->conn = $this->conectar();
	}

	public function index() {
		$sql = "SELECT * FROM cad_cargos WHERE ativo = 1 ORDER BY id_cargo DESC";
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
        $descricao = $dados['descricao'];
        $ativo = $dados['ativo'];
        $data_cadastro = $dados['data_cadastro'];
        $data_alteracao = $dados['data_alteracao'];

        $sql = "INSERT INTO cad_cargos
            (nome, descricao, ativo, data_cadastro, data_alteracao)
            VALUES
            ('$nome', '$descricao', '$ativo', '$data_cadastro', '$data_alteracao')";

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
        $sql = "SELECT * FROM cad_cargos WHERE id_cargo = $id";
        $res = $this->conn->query($sql);

        if ($res && $res->num_rows > 0) {
            return $res->fetch_assoc();
        }
        return 0;
    }

    public function editar(array $dados){
        $sql = "UPDATE cad_cargos SET
            nome = '{$dados['nome']}',
            descricao = '{$dados['descricao']}',
            ativo = '{$dados['ativo']}',
            data_cadastro = '{$dados['data_cadastro']}',
            data_alteracao = '{$dados['data_alteracao']}'
            
            WHERE id_cargo = {$dados['id_cargo']}";

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
        $sql = "UPDATE cad_cargos SET ativo = 0 WHERE id_cargo = $idExcluir";
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