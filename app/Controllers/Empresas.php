<?php

namespace App\Controllers;

class Empresas {

    private array $dados;

    public function __construct() {

        if (!isset($_SESSION['id_user'])) {
            header("Location: /teapp/login");
            exit;
        }

        $modulo_id = 20;

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

    public function Index() {
        $model = new \App\Models\Empresas();
        $formatador = new \Core\Formatador();
        $ret = $model->index();

        $view = new \Core\View("empresas/index");
        if ($ret <> false) {
            $ret = $formatador->setCaps($ret);
            $this->dados = $ret;
            $view->setDados($this->dados);
        }
        $view->load();
    }

    public function Adicionar() {

        if (!$this->podeEditar) {
            $_SESSION['permEdit'] = true;
            header("Location: /teapp/rh");
            exit;
        }

        $view = new \Core\View("empresas/adicionar");
        $view->setDados([]);
        $view->load();
    }

    public function AdicionarACT() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Empresas();
            $ret = $model->adicionar($dadosForm);

            $_SESSION['dbInsert'] = $ret ? true : false;
            header("Location: /teapp/empresas");
            exit;
        }
    }

    public function Editar($id) {

        if (!$this->podeEditar) {
            $_SESSION['permEdit'] = true;
            header("Location: /teapp/rh");
            exit;
        }

        $model = new \App\Models\Empresas();
        $ret = $model->buscar($id);

        if ($ret != 0) {
            $this->dados = $ret;
            $view = new \Core\View("empresas/editar");
            $view->setDados($this->dados);
            $view->load();
        } else {
            echo "Empresa não encontrada.";
        }
    }

    public function EditarACT() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Empresas();
            $ret = $model->editar($dadosForm);

            $_SESSION['dbUpdate'] = $ret ? true : false;
            header("Location: /teapp/empresas");
            exit;
        }
    }

    public function Excluir($id = null) {

        if (!$this->podeExcluir) {
            $_SESSION['permDelete'] = true;
            header("Location: /teapp/rh");
            exit;
        }

        if (empty($id)) {
            header("Location: /teapp/empresas");
            exit;
        }

        $model = new \App\Models\Empresas();
        $ret = $model->excluir($id);

        $_SESSION['dbDelete'] = $ret ? true : false;
        header("Location: /teapp/empresas");
        exit;
    }
}
