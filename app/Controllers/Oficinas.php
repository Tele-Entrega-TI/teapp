<?php
namespace App\Controllers;

class Oficinas {

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

    public function index() {

        $model = new \App\Models\Oficinas();
        $ret   = $model->index();
        $view = new \Core\View("oficinas/index");
        if ($ret !== 0) {
            $this->dados = $ret;
            $view->setDados($this->dados);
        } else {
            $view->setDados([]);
        }
        $view->load();
    }

    public function Adicionar() {

        $view = new \Core\View("oficinas/adicionar");
        $view->setDados([]);
        $view->load();
    }

    public function AdicionarACT() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Oficinas();
            $ret = $model->adicionar($dadosForm);
            $_SESSION['dbInsert'] = $ret ? true : false;
            header("Location: /teapp/oficinas");
            exit;
        }
    }

    public function Editar($id) {

        $id = intval($id);
        $model = new \App\Models\Oficinas();
        $ret = $model->buscar($id);
        if ($ret !== 0) {
            $this->dados = $ret;
            $view = new \Core\View("oficinas/editar");
            $view->setDados($this->dados);
            $view->load();
        } else {
            echo "Oficina não encontrada.";
        }
    }

    public function EditarACT() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Oficinas();
            $ret = $model->editar($dadosForm);
            $_SESSION['dbUpdate'] = $ret ? true : false;
            header("Location: /teapp/oficinas");
            exit;
        }
    }

    public function Excluir($id) {
        
        $id = intval($id);
        $model = new \App\Models\Oficinas();
        $ret = $model->excluir($id);
        $_SESSION['dbDelete'] = $ret ? true : false;
        header("Location: /teapp/oficinas");
        exit;
    }
}
