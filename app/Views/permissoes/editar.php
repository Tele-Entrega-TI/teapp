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
                    <h6 class="mb-0">Defina os acessos por Módulo</h6>
                </div>

                <div class="card-body">
                    <form method="post" action="/teapp/permissoes/editaract">
                        <input type="hidden" name="id_funcionario" value="<?= $id_funcionario ?>">

                        <?php foreach ($modulos as $modulo): 
                            $nivel = $acessos[$modulo['id_modulo']] ?? ''; // 'v', 've' ou 'ved'
                        ?>
                        <div class="mb-4">
                            <h6 class="mb-2 text-capitalize"><?= strtolower($modulo['nome_modulo']) ?></h6>

                            <?php
                            $niveis = [
                                'v' => 'Visualizar',
                                've' => 'Visualizar / Editar',
                                'ved' => 'Visualizar / Editar / Deletar',
                            ];
                            ?>

                            <?php foreach ($niveis as $valor => $label): ?>
                                <div class="form-check mb-1">
                                    <input class="form-check-input"
                                           type="radio"
                                           name="permissoes[<?= $modulo['id_modulo'] ?>]"
                                           value="<?= $valor ?>"
                                           <?= ($nivel === $valor ? 'checked' : '') ?>>
                                    <label class="form-check-label"><?= $label ?></label>
                                </div>
                            <?php endforeach; ?>

                            <div class="form-check mt-1">
                                <input class="form-check-input"
                                       type="radio"
                                       name="permissoes[<?= $modulo['id_modulo'] ?>]"
                                       value=""
                                       <?= ($nivel === '' ? 'checked' : '') ?>>
                                <label class="form-check-label text-muted">Sem acesso</label>
                            </div>
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
