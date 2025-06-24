<?php

namespace App\Controllers;

class Itens {

    private array $dados;
    private array $dadosAux;

    public function __construct() {
        // Caso haja necessidade de checar sessão/autenticação, faça aqui
        // if (!isset($_SESSION['auth_Login'])) {
        //     header("Location: ./auth");
        // }
    }

    public function index() {
        $model = new \App\Models\Itens();
        $ret   = $model->index();

        $view = new \Core\View("itens/index");
        if ($ret <> false) {
            $this->dados = $ret;
            $view->setDados($this->dados);
        }
        $view->load();
    }

    public function Adicionar() {
        $modelOrcamento = new \App\Models\Orcamento();
        $this->dados['orcamentos'] = $modelOrcamento->listar_com_placa();

        $view = new \Core\View("itens/adicionar");
        $view->setDados($this->dados);
        $view->load();
        
    }


public function AdicionarACT() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
        $model = new \App\Models\Itens();
        $ret = $model->adicionar($dadosForm);

        if ($ret) {
            $_SESSION['dbInsert'] = true;
            header("Location: /teapp/itens");
            exit;
        } else {
            $_SESSION['dbInsert'] = false;
            header("Location: /teapp/itens/adicionar");
            exit;
        }
    }
}

}
