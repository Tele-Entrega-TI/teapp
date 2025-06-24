<?php
namespace App\Controllers;

class Gestores {

    private array $dados;
    private array $dadosAux;

    public function __construct() {
        // Filtro de login (opcional)
        /*
        if (!isset($_SESSION['auth_Login']) == true) {
            // header("Location: ./auth");
        }
        */
    }

    public function Index() {
        $model = new \App\Models\Gestores();
        $ret = $model->index();

        if ($ret <> false) {
            $this->dados = $ret;
            $view = new \Core\View("gestores/index");
            $view->setDados($this->dados);
            $view->load();
        } else {
            $view = new \Core\View("gestores/index");
            $view->load();
        }
    }

    public function Adicionar() {
        $view = new \Core\View("gestores/adicionar");
        $view->setDados([]);
        $view->load();
    }

    public function AdicionarACT() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Gestores();
            $ret = $model->adicionar($dadosForm);

            if ($ret) {
                $_SESSION['dbInsert'] = true;
                header("Location: /teapp/gestores");
                exit;
            } else {
                $_SESSION['dbInsert'] = false;
                header("Location: /teapp/gestores/adicionar");
                exit;
            }
        }
    }

    public function Editar($id) {
        $model = new \App\Models\Gestores();
        $ret = $model->buscar($id);

        if ($ret != 0) {
            $this->dados = $ret;
            $view = new \Core\View("gestores/editar");
            $view->setDados($this->dados);
            $view->load();
        } else {
            echo "Gestor não encontrado.";
        }
    }

    public function EditarACT() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_gestor'])) {
            $model = new \App\Models\Gestores();
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $ret = $model->editar($dadosForm);

            if ($ret) {
                $_SESSION['dbUpdate'] = true;
                header("Location: /teapp/gestores");
                exit;
            } else {
                $_SESSION['dbUpdate'] = false;
                header("Location: /teapp/gestores");
                exit;
            }
        } else {
            header("Location: /teapp/gestores");
            exit;
        }
    }

    public function Excluir($id) {
        $model = new \App\Models\Gestores();
        $ret = $model->excluir($id);

        if ($ret != 0) {
            $_SESSION['dbDelete'] = true;
            header("Location: /teapp/gestores");
        } else {
            echo "Gestor não encontrado.";
        }
    }
}
