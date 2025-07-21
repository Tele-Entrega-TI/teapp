<?php
$modulos = $this->dados['modulos'];
$acessos = $this->dados['acessos'];
$id_funcionario = $this->dados['id_funcionario'];
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
                    <div class="row">
                        <div class="col-lg-9">
                            <h6 class="mb-0"></h6>
                        </div>
                        <div class="col-lg-3 text-end">
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <form method="post" action="/teapp/permissoes/editaract">
                        <input type="hidden" name="id_funcionario" value="<?= $id_funcionario ?>">
                        <input type="hidden" name="id_grupo" value="0">

                        <?php foreach ($modulos as $modulo): ?>
                            <div class="mb-4">
                                <h6 class="mb-2"><?= strtolower($modulo['nome_modulo']) ?></h6>

                                <?php foreach (['visualizar', 'editar', 'criar', 'excluir'] as $tipo): 
                                    $checked = (
                                        isset($acessos[$modulo['id_modulo']]) &&
                                        in_array($tipo, $acessos[$modulo['id_modulo']])
                                    ) ? 'checked' : '';
                                ?>
                                    <div class="input-group mb-1">
                                        <div class="input-group-text">
                                            <input class="form-check-input mt-0"
                                                   type="checkbox"
                                                   name="permissoes[<?= $modulo['id_modulo'] ?>][]"
                                                   value="<?= $tipo ?>" <?= $checked ?>>
                                        </div>
                                        <input type="text" class="form-control" value="<?= $tipo ?>" disabled>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <hr>
                        <?php endforeach; ?>

                        <div class="text-end">
                            <button type="submit" class="btn btn-success">Salvar Permissões</button>
                            <a href="/teapp/usuarios" class="btn btn-outline-secondary">Voltar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
