<?php

namespace App\Controllers;

Class Usuarios {

	private array $dados;

	public function __construct() {
		/*
        if (!isset($_SESSION['auth_Login']) == true) {
            // header("Location: ./auth");
        }
        */
	}

	public function Index() {
		$model = new \App\Models\Usuarios();
		$ret = $model->index();

		if ($ret <> false) {
			$this->dados = $ret;
			$view = new \Core\View("usuarios/index");
			$view->setDados($this->dados);
			$view->load();
		} else {
			$view = new \Core\View("usuarios/index");
			$view->load();
		}
	}

	public function Adicionar() {
		$modelFuncionarios = new \App\Models\Funcionarios();
		$modelPermissoes = new \App\Models\Permissoes();

		$this->dados['funcionarios'] = $modelFuncionarios->listar_ativos();
		$this->dados['permissoes'] = $modelPermissoes->index();

		$view = new \Core\View("usuarios/adicionar");
		$view->setDados($this->dados);
		$view->load();
	}

	public function AdicionarACT(){
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
			$model = new \App\Models\Usuarios();

			if($model->cpf_existe($dadosForm['cpf'])) {
				$_SESSION['doubleCPF'] = true;
				header("Location: /teapp/usuarios/adicionar");
				exit;
			}

			$ret = $model->adicionar($dadosForm);

			if ($ret) {
				$_SESSION['dbInsert'] = true;
				header("Location: /teapp/usuarios");
				exit;
			} else {
				$_SESSION['dbInsert'] = false;
				header("Location: /teapp/usuarios/adicionar");
				exit;
			}
		}
	}

	public function Confirmar() {
	    $view = new \Core\View("usuarios/confirmar");
	    $view->load();
	}

	public function ConfirmarACT() {
	    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	        $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);
	        $cpf = $dadosForm['cpf'];
	        $senha = $dadosForm['senha'];
	        $confirmarSenha = $dadosForm['confirmar_senha'];

	        if ($senha <> $confirmarSenha) {
	            echo "As senhas não coincidem.";
	            exit;
	        }

	        $model = new \App\Models\Usuarios();
	        $usuario = $model->buscar_por_cpf($cpf);

	        if (!$usuario) {
	            echo "Usuário não encontrado.";
	            exit;
	        }

	        if (!empty($usuario['senha'])) {
	            echo "Usuário já confirmou o acesso anteriormente.";
	            exit;
	        }

	        $senhaCriptografada = md5($senha);
	        $model->confirmar_usuario($usuario['id_usuario'], $senhaCriptografada);

	        
	        header("Location: /teapp/login");
	        exit;
	    }
	}


	public function Excluir($id) {
		$model = new \App\Models\Usuarios();
		$ret = $model->excluir($id);

		if ($ret <> 0) {
			$_SESSION['dbDelete'] = true;
			header("Location: /teapp/usuarios");
		} else {
			echo "Usuario não encontrado";
		}
	}	
}


