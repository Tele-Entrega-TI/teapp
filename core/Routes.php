<?php

namespace Core;
session_start();

class Routes 
{   
    
    private string $url;
    private array $urlConjunto;
    private string $urlController;
    private string $urlMetodo;
    private string $urlParametro;

    public function __construct() {
        
        if(!empty(filter_input(INPUT_GET, "url", FILTER_DEFAULT)))
        {
            $this->url = filter_input(INPUT_GET, "url", FILTER_DEFAULT);
            $this->urlConjunto = explode("/", $this->url);

            if((isset($this->urlConjunto[0])) and (isset($this->urlConjunto[1])) )
            {
                $this->urlController = $this->urlConjunto[0];
                $this->urlMetodo = $this->urlConjunto[1];
            } else {
                if (isset($this->urlConjunto[0])) {
                    $this->urlController = $this->urlConjunto[0];
                    $this->urlMetodo = "index";
                } else {
                    $this->urlController = "NotFound";
                    $this->urlMetodo = "index";
                }
                if (!isset($this->urlConjunto[1])) {
                    $this->urlMetodo = "index";
                }
            }
        }else{
            $this->urlController = "inicio";
            $this->urlMetodo = "index";
        }
    }

    public function carregar() {   
        $url = new URL($this->urlController);
        $validar_url = $url->validarURL();
        if ($validar_url == true) {
            if ($this->urlMetodo <> "") {
                $metodo = $this->urlMetodo;
            } else {
                $metodo = "index";
            }
            
            $urlControlador = ucwords($this->urlController);
            $classe = "App\\Controllers\\".$urlControlador; 
            $classeCarregar = new $classe;

            if (method_exists($classeCarregar, $metodo)){
                
                if (isset($this->urlConjunto[2])) {
                    $classeCarregar->$metodo($this->urlConjunto[2]);
                } else {
                    $classeCarregar->$metodo();
                }

            } else {
                $_SESSION['metodoNaoExiste'] = true;
                header("Location: /teapp/{$this->urlConjunto[0]}");
            }
        } else {
            $_SESSION['paginaNaoExiste'] = true;
            header("Location: /teapp/");

        }
    }


}