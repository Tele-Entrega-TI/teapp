<?php

namespace App\Controllers;

Class Artigos{

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

    public function Novo() {
      
            $view = new \Core\View("/artigos/novo");
            $view->load();

    }


    /*public function novoSubmt() {

        $categoria = $_POST['pswr_ctgr'];
        $titulo = $_POST['pswr_titulo'];
        $conteudo = $_POST['pswr_content'];
        $dataPostagem = $_POST['pswr_dtCadastro'];

        $addArtigo = new \App\Models\Artigos();
        $ret = $addArtigo->add_Artigos($categoria, $titulo, $conteudo, $dataPostagem);

        if($ret == true){
            $_SESSION['dbInsert'] = true;
            header("Location: ".HOME."/artigos");
        } else {
            $_SESSION['dbInsert'] = false;
            echo "Erro no procedimento! ".$ret;
        }  


        
        
    }

    public function categorias() {
        
       
            $view = new \Core\View("clientes/categorias");
            $view->load();
        
        
        $view = new \Core\View("ev_Artigos/categorias"); 
        $view->load(); 
        
    }
   
    public function subcategorias() {
        
        $view = new \Core\View("ev_Artigos/categorias"); 
        $view->load(); 
    }

 */
}