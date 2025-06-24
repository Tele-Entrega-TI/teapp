<div class="dashboard-main-body">

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Novo Checklist</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/operacional" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Dashboard
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium"><a href="/teapp/checklist">Checklists</a></li>
      <li>-</li>
      <li class="fw-medium">Novo Checklist</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <form action="/teapp/checklist/adicionarACT" method="POST">

            <div class="mb-3">
              <label class="form-label">Veículo</label>
              <select name="id_veiculo" class="form-control" required>
                <option value="">Selecione um veículo</option>
                <?php foreach ($this->dados['veiculos'] as $v) : ?>
                  <option value="<?= $v['id_veiculo'] ?>">
                    <?= $v['placa'] ?> - <?= $v['modelo'] ?>
                  </option>
                <?php endforeach; ?>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Data do Checklist</label>
              <input type="date" name="data_checklist" class="form-control" required>
            </div>

            <div class="mb-4">
              <label class="form-label fw-semibold">Itens Verificados</label>
              <div class="row">

                <div class="col-md-4">
                  <div class="form-check mb-2">
                    <input class="form-check-input me-2" type="checkbox" name="pneus_ok" value="1" id="pneus">
                    <label class="form-check-label" for="pneus">Pneus</label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="form-check-input me-2" type="checkbox" name="freios_ok" value="1" id="freios">
                    <label class="form-check-label" for="freios">Freios</label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="form-check-input me-2" type="checkbox" name="oleo_ok" value="1" id="oleo">
                    <label class="form-check-label" for="oleo">Óleo</label>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-check mb-2">
                    <input class="form-check-input me-2" type="checkbox" name="luzes_ok" value="1" id="luzes">
                    <label class="form-check-label" for="luzes">Luzes</label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="form-check-input me-2" type="checkbox" name="lataria_ok" value="1" id="lataria">
                    <label class="form-check-label" for="lataria">Lataria</label>
                  </div>
                  <div class="form-check mb-2">
                    <input class="form-check-input me-2" type="checkbox" name="nivel_agua_ok" value="1" id="agua">
                    <label class="form-check-label" for="agua">Nível de Água</label>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-check mb-2">
                    <input class="form-check-input me-2" type="checkbox" name="equipamentos_seguranca_ok" value="1" id="seguranca">
                    <label class="form-check-label" for="seguranca">Equipamentos de Segurança</label>
                  </div>
                </div>

              </div>
            </div>

            <div class="mb-3">
              <label class="form-label">Observações</label>
              <textarea name="observacoes" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
              <label class="form-label">Assinatura do Motorista</label>
              <input type="text" name="assinatura_motorista" class="form-control">
            </div>

            <div class="d-flex justify-content-between">
              <a href="/teapp/checklist" class="btn btn-outline-secondary">Voltar</a>
              <button type="submit" class="btn btn-success">Salvar Checklist</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
