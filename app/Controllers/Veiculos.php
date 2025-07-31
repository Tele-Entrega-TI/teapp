<?php

namespace App\Controllers;

class Veiculos {

    private array $dados;
    private array $dadosAux;

    public function __construct() {
        if (!isset($_SESSION['id_user'])) {
            header("Location: /teapp/login");
            exit;
        }

        $modulo_id = 2;

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
        $lstVeiculos = new \App\Models\Veiculos();
        $ret = $lstVeiculos->index();

        $view = new \Core\View("veiculos/index");

        if ($ret <> false) {
            $this->dados = $ret;
            $view->setDados($this->dados);
        }

        $view->load();
    }

    public function Adicionar() {

        if (!$this->podeEditar) {
            $_SESSION['permEdit'] = true;
            header("Location: /teapp/veiculos");
            exit;
        }


        $modelProfissionais = new \App\Models\DadosProfissionais();
        $this->dados['motoristas'] = $modelProfissionais->listar_motoristas();

        $view = new \Core\View("veiculos/adicionar");
        $view->setDados($this->dados);
        $view->load();
    }

    public function AdicionarACT() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Veiculos();
            $ret = $model->adicionar($dadosForm);

            $_SESSION['dbInsert'] = $ret ? true : false;
            header("Location: /teapp/veiculos" . ($ret ? "" : "/adicionar"));
            exit;
        }
    }

    public function Editar($id) {

        if (!$this->podeEditar) {
            $_SESSION['permEdit'] = true;
            header("Location: /teapp/veiculos");
            exit;
        }

        $model = new \App\Models\Veiculos();
        $ret = $model->buscar($id);

        if ($ret != 0) {
            $this->dados = $ret;
            $modelProfissionais = new \App\Models\DadosProfissionais();
            $this->dados['motoristas'] = $modelProfissionais->listar_motoristas();

            $view = new \Core\View("veiculos/editar");
            $view->setDados($this->dados);
            $view->load();
        } else {
            echo "Veículo não encontrado.";
        }
    }

    public function EditarACT() {
        $model = new \App\Models\Veiculos();

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['placa'])) {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $ret = $model->editar($dadosForm);

            $_SESSION['dbUpdate'] = $ret ? true : false;
            header("Location: /teapp/veiculos");
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
            $id = $_POST['id'];
            $ret = $model->buscar($id);

            if ($ret != 0) {
                $this->dados = $ret;
                $view = new \Core\View("veiculos/editar");
                $view->setDados($this->dados);
                $view->load();
            } else {
                echo "Veículo não encontrado.";
            }

            return;
        }

        header("Location: /teapp/veiculos");
        exit;
    }

    public function Excluir($id) {

        if (!$this->podeExcluir) {
            $_SESSION['permDelete'] = true;
            header("Location: /teapp/veiculos");
            exit;
        }

        $model = new \App\Models\Veiculos();
        $ret = $model->excluir($id);

        if ($ret <> 0) {
            $_SESSION['dbDelete'] = true;
            header("Location: /teapp/veiculos");
        } else {
            echo "Veículo não encontrado.";
        }
    }
}
