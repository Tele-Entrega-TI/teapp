<?php
namespace Core;

class Formatador {

    private array $dados;

    public function setCaps($dados) {

        if (!is_array($dados)) {
            $texto = trim($dados);
    
            if (function_exists('mb_convert_case')) {
                return mb_convert_case($texto, MB_CASE_UPPER, 'UTF-8');
            }
            return strtoupper($texto);
        }

        $array_de_arrays = false;
        foreach ($dados as $valor) {
            if (is_array($valor)) {
                $array_de_arrays = true;
                break;
            }
        }

        if ($array_de_arrays == false) {
            $resultado = array();
            foreach (array_keys($dados) as $key) {
                $texto = trim($dados[$key]);
                if (function_exists('mb_convert_case')) {
                    $resultado[$key] = mb_convert_case($texto, MB_CASE_UPPER, 'UTF-8');
                } else {
                    $resultado[$key] = strtoupper($texto);
                }
            }
            return $resultado;
        }

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
