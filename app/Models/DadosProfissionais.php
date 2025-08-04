<?php

namespace App\Models;

class DadosProfissionais extends DB {
	
	private object $conn;
	private array $dados;

	public function __construct() {

		$this->conn = $this->conectar();
	}

	public function index() {
        $sql = "
            SELECT
                dp.id_dado_profissional,
                dp.data_inicio,
                dp.data_fim,
                dp.ativo,

                f.apelido AS nome_funcionario,
                c.nome AS nome_cargo,
                s.nome AS nome_setor,
                l.locacao AS nome_locacao,
                e.nome_empresa AS nome_empresa

            FROM dados_profissionais dp
            LEFT JOIN cad_funcionarios f ON dp.id_funcionario = f.id_funcionario
            LEFT JOIN cad_cargos c ON dp.id_cargo = c.id_cargo
            LEFT JOIN cad_setores s ON dp.id_setor = s.id_setor
            LEFT JOIN cad_locacoes l ON dp.id_locacao = l.id_locacao
            LEFT JOIN empresas e ON dp.id_empresa = e.id_empresa
            WHERE dp.ativo = 1
            ORDER BY dp.id_dado_profissional DESC
        ";

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
        $id_funcionario = $dados['id_funcionario'];
        $id_cargo = $dados['id_cargo'];
        $id_setor = $dados['id_setor'];
        $id_locacao = $dados['id_locacao'];
        $id_empresa = $dados['id_empresa'];
        $data_inicio = $dados['data_inicio'];
        $data_fim = $dados['data_fim'];
        $ativo = $dados['ativo'];
        

        $sql = "INSERT INTO dados_profissionais
            (id_funcionario, id_cargo, id_setor, id_locacao, id_empresa, data_inicio, data_fim, ativo)
            VALUES
            ('$id_funcionario', '$id_cargo', '$id_setor', '$id_locacao', '$id_empresa', '$data_inicio', '$data_fim', '$ativo')";

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
        $sql = "
            SELECT
                dp.id_dado_profissional,
                dp.id_funcionario,
                dp.id_cargo,
                dp.id_setor,
                dp.id_locacao,
                dp.id_empresa,
                dp.data_inicio,
                dp.data_fim,
                dp.ativo,

                f.apelido AS nome_funcionario,
                c.nome AS nome_cargo,
                s.nome AS nome_setor,
                l.locacao AS nome_locacao,
                e.nome_empresa AS nome_empresa

            FROM dados_profissionais dp
            LEFT JOIN cad_funcionarios f ON dp.id_funcionario = f.id_funcionario
            LEFT JOIN cad_cargos c ON dp.id_cargo = c.id_cargo
            LEFT JOIN cad_setores s ON dp.id_setor = s.id_setor
            LEFT JOIN cad_locacoes l ON dp.id_locacao = l.id_locacao
            LEFT JOIN empresas e ON dp.id_empresa = e.id_empresa
            WHERE dp.id_dado_profissional = $id
            LIMIT 1
        ";

        $res = $this->conn->query($sql);

        if ($res && $res->num_rows > 0) {
            return $res->fetch_assoc();
        }

        return 0;
    }

    public function listar_motoristas() {
        $sql = "SELECT 
                    dp.id_funcionario, 
                    f.apelido AS nome 
                FROM dados_profissionais dp
                LEFT JOIN cad_funcionarios f ON dp.id_funcionario = f.id_funcionario
                WHERE dp.id_cargo IN ('Motorista', 'Motoboy') AND dp.ativo = 1
                ORDER BY f.apelido";

        $res = $this->conn->query($sql);

        if ($res && $res->num_rows > 0) {
            return $res->fetch_all(MYSQLI_ASSOC);
        }

        return 0;
    }




    public function editar(array $dados){
        $sql = "UPDATE dados_profissionais SET
            id_funcionario = '{$dados['id_funcionario']}',
            id_cargo = '{$dados['id_cargo']}',
            id_setor = '{$dados['id_setor']}',
            id_locacao = '{$dados['id_locacao']}',
            id_empresa = '{$dados['id_empresa']}',
            data_inicio = '{$dados['data_inicio']}',
            data_fim = '{$dados['data_fim']}',
            ativo = '{$dados['ativo']}'
            
            WHERE id_dado_profissional = {$dados['id_dado_profissional']}";

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
        $sql = "UPDATE dados_profissionais SET ativo = 0 WHERE id_dado_profissional = $idExcluir";
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