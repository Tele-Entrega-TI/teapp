<?php

namespace Core;

class Acess {

    public static function iniciar(string $nivel_minimo = 'v'): void {
        
        if (empty($_SESSION['id_user'])) {
            header("Location: /teapp/login");
            exit;
        }

        $controller = strtolower(basename(debug_backtrace()[1]['file'], '.php'));

        $acesso = $_SESSION[$controller] ?? '';

        if (!str_contains($acesso, 'v')) {
            header("Location: /teapp/operacional");
            exit;
        }

        $temEditar  = str_contains($acesso, 'e');
        $temExcluir = str_contains($acesso, 'd');

        if ($nivel_minimo === 've' && !$temEditar) {
            header("Location: /teapp/operacional");
            exit;
        }

        if ($nivel_minimo === 'ved' && (!$temEditar || !$temExcluir)) {
            header("Location: /teapp/operacional");
            exit;
        }

        // tudo certo, segue...
    }
}
