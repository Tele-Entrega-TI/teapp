<?php

namespace App\Models;

class ChecklistPublico extends DB {

    private object $conn;

    public function __construct() {
        $this->conn = $this->conectar();
    }

    public function listar() {
        $sql = "SELECT 
                    c.id_checklist,
                    c.id_veiculo,
                    v.placa,
                    v.modelo,
                    f.apelido AS nome_funcionario,
                    c.data_checklist,
                    c.origem,

                    CASE
                        WHEN 
                            c.pneus_qualidade = 'ruim' OR
                            c.freios_qualidade = 'ruim' OR
                            c.oleo_qualidade = 'ruim' OR
                            c.luzes_qualidade = 'ruim' OR
                            c.lataria_qualidade = 'ruim' OR
                            c.nivel_agua_qualidade = 'ruim' OR
                            c.equipamentos_seguranca_qualidade = 'ruim'
                        THEN 0
                        ELSE 1
                    END AS aprovado

                FROM veiculo_checklists c
                LEFT JOIN cad_veiculos v ON v.id_veiculo = c.id_veiculo
                LEFT JOIN mvo_veiculos mv ON mv.id_veiculo = v.id_veiculo AND mv.ativo = 1
                LEFT JOIN cad_funcionarios f ON f.id_funcionario = mv.id_funcionario
                WHERE c.origem = 'publico'
                ORDER BY c.data_checklist DESC";

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

    public function buscar_por_id($id_checklist) {
        $sql = "SELECT 
                    c.*, 
                    v.placa,
                    v.modelo,
                    f.apelido AS nome_funcionario
                FROM veiculo_checklists c
                LEFT JOIN cad_veiculos v ON v.id_veiculo = c.id_veiculo
                LEFT JOIN mvo_veiculos mv ON mv.id_veiculo = v.id_veiculo AND mv.ativo = 1
                LEFT JOIN cad_funcionarios f ON f.id_funcionario = mv.id_funcionario
                WHERE c.id_checklist = '$id_checklist'
                LIMIT 1";

        $query = $this->conn->query($sql);

        if ($query && $query->num_rows > 0) {
            return $query->fetch_assoc();
        } else {
            return 0;
        }
    }
}
