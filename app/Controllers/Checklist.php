<?php

namespace App\Controllers;

Class Checklist {

    private array $dados;
    private array $dadosAux;

    public function __construct() {
        // Filtro para determinar se o usuário está logado
        /*
        if (!isset($_SESSION['auth_Login']) == true) {
            // header("Location: ./auth");
        }
        */
    }

    public function index() {

        $model = new \App\Models\Checklist();
        $ret = $model->index();

        $view = new \Core\View("checklist/index");
            if ($ret <> 0) {
            $this->dados = $ret;
            $view->setDados($this->dados);
        }
        
        $view->load();    
    }


    public function Adicionar() {

        $modelVeiculos = new \App\Models\Veiculos();
        $veiculos = $modelVeiculos->index();

        $this->dados['veiculos'] = $veiculos;

        $view = new \Core\View("checklist/adicionar");
        $view->setDados($this->dados);
        $view->load(); 
    }


    public function AdicionarACT() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            $model = new \App\Models\Checklist();
            $ret = $model->adicionar($dadosForm);

            $_SESSION['dbInsert'] = $ret ? true : false;
            header("Location: /teapp/checklist");
            exit;
        }
    }
}