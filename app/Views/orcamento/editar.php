<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Editar Orçamento</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="/teapp" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">
                <a href="/teapp/orcamento" class="hover-text-primary">Orçamentos</a>
            </li>
            <li>-</li>
            <li class="fw-medium text-primary">Editar</li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/teapp/orcamento/editaract">
                        <input type="hidden" name="id_orcamento" value="<?= $this->dados['id_orcamento'] ?>">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Oficina</label>
                                <select name="id_oficina" class="form-control" required>
                                    <?php foreach($this->dados['oficinas'] as $ofi): ?>
                                    <option value="<?= $ofi['id_oficina'] ?>" <?= $ofi['id_oficina'] == $this->dados['id_oficina'] ? 'selected' : '' ?>>
                                        <?= $ofi['nome'] ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Veículo</label>
                                <select name="id_veiculo" class="form-control" required>
                                    <?php foreach($this->dados['veiculos'] as $v): ?>
                                    <option value="<?= $v['id_veiculo'] ?>" <?= $v['id_veiculo'] == $this->dados['id_veiculo'] ? 'selected' : '' ?>>
                                        <?= $v['placa'] ?> - <?= $v['modelo'] ?>
                                    </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Status Aprovado</label>
                                <select name="status_aprovado" class="form-control" required>
                                    <option value="0" <?= $this->dados['status_aprovado'] == 0 ? 'selected' : '' ?>>Pendente</option>
                                    <option value="1" <?= $this->dados['status_aprovado'] == 1 ? 'selected' : '' ?>>Aprovado</option>
                                    <option value="2" <?= $this->dados['status_aprovado'] == 2 ? 'selected' : '' ?>>Reprovado</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Data Cotação</label>
                                <input type="date" name="data_cotacao" class="form-control" value="<?= $this->dados['data_cotacao'] ?>" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Data Aprovação</label>
                                <input type="date" name="data_aprovacao" class="form-control" value="<?= $this->dados['data_aprovacao'] ?>">
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Data Conclusão</label>
                                <input type="date" name="data_conclusao" class="form-control" value="<?= $this->dados['data_conclusao'] ?>">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <a href="/teapp/orcamento" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-success">Salvar Alterações</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
