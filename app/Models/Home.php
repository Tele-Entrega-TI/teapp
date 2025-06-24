<?php

namespace App\Models;

class Home extends DB
{
    private object $conn;
   
    public function __construct() {

        $this->conn = $this->conectar();        
        
    }

    public function listar_lote() {
        $sql = "SELECT COUNT(id) as nLotes FROM nfts_lote";
        $consulta = $this->conn->query($sql);
        
        if ($consulta->num_rows > 0) {
            while($row = $consulta->fetch_assoc()) {
                $obj = $row['nLotes'];
            }
            return $obj;
        }else{
            return 0;
        }

    }

    public function listar_notas() {
        $sql = "SELECT COUNT(id) as nNotas FROM nfts_movimento";
        $consulta = $this->conn->query($sql);
        
        if ($consulta->num_rows > 0) {
            while($row = $consulta->fetch_assoc()) {
                $obj = $row['nNotas'];
            }
            return $obj;
        }else{
            return 0;
        }

    }

    public function listar_fornecedores() {
        $sql = "SELECT COUNT(id) as nFornecedores FROM cad_fornecedores";
        $consulta = $this->conn->query($sql);
        
        if ($consulta->num_rows > 0) {
            while($row = $consulta->fetch_assoc()) {
                $obj = $row['nFornecedores'];
            }
            return $obj;
        }else{
            return 0;
        }

    }

  

}
