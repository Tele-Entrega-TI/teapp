<?php

namespace App\Models;

class Login extends DB
{
    private object $conn;

    public function __construct() {
        
        $this->conn = $this->conectar();        
        
    }

    public function validar_usuario($email, $senha) {
        $sql = "SELECT aul_id, aul_usuario, aul_dtCad, aul_enable FROM mi_aul WHERE aul_email='".$this->conn->real_escape_string($email)."' AND aul_senha='".$this->conn->real_escape_string($senha)."'";
        
        $consulta = $this->conn->query($sql);
        
        if ($consulta->num_rows > 0) {
            while ($linha = $consulta->fetch_assoc()) {
                $_SESSION['idUsr'] = $linha['aul_id'];
                $_SESSION['nomeUsr'] = strtoupper($linha['aul_usuario']);
            }
            return true;
        }else{
            return false;
        }
        
    }

}
