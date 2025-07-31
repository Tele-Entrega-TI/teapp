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
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
            $cpf   = $dados['cpf'];
            $senha = md5($dados['senha']);

            $model = new \App\Models\Usuarios();
            $usuario = $model->validarLogin($cpf, $senha);

            if ($usuario <> 0) {
                $_SESSION['id_user']        = $usuario['id_usuario'];
                $_SESSION['id_funcionario'] = $usuario['id_funcionario'];
                $_SESSION['nome_user']      = $usuario['nome_funcionario'] ?? '';

                $modelPerm = new \App\Models\ModulosAcesso();
                $permissoes = $modelPerm->listar_por_funcionario($usuario['id_funcionario']);

                if ($permissoes && is_array($permissoes)) {
                    foreach ($permissoes as $p) {
                        $id_modulo = (int)$p['id_modulo'];
                        $_SESSION['modulos_permissoes'][$id_modulo] = $p['permissao'];
                    }
                }

                header("Location: /teapp");
                exit;
            }

            $_SESSION['loginErro'] = "CPF ou senha inválidos!";
            header("Location: /teapp/login");
            exit;
        }
    }

    public function Sair() {
        session_destroy();
        header("Location: /teapp/login");
        exit;
    }
}
