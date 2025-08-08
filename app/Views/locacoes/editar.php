<div class="dashboard-main-body">
  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Editar Locação</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Início
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium"><a href="/teapp/locacoes">Locações</a></li>
      <li>-</li>
      <li class="fw-medium">Editar Locação</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <?php if (!empty($this->dados['locacao'])) {
              $key = $this->dados['locacao'];
          ?>
          <form action="/teapp/locacoes/editarACT" method="POST">
            <input type="hidden" name="id_locacao" value="<?= $key['id_locacao']; ?>">

            <div class="mb-3">
              <label class="form-label">Locação</label>
              <input type="text" name="locacao" class="form-control" value="<?= htmlspecialchars($key['locacao']); ?>" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Data de Início</label>
              <input type="date" name="inicio_locacao" class="form-control" value="<?= $key['inicio_locacao']; ?>" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Data de Fim</label>
              <input type="date" name="fim_locacao" class="form-control" value="<?= $key['fim_locacao'] ?? ''; ?>">
            </div>

            <div class="mb-3">
              <label class="form-label">Descrição</label>
              <input type="text" name="descricao" class="form-control" value="<?= htmlspecialchars($key['descricao']); ?>">
            </div>

            <div class="text-end">
              <button type="submit" class="btn btn-primary">Salvar</button>
              <a href="/teapp/locacoes" class="btn btn-secondary">Cancelar</a>
            </div>
          </form>
          <?php } else { ?>
            <div class="alert alert-warning">Locação não encontrada.</div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
