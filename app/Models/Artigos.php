<?php

namespace App\Models;

class Artigos extends DB {
    private object $conn;

    public function __construct() {
        
        $this->conn = $this->conectar();        
        
    }

    public function add_Artigos($categoria, $titulo, $conteudo, $dataPostagem) {
        $sql = "INSERT INTO mi_pswr (pswr_ttl, pswr_ctgr_id, pswr_txt, pswr_dtPub, pswr_dtCad, pswr_aul_id) VALUES ('".$this->conn->real_escape_string($titulo)."', '".$this->conn->real_escape_string($categoria)."', '".$this->conn->real_escape_string($conteudo)."', '".$this->conn->real_escape_string($dataPostagem)."', '".$this->conn->real_escape_string(date('Y-m-d H:i:s'))."', '".$this->conn->real_escape_string($_SESSION['idUsr'])."')";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        }else{
            return false;
        }
        
    }

    public function index_Artigos() {
        $sql = "SELECT * FROM mi_pswr, mi_pswr_ctgr WHERE mi_pswr.pswr_ctgr_id=mi_pswr_ctgr.pswr_ctgr_id ORDER BY pswr_dtPub DESC";

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
