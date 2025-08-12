<?php
namespace App\Controllers;

class Setores {

    private array $dados;
    private array $dadosAux;
    private string $acesso;
    private string $podeExcluir;
    private string $podeEditar;

    public function __construct() {

        if (!isset($_SESSION['id_user'])) {
            header("Location: /teapp/login");
            exit;
        }

        $modulo_id = 15;

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
        $model = new \App\Models\Setores();
        $formatador = new \Core\Formatador();
        $ret = $model->index();

        if ($ret <> false) {
            $ret = $formatador->setCaps($ret);
            $this->dados = $ret;
            $view = new \Core\View("setores/index");
            $view->setDados($this->dados);
            $view->load();
        } else {
            $view = new \Core\View("setores/index");
            $view->load();
        }
    }

    public function Adicionar() {

        if (!$this->podeEditar) {
            $_SESSION['permEdit'] = true;
            header("Location: /teapp/");
            exit;
        }

        $view = new \Core\View("setores/adicionar");
        $view->load();
    }

    public function AdicionarACT() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Setores();
            $ret = $model->adicionar($dadosForm);

            if ($ret) {
                $_SESSION['dbInsert'] = true;
                header("Location: /teapp/setores");
                exit;
            } else {
                $_SESSION['dbInsert'] = false;
                header("Location: /teapp/setores/adicionar");
                exit;
            }
        }
    }

    public function Editar($id) {

        if (!$this->podeEditar) {
            $_SESSION['permEdit'] = true;
            header("Location: /teapp/");
            exit;
        }

        $model = new \App\Models\Setores();
        $ret = $model->buscar($id);

            if ($ret != 0) {
            $this->dados = $ret;

            $view = new \Core\View("setores/editar");
            $view->setDados($this->dados);
            $view->load();
            } else {

            echo "Setor não encontrado.";
        }
    }

    public function EditarAct() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Setores();
            $ret = $model->editar($dados);

            if ($ret) {
                $_SESSION['dbUpdate'] = true;
                header("Location: /teapp/setores");
                exit;
            } else {
                $_SESSION['dbUpdate'] = false;
                header("Location: /teapp/setores/editar/" . $dados['id_setor']);
                exit;
            }
        }
    }

    public function Excluir($id) {

        if (!$this->podeExcluir) {
            $_SESSION['permDelete'] = true;
            header("Location: /teapp/");
            exit;
        }

        $model = new \App\Models\Setores();
        $ret = $model->excluir($id);

        if ($ret != 0) {
            $_SESSION['dbDelete'] = true;
            header("Location: /teapp/setores");
        } else {
            echo "Setor não encontrado.";
        }
    }
}