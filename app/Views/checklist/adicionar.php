<div class="dashboard-main-body">

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Checklists de Veículos</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Início
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium">
        <a href="/teapp/checklist" class="hover-text-primary">Checklists</a>
      </li>
      <li>-</li>
      <li class="fw-medium text-primary">Adicionar</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-9">
              <h6 class="mb-0">Novo Checklist</h6>
            </div>
            <div class="col-lg-3 text-end">
              <a href="/teapp/checklist" class="btn btn-secondary">Voltar</a>
            </div>
          </div>
        </div>

        <div class="card-body">
          <?php if (!empty($_SESSION['erroChecklist'])): ?>
            <div class="alert alert-danger">
              <?= $_SESSION['erroChecklist']; unset($_SESSION['erroChecklist']); ?>
            </div>
          <?php endif; ?>

          <form method="POST" action="/teapp/checklist/adicionarACT" enctype="multipart/form-data">
            <div class="row">
              <div class="col-md-4 mb-3">
                <label class="form-label">Veículo</label>
                <select name="id_veiculo" class="form-select" required>
                  <option value="">Selecione um veículo</option>
                  <?php foreach ($this->dados['veiculos'] as $v): ?>
                    <option value="<?= $v['id_veiculo'] ?>">
                      <?= $v['placa'] ?> - <?= $v['modelo'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </div>

              <div class="col-md-4 mb-3">
                <label class="form-label">Data do Checklist</label>
                <input type="date" name="data_checklist" class="form-control" required>
              </div>
            </div>

            <?php
            $itens = [
              'pneu_dianteiro_direito' => 'Pneu Dianteiro Direito',
              'pneu_dianteiro_esquerdo' => 'Pneu Dianteiro Esquerdo',
              'pneu_traseiro_direito' => 'Pneu Traseiro Direito',
              'pneu_traseiro_esquerdo' => 'Pneu Traseiro Esquerdo',
              'freios' => 'Freios',
              'oleo' => 'Nível do Óleo',
              'luzes' => 'Luzes',
              'lataria' => 'Lataria',
              'nivel_agua' => 'Nível de Água',
              'equipamentos_seguranca' => 'Equipamentos de Segurança'
            ];

            foreach ($itens as $prefix => $label): ?>
              <div class="mb-4 border p-3 rounded">
                <label class="form-label fw-semibold"><?= $label ?></label>
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Qualidade</label>
                    <select name="<?= $prefix ?>_qualidade" class="form-select" required>
                      <option value="">Selecione</option>
                      <option value="bom">Bom</option>
                      <option value="regular">Regular</option>
                      <option value="ruim">Ruim</option>
                    </select>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Observação</label>
                    <input type="text" name="<?= $prefix ?>_observacao" class="form-control" required>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Foto</label>
                    <input type="file" name="<?= $prefix ?>_foto" class="form-control" accept="image/*" required>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

            <div class="mb-3">
              <label class="form-label">Observações Gerais</label>
              <textarea name="observacoes" class="form-control" rows="3"></textarea>
            </div>

            <div class="mb-3">
              <label class="form-label">Assinatura do Motorista</label>
              <input type="text" name="assinatura_motorista" class="form-control">
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
              <a href="/teapp/checklist" class="btn btn-outline-secondary">Cancelar</a>
              <button type="submit" class="btn btn-success">Salvar Checklist</button>
            </div>
          </form>
        </div>
      </div><!-- card end -->
    </div>
  </div>
</div>
