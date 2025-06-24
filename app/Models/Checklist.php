<?php

namespace App\Models;

class Checklist extends DB {

    private object $conn;

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
                ORDER BY c.id_checklist DESC";

        $query = $this->conn->query($sql);

        if ($query && $query->num_rows > 0) {
            while ($row = $query->fetch_assoc()) {
                $obj[] = $row;
            }
            return $obj;
        } else {
            return 0;
        }
    }




    public function adicionar(array $dados) {
        $id_veiculo = $dados['id_veiculo'];
        $data_checklist = $dados['data_checklist'];
        $pneus_ok = $dados['pneus_ok'] ?? 0;
        $freios_ok = $dados['freios_ok'] ?? 0;
        $oleo_ok = $dados['oleo_ok'] ?? 0;
        $luzes_ok = $dados['luzes_ok'] ?? 0;
        $lataria_ok = $dados['lataria_ok'] ?? 0;
        $nivel_agua_ok = $dados['nivel_agua_ok'] ?? 0;
        $equipamentos_seguranca_ok = $dados['equipamentos_seguranca_ok'] ?? 0;
        $observacoes = $dados['observacoes'];
        $assinatura_motorista = $dados['assinatura_motorista'];

        $sql = "INSERT INTO veiculo_checklists (
                    id_veiculo, data_checklist, pneus_ok, freios_ok, oleo_ok,
                    luzes_ok, lataria_ok, nivel_agua_ok, equipamentos_seguranca_ok,
                    observacoes, assinatura_motorista
                ) VALUES (
                    '$id_veiculo', '$data_checklist', '$pneus_ok', '$freios_ok', '$oleo_ok',
                    '$luzes_ok', '$lataria_ok', '$nivel_agua_ok', '$equipamentos_seguranca_ok',
                    '$observacoes', '$assinatura_motorista'
                )";

        if ($this->conn->query($sql)) {
            return true;
        } else {
            echo "Erro ao inserir: " . $this->conn->error . "<br>";
            echo "SQL: $sql";
            return false;
        }
    }
}
