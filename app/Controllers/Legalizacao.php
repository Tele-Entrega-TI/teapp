<?php
    namespace App\Controllers;

    Class Legalizacao {

        private array $dados;
        private array $dadosAux;

        public function __construct(){ 
                /*
                // Filtro para determinar se o usuário está logado
                if(!isset ($_SESSION['auth_Login']) == true)
                {
                    //header("Location: ./auth");
                }*/

        }
        
        public function Index() { 
            $view = new \Core\View("legalizacao/index");
            $view->load();
        }

        public function Nova() { 

            $lstClientes = new \App\Models\Clientes();
            $ret = $lstClientes->getClientes();
            $lstTiposLegalizacao = new \App\Models\Legalizacao();
            $retAux = $lstTiposLegalizacao->getLicenca();

            if($ret <> false){
                $this->dados = $ret;
                $this->dadosAux = $retAux;
                $view = new \Core\View("legalizacao/add_Licenca");
                $view->setDados($this->dados);
                $view->setDadosAux($this->dadosAux);
                $view->load(); 
            } else {
                $view = new \Core\View("legalizacao/add_Licenca");
                $view->load();
            }  

        }
        
        public function Editar_Tipos() { 
      
            $lstLicenca = new \App\Models\Legalizacao();
            $ret = $lstLicenca->getLicenca();

            if($ret <> false){
                $this->dados = $ret;
                $view = new \Core\View("legalizacao/Tipos_Listar");
                $view->setDados($this->dados);
                $view->load(); 
            } else {
                $view = new \Core\View("legalizacao/Tipos_Listar");
                $view->load();
            }  
            
        }
        
        public function NovaLicenca() { 
            $view = new \Core\View("legalizacao/Tipos_Add");
            $view->load();
        }
        public function setNovaLicenca() { 
            
            $nometipo = $_POST['nometipo'];
            $vencimento_padrao = $_POST['vencimento_padrao'];
            $dataCadastro = $_POST['dataCadastro'];
            $status = $_POST['status'];
            
            $setNovaLicenca = new \App\Models\Legalizacao();
            $ret = $setNovaLicenca->setNovaLicenca($nometipo, $vencimento_padrao ,$dataCadastro ,$status);
    
            if($ret == true){
                $_SESSION['dbInsert'] = true;
                header("Location: /since/legalizacao/Editar_Tipos");
            } else {
                $_SESSION['dbInsert'] = false;
                echo "Erro no procedimento! ".$ret;
            }   
        
        }
    }
