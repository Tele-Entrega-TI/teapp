<?php

namespace App\Controllers;

class Checklist
{

    private array $dados;
    private array $dadosAux;

    public function __construct() {

        if (!isset($_SESSION['id_user'])) {
            header("Location: /teapp/login");
            exit;
        }

        $modulo_id = 5;
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

    public function Index()
    {

        $model = new \App\Models\Checklist();
        $ret = $model->index();

        $view = new \Core\View("checklist/index");
        if ($ret <> 0) {
            $this->dados['checklists'] = $ret;
            $this->dados['model'] = $model;
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

        $modelVeiculos = new \App\Models\Veiculos();
        $veiculos = $modelVeiculos->index();

        $this->dados['veiculos'] = $veiculos;

        $view = new \Core\View("checklist/adicionar");
        $view->setDados($this->dados);
        $view->load();
    }



    public function AdicionarACT() {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            $itens = [
                'pneu_dianteiro_direito',
                'pneu_dianteiro_esquerdo',
                'pneu_traseiro_direito',
                'pneu_traseiro_esquerdo',
                'freios',
                'oleo',
                'luzes',
                'lataria',
                'nivel_agua',
                'equipamentos_seguranca'
            ];

            $erros = [];

            foreach ($itens as $item) {
                $qualidade = $item . '_qualidade';
                $observacao = $item . '_observacao';
                $campo_foto = $item . '_foto';

                if (empty($dadosForm[$qualidade])) {
                    $erros[] = "Qualidade não preenchida para: $item";
                }

                if (empty($dadosForm[$observacao])) {
                    $erros[] = "Observação não preenchida para: $item";
                }

                // Valida foto
                if (!isset($_FILES[$campo_foto]) || $_FILES[$campo_foto]['error'] !== 0) {
                    $erros[] = "Foto não enviada corretamente para: $item";
                }
            }

            if (!empty($erros)) {
                echo "<h3>Erros encontrados:</h3><ul>";
                foreach ($erros as $erro) {
                    echo "<li>$erro</li>";
                }
                echo "</ul>";
                exit;
            }

            foreach ($itens as $item) {
                $campo_foto = $item . '_foto';
                $nomeArquivo = uniqid() . "_" . $_FILES[$campo_foto]['name'];
                $destino = 'uploads/checklists/' . $nomeArquivo;

                if (!is_dir('uploads/checklists')) {
                    mkdir('uploads/checklists', 0777, true);
                }

                move_uploaded_file($_FILES[$campo_foto]['tmp_name'], $destino);
                $dadosForm[$campo_foto] = $nomeArquivo;
            }

            $dadosForm['origem'] = 'interno';

            $model = new \App\Models\Checklist();
            $ret = $model->adicionar($dadosForm);

            $_SESSION['dbInsert'] = $ret ? true : false;
            header("Location: /teapp/checklist");
            exit;
        }
    }




    public function Preencher()
    {
        $view = new \Core\View("checklist/preencher");
        $view->load();
    }

    public function PreencherACT()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $placa = trim($dadosForm['placa']);

            $modelChecklist = new \App\Models\Checklist();
            $info = $modelChecklist->buscar_por_placa($placa);

            if ($info) {
                $this->dados['info'] = $info;
                $view = new \Core\View("checklist/formulario");
                $view->setDados($this->dados);
                $view->load();
            } else {
                $_SESSION['placaInvalida'] = true;
                header("Location: /teapp/checklist/preencher");
                exit;
            }
        }
    }

    public function ChecklistPublicoACT()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            $itens = [
                'pneus',
                'freios',
                'oleo',
                'luzes',
                'lataria',
                'nivel_agua',
                'equipamentos_seguranca'
            ];

            foreach ($itens as $item) {
                $campo_foto = $item . '_foto';

                if (isset($_FILES[$campo_foto]) && $_FILES[$campo_foto]['error'] == 0) {
                    $nomeArquivo = uniqid() . "_" . $_FILES[$campo_foto]['name'];
                    $destino = 'uploads/checklists/' . $nomeArquivo;

                    if (!is_dir('uploads/checklists')) {
                        mkdir('uploads/checklists', 0777, true);
                    }

                    move_uploaded_file($_FILES[$campo_foto]['tmp_name'], $destino);
                    $dadosForm[$campo_foto] = $nomeArquivo;
                } else {
                    $dadosForm[$campo_foto] = null;
                }
            }

            $dadosForm['origem'] = 'publico';

            $model = new \App\Models\Checklist();
            $ret = $model->adicionar($dadosForm);

            $_SESSION['dbInsert'] = $ret ? true : false;
            header("Location: /teapp/checklist/preencher");
            exit;
        }
    }

    public function Visualizar($id) {
        $model = new \App\Models\Checklist();
        $checklist = $model->buscar_por_id($id);

        if ($checklist) {
            $this->dados['checklist'] = $checklist;
            $view = new \Core\View("checklist/visualizar");
            $view->setDados($this->dados);
            $view->load();
        } else {
            $_SESSION['erroChecklist'] = "Checklist não encontrado.";
            header("Location: /teapp/checklist");
            exit;
        }
    }

    public function Ver($id) {
        $model = new \App\Models\Checklist();
        $ret = $model->buscar_por_id($id);

        $view = new \Core\View("checklist/ver");
        if ($ret) {
            $this->dados = $ret;
            $view->setDados($this->dados);
        }
        $view->load();
    }

}