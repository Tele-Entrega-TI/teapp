<?php
namespace App\Models;
class Motivos extends DB{

	private object $conn;


	public function __construct() {
	
		$this->conn = $this->conectar();	
	}

    public function index(){
        $sql = "SELECT * FROM cad_motivos WHERE ativo = 1 ORDER BY id_motivo DESC";
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

    public function adicionar(array $dados){
        $motivo   = $dados['motivo'];
        $ativo     = $dados['ativo'];

        $sql = " INSERT INTO cad_motivos (
            motivo,
            ativo
        ) VALUES (
            '$motivo',
            '$ativo'
        )";
    return $this->conn->query($sql);
}


	 public function editar(array $dados){
        $motivo = $dados['motivo'];
        $ativo = $dados['ativo'];
        $id = $dados['id_motivo'];

        $sql = "UPDATE cad_motivos SET
        motivo = '$motivo',
        ativo = '$ativo'
        WHERE id_motivo = $id";
            

        $exec = $this->conn->query($sql);

        if ($exec) {
            return true;
        } else {
            echo "Erro ao editar: " . $this->conn->error;
            echo "<br>SQL: $sql";
            exit;
        }
    }

	public function buscar($id){
		$sql = "SELECT * FROM cad_motivos WHERE id_motivo = $id";
		$query = $this->conn->query($sql);
		if ($query && $query->num_rows > 0) {
            return $query->fetch_assoc();
        }
			return 0;
    }

    public function excluir($id) {
        $sql = "UPDATE cad_motivos SET ativo = 0 WHERE id_motivo = $id";
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