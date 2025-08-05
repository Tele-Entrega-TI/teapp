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
      <li class="fw-medium text-primary">Editar</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-9">
              <h6 class="mb-0">Editar Checklist</h6>
            </div>
            <!-- <div class="col-lg-3 text-end">
              <a href="/teapp/checklist" class="btn btn-secondary">Voltar</a>
            </div> -->
          </div>
        </div>

        <div class="card-body">
          <?php if (!empty($_SESSION['erroChecklist'])): ?>
            <div class="alert alert-danger">
              <?= $_SESSION['erroChecklist']; unset($_SESSION['erroChecklist']); ?>
            </div>
          <?php endif; ?>

          <form method="POST" action="/teapp/checklist/editaract" enctype="multipart/form-data">
            <input type="hidden" name="id_checklist" value="<?php echo $this->dados['id_checklist']; ?>">
            <div class="row">
              <div class="col-md-4 mb-3">
                <label class="form-label">Placa Veículo</label>
                <input type="text" name="placa" class="form-control text-center" readonly placeholder="<?= $this->dados['placa'] ?>" />
                  
              </div>

              <div class="col-md-4 mb-3">
                <label class="form-label">Data do Checklist</label>
                <input type="text" name="data_checklist" class="form-control text-center" readonly placeholder="<?= date("d-m-y",strtotime($this->dados['data_checklist'])) ?>">
              </div>
            </div>

           
            <!-- $itens = [
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
            ]; -->

           
              <div class="mb-4 border p-3 rounded">
                <label class="form-label fw-semibold">Pneu Dianteiro Direito</label>
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Qualidade</label>
                    <select name="pneu_dianteiro_direito_qualidade" class="form-select" required>
                      <option value="<?= $this->dados['pneu_dianteiro_direito_qualidade'] ?>"><?= ucfirst($this->dados['pneu_dianteiro_direito_qualidade']) ?></option>
                      <option value="bom">Bom</option>
                      <option value="regular">Regular</option>
                      <option value="ruim">Ruim</option>
                    </select>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Observação</label>
                    <input type="text" name="pneu_dianteiro_direito_observacao" class="form-control" value="<?= $this->dados['pneu_dianteiro_direito_observacao'] ?>" required>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Foto</label>
                    <img src="/teapp/uploads/checklists/<?= $this->dados['pneu_dianteiro_direito_foto'] ?>" alt="" style="width: 350px; height: 250px;">
                    <input type="file" name="pneu_dianteiro_direito_foto" class="form-control" accept="image/*">
                    <input type="hidden" name="pneu_dianteiro_direito_foto_database" value="<?= $this->dados['pneu_dianteiro_direito_foto'] ?>" class="form-control">
                  </div>
                </div>
              </div>
              <div class="mb-4 border p-3 rounded">
                <label class="form-label fw-semibold">Pneu Dianteiro Esquerdo</label>
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Qualidade</label>
                    <select name="pneu_dianteiro_esquerdo_qualidade" class="form-select" required>
                      <option value="<?= $this->dados['pneu_dianteiro_esquerdo_qualidade'] ?>"><?= ucfirst($this->dados['pneu_dianteiro_esquerdo_qualidade']) ?></option>
                      <option value="bom">Bom</option>
                      <option value="regular">Regular</option>
                      <option value="ruim">Ruim</option>
                    </select>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Observação</label>
                    <input type="text" name="pneu_dianteiro_esquerdo_observacao" class="form-control" value="<?= $this->dados['pneu_dianteiro_esquerdo_observacao'] ?>" required>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Foto</label>
                    <img src="/teapp/uploads/checklists/<?= $this->dados['pneu_dianteiro_esquerdo_foto'] ?>" alt="" style="width: 350px; height: 250px;">
                    <input type="file" name="pneu_dianteiro_esquerdo_foto" class="form-control" accept="image/*">
                    <input type="hidden" name="pneu_dianteiro_esquerdo_foto_database" value="<?= $this->dados['pneu_dianteiro_esquerdo_foto'] ?>" class="form-control">
                  </div>
                </div>
              </div>
              <div class="mb-4 border p-3 rounded">
                <label class="form-label fw-semibold">Pneu Traseiro Direito</label>
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Qualidade</label>
                    <select name="pneu_traseiro_direito_qualidade" class="form-select" required>
                      <option value="<?= $this->dados['pneu_traseiro_direito_qualidade'] ?>"><?= ucfirst($this->dados['pneu_traseiro_direito_qualidade']) ?></option>
                      <option value="bom">Bom</option>
                      <option value="regular">Regular</option>
                      <option value="ruim">Ruim</option>
                    </select>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Observação</label>
                    <input type="text" name="pneu_traseiro_direito_observacao" class="form-control" value="<?= $this->dados['pneu_traseiro_direito_observacao'] ?>" required>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Foto</label>
                    <img src="/teapp/uploads/checklists/<?= $this->dados['pneu_traseiro_direito_foto'] ?>" alt="" style="width: 350px; height: 250px;">
                    <input type="file" name="pneu_traseiro_direito_foto" class="form-control" accept="image/*">
                    <input type="hidden" name="pneu_traseiro_direito_foto_database" value="<?= $this->dados['pneu_traseiro_direito_foto'] ?>" class="form-control">
                  </div>
                </div>
              </div>
              <div class="mb-4 border p-3 rounded">
                <label class="form-label fw-semibold">Pneu Traseiro Esquerdo</label>
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Qualidade</label>
                    <select name="pneu_traseiro_esquerdo_qualidade" class="form-select" required>
                      <option value="<?= $this->dados['pneu_traseiro_esquerdo_qualidade'] ?>"><?= ucfirst($this->dados['pneu_traseiro_esquerdo_qualidade']) ?></option>
                      <option value="bom">Bom</option>
                      <option value="regular">Regular</option>
                      <option value="ruim">Ruim</option>
                    </select>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Observação</label>
                    <input type="text" name="pneu_traseiro_esquerdo_observacao" class="form-control" value="<?= $this->dados['pneu_traseiro_esquerdo_observacao'] ?>" required>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Foto</label>
                    <img src="/teapp/uploads/checklists/<?= $this->dados['pneu_traseiro_esquerdo_foto'] ?>" alt="" style="width: 350px; height: 250px;">
                    <input type="file" name="pneu_traseiro_esquerdo_foto" class="form-control" accept="image/*">
                    <input type="hidden" name="pneu_traseiro_esquerdo_foto_database" value="<?= $this->dados['pneu_traseiro_esquerdo_foto'] ?>" class="form-control">
                  </div>
                </div>
              </div>
              <div class="mb-4 border p-3 rounded">
                <label class="form-label fw-semibold">Freios</label>
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Qualidade</label>
                    <select name="freios_qualidade" class="form-select" required>
                      <option value="<?= $this->dados['freios_qualidade'] ?>"><?= ucfirst($this->dados['freios_qualidade']) ?></option>
                      <option value="bom">Bom</option>
                      <option value="regular">Regular</option>
                      <option value="ruim">Ruim</option>
                    </select>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Observação</label>
                    <input type="text" name="freios_observacao" class="form-control" value="<?= $this->dados['freios_observacao'] ?>" required>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Foto</label>
                    <img src="/teapp/uploads/checklists/<?= $this->dados['freios_foto'] ?>" alt="" style="width: 350px; height: 250px;">
                    <input type="file" name="freios_foto" class="form-control" accept="image/*">
                    <input type="hidden" name="freios_foto_database" value="<?= $this->dados['freios_foto'] ?>" class="form-control">
                  </div>
                </div>
              </div>
              <div class="mb-4 border p-3 rounded">
                <label class="form-label fw-semibold">Nível do Óleo</label>
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Qualidade</label>
                    <select name="oleo_qualidade" class="form-select" required>
                      <option value="<?= $this->dados['oleo_qualidade'] ?>"><?= ucfirst($this->dados['oleo_qualidade']) ?></option>
                      <option value="bom">Bom</option>
                      <option value="regular">Regular</option>
                      <option value="ruim">Ruim</option>
                    </select>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Observação</label>
                    <input type="text" name="oleo_observacao" class="form-control" value="<?= $this->dados['oleo_observacao'] ?>" required>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Foto</label>
                    <img src="/teapp/uploads/checklists/<?= $this->dados['oleo_foto'] ?>" alt="" style="width: 350px; height: 250px;">
                    <input type="file" name="oleo_foto" class="form-control" accept="image/*">
                    <input type="hidden" name="oleo_foto_database" value="<?= $this->dados['oleo_foto'] ?>" class="form-control">
                  </div>
                </div>
              </div>
              <div class="mb-4 border p-3 rounded">
                <label class="form-label fw-semibold">Luzes</label>
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Qualidade</label>
                    <select name="luzes_qualidade" class="form-select" required>
                      <option value="<?= $this->dados['luzes_qualidade'] ?>"><?= ucfirst($this->dados['luzes_qualidade']) ?></option>
                      <option value="bom">Bom</option>
                      <option value="regular">Regular</option>
                      <option value="ruim">Ruim</option>
                    </select>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Observação</label>
                    <input type="text" name="luzes_observacao" class="form-control" value="<?= $this->dados['luzes_observacao'] ?>" required>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Foto</label>
                    <img src="/teapp/uploads/checklists/<?= $this->dados['luzes_foto'] ?>" alt="" style="width: 350px; height: 250px;">
                    <input type="file" name="luzes_foto" class="form-control" accept="image/*">
                    <input type="hidden" name="luzes_foto_database" value="<?= $this->dados['luzes_foto'] ?>" class="form-control">
                  </div>
                </div>
              </div>
              <div class="mb-4 border p-3 rounded">
                <label class="form-label fw-semibold">Lataria</label>
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Qualidade</label>
                    <select name="lataria_qualidade" class="form-select" required>
                      <option value="<?= $this->dados['lataria_qualidade'] ?>"><?= ucfirst($this->dados['lataria_qualidade']) ?></option>
                      <option value="bom">Bom</option>
                      <option value="regular">Regular</option>
                      <option value="ruim">Ruim</option>
                    </select>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Observação</label>
                    <input type="text" name="lataria_observacao" class="form-control" value="<?= $this->dados['lataria_observacao'] ?>" required>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Foto</label>
                    <img src="/teapp/uploads/checklists/<?= $this->dados['lataria_foto'] ?>" alt="" style="width: 350px; height: 250px;">
                    <input type="file" name="lataria_foto" class="form-control" accept="image/*">
                    <input type="hidden" name="lataria_foto_database" value="<?= $this->dados['lataria_foto'] ?>" class="form-control">
                  </div>
                </div>
              </div>
              <div class="mb-4 border p-3 rounded">
                <label class="form-label fw-semibold">Nível de Água</label>
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Qualidade</label>
                    <select name="nivel_agua_qualidade" class="form-select" required>
                      <option value="<?= $this->dados['nivel_agua_qualidade'] ?>"><?= ucfirst($this->dados['nivel_agua_qualidade']) ?></option>
                      <option value="bom">Bom</option>
                      <option value="regular">Regular</option>
                      <option value="ruim">Ruim</option>
                    </select>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Observação</label>
                    <input type="text" name="nivel_agua_observacao" class="form-control" value="<?= $this->dados['nivel_agua_observacao'] ?>" required>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Foto</label>
                    <img src="/teapp/uploads/checklists/<?= $this->dados['nivel_agua_foto'] ?>" alt="" style="width: 350px; height: 250px;">
                    <input type="file" name="nivel_agua_foto" class="form-control" accept="image/*">
                    <input type="hidden" name="nivel_agua_foto_database" value="<?= $this->dados['nivel_agua_foto'] ?>" class="form-control">
                  </div>
                </div>
              </div>
              <div class="mb-4 border p-3 rounded">
                <label class="form-label fw-semibold">Equipamentos de Segurança</label>
                <div class="row">
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Qualidade</label>
                    <select name="equipamentos_seguranca_qualidade" class="form-select" required>
                      <option value="<?= $this->dados['equipamentos_seguranca_qualidade'] ?>"><?= ucfirst($this->dados['equipamentos_seguranca_qualidade']) ?></option>
                      <option value="bom">Bom</option>
                      <option value="regular">Regular</option>
                      <option value="ruim">Ruim</option>
                    </select>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Observação</label>
                    <input type="text" name="equipamentos_seguranca_observacao" class="form-control" value="<?= $this->dados['equipamentos_seguranca_observacao'] ?>" required>
                  </div>
                  <div class="col-md-4 mb-3">
                    <label class="form-label">Foto</label>
                    <img src="/teapp/uploads/checklists/<?= $this->dados['equipamentos_seguranca_foto'] ?>" alt="" style="width: 350px; height: 250px;">
                    <input type="file" name="equipamentos_seguranca_foto" class="form-control" accept="image/*">
                    <input type="hidden" name="equipamentos_seguranca_foto_database" value="<?= $this->dados['equipamentos_seguranca_foto'] ?>" class="form-control">
                  </div>
                </div>
              </div>

            <div class="mb-3">
              <label class="form-label">Observações Gerais</label>
              <textarea name="observacoes" class="form-control" rows="3"><?= $this->dados['observacoes'] ?></textarea>
            </div>

            <div class="mb-3">
              <label class="form-label">Assinatura do Motorista</label>
              <input type="text" name="assinatura_motorista" class="form-control" value="<?= $this->dados['assinatura_motorista'] ?>">
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
              <a href="/teapp/checklist" class="btn btn-outline-secondary">Cancelar</a>
              <button type="submit" class="btn btn-success">Salvar Alteraçoes</button>
            </div>
          </form>
        </div>
      </div><!-- card end -->
    </div>
  </div>
</div>
