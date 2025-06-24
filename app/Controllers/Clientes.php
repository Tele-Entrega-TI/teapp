<?php

namespace App\Controllers;

Class Clientes {

    private array $dados;

    public function __construct(){
        /*
        // Filtro para determinar se o usuário está logado
        if(!isset ($_SESSION['auth_Login']) == true)
        {
            //header("Location: ./auth");
        }
        */
    }

    public function index() {
      
        $lstClientes = new \App\Models\Clientes();
        $ret = $lstClientes->getClientes();

        if($ret <> false){
            $this->dados = $ret;
            $view = new \Core\View("clientes/index");
            $view->setDados($this->dados);
            $view->load(); 
        } else {
            $view = new \Core\View("clientes/index");
            $view->load();
        }  

    }

    public function novo() {

            $view = new \Core\View("clientes/add_Cliente");
            $view->load();
    }

    public function novoSubmt() {

        $razao = $_POST['razaoSocial'];
        $fantasia = $_POST['nomeFantasia'];
        $cnpj = $_POST['cnpj'];
        $endereco = $_POST['endereco'];
        $numero = $_POST['numero'];
        $complemento = $_POST['complemento'];
        $bairro = $_POST['bairro'];
        $municipio = $_POST['municipio'];
        $estado = $_POST['estado'];
        $situacao = $_POST['situacao'];
        $status = $_POST['status'];
        $data = $_POST['dataCadastro'];

        $addCliente = new \App\Models\Clientes();
        $ret = $addCliente->add_Clientes($razao, $fantasia, $cnpj, $endereco, $numero, $complemento, $bairro, $municipio, $estado, $situacao, $status, $data);

        if($ret == true){
            $_SESSION['dbInsert'] = true;
            header("Location: /since/clientes");
        } else {
            $_SESSION['dbInsert'] = false;
            echo "Erro no procedimento! ".$ret;
        }  

       
        
    }

    public function grupos() {
      
        $view = new \Core\View("clientes/grupos");
        $lstGrupos = new \App\Models\Clientes();
        $ret = $lstGrupos->getGrupos();

        if($ret <> false){
            $this->dados = $ret;
            $view = new \Core\View("clientes/grupos");
            $view->setDados($this->dados);
            $view->load(); 
        } else {
            $view = new \Core\View("clientes/grupos");
            $view->load();
        }  

    }

    public function inativar() {

        $url = filter_input(INPUT_GET, "url", FILTER_DEFAULT);
        $urlConjunto = explode("/", $url);

        $inativarCliente = new \App\Models\Clientes();
        $ret = $inativarCliente->setInativo($urlConjunto[2]);

        if($ret == true){
            $_SESSION['dbInsert'] = true;
            header("Location: /since/clientes");
        } else {
            $_SESSION['dbInsert'] = false;
            echo "Erro no procedimento! ".$ret;
        }  
        
    }

    public function ativar() {

        $url = filter_input(INPUT_GET, "url", FILTER_DEFAULT);
        $urlConjunto = explode("/", $url);

        $ativarCliente = new \App\Models\Clientes();
        $ret = $ativarCliente->setAtivo($urlConjunto[2]);

        if($ret == true){
            $_SESSION['dbInsert'] = true;
            header("Location: /since/clientes");
        } else {
            $_SESSION['dbInsert'] = false;
            echo "Erro no procedimento! ".$ret;
        }  
        
    }

    public function Editar() {

        $url = filter_input(INPUT_GET, "url", FILTER_DEFAULT);
        $urlConjunto = explode("/", $url);


        $editarCliente = new \App\Models\Clientes();
        $ret = $editarCliente->getClienteUnico($urlConjunto[2]);

        if($ret <> false){
            $this->dados = $ret;
            $view = new \Core\View("clientes/editar");
            $view->setDados($this->dados);
            $view->load(); 
        } else {
            echo "Não foi possivel localizar o ID indicado! ".$ret;
    }  
    }

    public function EditarSubmt() {

        $id = $_POST['idCliente'];
        $razaosoc = $_POST['razao'];
        $nomeFantasia = $_POST['nomeFantasia'];
        $cnpj = $_POST['cnpj'];
        $endereco = $_POST['endereco'];
        $bairro = $_POST['bairro'];
        $municipio = $_POST['municipio'];
        $status = $_POST['status'];

        $editarCliente = new \App\Models\Clientes();
        $ret = $editarCliente->setClientes($id, $razaosoc, $nomeFantasia, $cnpj, $endereco, $bairro, $municipio, $status);

        if($ret == true){
            $_SESSION['dbInsert'] = true;
            header("Location: /since/clientes");
        } else {
            $_SESSION['dbInsert'] = false;
            echo "Erro no procedimento! ".$ret;
        }  
        
    }

    public function Novogrupo() {

        $view = new \Core\View("clientes/add_Grupo");
        $view->load();
    }

    public function setnovogrupo() {

        $nomegrupo = $_POST['nomegrupo'];
        $dataCadastro = $_POST['dataCadastro'];
        $statuss = $_POST['statuss'];
        
        $addGrupo = new \App\Models\Clientes();
        $ret = $addGrupo->setGrupos($nomegrupo, $dataCadastro, $statuss);

        if($ret == true){
            $_SESSION['dbInsert'] = true;
            header("Location: /since/clientes/grupos");
        } else {
            $_SESSION['dbInsert'] = false;
            echo "Erro no procedimento! ".$ret;
        }   
        
    }

}