<?php

namespace Core;

class Allow {

    public static function temPermissao(int $id_modulo, string $acao): bool {

        if (!isset($_SESSION['permissoes_completas'])) {
            return false;
        }

        if (!isset($_SESSION['permissoes_completas'][$id_modulo])) {
            return false;
        }

        $permissao = $_SESSION['permissoes_completas'][$id_modulo];

        return str_contains($permissao, $acao);
    }
}
