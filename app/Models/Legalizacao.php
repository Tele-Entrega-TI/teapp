<?php

namespace App\Models;

class Legalizacao extends DB

{
    private object $conn;
   
    public function __construct() {

        $this->conn = $this->conectar();        
        
    }
 

    public function getLicenca() {
        
        $sql = "SELECT * FROM cpset_leg_tipos";

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

    public function setNovaLicenca($nometipo, $vencimento_padrao, $dataCadastro, $status) {
        
        $sql = "INSERT INTO cpset_leg_tipos (nome_tipo, vencimento_padrao, data_cadastro, status) VALUES ('".$nometipo."','".$vencimento_padrao."','".$dataCadastro."', '".$status."')";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        }else{
            return false;
        }
        
    }


}
