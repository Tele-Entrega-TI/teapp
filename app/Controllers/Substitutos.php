<?php
namespace App\Controllers;

class Substitutos {

    private array $dados;

    public function __construct() {

        if (!isset($_SESSION['id_user'])) {
            header("Location: /teapp/login");
            exit;
        }

        $modulo_id = 6;

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

        if (!$this->podeEditar) {
            $_SESSION['permEdit'] = true;
            header("Location: /teapp/operacional");
            exit;
        }

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

        if (!$this->podeEditar) {
            $_SESSION['permEdit'] = true;
            header("Location: /teapp/operacional");
            exit;
        }

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

        if (!$this->podeExcluir) {
            $_SESSION['permDelete'] = true;
            header("Location: /teapp/operacional");
            exit;
        }

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
