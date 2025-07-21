<?php

namespace App\Controllers;

class Empresas {

    private array $dados;

    public function __construct() {}

    public function Index() {
        $model = new \App\Models\Empresas();
        $ret = $model->index();

        $view = new \Core\View("empresas/index");
        if ($ret <> false) {
            $this->dados = $ret;
            $view->setDados($this->dados);
        }
        $view->load();
    }

    public function Adicionar() {
        $view = new \Core\View("empresas/adicionar");
        $view->setDados([]);
        $view->load();
    }

    public function AdicionarACT() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Empresas();
            $ret = $model->adicionar($dadosForm);

            $_SESSION['dbInsert'] = $ret ? true : false;
            header("Location: /teapp/empresas");
            exit;
        }
    }

    // Método para abrir o formulário de edição via GET
    public function Editar($id) {
        $model = new \App\Models\Empresas();
        $ret = $model->buscar($id);

        if ($ret != 0) {
            $this->dados = $ret;
            $view = new \Core\View("empresas/editar");
            $view->setDados($this->dados);
            $view->load();
        } else {
            echo "Empresa não encontrada.";
        }
    }

    public function EditarACT() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Empresas();
            $ret = $model->editar($dadosForm);

            $_SESSION['dbUpdate'] = $ret ? true : false;
            header("Location: /teapp/empresas");
            exit;
        }
    }

    public function Excluir($id = null) {
        if (empty($id)) {
            header("Location: /teapp/empresas");
            exit;
        }

        $model = new \App\Models\Empresas();
        $ret = $model->excluir($id);

        $_SESSION['dbDelete'] = $ret ? true : false;
        header("Location: /teapp/empresas");
        exit;
    }
}
