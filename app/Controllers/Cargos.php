<?php
namespace App\Controllers;

class Cargos {

    private array $dados;
    private array $dadosAux;

    public function __construct() {
        if (!isset($_SESSION['id_user'])) {
            header("Location: /teapp/login");
            exit;
        }

        $modulo_id = 4;

        if (!isset($_SESSION['modulos_permissoes'][$modulo_id])) {
            header("Location: /teapp/rh");
            exit;
        }

        $this->acesso = $_SESSION['modulos_permissoes'][$modulo_id];

        if (!str_contains($this->acesso, 'v')) {
            header("Location: /teapp/rh");
            exit;
        }

        $this->podeEditar  = str_contains($this->acesso, 'e'); 
        $this->podeExcluir = str_contains($this->acesso, 'd'); 

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

        if (!$this->podeEditar) {
            $_SESSION['permEdit'] = true;
            header("Location: /teapp/rh");
            exit;
        }

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

        if (!$this->podeEditar) {
            $_SESSION['permEdit'] = true;
            header("Location: /teapp/rh");
            exit;
        }

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

        if (!$this->podeExcluir) {
            $_SESSION['permDelete'] = true;
            header("Location: /teapp/rh");
            exit;
        }

        $model = new \App\Models\Cargos();
        $ret = $model->excluir($id);

        if ($ret != 0) {
            $_SESSION['dbDelete'] = true;
            header("Location: /teapp/rh");
        } else {
            echo "Cargo não encontrado.";
        }
    }
}