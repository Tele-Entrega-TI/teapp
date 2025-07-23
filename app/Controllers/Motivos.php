<?php

namespace App\Controllers;

class Motivos {

    private array $dados;

    public function __construct() {}

    public function Index() {
        $model = new \App\Models\Motivos();
        $ret = $model->index();

        $view = new \Core\View("motivos/index");
        if ($ret <> 0) {
            $this->dados = $ret;
            $view->setDados($this->dados);
        }
        $view->load();
    }

    public function Adicionar() {
        $model = new \App\Models\Motivos();
        

        $view = new \Core\View("motivos/adicionar");
        $view->setDados([]);
        $view->load();
    }

    public function AdicionarACT() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Motivos();
            $ret = $model->adicionar($dadosForm);

            $_SESSION['dbInsert'] = $ret ? true : false;
            header("Location: /teapp/motivos");
            exit;
        }
    }
    public function Editar($id) {

        $model = new \App\Models\Motivos();
        $ret = $model->buscar($id);

        if($ret <> 0){
            $this->dados = $ret;
            $view = new \Core\View("motivos/editar");
            $view->setDados($this->dados);
            $view->load();
            } else {
            echo "Motivo não encontrado.";
        }
    }

    public function EditarACT() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Motivos();
            $ret = $model->editar($dadosForm);

            $_SESSION['dbUpdate'] = $ret ? true : false;
            header("Location: /teapp/motivos");
            exit;
        }
    }

    public function Excluir($id) {
        $model = new \App\Models\Motivos();
        $ret = $model->excluir($id);

        if ($ret != 0) {
            $_SESSION['dbDelete'] = true;
            header("Location: /teapp/motivos");
        } else {
            echo "Motivo não encontrado.";
        }
    }
}    