<?php

namespace App\Controllers;

use App\Models\Veiculo;
use App\Models\DB;

class Veiculos
{
    private \mysqli $db;
    private Veiculo $veiculoModel;

    public function __construct()
    {
        $db = new DB();
        $this->db = $db->conectar();

        $this->veiculoModel = new Veiculo($this->db);
    }

    public function listar_veiculos()
    {
        $busca = isset($_GET['busca']) ? trim($_GET['busca']) : '';

        if (!empty($busca)) {
            $veiculos = $this->veiculoModel->buscar_veiculos($busca);
        } else {
            $veiculos = $this->veiculoModel->listar_todos();
        }

        require_once __DIR__ . '/../Views/listar_veiculos.php';
    }

    public function cadastrar_veiculo()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'placa' => $_POST['placa'] ?? '',
                'modelo' => $_POST['modelo'] ?? '',
                'tipo' => $_POST['tipo'] ?? '',
                'cor' => $_POST['cor'] ?? '',
                'fabricante' => $_POST['fabricante'] ?? '',
                'ano_fab' => $_POST['ano_fab'] ?? null,
                'vencimento_doc' => $_POST['vencimento_doc'] ?? '',
                'id_motorista' => (int) ($_POST['id_motorista'] ?? 0),
                'titular_veiculo' => $_POST['titular_veiculo'] ?? ''
            ];

            $sucesso = $this->veiculoModel->inserir($dados);

            if ($sucesso) {
                header('Location: /teapp/veiculos/listar_veiculos');
                exit;
            } else {
                echo "Erro ao cadastrar veículo.";
            }
        } else {
            require_once __DIR__ . '/../Views/cadastrar_veiculo.php';
        }
    }

    public function editar_veiculo($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'placa' => $_POST['placa'] ?? '',
                'modelo' => $_POST['modelo'] ?? '',
                'tipo' => $_POST['tipo'] ?? '',
                'cor' => $_POST['cor'] ?? '',
                'fabricante' => $_POST['fabricante'] ?? '',
                'ano_fab' => (int) ($_POST['ano_fab'] ?? 0),
                'vencimento_doc' => $_POST['vencimento_doc'] ?? '',
                'id_motorista' => (int) ($_POST['id_motorista'] ?? 0),
                'titular_veiculo' => $_POST['titular_veiculo'] ?? '',
            ];

            $sucesso = $this->veiculoModel->atualizar($id, $dados);

            if ($sucesso) {
                header('Location: /teapp/veiculos/listar_veiculos');
                exit;
            } else {
                echo "Erro ao atualizar veículo.";
            }
        } else {
            $veiculo = $this->veiculoModel->buscar_por_id($id);

            if (!$veiculo) {
                echo "Veículo não encontrado.";
                return;
            }

            require_once __DIR__ . '/../Views/editar_veiculo.php';
        }
    }

    public function deletar_veiculo($id)
    {
        $sucesso = $this->veiculoModel->deletar_por_id($id);

        if ($sucesso) {
            header('Location: /teapp/veiculos/listar_veiculos');
            exit;
        } else {
            echo "Erro ao deletar o veículo com ID: $id";
        }
    }
}
