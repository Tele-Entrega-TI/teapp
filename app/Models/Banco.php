<?php

namespace App\Models;

class Banco extends DB {
    private object $conn;

    public function __construct() {
        
        $this->conn = $this->conectar();        
        
    }

    public function getClientes() {
        
        $sql = "SELECT * FROM ccc_cli_empr";

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