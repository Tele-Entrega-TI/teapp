<div class="dashboard-main-body">
  <div class="card">
    <div class="card-body">
      <form method="post" action="/teapp/checklist/ChecklistPublicoACT" enctype="multipart/form-data">

        <input type="hidden" name="id_veiculo" value="<?= $this->dados['info']['id_veiculo'] ?>">

        <div class="mb-3">
          <label class="form-label">Veículo</label>
          <input type="text" class="form-control" value="<?= $this->dados['info']['placa'] ?> - <?= $this->dados['info']['modelo'] ?>" disabled>
        </div>

        <div class="mb-3">
          <label class="form-label">Condutor Atual</label>
          <input type="text" class="form-control" value="<?= $this->dados['info']['nome_funcionario'] ?>" disabled>
        </div>

        <div class="mb-3">
          <label class="form-label">Data do Checklist</label>
          <input type="date" name="data_checklist" class="form-control" required>
        </div>

        <div class="mb-4">
          <label class="form-label fw-semibold">Pneus</label>
          <div class="row align-items-end">
            <div class="col-md-4">
              <label class="form-label">Qualidade</label>
              <select name="pneus_qualidade" class="form-select" required>
                <option value="">Selecione</option>
                <option value="bom">Bom</option>
                <option value="regular">Regular</option>
                <option value="ruim">Ruim</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">Observação</label>
              <input type="text" name="pneus_observacao" class="form-control">
            </div>
            <div class="col-md-4">
              <label class="form-label">Foto</label>
              <input type="file" name="pneus_foto" class="form-control" accept="image/*">
            </div>
          </div>
        </div>

        <div class="mb-4">
          <label class="form-label fw-semibold">Freios</label>
          <div class="row align-items-end">
            <div class="col-md-4">
              <label class="form-label">Qualidade</label>
              <select name="freios_qualidade" class="form-select" required>
                <option value="">Selecione</option>
                <option value="bom">Bom</option>
                <option value="regular">Regular</option>
                <option value="ruim">Ruim</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">Observação</label>
              <input type="text" name="freios_observacao" class="form-control">
            </div>
            <div class="col-md-4">
              <label class="form-label">Foto</label>
              <input type="file" name="freios_foto" class="form-control" accept="image/*">
            </div>
          </div>
        </div>

        <div class="mb-4">
          <label class="form-label fw-semibold">Nível do Óleo</label>
          <div class="row align-items-end">
            <div class="col-md-4">
              <label class="form-label">Qualidade</label>
              <select name="oleo_qualidade" class="form-select" required>
                <option value="">Selecione</option>
                <option value="bom">Bom</option>
                <option value="regular">Regular</option>
                <option value="ruim">Ruim</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">Observação</label>
              <input type="text" name="oleo_observacao" class="form-control">
            </div>
            <div class="col-md-4">
              <label class="form-label">Foto</label>
              <input type="file" name="oleo_foto" class="form-control" accept="image/*">
            </div>
          </div>
        </div>

        <div class="mb-4">
          <label class="form-label fw-semibold">Luzes</label>
          <div class="row align-items-end">
            <div class="col-md-4">
              <label class="form-label">Qualidade</label>
              <select name="luzes_qualidade" class="form-select" required>
                <option value="">Selecione</option>
                <option value="bom">Bom</option>
                <option value="regular">Regular</option>
                <option value="ruim">Ruim</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">Observação</label>
              <input type="text" name="luzes_observacao" class="form-control">
            </div>
            <div class="col-md-4">
              <label class="form-label">Foto</label>
              <input type="file" name="luzes_foto" class="form-control" accept="image/*">
            </div>
          </div>
        </div>

        <div class="mb-4">
          <label class="form-label fw-semibold">Lataria</label>
          <div class="row align-items-end">
            <div class="col-md-4">
              <label class="form-label">Qualidade</label>
              <select name="lataria_qualidade" class="form-select" required>
                <option value="">Selecione</option>
                <option value="bom">Bom</option>
                <option value="regular">Regular</option>
                <option value="ruim">Ruim</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">Observação</label>
              <input type="text" name="lataria_observacao" class="form-control">
            </div>
            <div class="col-md-4">
              <label class="form-label">Foto</label>
              <input type="file" name="lataria_foto" class="form-control" accept="image/*">
            </div>
          </div>
        </div>

        <div class="mb-4">
          <label class="form-label fw-semibold">Nível de Água</label>
          <div class="row align-items-end">
            <div class="col-md-4">
              <label class="form-label">Qualidade</label>
              <select name="agua_qualidade" class="form-select" required>
                <option value="">Selecione</option>
                <option value="bom">Bom</option>
                <option value="regular">Regular</option>
                <option value="ruim">Ruim</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">Observação</label>
              <input type="text" name="agua_observacao" class="form-control">
            </div>
            <div class="col-md-4">
              <label class="form-label">Foto</label>
              <input type="file" name="agua_foto" class="form-control" accept="image/*">
            </div>
          </div>
        </div>

        <div class="mb-4">
          <label class="form-label fw-semibold">Equipamentos de Segurança</label>
          <div class="row align-items-end">
            <div class="col-md-4">
              <label class="form-label">Qualidade</label>
              <select name="seguranca_qualidade" class="form-select" required>
                <option value="">Selecione</option>
                <option value="bom">Bom</option>
                <option value="regular">Regular</option>
                <option value="ruim">Ruim</option>
              </select>
            </div>
            <div class="col-md-4">
              <label class="form-label">Observação</label>
              <input type="text" name="seguranca_observacao" class="form-control">
            </div>
            <div class="col-md-4">
              <label class="form-label">Foto</label>
              <input type="file" name="seguranca_foto" class="form-control" accept="image/*">
            </div>
          </div>
        </div>
        
        <div class="mb-3">
          <label class="form-label">Observações Gerais</label>
          <textarea name="observacoes" class="form-control" rows="3"></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Assinatura do Motorista</label>
          <input type="text" name="assinatura_motorista" class="form-control">
        </div>

        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-success">Enviar Checklist</button>
        </div>

      </form>
    </div>
  </div>
</div>
