<?php

namespace App\Models;

class Checklist extends DB {

    private object $conn;
    private array $dados;

    public function __construct() {
        $this->conn = $this->conectar();
    }

    public function index() {
        $sql = "SELECT 
                    c.*, 
                    v.modelo, 
                    v.placa, 
                    f.apelido AS nome_funcionario,
                    cg.nome AS nome_cargo
                FROM veiculo_checklists c
                LEFT JOIN cad_veiculos v ON c.id_veiculo = v.id_veiculo
                LEFT JOIN mvo_veiculos mv ON mv.id_veiculo = v.id_veiculo AND mv.ativo = 1
                LEFT JOIN cad_funcionarios f ON mv.id_funcionario = f.id_funcionario
                LEFT JOIN cad_cargos cg ON f.cargo = cg.id_cargo
                WHERE c.origem = 'interno'
                ORDER BY c.id_checklist DESC";

        $consulta = $this->conn->query($sql);

        if ($consulta && $consulta->num_rows > 0) {
            while ($row = $consulta->fetch_assoc()) {
                $ret[] = $row;
            }
            return $ret;
        } else {
            return 0;
        }
    }

    public function adicionar(array $dados) {
        $id_veiculo = $dados['id_veiculo'];
        $data_checklist = $dados['data_checklist'];
        $observacoes = $dados['observacoes'];
        $assinatura_motorista = $dados['assinatura_motorista'];
        $origem = $dados['origem'];

        $pneus_qualidade = $dados['pneus_qualidade'];
        $pneus_observacao = $dados['pneus_observacao'];
        $pneus_foto = $dados['pneus_foto'];

        $freios_qualidade = $dados['freios_qualidade'];
        $freios_observacao = $dados['freios_observacao'];
        $freios_foto = $dados['freios_foto'];

        $oleo_qualidade = $dados['oleo_qualidade'];
        $oleo_observacao = $dados['oleo_observacao'];
        $oleo_foto = $dados['oleo_foto'];

        $luzes_qualidade = $dados['luzes_qualidade'];
        $luzes_observacao = $dados['luzes_observacao'];
        $luzes_foto = $dados['luzes_foto'];

        $lataria_qualidade = $dados['lataria_qualidade'];
        $lataria_observacao = $dados['lataria_observacao'];
        $lataria_foto = $dados['lataria_foto'];

        $nivel_agua_qualidade = $dados['nivel_agua_qualidade'];
        $nivel_agua_observacao = $dados['nivel_agua_observacao'];
        $nivel_agua_foto = $dados['nivel_agua_foto'];

        $equipamentos_seguranca_qualidade = $dados['equipamentos_seguranca_qualidade'];
        $equipamentos_seguranca_observacao = $dados['equipamentos_seguranca_observacao'];
        $equipamentos_seguranca_foto = $dados['equipamentos_seguranca_foto'];

        $sql = "INSERT INTO veiculo_checklists (
                    id_veiculo, data_checklist, observacoes, assinatura_motorista,
                    pneus_qualidade, pneus_observacao, pneus_foto,
                    freios_qualidade, freios_observacao, freios_foto,
                    oleo_qualidade, oleo_observacao, oleo_foto,
                    luzes_qualidade, luzes_observacao, luzes_foto,
                    lataria_qualidade, lataria_observacao, lataria_foto,
                    nivel_agua_qualidade, nivel_agua_observacao, nivel_agua_foto,
                    equipamentos_seguranca_qualidade, equipamentos_seguranca_observacao, equipamentos_seguranca_foto, origem 
                ) VALUES (
                    '$id_veiculo', '$data_checklist', '$observacoes', '$assinatura_motorista',
                    '$pneus_qualidade', '$pneus_observacao', '$pneus_foto',
                    '$freios_qualidade', '$freios_observacao', '$freios_foto',
                    '$oleo_qualidade', '$oleo_observacao', '$oleo_foto',
                    '$luzes_qualidade', '$luzes_observacao', '$luzes_foto',
                    '$lataria_qualidade', '$lataria_observacao', '$lataria_foto',
                    '$nivel_agua_qualidade', '$nivel_agua_observacao', '$nivel_agua_foto',
                    '$equipamentos_seguranca_qualidade', '$equipamentos_seguranca_observacao', '$equipamentos_seguranca_foto', '$origem'
                )";

        if ($this->conn->query($sql)) {
            return true;
        } else {
            echo "Erro ao inserir: " . $this->conn->error . "<br>";
            echo "SQL: $sql";
            return false;
        }
    }

    public function buscar_por_placa($placa) {
        $sql = "SELECT 
                    v.id_veiculo,
                    v.modelo,
                    v.placa,
                    f.id_funcionario,
                    f.apelido AS nome_funcionario
                FROM cad_veiculos v
                LEFT JOIN mvo_veiculos mv ON mv.id_veiculo = v.id_veiculo AND mv.ativo = 1
                LEFT JOIN cad_funcionarios f ON mv.id_funcionario = f.id_funcionario
                WHERE v.placa = '$placa'";

        $consulta = $this->conn->query($sql);
        if ($consulta && $consulta->num_rows > 0) {
            $ret = $consulta->fetch_assoc();
            return $ret;
        } else {
            return 0;
        }
    }

    public function buscar_checklist($id_checklist) {
        $sql = "SELECT * FROM veiculo_checklists WHERE id_checklist = $id_checklist LIMIT 1";
        $consulta = $this->conn->query($sql);

        if ($consulta && $consulta->num_rows > 0) {
            $ret = $consulta->fetch_assoc();
            return $ret;
        } else {
            return 0;
        }
    }

    public function esta_aprovado($id_checklist) {
        $sql = "SELECT * FROM veiculo_checklists WHERE id_checklist = $id_checklist LIMIT 1";
        $consulta = $this->conn->query($sql);

        if ($consulta && $consulta->num_rows > 0) {
            $dados = $consulta->fetch_assoc();

            if (
                $dados['pneus_qualidade'] == 'ruim' ||
                $dados['freios_qualidade'] == 'ruim' ||
                $dados['oleo_qualidade'] == 'ruim' ||
                $dados['luzes_qualidade'] == 'ruim' ||
                $dados['lataria_qualidade'] == 'ruim' ||
                $dados['nivel_agua_qualidade'] == 'ruim' ||
                $dados['equipamentos_seguranca_qualidade'] == 'ruim'
            ) {
                return false;
            } else {
                return true;
            }
        } else {
            return 0;
        }
    }

    public function buscar_por_id($id) {
        $sql = "SELECT * FROM veiculo_checklists WHERE id_checklist = '$id' LIMIT 1";
        $query = $this->conn->query($sql);

        if ($query && $query->num_rows > 0) {
            return $query->fetch_assoc();
        }

        return false;
    }
}

