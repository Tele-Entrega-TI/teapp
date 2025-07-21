<?php

namespace App\Models;

class Veiculos extends DB {
    private object $conn;
    private array $dados;

    public function __construct() {
        $this->conn = $this->conectar();
    }

    public function index() {
        $sql = "SELECT 
                    v.*, 
                    f.apelido AS nome_funcionario,

                    (
                        SELECT MAX(c.data_checklist)
                        FROM veiculo_checklists c
                        WHERE c.id_veiculo = v.id_veiculo
                    ) AS data_ultimo_checklist,

                    (
                        SELECT 
                            CASE 
                                WHEN 
                                    c.pneus_qualidade = 'ruim' OR
                                    c.freios_qualidade = 'ruim' OR
                                    c.oleo_qualidade = 'ruim' OR
                                    c.luzes_qualidade = 'ruim' OR
                                    c.lataria_qualidade = 'ruim' OR
                                    c.nivel_agua_qualidade = 'ruim' OR
                                    c.equipamentos_seguranca_qualidade = 'ruim'
                                THEN 0 ELSE 1
                            END
                        FROM veiculo_checklists c
                        WHERE c.id_veiculo = v.id_veiculo
                        ORDER BY c.data_checklist DESC
                        LIMIT 1
                    ) AS ultimo_checklist_aprovado

                FROM cad_veiculos v
                LEFT JOIN mvo_veiculos mv ON mv.id_veiculo = v.id_veiculo AND mv.ativo = 1
                LEFT JOIN dados_profissionais dp ON mv.id_funcionario = dp.id_funcionario
                LEFT JOIN cad_funcionarios f ON dp.id_funcionario = f.id_funcionario
                WHERE v.ativo = 1
                ORDER BY v.id_veiculo DESC";

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


    public function adicionar(array $dados) {
        $placa = $dados['placa'];
        $modelo = $dados['modelo'];
        $tipo = $dados['tipo'];
        $cor = $dados['cor'];
        $fabricante = $dados['fabricante'];
        $ano_fab = $dados['ano_fab'];
        $vencimento_doc = $dados['vencimento_doc'];
        $titular_veiculo = $dados['titular_veiculo'];

        $sql = "INSERT INTO cad_veiculos 
                    (placa, modelo, tipo, cor, fabricante, ano_fab, vencimento_doc, titular_veiculo) 
                VALUES 
                    ('$placa', '$modelo', '$tipo', '$cor', '$fabricante', '$ano_fab', '$vencimento_doc', '$titular_veiculo')";

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
                    v.*, 
                    f.apelido AS nome_funcionario
                FROM cad_veiculos v
                LEFT JOIN mvo_veiculos mv ON mv.id_veiculo = v.id_veiculo AND mv.ativo = 1
                LEFT JOIN dados_profissionais dp ON mv.id_funcionario = dp.id_funcionario
                LEFT JOIN cad_funcionarios f ON dp.id_funcionario = f.id_funcionario
                WHERE v.id_veiculo = $id";

        $res = $this->conn->query($sql);

        if ($res && $res->num_rows > 0) {
            return $res->fetch_assoc();
        }

        return 0;
    }

    public function editar(array $dados) {
        $sql = "UPDATE cad_veiculos SET 
                    placa = '{$dados['placa']}',
                    modelo = '{$dados['modelo']}',
                    tipo = '{$dados['tipo']}',
                    cor = '{$dados['cor']}',
                    fabricante = '{$dados['fabricante']}',
                    ano_fab = '{$dados['ano_fab']}',
                    vencimento_doc = '{$dados['vencimento_doc']}',
                    titular_veiculo = '{$dados['titular_veiculo']}'
                WHERE id_veiculo = {$dados['id_veiculo']}";

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
        $sql = "UPDATE cad_veiculos SET ativo='0' WHERE id_veiculo = $idExcluir";

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
