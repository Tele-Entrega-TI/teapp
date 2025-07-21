<?php

namespace App\Models;

Class Usuarios extends DB {

	private object $conn;

	public function __construct() {
		$this->conn = $this->conectar();
	}

	public function index() {

		$sql = "SELECT u.*, f.nome AS nome_funcionario, p.nome_permissao
				FROM usuarios u
				LEFT JOIN cad_funcionarios f ON f.id_funcionario = u.id_funcionario
				LEFT JOIN permissoes p ON p.id_permissao = u.id_permissao
				WHERE u.ativo = 1
				ORDER BY u.id_usuario DESC";

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

	public function adicionar($dados) {
	    $id_funcionario = $dados['id_funcionario'];
	    $id_permissao = $dados['id_permissao'];
	    $cpf = $dados['cpf'];

	    $sql = "INSERT INTO usuarios (id_funcionario, cpf, senha, id_permissao)
	            VALUES (
	                $id_funcionario,
	                '" . $this->conn->real_escape_string($cpf) . "',
	                NULL,
	                $id_permissao
	            )";

	    return $this->conn->query($sql);
	}



	public function cpf_existe($cpf) {
	    $sql = "SELECT id_usuario FROM usuarios 
	            WHERE cpf = '" . $this->conn->real_escape_string($cpf) . "' 
	            AND ativo = 1";

	    $consulta = $this->conn->query($sql);

	    if ($consulta && $consulta->num_rows > 0) {
	        return true;
	    } else {
	        return false;
	    }
	}

	public function buscar_por_cpf($cpf) {
	    $cpf = $this->conn->real_escape_string($cpf);
	    $sql = "SELECT * FROM usuarios WHERE cpf = '$cpf' AND ativo = 1 LIMIT 1";
	    $query = $this->conn->query($sql);

	    if ($query && $query->num_rows > 0) {
	        return $query->fetch_assoc();
	    } else {
	    	
	        return false;
	    }
	}

	public function confirmar_usuario($id, $senhaCriptografada) {
	    $sql = "UPDATE usuarios SET senha = '$senhaCriptografada', confirmado = 1 WHERE id_usuario = $id";
	    return $this->conn->query($sql);
	}



	
	public function excluir($id) {
		$sql = "UPDATE usuarios SET ativo = 0 WHERE id_usuario = $id";
		return $this->conn->query($sql);
	}
}

