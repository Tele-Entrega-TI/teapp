<?php
namespace App\Controllers;

class Veiculos {

    private array $dados;
    private array $dadosAux;

    public function __construct() {

        var_dump($_SESSION); // ← aqui, só pra testar
        exit;
        
        if (!isset($_SESSION['id_user'])) {
             header("Location: /teapp/login");
             exit;
        }

        $modulo_id = 2;

        if(!in_array($modulo_id, $_SESSION['modulos'])) {
            header("Location: /teapp/operacional");
            exit;
        }       
    }

    public function Index() {
        $lstVeiculos = new \App\Models\Veiculos();
        $ret = $lstVeiculos->index();

        if ($ret <> false) {
            $this->dados = $ret;
            $view = new \Core\View("veiculos/index");
            $view->setDados($this->dados);
            $view->load();
        } else {
            $view = new \Core\View("veiculos/index");
            $view->load();
        }
    }

    public function Adicionar() {
        $modelProfissionais = new \App\Models\DadosProfissionais();
        $motoristas = $modelProfissionais->listar_motoristas();

        $this->dados['motoristas'] = $motoristas;

        $view = new \Core\View("veiculos/adicionar");
        $view->setDados($this->dados);
        $view->load();
    }

    public function AdicionarACT() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Veiculos();
            $ret = $model->adicionar($dadosForm);

            if ($ret) {
                $_SESSION['dbInsert'] = true;
                header("Location: /teapp/veiculos");
                exit;
            } else {
                $_SESSION['dbInsert'] = false;
                header("Location: /teapp/veiculos/adicionar");
                exit;
            }
        }
    }

    public function Editar($id) {
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

            if ($ret) {
                $_SESSION['dbUpdate'] = true;
                header("Location: /teapp/veiculos");
                exit;
            } else {
                $_SESSION['dbUpdate'] = false;
                header("Location: /teapp/veiculos");
                exit;
            }
        } elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
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
        } else {
            header("Location: /teapp/veiculos");
            exit;
        }
    }

    public function Excluir($id) {
        $model = new \App\Models\Veiculos();
        $ret = $model->excluir($id);

        if ($ret != 0) {
            $_SESSION['dbDelete'] = true;
            header("Location: /teapp/veiculos");
        } else {
            echo "Veículo não encontrado.";
        }
    }
}
