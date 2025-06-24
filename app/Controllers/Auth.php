<?php

namespace App\Controllers;

Class Auth {

    public function index() {

        if(!isset ($_SESSION['auth_Login']) == false)
        {
            header("Location: ./inicio");
        }

        $view = new \Core\View("auth_Login/index");
        $view->load();
       
    }

    public function validation() {

    	$email = $_POST['email'];
    	$senha = $_POST['senha'];
    	$Login = new \App\Models\Login();
        
        // chamo o retorno
        $aut = $Login->validar_usuario($email, $senha);
        
        // se os dados forem diferentes de falso, atribuo o array
        if($aut <> false){
            $_SESSION['auth_Login'] = true;
            header("Location: ../inicio");
        }else{
        	$_SESSION['erro'] = true;
        	unset($_SESSION['auth_Login']);
    		header("Location: ../auth");
        }

    }

    public function desconectar() {

    	unset($_SESSION['auth_Login']);
    	header("Location: ../auth");
 		
    }
}