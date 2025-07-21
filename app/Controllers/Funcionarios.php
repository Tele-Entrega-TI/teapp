<?php
namespace App\Controllers;

class Funcionarios {

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
        $model = new \App\Models\Funcionarios();
        $ret = $model->index();

        if ($ret <> false) {
            $this->dados = $ret;
            $view = new \Core\View("funcionarios/index");
            $view->setDados($this->dados);
            $view->load();
        } else {
            $view = new \Core\View("funcionarios/index");
            $view->load();
        }
    }

    public function Adicionar() {
        $view = new \Core\View("funcionarios/adicionar");
        $view->load();
    }

    public function AdicionarACT() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Funcionarios();
            $ret = $model->adicionar($dadosForm);

            if ($ret) {
                $_SESSION['dbInsert'] = true;
                header("Location: /teapp/funcionarios");
                exit;
            } else {
                $_SESSION['dbInsert'] = false;
                header("Location: /teapp/funcionarios/adicionar");
                exit;
            }
        }
    }

        public function Ver($id) {
            $model = new \App\Models\Funcionarios();
            $ret = $model->buscar($id);

            $view = new \Core\View("funcionarios/ver");
            if ($ret) {
                $this->dados = $ret;
                $view->setDados($this->dados);
            }
            $view->load();
        }



    public function Editar($id) {
        $model = new \App\Models\Funcionarios();
        $ret = $model->buscar($id);

            if ($ret != 0) {
            $this->dados = $ret;

            $view = new \Core\View("funcionarios/editar");
            $view->setDados($this->dados);
            $view->load();
            } else {

            echo "Funcionario não encontrado.";
        }
    }

    public function EditarAct() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Funcionarios();
            $ret = $model->editar($dados);

            if ($ret) {
                $_SESSION['dbUpdate'] = true;
                header("Location: /teapp/funcionarios");
                exit;
            } else {
                $_SESSION['dbUpdate'] = false;
                header("Location: /teapp/funcionarios/editar/" . $dados['id_funcionario']);
                exit;
            }
        }
    }

}