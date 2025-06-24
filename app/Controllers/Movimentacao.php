<?php

namespace App\Controllers;

class Movimentacao {

    private array $dados;

    public function __construct() {}

    public function Index() {
        $model = new \App\Models\Movimentacao();
        $ret = $model->index();

        $view = new \Core\View("movimentacao/index");

        $this->dados['movimentacoes'] = ($ret <> 0) ? $ret : [];
        $view->setDados($this->dados);
        $view->load();
    }


    public function Adicionar() {
        $model = new \App\Models\Movimentacao();

        $this->dados['veiculos'] = $model->listar_veiculos();
        $this->dados['funcionarios'] = $model->listar_funcionarios();

        $view = new \Core\View("movimentacao/adicionar");
        $view->setDados($this->dados);
        $view->load();
    }

    public function AdicionarACT() {    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Movimentacao();
            $ret = $model->adicionar($dadosForm);

            $_SESSION['dbInsert'] = $ret ? true : false;
            header("Location: /teapp/movimentacao");
            exit;
        }
    }

    public function Finalizar($id_veiculo) {
        $model = new \App\Models\Movimentacao();
        $ret = $model->finalizar($id_veiculo);

            if ($ret) {
            header("Location: /teapp/movimentacao");
                exit;
            } else {
            echo "Erro ao finalizar movimentação.";
        }
    }
}
