<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Editar Substituição</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="/teapp/" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Início
                </a>
            </li>
            <li>-</li>
            <li><a href="/teapp/substitutos" class="fw-medium">Substituições</a></li>
            <li>-</li>
            <li class="fw-medium">Editar</li>
        </ul>
    </div>

    <form action="/teapp/substitutos/editarACT" method="POST">
        <input type="hidden" name="id_substituto" value="<?= $this->dados['id_substituto'] ?>">

        <div class="row">
            <div class="col-lg-6 mb-3">
                <label>Funcionário</label>
                <select name="id_funcionario_falta" class="form-select" required>
                    <option value="">Selecione</option>
                    <?php foreach ($this->dados['funcionarios'] as $func): ?>
                        <option value="<?= $func['id_funcionario'] ?>" <?= $func['id_funcionario'] == $this->dados['id_funcionario_falta'] ? 'selected' : '' ?>>
                            <?= $func['nome'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-lg-6 mb-3">
                <label>Funcionário Substituto</label>
                <select name="id_funcionario_substituto" class="form-select" required>
                    <option value="">Selecione</option>
                    <?php foreach ($this->dados['funcionarios'] as $func): ?>
                        <option value="<?= $func['id_funcionario'] ?>" <?= $func['id_funcionario'] == $this->dados['id_funcionario_substituto'] ? 'selected' : '' ?>>
                            <?= $func['nome'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-lg-6 mb-3">
                <label>Locação</label>
                <select name="id_locacao" class="form-select" required>
                    <option value="">Selecione</option>
                    <?php foreach ($this->dados['locacoes'] as $loc): ?>
                        <option value="<?= $loc['id_locacao'] ?>" <?= $loc['id_locacao'] == $this->dados['id_locacao'] ? 'selected' : '' ?>>
                            <?= $loc['locacao'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="col-lg-3 mb-3">
                <label>Custo</label>
                <input type="text" name="custo_sub" class="form-control" value="<?= $this->dados['custo_sub'] ?>" required>
            </div>

            <div class="col-lg-3 mb-3">
                <label>Data</label>
                <input type="date" name="data" class="form-control" value="<?= $this->dados['data'] ?>" required>
            </div>

            <div class="col-lg-3 mb-3">
                <label>Ativo</label>
                <select name="ativo" class="form-select">
                    <option value="1" <?= $this->dados['ativo'] == 1 ? 'selected' : '' ?>>Sim</option>
                    <option value="0" <?= $this->dados['ativo'] == 0 ? 'selected' : '' ?>>Não</option>
                </select>
            </div>

            <div class="col-lg-12 text-end">
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </div>
        </div>
    </form>
</div>
