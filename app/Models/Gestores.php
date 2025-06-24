<?php
namespace App\Models;

class Gestores extends DB {

    private object $conn;

    public function __construct() {
        
        $this->conn = $this->conectar();
    }

    public function index() {
        $sql = "SELECT * FROM cad_gestores WHERE ativo = 1 ORDER BY id_gestor DESC";
        $query = $this->conn->query($sql);

        if ($query && $query->num_rows > 0) {
            return $query->fetch_all(MYSQLI_ASSOC);
        }

        return 0;
    }

    public function adicionar(array $dados) {
        $nome = $dados['nome'];
        $email = $dados['email'];
        $telefone = $dados['telefone'];
        $empresa = $dados['empresa'];

        $sql = "INSERT INTO cad_gestores (nome, email, telefone, empresa, ativo, data_cadastro)
                VALUES ('$nome', '$email', '$telefone', '$empresa', 1, NOW())";

        return $this->conn->query($sql);
    }

    public function buscar($id) {
        $sql = "SELECT * FROM cad_gestores WHERE id_gestor = $id LIMIT 1";
        $query = $this->conn->query($sql);

        if ($query && $query->num_rows > 0) {
            return $query->fetch_assoc();
        }

        return 0;
    }

    public function editar(array $dados) {
        $id = $dados['id_gestor'];
        $nome = $dados['nome'];
        $email = $dados['email'];
        $telefone = $dados['telefone'];
        $empresa = $dados['empresa'];

        $sql = "UPDATE cad_gestores 
                SET nome = '$nome', email = '$email', telefone = '$telefone', empresa = '$empresa' 
                WHERE id_gestor = $id";

        return $this->conn->query($sql);
    }

    public function excluir($id) {
        $sql = "UPDATE cad_gestores SET ativo = 0 WHERE id_gestor = $id";
        return $this->conn->query($sql);
    }
}
