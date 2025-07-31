<?php

namespace App\Models;

class ModulosAcesso extends DB {

    private object $conn;
    private array $dados;

    public function __construct() {
        $this->conn = $this->conectar();
    }

    public function listar_por_funcionario($id_funcionario) {
        $sql = "SELECT 
                    m.id_modulo,
                    a.tipo AS permissao
                FROM modulos_acesso a
                INNER JOIN modulos_sys m ON m.id_modulo = a.id_modulo
                WHERE a.id_funcionario = $id_funcionario 
                  AND a.id_grupo = 0 
                  AND a.ativo = 1";

        $consulta = $this->conn->query($sql);

        $dados = [];

        if ($consulta && $consulta->num_rows > 0) {
            while ($row = $consulta->fetch_assoc()) {
                $row['permissao']   = trim($row['permissao']);
                $dados[] = $row;
            }
            return $dados;
        } else {
            return 0;
        }
    }




    public function listar_ids_por_funcionario($id_funcionario) {
        $sql = "SELECT id_modulo FROM modulos_acesso 
                WHERE id_funcionario = $id_funcionario AND id_grupo = 0";

        $consulta = $this->conn->query($sql);

        $modulos = [];

        if ($consulta && $consulta->num_rows > 0) {
            while ($row = $consulta->fetch_assoc()) {
                $modulos[] = (int)$row['id_modulo'];
            }
        }

        return $modulos;
    }



    public function buscar($id_funcionario, $id_modulo) {
        $sql = "SELECT * FROM modulos_acesso WHERE id_funcionario = $id_funcionario AND id_modulo = $id_modulo LIMIT 1";
        $consulta = $this->conn->query($sql);

        if ($consulta && $consulta->num_rows > 0) {
            return $consulta->fetch_assoc();
        } else {
            return 0;
        }
    }

    public function salvar(array $dados) {
        $id_funcionario = $dados['id_funcionario'];
        $id_modulo = $dados['id_modulo'];
        $tipo = $this->conn->real_escape_string($dados['tipo']);
        $id_grupo = $dados['id_grupo'];

        $verifica = $this->buscar($id_funcionario, $id_modulo);

        if ($verifica <> 0) {
            $sql = "UPDATE modulos_acesso 
                    SET tipo = '$tipo', 
                        id_grupo = $id_grupo
                    WHERE id_funcionario = $id_funcionario AND id_modulo = $id_modulo";
        } else {
            $sql = "INSERT INTO modulos_acesso (id_funcionario, id_modulo, tipo, id_grupo)
                    VALUES (
                        $id_funcionario,
                        $id_modulo,
                        '$tipo',
                        $id_grupo
                    )";
        }

        $ret = $this->conn->query($sql);

        if ($ret) {
            return true;
        } else {
            echo "Erro ao salvar: " . $this->conn->error;
            echo "<br>SQL: $sql";
            exit;
        }
    }

    public function remover_por_funcionario($id_funcionario) {
        $sql = "DELETE FROM modulos_acesso WHERE id_funcionario = $id_funcionario";
        $this->conn->query($sql);
    }
}
