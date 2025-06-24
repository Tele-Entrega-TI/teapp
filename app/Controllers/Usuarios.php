<?php

namespace App\Controllers;

Class Usuarios {

    private array $dados;

    public function __construct(){

        // Filtro para determinar se o usuário está logado
        if(!isset ($_SESSION['auth_Login']) == true)
        {
            //header("Location: ./auth");
        }
    }

    public function index() {

        $lstArtigos = new \App\Models\Artigos();
        $ret = $lstArtigos->index_Artigos();

        if($ret <> false){
            $this->dados = $ret;
            $view = new \Core\View("ev_Artigos/index");
            $view->setDados($this->dados);
            $view->load(); 
        } else {
            $view = new \Core\View("ev_Artigos/index");
            $view->load();
        }  

    }

    public function NovoUsuario() {

        $view = new \Core\View("usuarios/EditarSenha");
        $view->load();
         
    }

    public function EditarSenha() {

        $view = new \Core\View("usuarios/EditarSenha");
        $view->load();
         
    }

    public function EditarSenhaDB() {

        $idUser = 1; // mudar para usuário logado
        $senha = $_POST['senha'];
        

        $addSenha = new \App\Models\Usuarios();
        $ret = $addSenha->add_Senha($idUser, $senha);

        if($ret == true){
            $_SESSION['dbInsert'] = true;
            header("Location: ".HOME."/artigos");
        } else {
            $_SESSION['dbInsert'] = false;
            echo "Erro no procedimento! ".$ret;
        }  

        
    }

    public function novoSubmt() {

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

}