<?php

namespace App\Models;

class Clientes extends DB {
    private object $conn;

    public function __construct() {
        
        $this->conn = $this->conectar();        
        
    }

    public function getClientes() {
        
        $sql = "SELECT * FROM ccc_cli_gruposemp RIGHT JOIN ccc_cli_empr ON ccc_cli_empr.idGrupo=ccc_cli_gruposemp.idGrupo ORDER BY n_cnpj_cpf";

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

    public function getClienteUnico($id) {
        $sql = "SELECT * FROM ccc_cli_empr WHERE id ='".$id."'";

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

    public function getGrupos() {
        
        $sql = "SELECT * FROM ccc_cli_gruposemp";

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

    public function setInativo($id) {

        $sql = "UPDATE ccc_cli_empr SET status = '0' WHERE id = $id";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        }else{
            return false;
        }
     
    }

    public function setAtivo($id) {
        
        $sql = "UPDATE ccc_cli_empr SET status = '1' WHERE id = $id";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        }else{
            return false;
        }
     
    }

    public function setClientes($id, $razaosoc, $nomeFantasia, $cnpj, $endereco, $bairro, $municipio, $status) {
       
        $sql = "UPDATE ccc_cli_empr SET n_cnpj_cpf = '".$cnpj."', razão_nome = '".$razaosoc."', fantasia_apelido = '".$nomeFantasia."', endereco = '".$endereco."', status = '".$status."' WHERE id = ".$id;

        if ($this->conn->query($sql) === TRUE) {
            return true;
        }else{
            return false;
        }
        
    }

    public function add_Clientes($razao, $fantasia, $cnpj, $endereco, $numero, $complemento, $bairro, $municipio, $estado, $situacao, $data, $status) {
       
        $sql = "INSERT INTO ccc_cli_empr (razão_nome, fantasia_apelido, n_cnpj_cpf, endereco, numero, complemento, bairro, cidade, estado, situacao_cadastral, data_cadastro, status) VALUES ('".$razao."', '".$fantasia."','".$cnpj."', '".$endereco."', '".$numero."','".$complemento."','".$bairro."', '".$municipio."','".$estado."','".$situacao."','".$data."','".$status."')";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        }else{
            return false;
        }
        
    }
    
    public function setGrupos($nomegrupo, $dataCadastro,$statuss) {
        
        $sql = "INSERT INTO ccc_cli_gruposemp (nomeGrupo, dataCadastro, status) VALUES ('".$nomegrupo."','".$dataCadastro."','".$statuss."')";

        if ($this->conn->query($sql) === TRUE) {
            return true;
        }else{
            return false;
        }
        
    }

}
