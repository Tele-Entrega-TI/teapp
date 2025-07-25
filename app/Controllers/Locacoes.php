
<?php

namespace App\Controllers;

class Locacoes {

    private array $dados;

    public function __construct() {}

    public function Index() {
        $model = new \App\Models\Locacoes();
        $ret = $model->index();

        $view = new \Core\View("locacoes/index");
        if ($ret != 0) {
            $this->dados = $ret;
            $view->setDados($this->dados);
        }
        $view->load();
    }

    public function Adicionar() {
        $view = new \Core\View("locacoes/adicionar");
        $view->setDados([]);
        $view->load();
    }

    public function AdicionarACT() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Locacoes();
            $ret = $model->adicionar($dadosForm);

            $_SESSION['dbInsert'] = $ret ? true : false;
            header("Location: /teapp/locacoes");
            exit;
        }
    }

    public function Editar($id) {
        $model = new \App\Models\Locacoes();
        $ret = $model->buscar($id);

        if ($ret != 0) {
            $this->dados['locacao'] = $ret;
            $view = new \Core\View("locacoes/editar");
            $view->setDados($this->dados);
            $view->load();
        } else {
            echo "Locação não encontrada.";
        }
    }

    public function EditarACT() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Locacoes();
            $ret = $model->editar($dadosForm);

            $_SESSION['dbUpdate'] = $ret ? true : false;
            header("Location: /teapp/locacoes");
            exit;
        }
    }

    public function Excluir($id) {
        $model = new \App\Models\Locacoes();
        $ret = $model->excluir($id);

        if ($ret != 0) {
            $_SESSION['dbDelete'] = true;
            header("Location: /teapp/locacoes");
            exit;
        } else {
            echo "Locação não encontrada.";
        }
    }
}
