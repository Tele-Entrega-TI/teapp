<div class="dashboard-main-body">

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Nova Movimentação</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/operacional" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Dashboard
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium"><a href="/teapp/movimentacao">Movimentações</a></li>
      <li>-</li>
      <li class="fw-medium">Nova Movimentação</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <form action="/teapp/movimentacao/adicionaract" method="post">

            <div class="mb-3">
              <label class="form-label">Veículo</label>
              <select name="id_veiculo" class="form-select" required>
                <option value="">Selecione</option>
                <?php
                if (!empty($this->dados['veiculos']) && is_array($this->dados['veiculos'])) {
                  foreach ($this->dados['veiculos'] as $v) {
                    echo '<option value="' . $v['id_veiculo'] . '">' . $v['placa'] . ' - ' . $v['modelo'] . '</option>';
                  }
                }
                ?>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Funcionário</label>
              <select name="id_funcionario" class="form-select" required>
                <option value="">Selecione</option>
                <?php
                if (!empty($this->dados['funcionarios']) && is_array($this->dados['funcionarios'])) {
                  foreach ($this->dados['funcionarios'] as $f) {
                    echo '<option value="' . $f['id_funcionario'] . '">' . $f['nome'] . '</option>';
                  }
                }
                ?>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Data de Entrega</label>
              <input type="date" name="data_entrega" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Doc. do Condutor</label>
              <input type="text" name="doc_moto" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label">Valor Aluguel</label>
              <input type="text" name="valor_aluguel" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label">Parcelas</label>
              <input type="number" name="parcelas" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label">Contrato Assinado</label>
              <select name="contrato_assinado" class="form-select" required>
                <option value="1">Sim</option>
                <option value="0">Não</option>
              </select>
            </div>

            <div class="text-end">
              <button type="submit" class="btn btn-success">Salvar</button>
              <a href="/teapp/movimentacao" class="btn btn-secondary">Cancelar</a>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>

</div>
