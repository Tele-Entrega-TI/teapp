<?php
namespace App\Controllers;

class Modulos {

    private array $dados;

    public function __construct() {

        if (!isset($_SESSION['id_user'])) {
            header("Location: /teapp/login");
            exit;
        }

        $modulo_id = 23;

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
        $model = new \App\Models\Modulos();
        $ret = $model->index();

        if ($ret <> false) {
            $this->dados['modulos'] = $ret;
        } else {
            $this->dados['modulos'] = [];
            $this->dados['erro'] = "Nenhum módulo encontrado.";
        }

        $view = new \Core\View("modulos/index");
        $view->setDados($this->dados);
        $view->load();
    }

    public function Adicionar() {

        if (!$this->podeEditar) {
            $_SESSION['permEdit'] = true;
            header("Location: /teapp/operacional");
            exit;
        }

        $view = new \Core\View("modulos/adicionar");
        $view->load();
    }

    public function AdicionarACT() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            $model = new \App\Models\Modulos();
            $ret = $model->adicionar($dadosForm);

            if ($ret) {
                $_SESSION['dbInsert'] = true;
                header("Location: /teapp/modulos");
                exit;
            } else {
                $_SESSION['dbInsert'] = false;
                header("Location: /teapp/modulos/adicionar");
                exit;
            }
        }
    }


    public function Liberar($id) {
        $model = new \App\Models\Modulos();
        $ret = $model->liberar($id);

        if ($ret) {
            $_SESSION['modulo_liberado'] = true;
        } else {
            $_SESSION['modulo_liberado'] = false;
        }

        header("Location: /teapp/modulos");
        exit;
    }


    public function Excluir($id) {

        if (!$this->podeExcluir) {
            $_SESSION['permDelete'] = true;
            header("Location: /teapp/operacional");
            exit;
        }

        $model = new \App\Models\Modulos();
        $ret = $model->excluir($id);

        if ($ret) {
            $_SESSION['modulo_excluido'] = true;
        } else {
            $_SESSION['modulo_excluido'] = false;
        }

        header("Location: /teapp/modulos");
        exit;
    }
}
