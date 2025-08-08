<div class="dashboard-main-body">

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Novo Orçamento</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Início
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium"><a href="/teapp/orcamento">Orçamentos</a></li>
      <li>-</li>
      <li class="fw-medium">Novo Orçamento</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">

          <form action="/teapp/orcamento/AdicionarACT" method="POST">

            <div class="mb-3">
              <label class="form-label">Oficina</label>
              <select name="id_oficina" class="form-select" required>
                <option value="">Selecione a Oficina</option>
                <?php foreach ($this->dados['oficinas'] as $oficina): ?>
                  <option value="<?= $oficina['id_oficina'] ?>">
                    <?= htmlspecialchars($oficina['nome']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Veículo</label>
              <select name="id_veiculo" class="form-select" required>
                <option value="">Selecione o Veículo</option>
                <?php foreach ($this->dados['veiculos'] as $veiculo): ?>
                  <option value="<?= $veiculo['id_veiculo'] ?>">
                    <?= htmlspecialchars($veiculo['placa'] . ' - ' . $veiculo['modelo']) ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Status Aprovado</label>
              <select name="status_aprovado" class="form-select" required>
                <option value="0">Pendente</option>
                <option value="1">Aprovado</option>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Data Cotação</label>
              <input type="date" name="data_cotacao" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Data Aprovação</label>
              <input type="date" name="data_aprovacao" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Data Conclusão</label>
              <input type="date" name="data_conclusao" class="form-control" required>
            </div>

            <div class="text-end">
              <button type="submit" class="btn btn-success">Salvar</button>
              <a href="/teapp/orcamento" class="btn btn-secondary">Cancelar</a>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>
