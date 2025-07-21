<?php

namespace App\Controllers;

class Permissoes {

    private array $dados;

    public function __construct() {}

    public function Index() {
        $model = new \App\Models\Funcionarios();
        $ret = $model->index();

        if ($ret <> false) {
            $this->dados['funcionarios'] = $ret;
        } else {
            $this->dados['funcionarios'] = [];
        }

        $view = new \Core\View("permissoes/index");
        $view->setDados($this->dados);
        $view->load();
    }

    public function Editar($id_funcionario) {
        $modelModulos = new \App\Models\Modulos();
        $modelAcesso = new \App\Models\ModulosAcesso();

        $this->dados['modulos'] = $modelModulos->index();
        $this->dados['acessos'] = $modelAcesso->listar_por_funcionario($id_funcionario);
        $this->dados['id_funcionario'] = $id_funcionario;

        $view = new \Core\View("permissoes/editar");
        $view->setDados($this->dados);
        $view->load();
    }

    public function EditarACT() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id_funcionario = $_POST['id_funcionario'] ?? null;
            $id_grupo = $_POST['id_grupo'] ?? 0;

            $model = new \App\Models\ModulosAcesso();

            // Limpa acessos antigos
            $model->remover_por_funcionario($id_funcionario);

            if (!empty($_POST['permissoes']) && is_array($_POST['permissoes'])) {
                foreach ($_POST['permissoes'] as $id_modulo => $permissoes_modulo) {
                    foreach ($permissoes_modulo as $tipo) {
                        $dados = array();
                        $dados['id_funcionario'] = $id_funcionario;
                        $dados['id_modulo'] = $id_modulo;
                        $dados['tipo'] = strtolower($tipo);
                        $dados['id_grupo'] = $id_grupo;

                        $model->salvar($dados);
                    }
                }
            }

            $_SESSION['dbUpdate'] = true;
            header("Location: /teapp/permissoes/editar/" . $id_funcionario);
            exit;
        }
    }
}
