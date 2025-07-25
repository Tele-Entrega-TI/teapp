<?php

namespace App\Models;

class Ocorrencias extends DB{
	private object $conn;
	public function __construct(){
		$this->conn = $this->conectar();
	}

	public function index(){
		$sql = "SELECT o.*,
		o.id_ocorrencia,
		o.id_funcionario,
		o.id_motivo,
		o.data,
		o.gravidade,
		f.nome,
		c.motivos

		 FROM cad_ocorrencias AS o 
		 LEFT JOIN cad_funcionarios AS f ON o.id_funcionario = f.id_funcionario
		 LEFT JOIN cad_motivos AS c ON o.id_motivo = c.id_motivo
		 WHERE o.ativo = 1 ORDER BY o.id_ocorrencia DESC";

		 $query = $this->conn->query($sql);

		 if ($query->num_rows > 0){
		 	return $query->fetch_all(MYSQLI_ASSOC);
		}
	 return 0;
	}


    public function listar_motivos(){

		$sql = "SELECT id_motivo,
		motivos FROM cad_motivos WHERE ativo = 1";
		$query = $this->conn->query($sql);

		if ($query->num_rows >= 0){
			return $query->fetch_all(MYSQLI_ASSOC);
		}
		return 0;
	}	

	public function listar_funcionarios(){

		$sql = "SELECT id_funcionario,
				apelido AS nome FROM cad_funcionarios WHERE ativo = 1";
		$query = $this->conn->query($sql);

		if ($query->num_rows >= 0){
			return $query->fetch_all(MYSQLI_ASSOC);
		}
		return 0;
	}

	public function adicionar(array $dados){
	$id_funcionario = $dados['id_funcionario'];
	$id_motivo = $dados['id_motivo'];
	$data = $dados['data'];
	$gravidade = $dados['gravidade'];
	
	

	$sql = "INSERT INTO cad_ocorrencias (
		id_funcionario,
		id_motivo,
		data,
		gravidade
			
	)VALUES(
		'$id_funcionario',
		'$id_motivo',
		'$data',
		'$gravidade'
		
	)";
    return $this->conn->query($sql);
	}

	

	public function editar(array $dados){
        $id_funcionario = $dados['id_funcionario'];
        $id_motivo = $dados['id_motivo'];
        $data = $dados['data'];
        $gravidade = $dados['gravidade'];
        $id = $dados['id_ocorrencia'];

        $sql = "UPDATE cad_ocorrencias SET
        id_funcionario = '$id_funcionario',
        id_motivo = '$id_motivo',
        data = '$data',
        gravidade = '$gravidade'
        WHERE id_ocorrencia = $id";
            

        $exec = $this->conn->query($sql);

        if ($exec) {
            return true;
        } else {
            echo "Erro ao editar: " . $this->conn->error;
            echo "<br>SQL: $sql";
            exit;
        }
    }

	public function buscar($id) {
	        $sql = "SELECT * FROM cad_ocorrencias WHERE id_ocorrencia = $id AND ativo = 1";
	        $query = $this->conn->query($sql);

	            if ($query && $query->num_rows > 0) {
	                return $query->fetch_assoc();
	        }

	            return 0;
	    }


    public function excluir($id) {
        $sql = "UPDATE cad_ocorrencias SET ativo = 0 WHERE id_ocorrencia = $id";
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
