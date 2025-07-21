<div class="dashboard-main-body">
  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Checklist Detalhado</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/checklisthistorico" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:arrow-left-line-duotone" class="icon text-lg"></iconify-icon>
          Voltar
        </a>
      </li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">

          <div class="mb-4">
            <strong>Data:</strong> <?= date('d/m/Y', strtotime($this->dados['data_checklist'])) ?><br>
            <strong>Veículo:</strong> <?= $this->dados['placa'] ?> - <?= $this->dados['modelo'] ?><br>
            <strong>Condutor:</strong> <?= $this->dados['nome_funcionario'] ?>
          </div>

          <?php 
            $itens = [
              'pneus', 'freios', 'oleo', 'luzes', 
              'lataria', 'nivel_agua', 'equipamentos_seguranca'
            ];
            foreach ($itens as $item):
              $qualidade = $this->dados[$item . '_qualidade'];
              $obs       = $this->dados[$item . '_observacao'];
              $foto      = $this->dados[$item . '_foto'];
              $nome_exibicao = ucwords(str_replace('_', ' ', $item));
          ?>
            <div class="mb-4 border rounded p-3">
              <h6 class="fw-semibold"><?= $nome_exibicao ?></h6>
              <p><strong>Qualidade:</strong> <?= ucfirst($qualidade) ?> 
                <?php if ($qualidade == 'ruim'): ?>
                  <span class="badge bg-danger ms-2">Item Não OK</span>
                <?php elseif ($qualidade == 'regular'): ?>
                  <span class="badge bg-warning ms-2">Item OK</span>
                <?php elseif ($qualidade == 'bom'): ?>
                  <span class="badge bg-success ms-2">Item OK</span>
                <?php endif; ?>
              </p>
              <p><strong>Observação:</strong> <?= $obs ?: '<span class="text-muted">Nenhuma</span>' ?></p>
              <?php if ($foto): ?>
                <div>
                  <strong>Foto:</strong><br>
                  <img src="/uploads/checklists/<?= $foto ?>" alt="Foto de <?= $nome_exibicao ?>" class="img-fluid rounded" style="max-width: 300px;">
                </div>
              <?php endif; ?>
            </div>
          <?php endforeach; ?>

          <div class="mb-3">
            <h6 class="fw-semibold">Observações Gerais</h6>
            <p><?= $this->dados['observacoes'] ?: '<span class="text-muted">Nenhuma</span>' ?></p>
          </div>

          <div class="mb-3">
            <h6 class="fw-semibold">Assinatura do Motorista</h6>
            <p><?= $this->dados['assinatura_motorista'] ?: '<span class="text-muted">Não preenchida</span>' ?></p>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>
