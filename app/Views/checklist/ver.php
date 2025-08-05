<div class="dashboard-main-body">
  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Detalhes do Checklist</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Início
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium"><a href="/teapp/checklist">Checklist</a></li>
      <li>-</li>
      <li class="fw-medium">Detalhes</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="tab-pneu" data-bs-toggle="tab" href="#pneu" role="tab">Pneus</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="tab-freios" data-bs-toggle="tab" href="#freios" role="tab">Freios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="tab-nivel_oleo" data-bs-toggle="tab" href="#nivel_oleo" role="tab">Nível de
                Óleo</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="tab-luzes" data-bs-toggle="tab" href="#luzes" role="tab">Luzes</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="tab-lataria" data-bs-toggle="tab" href="#lataria" role="tab">Lataria</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="tab-nivel_agua" data-bs-toggle="tab" href="#nivel_agua" role="tab">Nível de
                Água</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="tab-equipamento_segurança" data-bs-toggle="tab" href="#equipamento_segurança"
                role="tab">Equipamentos de Segurança</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <?php if (!empty($this->dados)) {
            $f = $this->dados; ?>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="pneu" role="tabpanel">
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <h6 class="fw-bold border-bottom pb-2 mb-3">Pneu Traseiro Esquerdo</h6>
                    <div>
                      <strong>Foto:</strong>
                      <img src="/teapp/uploads/checklists/<?= $f['pneu_traseiro_esquerdo_foto']; ?>" alt="Foto do pneu" style="width: 500px; height: 350px;">
                    </div>
                    <div><strong>Qualidade:</strong> <?= $f['pneu_traseiro_esquerdo_qualidade']; ?></div>
                    <div><strong>Observação:</strong> <?= $f['pneu_traseiro_esquerdo_observacao']; ?></div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <h6 class="fw-bold border-bottom pb-2 mb-3">Pneu Traseiro Direito</h6>
                    <div>
                      <strong>Foto:</strong>
                      <img src="/teapp/uploads/checklists/<?= $f['pneu_traseiro_direito_foto']; ?>" alt="Foto do pneu" style="width: 500px; height: 350px;">
                    </div>
                    <div><strong>Qualidade:</strong> <?= $f['pneu_traseiro_direito_qualidade']; ?></div>
                    <div><strong>Observação:</strong> <?= $f['pneu_traseiro_direito_observacao']; ?></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <h6 class="fw-bold border-bottom pb-2 mb-3">Pneu Dianteiro Esquerdo</h6>
                    <div>
                      <strong>Foto:</strong>
                      <img src="/teapp/uploads/checklists/<?= $f['pneu_dianteiro_esquerdo_foto']; ?>" alt="Foto do pneu" style="width: 500px; height: 350px;">
                    </div>
                    <div><strong>Qualidade:</strong> <?= $f['pneu_dianteiro_esquerdo_qualidade']; ?></div>
                    <div><strong>Observação:</strong> <?= $f['pneu_dianteiro_esquerdo_observacao']; ?></div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <h6 class="fw-bold border-bottom pb-2 mb-3">Pneu Dianteiro Direito</h6>
                    <div>
                      <strong>Foto:</strong>
                      <img src="/teapp/uploads/checklists/<?= $f['pneu_dianteiro_direito_foto']; ?>" alt="Foto do pneu" style="width: 500px; height: 350px;">
                    </div>
                    <div><strong>Qualidade:</strong> <?= $f['pneu_dianteiro_direito_qualidade']; ?></div>
                    <div><strong>Observação:</strong> <?= $f['pneu_dianteiro_direito_observacao']; ?></div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="freios" role="tabpanel">
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <h6 class="fw-bold border-bottom pb-2 mb-3">Freios</h6>
                    <div>
                      <strong>Foto:</strong>
                      <img src="/teapp/uploads/checklists/<?= $f['freios_foto']; ?>" alt="Foto freio" style="width: 500px; height: 350px;">
                    </div>
                    <div><strong>Qualidade:</strong> <?= $f['freios_qualidade']; ?></div>
                    <div><strong>Observação:</strong> <?= $f['freios_observacao']; ?></div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="nivel_oleo" role="tabpanel">
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <h6 class="fw-bold border-bottom pb-2 mb-3">Nivel de Óleo</h6>
                    <div>
                      <strong>Foto:</strong>
                      <img src="/teapp/uploads/checklists/<?= $f['oleo_foto']; ?>" alt="Foto freio" style="width: 500px; height: 350px;">
                    </div>
                    <div><strong>Qualidade:</strong> <?= $f['oleo_qualidade']; ?></div>
                    <div><strong>Observação:</strong> <?= $f['oleo_observacao']; ?></div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="luzes" role="tabpanel">
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <h6 class="fw-bold border-bottom pb-2 mb-3">Luzes</h6>
                    <div>
                      <strong>Foto:</strong>
                      <img src="/teapp/uploads/checklists/<?= $f['luzes_foto']; ?>" alt="Foto freio" style="width: 500px; height: 350px;">
                    </div>
                    <div><strong>Qualidade:</strong> <?= $f['luzes_qualidade']; ?></div>
                    <div><strong>Observação:</strong> <?= $f['luzes_observacao']; ?></div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="lataria" role="tabpanel">
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <h6 class="fw-bold border-bottom pb-2 mb-3">Lataria</h6>
                    <div>
                      <strong>Foto:</strong>
                      <img src="/teapp/uploads/checklists/<?= $f['lataria_foto']; ?>" alt="Foto freio" style="width: 500px; height: 350px;">
                    </div>
                    <div><strong>Qualidade:</strong> <?= $f['lataria_qualidade']; ?></div>
                    <div><strong>Observação:</strong> <?= $f['lataria_observacao']; ?></div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="nivel_agua" role="tabpanel">
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <h6 class="fw-bold border-bottom pb-2 mb-3">Nível de Água</h6>
                    <div>
                      <strong>Foto:</strong>
                      <img src="/teapp/uploads/checklists/<?= $f['nivel_agua_foto']; ?>" alt="Foto freio" style="width: 500px; height: 350px;">
                    </div>
                    <div><strong>Qualidade:</strong> <?= $f['nivel_agua_qualidade']; ?></div>
                    <div><strong>Observação:</strong> <?= $f['nivel_agua_observacao']; ?></div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="equipamento_segurança" role="tabpanel">
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <h6 class="fw-bold border-bottom pb-2 mb-3">Equipamentos de Segurança</h6>
                    <div>
                      <strong>Foto:</strong>
                      <img src="/teapp/uploads/checklists/<?= $f['equipamentos_seguranca_foto']; ?>" alt="Foto freio" style="width: 500px; height: 350px;">
                    </div>
                    <div><strong>Qualidade:</strong> <?= $f['equipamentos_seguranca_qualidade']; ?></div>
                    <div><strong>Observação:</strong> <?= $f['equipamentos_seguranca_observacao']; ?></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-end mt-4">
              <a href="/teapp/checklist" class="btn btn-secondary">Voltar</a>
              <a href="/teapp/checklist/editar/<?= $f['id_checklist']; ?>" class="btn btn-primary">Editar</a>
            </div>
          <?php } else { ?>
            <div class="alert alert-warning">Funcionário não encontrado.</div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>