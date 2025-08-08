<?php
namespace App\Controllers;

class Orcamento {

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
        //     header("Location: /teapp/operacional");
        //     exit;
        // }

        $this->podeEditar  = str_contains($this->acesso, 'e'); 
        $this->podeExcluir = str_contains($this->acesso, 'd'); 
    }

    public function Index() {
        $model = new \App\Models\Orcamento();
        $ret = $model->index();

        if ($ret <> false) {
            $this->dados = $ret;
            $view = new \Core\View("orcamento/index");
            $view->setDados($this->dados);
            $view->load();
        } else {
            $view = new \Core\View("orcamento/index");
            $view->load();
        }
    }

    public function Adicionar() {

        if (!$this->podeEditar) {
            $_SESSION['permEdit'] = true;
            header("Location: /teapp/operacional");
            exit;
        }

        $modelOficinas = new \App\Models\Oficinas();
        $modelVeiculos = new \App\Models\Veiculos();

        $this->dados['oficinas'] = $modelOficinas->index();
        $this->dados['veiculos'] = $modelVeiculos->index();

        $view = new \Core\View("orcamento/adicionar");
        $view->setDados($this->dados);
        $view->load();
    }


    public function AdicionarACT() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Orcamento();
            $ret = $model->adicionar($dadosForm);

            if ($ret) {
                $_SESSION['dbInsert'] = true;
                header("Location: /teapp/orcamento");
                exit;
            } else {
                $_SESSION['dbInsert'] = false;
                header("Location: /teapp/orcamento/adicionar");
                exit;
            }
        }
    }

    public function Editar($id) {

        if (!$this->podeEditar) {
            $_SESSION['permEdit'] = true;
            header("Location: /teapp/operacional");
            exit;
        }

        $model = new \App\Models\Orcamento();
        $ret = $model->buscar($id);

        if ($ret != 0) {
            $this->dados = $ret;

            $modelOficinas = new \App\Models\Oficinas();
            $modelVeiculos = new \App\Models\Veiculos();

            $this->dados['oficinas'] = $modelOficinas->index();
            $this->dados['veiculos'] = $modelVeiculos->index();

            $view = new \Core\View("orcamento/editar");
            $view->setDados($this->dados);
            $view->load();
        } else {
            echo "Orçamento não encontrado.";
        }
    }


    public function EditarACT() {

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id_orcamento'])) {
            $model = new \App\Models\Orcamento();
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $ret = $model->editar($dadosForm);

            if ($ret) {
                $_SESSION['dbUpdate'] = true;
                header("Location: /teapp/orcamento");
                exit;
            } else {
                $_SESSION['dbUpdate'] = false;
                header("Location: /teapp/orcamento");
                exit;
            }
        } else {
            header("Location: /teapp/orcamento");
            exit;
        }
    }

    public function Excluir($id) {

        if (!$this->podeExcluir) {
            $_SESSION['permDelete'] = true;
            header("Location: /teapp/orcamento");
            exit;
        }

        $model = new \App\Models\Orcamento();
        $ret = $model->excluir($id);

        if ($ret != 0) {
            $_SESSION['dbDelete'] = true;
            header("Location: /teapp/orcamento");
        } else {
            echo "Orçamento não encontrado.";
        }
    }
}
