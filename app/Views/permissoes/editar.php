<?php
$modulos        = $this->dados['modulos'];
$acessos        = $this->dados['acessos'];
$id_funcionario = $this->dados['id_funcionario'];

$niveis = [
    'v'   => 'Visualizar',
    've'  => 'Visualizar e Editar',
    'ved' => 'Acesso Total',
    ''    => 'Sem acesso'
];
?>

<div class="dashboard-main-body">
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Permissões</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="/teapp/usuarios" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Usuários
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Permissões</li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0">Defina os acessos por Módulo</h6>
                </div>

                <div class="card-body">
                    <form method="post" action="/teapp/permissoes/editaract">
                        <input type="hidden" name="id_funcionario" value="<?= $id_funcionario ?>">

                        <?php foreach ($modulos as $modulo): 
                            $id_modulo = (int)$modulo['id_modulo'];
                            $nome      = strtolower($modulo['nome_modulo']);
                            $nivel     = '';

                            foreach($acessos as $a) {
                                if((int)$a['id_modulo'] === $id_modulo) {
                                    $nivel = $a['permissao'];
                                }
                            }

                        ?>
                            <div class="mb-4">
                                <h6 class="mb-2 text-capitalize"><?= $nome ?></h6>

                                <?php foreach ($niveis as $valor => $label): ?>
                                    <div class="form-check mb-1">
                                        <input class="form-check-input"
                                               type="radio"
                                               name="permissoes[<?= $id_modulo ?>]"
                                               value="<?= $valor ?>"
                                               <?= ($nivel === $valor ? 'checked' : '') ?>>
                                        <label class="form-check-label <?= $valor === '' ? 'text-muted' : '' ?>">
                                            <?= $label ?>
                                        </label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <hr>
                        <?php endforeach; ?>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Salvar Permissões</button>
                            <a href="/teapp/permissoes" class="btn btn-outline-secondary">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
