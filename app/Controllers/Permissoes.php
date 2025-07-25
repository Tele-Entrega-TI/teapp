<?php

namespace App\Controllers;

class Permissoes {

    private array $dados;

    public function __construct() {
        // validação de login se quiser
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
        $modelModulos = new \App\Models\Modulos();
        $modelAcesso = new \App\Models\ModulosAcesso();

        $modulos = $modelModulos->index();
        $acessos = $modelAcesso->listar_por_funcionario($id_funcionario);

        $this->dados['modulos'] = $modulos;
        $this->dados['acessos'] = $acessos;
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
