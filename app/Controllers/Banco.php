<?php

namespace App\Controllers;

Class Banco {
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
      
        $lstClientes = new \App\Models\Banco();
        $ret = $lstClientes->getClientes();

        if($ret <> false){
            $this->dados = $ret;
            $view = new \Core\View("banco/index");
            $view->setDados($this->dados);
            $view->load(); 
        } else {
            $view = new \Core\View("banco/index");
            $view->load();
        }  

    }

}