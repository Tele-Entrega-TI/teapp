<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Adicionar Substituição</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="/teapp/" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Início
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">
                <a href="/teapp/substitutos" class="d-flex align-items-center gap-1 hover-text-primary">
                    Substituições
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Adicionar</li>
        </ul>
    </div>

    <form action="/teapp/substitutos/adicionarACT" method="post">
        <div class="row gy-4">
            <div class="col-lg-4">
                <label class="form-label">Funcionário</label>
                <select name="id_funcionario_falta" class="form-select" required>
                    <option value="">Selecione</option>
                    <?php
                    if (!empty($this->dados['funcionarios'])) {
                        foreach ($this->dados['funcionarios'] as $f) {
                            echo '<option value="' . $f['id_funcionario'] . '">' . $f['nome'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="col-lg-4">
                <label class="form-label">Funcionário Substituto</label>
                <select name="id_funcionario_substituto" class="form-select" required>
                    <option value="">Selecione</option>
                    <?php
                    if (!empty($this->dados['funcionarios'])) {
                        foreach ($this->dados['funcionarios'] as $f) {
                            echo '<option value="' . $f['id_funcionario'] . '">' . $f['nome'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="col-lg-4">
                <label class="form-label">Locação</label>
                <select name="id_locacao" class="form-select" required>
                    <option value="">Selecione</option>
                    <?php
                    if (!empty($this->dados['locacoes'])) {
                        foreach ($this->dados['locacoes'] as $l) {
                            echo '<option value="' . $l['id_locacao'] . '">' . $l['locacao'] . '</option>';
                        }
                    }
                    ?>
                </select>
            </div>

            <div class="col-lg-4">
                <label class="form-label">Data</label>
                <input type="date" name="data" class="form-control" required>
            </div>

            <div class="col-lg-4">
                <label class="form-label">Custo da Substituição</label>
                <input type="text" name="custo_sub" class="form-control" placeholder="R$ 0,00" required>
            </div>

            <div class="col-lg-12 text-end">
                <input type="hidden" name="ativo" value="1">
                <button type="submit" class="btn btn-success">Salvar</button>
            </div>
        </div>
    </form>
</div>
