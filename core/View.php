<?php

namespace Core;

class View
{
    private string $view;
    private string $alert;
    private array $dados;
    private array $dadosAux;
    
    public function __construct($view)
    {
        if(isset ($_SESSION['dbInsert'])) {
           if($_SESSION['dbInsert'] === true) {
                $this->alert = "<script type='text/javascript'>
                    Swal.fire(
                      'Sucesso!',
                      'Cadastro efetuado com sucesso!',
                      'success'
                    )
                </script>";
            } else {
                $this->alert = "<script type='text/javascript'>
                    Swal.fire(
                      'Erro!',
                      'Não foi possivel incluir o registro!',
                      'error'
                    )
                </script>";
            }
        }
        if(isset ($_SESSION['dbUpdate'])) {
           if($_SESSION['dbUpdate'] === true) {
                $this->alert = "<script type='text/javascript'>
                    Swal.fire(
                      'Feito!',
                      'O registro foi atualizado com sucesso!',
                      'info'
                    )
                </script>";
            } else {
                $this->alert = "<script type='text/javascript'>
                    Swal.fire(
                      'Erro!',
                      'Não foi possivel atualizar o registro!',
                      'error'
                    )
                </script>";
            }
        }
        if(isset ($_SESSION['dbDelete'])) {
           if($_SESSION['dbDelete'] === true) {
                $this->alert = "<script type='text/javascript'>
                    Swal.fire(
                      'Feito!',
                      'O registro foi devidamente excluido!',
                      'warning'
                    )
                </script>";
            } else {
                $this->alert = "<script type='text/javascript'>
                    Swal.fire(
                      'Erro!',
                      'Não foi possivel excluir o registro!',
                      'error'
                    )
                </script>";
            }
        }
        if (isset($_SESSION['doubleCPF'])) {
            $this->alert= "<script type= 'text/javascript'>
                Swal.fire(
                    'Atenção!',
                    'Este CPF já está cadastrado a um usuário.',
                    'warning'
                )
            </script>";
        }

        if (isset($_SESSION['permEdit'])) {
            if($_SESSION['permEdit'] === true) {
                $this->alert= "<script type= 'text/javascript'>
                    Swal.fire({
                        icon: 'error',
                        title: 'Acesso Negado',
                        text: 'Você não tem permissão para acessar esta funcionalidade.',
                        footer: 'Consulte o administrador do sistema para mais informações.',
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'Entendi'
                    });
                </script>";
            }
        }

        if(isset($_SESSION['permDelete'])) {
            if ($_SESSION['permDelete'] === true) {
                $this->alert= "<script type= 'text/javascript'>
                    Swal.fire({
                        icon: 'error',
                        title: 'Acesso Negado',
                        text: 'Voce não tem permissão para acessar esta funcionalidade.',
                        footer: 'Consulte o administrador do sistema para mais informações.',
                        confirmButtonColor: '#d33',
                        confirmButtonText: 'Entendi'
                    });
                </script>"; 
            }
        } 

        $this->view = $view;    
    } 


    public function load(){
        
        if(file_exists('app/Views/'.$this->view.'.php'))
        {   
            if ($this->view <> "auth_Login/index") {
                include ('app/Views/templates/header.php');
                include ('app/Views/'.$this->view.'.php');
                include ('app/Views/templates/footer.php');

                // Chamada de Alerta para a View
                $this->alertInsert_db();
            } else {
                include ('app/Views/'.$this->view.'.php');
            }
        } else {
            echo "Não achou a view";
        }

    }
    public function setDados($dados){
        $this->dados = $dados;
    }

    public function setDadosAux($dadosaux){
        $this->dadosAux = $dadosaux;
    }

    public function alertInsert_db() {
        if (isset($this->alert)) {
            echo $this->alert;
            unset($_SESSION['dbInsert']);
            unset($_SESSION['dbUpdate']);
            unset($_SESSION['dbDelete']);
            unset($_SESSION['doubleCPF']);
            unset($_SESSION['permEdit']);
            unset($_SESSION['permDelete']); 
            unset($this->alert);
        }
    }

}
