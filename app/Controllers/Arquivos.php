<?php

namespace App\Controllers;

Class Arquivos {

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
      
        $view = new \Core\View("arquivos/index");
        $view->load();

    }

    public function addNovo() {
      

            $view = new \Core\View("arquivos/add_Arquivos");
            $view->load();

    }

    public function setArquivos() {      

        $arquivo = $_FILES["arquivo"]["tmp_name"]; 
        $tamanho = $_FILES["arquivo"]["size"];
       
        if ( $arquivo != "none" )
        {
        $fp = fopen($arquivo, "rb");
        $conteudo = fread($fp, $tamanho);
        $conteudo = addslashes($conteudo);
        fclose($fp); 
       
        $addArquivos = new \App\Models\Arquivos();
        $ret = $addArquivos->setNovoArquivo($arquivo, $tamanho);

        if($ret == true){
            $_SESSION['dbInsert'] = true;
            header("Location: /since/arquivos");
        } else {
            $_SESSION['dbInsert'] = false;
            echo "Erro no procedimento! ".$ret;
        }  

    }

    }

}