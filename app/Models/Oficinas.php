<?php
namespace App\Models;

class Oficinas extends DB {

    private object $conn;

    public function __construct() {
        
        $this->conn = $this->conectar();
    }

    public function index() {
        $sql = "SELECT *
                  FROM cad_oficinas
                 WHERE ativo = 1
              ORDER BY id_oficina DESC";
        $consulta = $this->conn->query($sql);
        if ($consulta && $consulta->num_rows > 0) {
            $lista = [];
            while ($row = $consulta->fetch_assoc()) {
                $lista[] = $row;
            }
            return $lista;
        }
        return 0;
    }

    public function buscar(int $id) {
        $id = intval($id);
        $sql = "SELECT *
                  FROM cad_oficinas
                 WHERE id_oficina = {$id}
                   AND ativo = 1
                 LIMIT 1";
        $consulta = $this->conn->query($sql);
        if ($consulta && $consulta->num_rows === 1) {
            return $consulta->fetch_assoc();
        }
        return 0;
    }

    public function adicionar(array $dados) {
        $nome        = $dados['nome'];
        $endereco    = $dados['endereco'];
        $responsavel = $dados['responsavel'];
        $whatsapp    = $dados['whatsapp'];

        $sql = "INSERT INTO cad_oficinas 
                    (nome, endereco, responsavel, whatsapp, ativo) 
                VALUES 
                    ('$nome', '$endereco', '$responsavel', '$whatsapp', 1)";
        $exec = $this->conn->query($sql);
        if ($exec) {
            return true;
        }
        echo "Erro ao inserir: " . $this->conn->error;
        echo "<br>SQL: $sql";
        exit;
    }

    public function editar(array $dados) {
        $id_oficina  = intval($dados['id_oficina']);
        $nome        = $dados['nome'];
        $endereco    = $dados['endereco'];
        $responsavel = $dados['responsavel'];
        $whatsapp    = $dados['whatsapp'];

        $sql = "UPDATE cad_oficinas
                   SET nome = '$nome',
                       endereco = '$endereco',
                       responsavel = '$responsavel',
                       whatsapp = '$whatsapp'
                 WHERE id_oficina = {$id_oficina}";
        $exec = $this->conn->query($sql);
        return ($exec && $this->conn->affected_rows >= 0);
    }

    public function excluir(int $id) {
        $id = intval($id);
        $sql = "UPDATE cad_oficinas
                   SET ativo = 0
                 WHERE id_oficina = {$id}";
        $exec = $this->conn->query($sql);
        return ($exec && $this->conn->affected_rows > 0);
    }
}
