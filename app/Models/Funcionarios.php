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
        $nascimento = $dados['nascimento'];
        $nome_mae = $dados['nome_mae'];
        $nome_pai = $dados['nome_pai'];
        $nome_esposa = $dados['nome_esposa'];
        $email = $dados['email'];
        $telefone = $dados['telefone'];
        $nome_emergencia = $dados['nome_emergencia'];
        $telefone_emergencia = $dados['telefone_emergencia'];
        $rua = $dados['rua'];
        $numero_casa = $dados['numero_casa'];
        $complemento = $dados['complemento'];
        $cep = $dados['cep'];
        $bairro = $dados['bairro'];
        $cidade = $dados['cidade'];
        $uf = $dados['uf'];
        $rg = $dados['rg'];
        $cpf = $dados['cpf'];
        $org_emissor = $dados['org_emissor'];
        $cnh = $dados['cnh'];
        $ctps = $dados['ctps'];
        $pis = $dados['pis'];
        $admissao = $dados['admissao'];
        



        $sql = "INSERT INTO cad_funcionarios
            (nome, apelido, sexo, nascimento, nome_mae, nome_pai, nome_esposa, email, telefone, nome_emergencia, telefone_emergencia, rua, numero_casa, complemento, cep, bairro, cidade, uf, rg, cpf, org_emissor, cnh, ctps, pis, admissao)
            VALUES
            ('$nome', '$apelido', '$sexo', '$nascimento', '$nome_mae', '$nome_pai', '$nome_esposa', '$email', '$telefone', '$nome_emergencia', '$telefone_emergencia', '$rua', '$numero_casa', '$complemento', '$cep', '$bairro', '$cidade', '$uf', '$rg', '$cpf', '$org_emissor', '$cnh', '$ctps', '$pis', '$admissao')";

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
        $sql = "SELECT 
                f.*,
                dp.id_cargo,
                cc.nome AS nome_cargo
            FROM cad_funcionarios f
            LEFT JOIN dados_profissionais dp
                ON dp.id_funcionario = f.id_funcionario
            LEFT JOIN cad_cargos cc
                ON cc.id_cargo = dp.id_cargo
            WHERE f.id_funcionario = " . $id;
        $res = $this->conn->query($sql);

        if ($res && $res->num_rows > 0) {
            return $res->fetch_assoc();
        }
        return 0;
    }

    public function editar(array $dados){
        $nome = $dados['nome'];
        $apelido = $dados['apelido'];
        $sexo = $dados['sexo'];
        $nascimento = $dados['nascimento'];
        $nome_mae = $dados['nome_mae'];
        $nome_pai = $dados['nome_pai'];
        $nome_esposa = $dados['nome_esposa'];
        $email = $dados['email'];
        $telefone = $dados['telefone'];
        $nome_emergencia = $dados['nome_emergencia'];
        $telefone_emergencia = $dados['telefone_emergencia'];
        $rua = $dados['rua'];
        $numero_casa = $dados['numero_casa'];
        $complemento = $dados['complemento'];
        $cep = $dados['cep'];
        $bairro = $dados['bairro'];
        $cidade = $dados['cidade'];
        $uf = $dados['uf'];
        $rg = $dados['rg'];
        $cpf = $dados['cpf'];
        $org_emissor = $dados['org_emissor'];
        $cnh = $dados['cnh'];
        $ctps = $dados['ctps'];
        $pis = $dados['pis'];
        $admissao = $dados['admissao'];
        $id = $dados['id_funcionario'];

        $sql = "UPDATE cad_funcionarios SET 
        nome = '$nome',
        apelido = '$apelido',
        sexo = '$sexo',
        nascimento = '$nascimento',
        nome_mae = '$nome_mae',
        nome_pai = '$nome_pai',
        nome_esposa = '$nome_esposa',
        email = '$email',
        telefone = '$telefone',
        nome_emergencia = '$nome_emergencia',
        telefone_emergencia = '$telefone_emergencia',
        rua = '$rua',
        numero_casa = '$numero_casa',
        complemento = '$complemento',
        cep = '$cep',
        bairro = '$bairro',
        cidade = '$cidade',
        uf = '$uf',
        rg = '$rg',
        cpf = '$cpf',
        org_emissor = '$org_emissor',
        cnh = '$cnh',
        ctps = '$ctps',
        pis = '$pis',
        admissao = '$admissao'
        WHERE id_funcionario = $id";

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
