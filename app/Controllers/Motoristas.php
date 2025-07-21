<?php

namespace App\Controllers;

class Motoristas {

    private array $dados;

    public function __construct() {}

    public function Index() {
        $model = new \App\Models\Motoristas();
        $ret = $model->index();

        $view = new \Core\View("motoristas/index");
        if ($ret <> false) {
            $this->dados = $ret;
            $view->setDados($this->dados);
        }
        $view->load();
    }

    public function Adicionar() {
        $view = new \Core\View("motoristas/adicionar");
        $view->setDados([]);
        $view->load();
    }

    public function AdicionarACT() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Motoristas();
            $ret = $model->adicionar($dadosForm);

            $_SESSION['dbInsert'] = $ret ? true : false;
            header("Location: /teapp/motoristas");
            exit;
        }
    }

    
    public function Editar($id) {
        $model = new \App\Models\Motoristas();
        $ret = $model->buscar($id);

        if ($ret != 0) {
            $this->dados = $ret;
            $view = new \Core\View("motoristas/editar");
            $view->setDados($this->dados);
            $view->load();
        } else {
            echo "Motorista não encontrado.";
        }
    }

    public function EditarACT() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Motoristas();
            $ret = $model->editar($dadosForm);

            $_SESSION['dbUpdate'] = $ret ? true : false;
            header("Location: /teapp/motoristas");
            exit;
        }
    }

    public function Excluir($id = null) {
        if (empty($id)) {
            header("Location: /teapp/motoristas");
            exit;
        }

        $model = new \App\Models\Motoristas();
        $ret = $model->excluir($id);

        $_SESSION['dbDelete'] = $ret ? true : false;
        header("Location: /teapp/motoristas");
        exit;
    }
}
