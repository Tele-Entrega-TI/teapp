<?php

namespace App\Models;

class Usuarios extends DB {
    private object $conn;
    private array $dados;

    public function __construct() {
        
        $this->conn = $this->conectar();        
        
    }

    public function listar_ctgr() {
        
        $sql = "SELECT pswr_ctgr_id, pswr_ctgr_categoria, pswr_ctgr_enable FROM mi_pswr_ctgr";
        $consulta = $this->conn->query($sql);
        
        if ($consulta->num_rows > 0) {
            while($row = $consulta->fetch_assoc()) {
                 $obj[] = $row;
            }
            return $obj;
        }else{
            return 0;
        }
        
    }

    public function add_Senha($idUser, $senha) {

        $senha = md5($senha);
        
        $sql = "INSERT INTO aul_vds (id_colaborador, senha, data_cadastro) VALUES ('".$this->conn->real_escape_string($idUser)."', '".$this->conn->real_escape_string($senha)."', '".$this->conn->real_escape_string(date('Y-m-d H:i:s')).")";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        }else{
            return false;
        }
        
    }

}
