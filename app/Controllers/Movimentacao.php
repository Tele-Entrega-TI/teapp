<?php

namespace App\Controllers;

class Movimentacao
{

    private array $dados;

    public function __construct()
    {

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
        //     header("Location: /teapp/operacional");
        //     exit;
        // }

        $this->podeEditar = str_contains($this->acesso, 'e');
        $this->podeExcluir = str_contains($this->acesso, 'd');
    }

    public function Index()
    {
        $model = new \App\Models\Movimentacao();
        // $ret = $model->index();

        // $view = new \Core\View("movimentacao/index");

        // $this->dados['movimentacoes'] = ($ret <> 0) ? $ret : [];
        // $view->setDados($this->dados);
        // $view->load();


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $filtros = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $ret = $model->filtrar($filtros);
        } else {
            $ret = $model->index();
        }

        if ($ret <> false) {
            $this->dados = $ret;
            $view = new \Core\View("movimentacao/index");
            $view->setDados($this->dados);
            $view->load();
        } else {
            $view = new \Core\View("movimentacao/index");
            $view->load();
        }





    }


    public function Adicionar()
    {

        if (!$this->podeEditar) {
            $_SESSION['permEdit'] = true;
            header("Location: /teapp/operacional");
            exit;
        }

        $model = new \App\Models\Movimentacao();

        $this->dados['veiculos'] = $model->listar_veiculos();
        $this->dados['funcionarios'] = $model->listar_funcionarios();

        $view = new \Core\View("movimentacao/adicionar");
        $view->setDados($this->dados);
        $view->load();
    }

    public function AdicionarACT()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Movimentacao();
            $ret = $model->adicionar($dadosForm);

            $_SESSION['dbInsert'] = $ret ? true : false;
            header("Location: /teapp/movimentacao");
            exit;
        }
    }

    public function Finalizar($id_veiculo)
    {

        if (!$this->podeExcluir) {
            $_SESSION['permDelete'] = true;
            header("Location: /teapp/movimentacao");
            exit;
        }

        $model = new \App\Models\Movimentacao();
        $ret = $model->finalizar($id_veiculo);

        if ($ret) {
            header("Location: /teapp/movimentacao");
            exit;
        } else {
            echo "Erro ao finalizar movimentação.";
        }
    }
}
