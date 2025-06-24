<?php

namespace App\Models;

class Arquivos extends DB {
    private object $conn;

    public function __construct() {
        
        $this->conn = $this->conectar();        
        
    }

    public function getArquivos() {
        
        $sql = "SELECT * FROM ccc_cli_arquivos";

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
    public function setNovoArquivo () {
        
        $sql = "INSERT INTO ccc_cli_arquivos ( nome_arq, titulo_arq, conteudo_arq, tipo_aql) VALUES 
        ('$nome_arq','$titulo','$conteudo','$tipo')";
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
}