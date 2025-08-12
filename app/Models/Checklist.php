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
                    v.tipo,
                    f.apelido AS nome_funcionario,
                    cg.nome AS nome_cargo
                FROM veiculo_checklists c
                LEFT JOIN cad_veiculos v ON c.id_veiculo = v.id_veiculo
                LEFT JOIN mvo_veiculos mv ON mv.id_veiculo = v.id_veiculo AND mv.ativo = 1
                LEFT JOIN cad_funcionarios f ON mv.id_funcionario = f.id_funcionario
                LEFT JOIN cad_cargos cg ON f.id_cargo = cg.id_cargo
                WHERE c.origem = 'interno' AND c.ativo = 1
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

        $pneu_traseiro_esquerdo_qualidade = $dados['pneu_traseiro_esquerdo_qualidade'];
        $pneu_traseiro_esquerdo_observacao = $dados['pneu_traseiro_esquerdo_observacao'];
        $pneu_traseiro_esquerdo_foto = $dados['pneu_traseiro_esquerdo_foto'];

        $pneu_traseiro_direito_qualidade = $dados['pneu_traseiro_direito_qualidade'];
        $pneu_traseiro_direito_observacao = $dados['pneu_traseiro_direito_observacao'];
        $pneu_traseiro_direito_foto = $dados['pneu_traseiro_direito_foto'];

        $pneu_dianteiro_esquerdo_qualidade = $dados['pneu_dianteiro_esquerdo_qualidade'];
        $pneu_dianteiro_esquerdo_observacao = $dados['pneu_dianteiro_esquerdo_observacao'];
        $pneu_dianteiro_esquerdo_foto = $dados['pneu_dianteiro_esquerdo_foto'];

        $pneu_dianteiro_direito_qualidade = $dados['pneu_dianteiro_direito_qualidade'];
        $pneu_dianteiro_direito_observacao = $dados['pneu_dianteiro_direito_observacao'];
        $pneu_dianteiro_direito_foto = $dados['pneu_dianteiro_direito_foto'];

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
                    pneu_traseiro_esquerdo_qualidade, pneu_traseiro_esquerdo_observacao, pneu_traseiro_esquerdo_foto,
                    freios_qualidade, freios_observacao, freios_foto,
                    oleo_qualidade, oleo_observacao, oleo_foto,
                    luzes_qualidade, luzes_observacao, luzes_foto,
                    lataria_qualidade, lataria_observacao, lataria_foto,
                    nivel_agua_qualidade, nivel_agua_observacao, nivel_agua_foto,
                    equipamentos_seguranca_qualidade, equipamentos_seguranca_observacao, equipamentos_seguranca_foto, origem, pneu_traseiro_direito_qualidade, pneu_traseiro_direito_observacao, pneu_traseiro_direito_foto, pneu_dianteiro_esquerdo_qualidade, pneu_dianteiro_esquerdo_observacao, pneu_dianteiro_esquerdo_foto, pneu_dianteiro_direito_qualidade, pneu_dianteiro_direito_observacao, pneu_dianteiro_direito_foto
                ) VALUES (
                    '$id_veiculo', '$data_checklist', '$observacoes', '$assinatura_motorista',
                    '$pneu_traseiro_esquerdo_qualidade', '$pneu_traseiro_esquerdo_observacao', '$pneu_traseiro_esquerdo_foto',
                    '$freios_qualidade', '$freios_observacao', '$freios_foto',
                    '$oleo_qualidade', '$oleo_observacao', '$oleo_foto',
                    '$luzes_qualidade', '$luzes_observacao', '$luzes_foto',
                    '$lataria_qualidade', '$lataria_observacao', '$lataria_foto',
                    '$nivel_agua_qualidade', '$nivel_agua_observacao', '$nivel_agua_foto',
                    '$equipamentos_seguranca_qualidade', '$equipamentos_seguranca_observacao', '$equipamentos_seguranca_foto', '$origem', '$pneu_traseiro_direito_qualidade', '$pneu_traseiro_direito_observacao', '$pneu_traseiro_direito_foto', '$pneu_dianteiro_esquerdo_qualidade', '$pneu_dianteiro_esquerdo_observacao', '$pneu_dianteiro_esquerdo_foto', '$pneu_dianteiro_direito_qualidade', '$pneu_dianteiro_direito_observacao', '$pneu_dianteiro_direito_foto'
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
        $sql = "SELECT c.*, v.placa FROM veiculo_checklists AS c INNER JOIN cad_veiculos AS v ON v.id_veiculo = c.id_veiculo WHERE id_checklist = $id_checklist LIMIT 1";
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

    public function excluir($id) {
        $sql = "UPDATE veiculo_checklists SET ativo = 0 WHERE id_checklist = $id";
        return $this->conn->query($sql);
    }

    public function editar(array $dados){

        var_dump($dados['freios_foto']);
        $pneu_traseiro_esquerdo_foto = strlen($dados['pneu_traseiro_esquerdo_foto']) > 14 ? $dados['pneu_traseiro_esquerdo_foto'] : $dados['pneu_traseiro_esquerdo_foto_database'];
        $freios_foto = strlen($dados['freios_foto']) > 14 ? $dados['freios_foto'] : $dados['freios_foto_database'];
        $oleo_foto = strlen($dados['oleo_foto']) > 14 ? $dados['oleo_foto'] : $dados['oleo_foto_database'];
        $luzes_foto = strlen($dados['luzes_foto']) > 14 ? $dados['luzes_foto'] : $dados['luzes_foto_database'];
        $lataria_foto = strlen($dados['lataria_foto']) > 14 ? $dados['lataria_foto'] : $dados['lataria_foto_database'];
        $nivel_agua_foto = strlen($dados['nivel_agua_foto']) > 14 ? $dados['nivel_agua_foto'] : $dados['nivel_agua_foto_database'];
        $equipamentos_seguranca_foto = strlen($dados['equipamentos_seguranca_foto']) > 14 ? $dados['equipamentos_seguranca_foto'] : $dados['equipamentos_seguranca_foto_database'];
        $pneu_traseiro_direito_foto = strlen($dados['pneu_traseiro_direito_foto']) > 14 ? $dados['pneu_traseiro_direito_foto'] : $dados['pneu_traseiro_direito_foto_database'];
        $pneu_dianteiro_esquerdo_foto = strlen($dados['pneu_dianteiro_esquerdo_foto']) > 14 ? $dados['pneu_dianteiro_esquerdo_foto'] : $dados['pneu_dianteiro_esquerdo_foto_database'];
        $pneu_dianteiro_direito_foto = strlen($dados['pneu_dianteiro_direito_foto']) > 14 ? $dados['pneu_dianteiro_direito_foto'] : $dados['pneu_dianteiro_direito_foto_database'];
        
        $sql = "UPDATE veiculo_checklists SET
            observacoes = '{$dados['observacoes']}',
            assinatura_motorista = '{$dados['assinatura_motorista']}',
            pneu_traseiro_esquerdo_qualidade = '{$dados['pneu_traseiro_esquerdo_qualidade']}',
            pneu_traseiro_esquerdo_observacao = '{$dados['pneu_traseiro_esquerdo_observacao']}',
            pneu_traseiro_esquerdo_foto = '{$pneu_traseiro_esquerdo_foto}',
            freios_qualidade = '{$dados['freios_qualidade']}',
            freios_observacao = '{$dados['freios_observacao']}',
            freios_foto = '{$freios_foto}',
            oleo_qualidade = '{$dados['oleo_qualidade']}',
            oleo_observacao = '{$dados['oleo_observacao']}',
            oleo_foto = '{$oleo_foto}',
            luzes_qualidade = '{$dados['luzes_qualidade']}',
            luzes_observacao = '{$dados['luzes_observacao']}',
            luzes_foto = '{$luzes_foto}',
            lataria_qualidade = '{$dados['lataria_qualidade']}',
            lataria_observacao = '{$dados['lataria_observacao']}',
            lataria_foto = '{$lataria_foto}',
            nivel_agua_qualidade = '{$dados['nivel_agua_qualidade']}',
            nivel_agua_observacao = '{$dados['nivel_agua_observacao']}',
            nivel_agua_foto = '{$nivel_agua_foto}',
            equipamentos_seguranca_qualidade = '{$dados['equipamentos_seguranca_qualidade']}',
            equipamentos_seguranca_observacao = '{$dados['equipamentos_seguranca_observacao']}',
            equipamentos_seguranca_foto = '{$equipamentos_seguranca_foto}',
            pneu_traseiro_direito_qualidade = '{$dados['pneu_traseiro_direito_qualidade']}',
            pneu_traseiro_direito_observacao = '{$dados['pneu_traseiro_direito_observacao']}',
            pneu_traseiro_direito_foto = '{$pneu_traseiro_direito_foto}',
            pneu_dianteiro_esquerdo_qualidade = '{$dados['pneu_dianteiro_esquerdo_qualidade']}',
            pneu_dianteiro_esquerdo_observacao = '{$dados['pneu_dianteiro_esquerdo_observacao']}',
            pneu_dianteiro_esquerdo_foto = '{$pneu_dianteiro_esquerdo_foto}',
            pneu_dianteiro_direito_qualidade = '{$dados['pneu_dianteiro_direito_qualidade']}',
            pneu_dianteiro_direito_observacao = '{$dados['pneu_dianteiro_direito_observacao']}',
            pneu_dianteiro_direito_foto = '{$pneu_dianteiro_direito_foto}'
            WHERE id_checklist = {$dados['id_checklist']}";

        $exec = $this->conn->query($sql);

        if ($exec) {
            return true;
        } else {
            echo "Erro ao editar: " . $this->conn->error;
            echo "<br>SQL: $sql";
            exit;
        }
    }
}

