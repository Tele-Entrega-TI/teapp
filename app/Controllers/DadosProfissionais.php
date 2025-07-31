<?php
namespace App\Controllers;

class DadosProfissionais {

    private array $dados;
    private array $dadosAux;

    public function __construct() {

        if (!isset($_SESSION['id_user'])) {
            header("Location: /teapp/login");
            exit;
        }

        $modulo_id = 6;

        if (!isset($_SESSION['modulos_permissoes'][$modulo_id])) {
            header("Location: /teapp/rh");
            exit;
        }

        $this->acesso = $_SESSION['modulos_permissoes'][$modulo_id];

        if (!str_contains($this->acesso, 'v')) {
            header("Location: /teapp/rh");
            exit;
        }

        $this->podeEditar  = str_contains($this->acesso, 'e'); 
        $this->podeExcluir = str_contains($this->acesso, 'd'); 

    }
            
    

    public function Index() {
        $model = new \App\Models\DadosProfissionais();
        $ret = $model->index();

        if ($ret <> false) {
            $this->dados = $ret;
            $view = new \Core\View("dadosprofissionais/index");
            $view->setDados($this->dados);
            $view->load();
        } else {
            $view = new \Core\View("dadosprofissionais/index");
            $view->load();
        }
    }

    public function Adicionar() {

        if (!$this->podeEditar) {
            $_SESSION['permEdit'] = true;
            header("Location: /teapp/rh");
            exit;
        }

        $modelFuncionarios = new \App\Models\Funcionarios();
        $modelCargos = new \App\Models\Cargos();
        $modelSetores = new \App\Models\Setores();
        $modelLocacoes = new \App\Models\Locacoes();
        $modelEmpresas = new \App\Models\Empresas();

        $this->dados['funcionarios'] = $modelFuncionarios->index();
        $this->dados['cargos'] = $modelCargos->index();
        $this->dados['setores'] = $modelSetores->index();
        $this->dados['locacoes'] = $modelLocacoes->index();
        $this->dados['empresas'] = $modelEmpresas->index();

        $view = new \Core\View("dadosprofissionais/adicionar");
        $view->setDados($this->dados);
        $view->load();
}


    public function AdicionarACT() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\DadosProfissionais();
            $ret = $model->adicionar($dadosForm);

            if ($ret) {
                $_SESSION['dbInsert'] = true;
                header("Location: /teapp/dadosprofissionais");
                exit;
            } else {
                $_SESSION['dbInsert'] = false;
                header("Location: /teapp/dadosprofissionais/adicionar");
                exit;
            }
        }
    }

    public function Editar($id) {

        if (!$this->podeEditar) {
            $_SESSION['permEdit'] = true;
            header("Location: /teapp/rh");
            exit;
        }

        $modelDadosProfissionais = new \App\Models\DadosProfissionais();
        $ret = $modelDadosProfissionais->buscar($id);

        if ($ret <> false) {
            $this->dados = $ret;

            $modelFuncionarios = new \App\Models\Funcionarios();
            $modelCargos = new \App\Models\Cargos();
            $modelSetores = new \App\Models\Setores();
            $modelLocacoes = new \App\Models\Locacoes();
            $modelEmpresas = new \App\Models\Empresas();

            $this->dadosAux['funcionarios'] = $modelFuncionarios->index();
            $this->dadosAux['cargos'] = $modelCargos->index();
            $this->dadosAux['setores'] = $modelSetores->index();
            $this->dadosAux['locacoes'] = $modelLocacoes->index();
            $this->dadosAux['empresas'] = $modelEmpresas->index();

            $view = new \Core\View("dadosprofissionais/editar");
            $view->setDados($this->dados);
            $view->setDadosAux($this->dadosAux);
            $view->load();
        } else {
            header("Location: /teapp/dadosprofissionais");
            exit;
        }
    }


    public function EditarAct() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $model = new \App\Models\DadosProfissionais();
            $ret = $model->editar($dados);

            if ($ret) {
                $_SESSION['dbUpdate'] = true;
                header("Location: /teapp/dadosprofissionais");
                exit;
            } else {
                $_SESSION['dbUpdate'] = false;
                header("Location: /teapp/dadosprofissionais/editar/" . $dados['id_dado_profissional']);
                exit;
            }
        }
    }

    public function Excluir($id) {

        if (!$this->podeExcluir) {
            $_SESSION['permDelete'] = true;
            header("Location: /teapp/rh");
            exit;
        }
        $model = new \App\Models\DadosProfissionais();
        $ret = $model->excluir($id);

        if ($ret <> 0) {
            $_SESSION['dbDelete'] = true;
            header("Location: /teapp/dadosprofissionais");
        } else {
            echo "Dados não encontrados.";
        }
    }
}