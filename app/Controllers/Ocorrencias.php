<?php

namespace App\Controllers;

class Ocorrencias {
 private array $dados;
 public function __construct(){}
 
   public function index(){

     $models = new \App\Models\Ocorrencias();
     $ret = $models->index();
     $view = new \Core\View('Ocorrencias/index');

     if ($ret <> false) {
     	$this->dados = $ret;
	    $view->setDados($this->dados);   
      }
      $view->load();
   }

   public function Adicionar(){

    	$models = new \App\Models\Ocorrencias();
    	$this->dados['funcionarios'] = $models->listar_funcionarios();
    	$this->dados['motivos'] = $models->listar_motivos();

    	$view = new \Core\View('Ocorrencias/adicionar');
    	$view->setDados($this->dados);
    	$view->load();
   }

   public function AdicionarACT(){
    	if($_SERVER['REQUEST_METHOD'] == 'POST'){
    		$dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
    		$models = new \App\Models\Ocorrencias();
    		$ret = $models->adicionar($dadosForm);

    		$_SESSION['dbInsert'] = $ret ? true : false;
         header("Location: /teapp/Ocorrencias");
            exit;
    	}
   }

   public function Editar($id){

    $models = new \App\Models\Ocorrencias;
    $ret = $models->buscar($id);
    $this->dados = $ret;
    $this->dados['funcionarios'] = $models->listar_funcionarios();
    $this->dados['motivos'] = $models->listar_motivos();
    
    
    if($ret <> 0){
            $view = new \Core\View("ocorrencias/editar");
            $view->setDados($this->dados);
            $view->load();
            } else {
            echo "Ocorrência não encontrada.";
        }
   }

   public function EditarACT() {
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
         $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
         $model = new \App\Models\Ocorrencias();
         $ret = $model->editar($dadosForm);

         $_SESSION['dbUpdate'] = $ret ? true : false;
         header("Location: /teapp/ocorrencias");
         exit;
      }
   }

   public function Excluir($id) {
        $model = new \App\Models\Ocorrencias();
        $ret = $model->excluir($id);

        if ($ret != 0) {
            $_SESSION['dbDelete'] = true;
            header("Location: /teapp/ocorrencias");
        } else {
            echo "ocorrencia não encontrada.";
        }
    }
}  
