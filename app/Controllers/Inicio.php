<?php

namespace App\Controllers;

Class Inicio {

    public function __construct(){

        // Filtro para determinar se o usuário está logado
        if(!isset ($_SESSION['auth_Login']) == true)
        {
           // header("Location: ./inicio");
        }
    }

    public function Index() {
        
        $view = new \Core\View("home/index"); 
        $view->load(); 

    }

    public function logar() {
        
        echo "Função logar funcionando corretamente!";

    }

}