<?php

namespace App\Controllers;

class Permissoes {

    private array $dados;

    public function __construct() {

        if (!isset($_SESSION['id_user'])) {
            header("Location: /teapp/login");
            exit;
        }

        $modulo_id = 6;

        if (!isset($_SESSION['modulos_permissoes'][$modulo_id])) {
            $_SESSION['semPermissaoAoModulo'] = true;
            header("Location: /teapp/operacional");
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
        $model = new \App\Models\Usuarios();
        $ret = $model->index();

        if ($ret <> false) {
            $this->dados['usuarios'] = $ret;
        } else {
            $this->dados['usuarios'] = array();
        }

        $view = new \Core\View("permissoes/index");
        $view->setDados($this->dados);
        $view->load();
    }


    public function Editar($id_funcionario) {

        if (!$this->podeEditar) {
            $_SESSION['permEdit'] = true;
            header("Location: /teapp/operacional");
            exit;
        }

        $modelModulos = new \App\Models\Modulos();
        $modelAcesso  = new \App\Models\ModulosAcesso();

        $modulos  = $modelModulos->index();
        $acessos  = $modelAcesso->listar_por_funcionario($id_funcionario);

        $this->dados['modulos']        = $modulos;
        $this->dados['acessos']        = $acessos;
        $this->dados['id_funcionario'] = $id_funcionario;

        $view = new \Core\View("permissoes/editar");
        $view->setDados($this->dados);
        $view->load();
    }



    public function EditarACT() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_funcionario = $_POST['id_funcionario'];

            $model = new \App\Models\ModulosAcesso();
            $model->remover_por_funcionario($id_funcionario);

            if (!empty($_POST['permissoes']) && is_array($_POST['permissoes'])) {
                foreach ($_POST['permissoes'] as $id_modulo => $tipo) {
                    if ($tipo <> 'v' && $tipo <> 've' && $tipo <> 'ved') {
                        continue;
                    }

                    $dados = array();
                    $dados['id_funcionario'] = $id_funcionario;
                    $dados['id_modulo'] = $id_modulo;
                    $dados['tipo'] = $tipo;
                    $dados['id_grupo'] = 0;

                    $model->salvar($dados);
                }
            }

            $_SESSION['dbUpdate'] = true;
            header("Location: /teapp/permissoes/editar/" . $id_funcionario);
            exit;
        }
    }
}
