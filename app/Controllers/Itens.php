<?php

namespace App\Controllers;

class Itens {

    private array $dados;
    private array $dadosAux;

    public function __construct() {

        if (!isset($_SESSION['id_user'])) {
            header("Location: /teapp/login");
            exit;
        }

        $modulo_id = 19;

        if (!isset($_SESSION['modulos_permissoes'][$modulo_id])) {
            $_SESSION['semPermissaoAoModulo'] = true;
            header("Location: /teapp/");
            exit;
        }

        $this->acesso = $_SESSION['modulos_permissoes'][$modulo_id];

        // if (!str_contains($this->acesso, 'v')) {
        //     header("Location: /teapp/operacional");
        //     exit;
        // }

        $this->podeEditar  = str_contains($this->acesso, 'e'); 
        $this->podeExcluir = str_contains($this->acesso, 'd'); 
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

        if (!$this->podeEditar) {
            $_SESSION['permEdit'] = true;
            header("Location: /teapp/operacional");
            exit;
        }
        
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
