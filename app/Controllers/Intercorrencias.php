<?php

namespace App\Controllers;

class Intercorrencias
{

    private array $dados;

    public function __construct() {

        if (!isset($_SESSION['id_user'])) {
            header("Location: /teapp/login");
            exit;
        }

        $modulo_id = 22;

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

    public function Index()
    {
        $model = new \App\Models\Intercorrencias();
        $ret = $model->index();

        $view = new \Core\View("Intercorrencias/index");
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

        $modelFuncionarios = new \App\Models\Funcionarios();
        $modelMotivos = new \App\Models\Motivos();
        $this->dados['funcionarios'] = $modelFuncionarios->listar_ativos();
        $this->dados['motivos'] = $modelMotivos->listar_motivos();

        $view = new \Core\View("intercorrencias/adicionar");
        $view->setDados($this->dados);
        $view->load();
    }

    public function AdicionarACT()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Intercorrencias();
            if ($dadosForm["id_funcionario"] != $dadosForm["id_sub"]) {
                $ret = $model->adicionar($dadosForm);
            }

            $_SESSION['dbInsert'] = $ret ? true : false;
            header("Location: /teapp/Intercorrencias");
            exit;
        }
    }

    public function Editar($id) {

        if (!$this->podeEditar) {
            $_SESSION['permEdit'] = true;
            header("Location: /teapp/operacional");
            exit;
        }

        $modelFuncionarios = new \App\Models\Funcionarios();
        $modelMotivos = new \App\Models\Motivos();
        $this->dados['funcionarios'] = $modelFuncionarios->listar_ativos();
        $this->dados['motivos'] = $modelMotivos->listar_motivos();

        $model = new \App\Models\Intercorrencias();
        $ret = $model->buscar($id);

        if ($ret != 0) {
            $this->dados['ret'] = $ret;
            $view = new \Core\View("Intercorrencias/editar");
            $view->setDados($this->dados);
            $view->load();
        } else {
            echo "Empresa não encontrada.";
        }
    }

    public function EditarACT() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Intercorrencias();

            if ($dadosForm["id_funcionario"] != $dadosForm["id_sub"]) {
                $ret = $model->editar($dadosForm);
            }

            $_SESSION['dbUpdate'] = $ret ? true : false;
            header("Location: /teapp/Intercorrencias");
            exit;
        }
    }

    public function Excluir($id = null) {

        if (!$this->podeExcluir) {
            $_SESSION['permDelete'] = true;
            header("Location: /teapp/operacional");
            exit;
        }

        if (empty($id)) {
            header("Location: /teapp/Intercorrencias");
            exit;
        }

        $model = new \App\Models\Intercorrencias();
        $ret = $model->excluir($id);

        $_SESSION['dbDelete'] = $ret ? true : false;
        header("Location: /teapp/Intercorrencias");
        exit;
    }
}
