<?php
namespace Core;

class Formatador {

    private array $dados;

    public function setCaps($dados) {

        if (!is_array($dados)) {
            return strtoupper(trim($dados));
        }

        // se for array associativo simples 
        $array_de_arrays = false;
        foreach ($dados as $valor) {
            if (is_array($valor)) {
                $array_de_arrays = true;
                break;
            }
        }

        // se não for array de arrays
        if ($array_de_arrays == false) {
            $resultado = array();
            foreach (array_keys($dados) as $key) {
                $resultado[$key] = strtoupper(trim($dados[$key]));
            }
            return $resultado;
        }

        // se for array de arrays
        $this->dados = array();
        foreach (array_keys($dados) as $key) {
            $this->dados[$key] = $this->setCaps($dados[$key]);
        }

        return $this->dados;
    }

    public function setLower($dados) {

        if(!is_array($dados)) {
            return strtolower(trim($dados));
        }

        $this->dados = array();

        foreach(array_keys($dados) as $key) {
            $valor = $dados[$key];

            if(is_array($valor)){
                $this->dados[$key] = $this->setLower($valor);
            } else {
                $this->dados[$key] = strtolower(trim($valor));

            }
        }

        return $this->dados;
    }
}
