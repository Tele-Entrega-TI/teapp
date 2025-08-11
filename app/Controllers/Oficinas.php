<?php
namespace App\Controllers;

class Oficinas {

    private array $dados;
    private array $dadosAux;

    public function __construct() {

        if (!isset($_SESSION['id_user'])) {
            header("Location: /teapp/login");
            exit;
        }

        $modulo_id = 6;

        if (!isset($_SESSION['modulos_permissoes'][$modulo_id])) {
            $_SESSION['semPermissaoAoModulo'] = true;
            header("Location: /teapp/");
            exit;
        }

        $this->acesso = $_SESSION['modulos_permissoes'][$modulo_id];

        // if (!str_contains($this->acesso, 'v')) {
        //     header("Location: /teapp/");
        //     exit;
        // }

        $this->podeEditar  = str_contains($this->acesso, 'e'); 
        $this->podeExcluir = str_contains($this->acesso, 'd'); 
    }

    public function index() {

        $model = new \App\Models\Oficinas();
        $formatador = new \Core\Formatador();
        $ret   = $model->index();
        $view = new \Core\View("oficinas/index");
        if ($ret !== 0) {
            $ret = $formatador->setCaps($ret);
            $this->dados = $ret;
            $view->setDados($this->dados);
        } else {
            $view->setDados([]);
        }
        $view->load();
    }

    public function Adicionar() {

        if (!$this->podeEditar) {
            $_SESSION['permEdit'] = true;
            header("Location: /teapp/operacional");
            exit;
        }

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

        if (!$this->podeEditar) {
            $_SESSION['permEdit'] = true;
            header("Location: /teapp/operacional");
            exit;
        }

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

        if (!$this->podeExcluir) {
            $_SESSION['permDelete'] = true;
            header("Location: /teapp/oficinas");
            exit;
        }
        
        $id = intval($id);
        $model = new \App\Models\Oficinas();
        $ret = $model->excluir($id);
        $_SESSION['dbDelete'] = $ret ? true : false;
        header("Location: /teapp/oficinas");
        exit;
    }
}
