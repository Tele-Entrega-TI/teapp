<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Adicionar Item ao Orçamento</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="/teapp" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">
                <a href="/teapp/itens" class="hover-text-primary">Itens</a>
            </li>
            <li>-</li>
            <li class="fw-medium text-primary">Adicionar</li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/teapp/itens/adicionarACT">
                        <div class="row">

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Orçamento</label>
                                <select name="id_orcamento" class="form-control" required>
                                    <option value="">Selecione um orçamento</option>
                                    <?php foreach ($this->dados['orcamentos'] as $orc): ?>
                                        <option value="<?= $orc['id_orcamento'] ?>">
                                            <?= $orc['placa'] ?> - <?= date("d/m/Y", strtotime($orc['data_cotacao'])) ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">Item</label>
                                <input type="text" name="item" class="form-control" required>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label class="form-label">Descrição</label>
                                <textarea name="descricao" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Valor</label>
                                <input type="number" step="0.01" name="valor" class="form-control" required>
                            </div>

                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <a href="/teapp/itens" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-success">Adicionar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
