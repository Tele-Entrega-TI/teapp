<?php

namespace App\Controllers;

class Intercorrencias
{

    private array $dados;

    public function __construct()
    {
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

    public function Adicionar()
    {
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

    // Método para abrir o formulário de edição via GET
    public function Editar($id)
    {
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

    public function EditarACT()
    {
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

    public function Excluir($id = null)
    {
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
