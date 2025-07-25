<?php

namespace App\Controllers;

class Login {

    private array $dados;

    public function Index() {
        $view = new \Core\View('login/index');
        $view->load();
    }

    public function AutenticarACT() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dadosForm = filter_input_array(INPUT_POST, FILTER_DEFAULT);

            $cpf   = $dadosForm['cpf'];
            $senha = md5($dadosForm['senha']);

            $model = new \App\Models\Usuarios();
            $usuario = $model->validarLogin($cpf, $senha);

            if ($usuario <> 0) {
                $_SESSION['id_user']         = $usuario['id_usuario'];
                $_SESSION['id_funcionario']  = $usuario['id_funcionario'];
                $_SESSION['nome_user']       = $usuario['nome_funcionario'] ?? '';

                $permissoes = $model->getModulosUsuario($usuario['id_funcionario']);
                $_SESSION['permissoes_completas'] = $permissoes;
                $_SESSION['modulos'] = array_keys($permissoes);

                header("Location: /teapp");
                exit;
            } else {
                $_SESSION['loginErro'] = "CPF ou senha inválidos!";
                header("Location: /teapp/login");
                exit;
            }
        }
    }

    public function Sair() {
        session_destroy();
        header("Location: /teapp/login");
        exit;
    }
}
