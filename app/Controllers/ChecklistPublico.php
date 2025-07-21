<?php

namespace App\Controllers;

class ChecklistPublico {

    private array $dados;
    private array $dadosAux;

    public function __construct() {
        // Filtro de login, se desejar proteger o módulo
        /*
        if (!isset($_SESSION['auth_Login'])) {
            header("Location: /teapp/auth");
            exit;
        }
        */
    }

    public function Index() {
        $model = new \App\Models\ChecklistPublico();
        $ret = $model->listar();

        $view = new \Core\View("checklistpublico/index");
        if ($ret <> 0) {
            $this->dados = $ret;
            $view->setDados($this->dados);
        }

        $view->load();
    }

    public function Visualizar($id) {
        $model = new \App\Models\ChecklistPublico();
        $ret = $model->buscar_por_id($id);

        $view = new \Core\View("checklistpublico/visualizar");
        if ($ret <> 0) {
            $this->dados = $ret;
            $view->setDados($this->dados);
        }

        $view->load();
    }
}
