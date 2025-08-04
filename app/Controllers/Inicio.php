<?php

namespace App\Controllers;

Class Inicio {

    public function __construct() {

        if (!isset($_SESSION['id_user'])) {
    header("Location: /teapp/login");
    exit;
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