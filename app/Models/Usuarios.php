<?php

namespace App\Models;

Class Usuarios extends DB {

	private object $conn;

	public function __construct() {
		$this->conn = $this->conectar();
	}

	public function index() {
		$sql = "SELECT u.*, f.nome AS nome_funcionario
				FROM usuarios u
				LEFT JOIN cad_funcionarios f ON f.id_funcionario = u.id_funcionario
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
	    $cpf = $dados['cpf'];

	    $sql = "INSERT INTO usuarios (id_funcionario, cpf, senha)
	            VALUES (
	                $id_funcionario,
	                '" . $this->conn->real_escape_string($cpf) . "',
	                NULL
	                
	            )";

	    return $this->conn->query($sql);
	}

	public function validarLogin($cpf, $senha) {

	    $cpf = $this->conn->real_escape_string($cpf);
	    $sql = "SELECT u.*, f.nome AS nome_funcionario
	            FROM usuarios u
	            LEFT JOIN cad_funcionarios f ON f.id_funcionario = u.id_funcionario
	            WHERE u.cpf = '$cpf' AND u.senha = '$senha' AND u.ativo = 1
	            LIMIT 1";

	    $query = $this->conn->query($sql);

	    if ($query && $query->num_rows > 0) {
	        return $query->fetch_assoc();
	    } else {
	        return 0;
	    }
	}

	public function getModulosUsuario($id_funcionario) {

	    $sql = "SELECT nome_modulo 
	            FROM modulos_acesso 
	            WHERE id_funcionario = $id_funcionario AND id_grupo = 0";

	    $query = $this->conn->query($sql);

	    $lista = [];
	    if ($query && $query->num_rows > 0) {
	        while ($row = $query->fetch_assoc()) {
	            $lista[] = $row['nome_modulo'];
	        }
	    }

	    return $lista;
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

