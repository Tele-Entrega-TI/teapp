<?php
namespace App\Controllers;

class Cargos {

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

    public function Index() {
        $model = new \App\Models\Cargos();
        $ret = $model->index();

        if ($ret <> false) {
            $this->dados = $ret;
            $view = new \Core\View("cargos/index");
            $view->setDados($this->dados);
            $view->load();
        } else {
            $view = new \Core\View("cargos/index");
            $view->load();
        }
    }

    public function Adicionar() {
        $view = new \Core\View("cargos/adicionar");
        $view->load();
    }

    public function AdicionarACT() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Cargos();
            $ret = $model->adicionar($dadosForm);

            if ($ret) {
                $_SESSION['dbInsert'] = true;
                header("Location: /teapp/cargos");
                exit;
            } else {
                $_SESSION['dbInsert'] = false;
                header("Location: /teapp/cargos/adicionar");
                exit;
            }
        }
    }

    public function Editar($id) {
        $model = new \App\Models\Cargos();
        $ret = $model->buscar($id);

            if ($ret != 0) {
            $this->dados = $ret;

            $view = new \Core\View("cargos/editar");
            $view->setDados($this->dados);
            $view->load();
            } else {

            echo "Cargo não encontrado.";
        }
    }

    public function EditarAct() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Cargos();
            $ret = $model->editar($dados);

            if ($ret) {
                $_SESSION['dbUpdate'] = true;
                header("Location: /teapp/cargos");
                exit;
            } else {
                $_SESSION['dbUpdate'] = false;
                header("Location: /teapp/cargos/editar/" . $dados['id_cargo']);
                exit;
            }
        }
    }

    public function Excluir($id) {
        $model = new \App\Models\Cargos();
        $ret = $model->excluir($id);

        if ($ret != 0) {
            $_SESSION['dbDelete'] = true;
            header("Location: /teapp/cargos");
        } else {
            echo "Cargo não encontrado.";
        }
    }
}