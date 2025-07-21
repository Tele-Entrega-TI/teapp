<?php

namespace App\Models;

class ModulosAcesso extends DB {

    private object $conn;
    private array $dados;

    public function __construct() {
        $this->conn = $this->conectar();
    }

    public function listar_por_funcionario($id_funcionario) {
        $sql = "SELECT * FROM modulos_acesso WHERE id_funcionario = $id_funcionario";
        $consulta = $this->conn->query($sql);

        if ($consulta && $consulta->num_rows > 0) {
            $obj = [];

            while ($row = $consulta->fetch_assoc()) {
                $id_modulo = $row['id_modulo'];
                $tipo = $row['tipo'];

                $obj[$id_modulo][] = $tipo;
            }

            return $obj;
        } else {
            return 0;
        }
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
        $tipo = $dados['tipo'];
        $id_grupo = $dados['id_grupo'];

        $verifica = $this->buscar($id_funcionario, $id_modulo);

        if ($verifica <> 0) {
            $sql = "UPDATE modulos_acesso 
                    SET tipo = '" . $this->conn->real_escape_string($tipo) . "', 
                        id_grupo = $id_grupo
                    WHERE id_funcionario = $id_funcionario AND id_modulo = $id_modulo";
        } else {
            $sql = "INSERT INTO modulos_acesso (id_funcionario, id_modulo, tipo, id_grupo)
                    VALUES (
                        $id_funcionario,
                        $id_modulo,
                        '" . $this->conn->real_escape_string($tipo) . "',
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
