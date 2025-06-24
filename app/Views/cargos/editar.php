<?php
// app/Views/cargos/editar.php
?>
<div class="dashboard-main-body">
  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Editar Cargo</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/operacional" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Dashboard
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium"><a href="/teapp/cargos">Cargos</a></li>
      <li>-</li>
      <li class="fw-medium">Editar Cargo</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <?php if (!empty($this->dados)) {
              $key = $this->dados;
          ?>
          <form action="/teapp/cargos/editaract" method="POST">
            <input type="hidden" name="id_cargo" value="<?= $key['id_cargo']; ?>">

            <div class="mb-3">
              <label class="form-label">Nome</label>
              <input type="text" name="nome" class="form-control" value="<?= htmlspecialchars($key['nome']); ?>" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Descrição</label>
              <input type="text" name="descricao" class="form-control" value="<?= htmlspecialchars($key['descricao']); ?>">
            </div>

            <div class="form-check mb-4">
              <input class="form-check-input" type="checkbox" name="ativo" id="ativo" value="1" <?= $key['ativo'] ? 'checked' : ''; ?>>
              <label class="form-check-label" for="ativo">Ativo</label>
            </div>

            <div class="text-end">
              <button type="submit" class="btn btn-primary">Salvar</button>
              <a href="/teapp/cargos" class="btn btn-secondary">Cancelar</a>
            </div>
          </form>
          <?php } else { ?>
            <div class="alert alert-warning">Cargo não encontrado.</div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
