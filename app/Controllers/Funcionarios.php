<?php
namespace App\Controllers;

class Funcionarios
{

    private array $dados;
    private array $dadosAux;
    private string $acesso;
    private string $podeExcluir;
    private string $podeEditar;

    public function __construct()
    {

        if (!isset($_SESSION['id_user'])) {
            header("Location: /teapp/login");
            exit;
        }

        $modulo_id = 14;

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

        $this->podeEditar = str_contains($this->acesso, 'e');
        $this->podeExcluir = str_contains($this->acesso, 'd');
    }


    public function Index()
    {
        $model = new \App\Models\Funcionarios();
        $formatador = new \Core\Formatador();

        $ret = $model->index();

        if ($ret <> false) {
            $ret = $formatador->setCaps($ret);
            $this->dados = $ret;
            $view = new \Core\View("funcionarios/index");
            $view->setDados($this->dados);
            $view->load();
        } else {
            $view = new \Core\View("funcionarios/index");
            $view->load();
        }
    }

    public function Adicionar()
    {

        if (!$this->podeEditar) {
            $_SESSION['permEdit'] = true;
            header("Location: /teapp/rh");
            exit;
        }

        $view = new \Core\View("funcionarios/adicionar");
        $view->load();
    }

    public function AdicionarACT()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Funcionarios();
            $ret = $model->adicionar($dadosForm);

            if ($ret) {
                $_SESSION['dbInsert'] = true;
                header("Location: /teapp/funcionarios");
                exit;
            } else {
                $_SESSION['dbInsert'] = false;
                header("Location: /teapp/funcionarios/adicionar");
                exit;
            }
        }
    }

    public function Ver($id)
    {
        $model = new \App\Models\Funcionarios();
        $ret = $model->buscar($id);

        $view = new \Core\View("funcionarios/ver");
        if ($ret) {
            $this->dados = $ret;
            $view->setDados($this->dados);
        }
        $view->load();
    }



    public function Editar($id)
    {

        if (!$this->podeEditar) {
            $_SESSION['permEdit'] = true;
            header("Location: /teapp/rh");
            exit;
        }

        $model = new \App\Models\Funcionarios();
        $ret = $model->buscar($id);

        if ($ret <> 0) {
            $this->dados = $ret;

            $view = new \Core\View("funcionarios/editar");
            $view->setDados($this->dados);
            $view->load();
        } else {

            echo "Funcionario não encontrado.";
        }
    }

    public function EditarAct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\Funcionarios();
            $ret = $model->editar($dados);

            if ($ret) {
                $_SESSION['dbUpdate'] = true;
                header("Location: /teapp/funcionarios");
                exit;
            } else {
                $_SESSION['dbUpdate'] = false;
                header("Location: /teapp/funcionarios/editar/" . $dados['id_funcionario']);
                exit;
            }
        }
    }

    public function Excluir($id)
    {
        $model = new \App\Models\Funcionarios();
        $ret = $model->excluir($id);

        if ($ret != 0) {
            $_SESSION['dbDelete'] = true;
            header("Location: /teapp/funcionarios");
        } else {
            echo "funcionário não encontrado.";
        }
    }

}