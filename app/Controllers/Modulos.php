<?php
namespace App\Controllers;

class Modulos {

    private array $dados;

    public function __construct() {
        // Validação de login se necessário
        // if (!isset($_SESSION['auth_Login'])) {
        //     header("Location: /teapp/auth");
        //     exit;
        // }
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
