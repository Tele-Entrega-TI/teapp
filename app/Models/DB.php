<?php

namespace App\Models;

class DB
{
    protected \mysqli $conectar;

    public function conectar(): \mysqli
    {
        $this->conectar = new \mysqli(DB_HOST, DB_USER, DB_PASS, DB_BASE);

        if ($this->conectar->connect_error) {
            die("Falha na conexão: " . $this->conectar->connect_error);
        }

        return $this->conectar;
    }

    public function desconectar(): void
    {
        if (isset($this->conectar)) {
            $this->conectar->close();
        }
    }
}
