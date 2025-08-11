<?php

namespace App\Controllers;

class Locacoes {

    private array $dados;

    public function __construct() {

        if (!isset($_SESSION['id_user'])) {
            header("Location: /teapp/login");
            exit;
        }

        $modulo_id = 17;

        if (!isset($_SESSION['modulos_permissoes'][$modulo_id])) {
            $_SESSION['semPermissaoAoModulo'] = true;
            header("Location: /teapp/");
            exit;
        }

        $this->acesso = $_SESSION['modulos_permissoes'][$modulo_id];

        // if (!str_contains($this->acesso, 'v')) {
        //     header("Location: /teapp/rh");
        //     exit;
        // }

        $this->podeEditar  = str_contains($this->acesso, 'e'); 
        $this->podeExcluir = str_contains($this->acesso, 'd'); 
    }

    public function Index() {
        $model = new \App\Models\Locacoes();
        $formatador = new \Core\Formatador();
        $ret = $model->index();

        $view = new \Core\View("locacoes/index");
        if ($ret != 0) {
            $ret = $formatador->setCaps($ret);
            $this->dados = $ret;
            $view->setDados($this->dados);
        }
        $view->load();
    }

    public function Adicionar() {

        if (!$this->podeEditar) {
            $_SESSION['permEdit'] = true;
            header("Location: /teapp/operacional");
            exit;
        }

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

        if (!$this->podeEditar) {
            $_SESSION['permEdit'] = true;
            header("Location: /teapp/operacional");
            exit;
        }

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

        if (!$this->podeExcluir) {
            $_SESSION['permDelete'] = true;
            header("Location: /teapp/locacoes");
            exit;
        }

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
