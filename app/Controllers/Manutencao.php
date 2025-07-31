<?php

namespace App\Controllers;

class Manutencao {

    private array $dados;
    private array $dadosAux;

    public function __construct() {

        if (!isset($_SESSION['id_user'])) {
            header("Location: /teapp/login");
            exit;
        }

        $modulo_id = 10;

        if (!isset($_SESSION['modulos_permissoes'][$modulo_id])) {
            header("Location: /teapp/operacional");
            exit;
        }

        $this->acesso = $_SESSION['modulos_permissoes'][$modulo_id];

        if (!str_contains($this->acesso, 'v')) {
            header("Location: /teapp/operacional");
            exit;
        }

        $this->podeEditar  = str_contains($this->acesso, 'e'); 
        $this->podeExcluir = str_contains($this->acesso, 'd'); 
    }

    public function Index() {
        $model = new \App\Models\Manutencao();
        $ret   = $model->index();

        $view = new \Core\View("manutencao/index");
        if ($ret <> false) {$ret;
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

        $modelOrcamento = new \App\Models\Orcamento();
        $modelGestores  = new \App\Models\Gestores();

        $this->dados['orcamentos'] = $modelOrcamento->listar_com_placa();
        $this->dados['gestores']   = $modelGestores->index();

        $view = new \Core\View("manutencao/adicionar");
        $view->setDados($this->dados);
        $view->load();
    }

    public function AdicionarACT() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

           
            $modelOrcamento = new \App\Models\Orcamento();
            $id_veiculo = $modelOrcamento->buscar_veiculo_por_orcamento($dadosForm['id_orcamento']);
            $dadosForm['id_veiculo'] = $id_veiculo;

            $model = new \App\Models\Manutencao();
            $ret = $model->adicionar($dadosForm);

            if ($ret) {
                $_SESSION['dbInsert'] = true;
                header("Location: /teapp/manutencao");
                exit;
            } else {
                $_SESSION['dbInsert'] = false;
                header("Location: /teapp/manutencao/adicionar");
                exit;
            }
        }
    }

    public function Excluir($id) {

        if (!$this->podeExcluir) {
            $_SESSION['permDelete'] = true;
            header("Location: /teapp/operacional");
            exit;
        }

        $model = new \App\Models\Manutencao();
        $ret = $model->excluir($id);

        if ($ret) {
            $_SESSION['dbDelete'] = true;
        }
        header("Location: /teapp/manutencao");
        exit;
    }
}
