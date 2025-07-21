<?php
namespace App\Controllers;

class Substitutos {

    private array $dados;

    public function __construct() {
        // Filtro de login (opcional)
        /*
        if (!isset($_SESSION['auth_Login']) == true) {
            // header("Location: ./auth");
        }
        */
    }

    public function Index() {
        $model = new \App\Models\Substitutos();
        $ret = $model->index();

        $view = new \Core\View("substitutos/index");
        if ($ret <> false) {
            $this->dados = $ret;
            $view->setDados($this->dados);
        }
        $view->load();
    }

    public function Adicionar() {
        $model = new \App\Models\Substitutos();

        $this->dados['funcionarios'] = $model->listar_funcionarios();
        $this->dados['locacoes'] = $model->listar_locacoes();

        $view = new \Core\View("substitutos/adicionar");
        $view->setDados($this->dados);
        $view->load();
    }

    public function AdicionarACT() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Substitutos();
            $ret = $model->adicionar($dadosForm);

            $_SESSION['dbInsert'] = $ret ? true : false;
            header("Location: /teapp/substitutos");
            exit;
        }
    }

    public function Editar($id) {
        $model = new \App\Models\Substitutos();
        $ret = $model->buscar($id);

        if ($ret <> 0) {
            $this->dados = $ret;

            $this->dados['funcionarios'] = $model->listar_funcionarios();
            $this->dados['locacoes'] = $model->listar_locacoes();

            $view = new \Core\View("substitutos/editar");
            $view->setDados($this->dados);
            $view->load();
        } else {
            echo "Substituto não encontrado.";
        }
    }

    public function EditarACT() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_substituto'])) {
            $model = new \App\Models\Substitutos();
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $ret = $model->editar($dadosForm);

            $_SESSION['dbUpdate'] = $ret ? true : false;
            header("Location: /teapp/substitutos");
            exit;
        } else {
            header("Location: /teapp/substitutos");
            exit;
        }
    }

    public function Excluir($id) {
        $model = new \App\Models\Substitutos();
        $ret = $model->excluir($id);

        if ($ret <> 0) {
            $_SESSION['dbDelete'] = true;
        } else {
            $_SESSION['dbDelete'] = false;
        }
        header("Location: /teapp/substitutos");
        exit;
    }
}
