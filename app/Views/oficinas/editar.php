<div class="dashboard-main-body">

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Editar Oficina</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Dashboard
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium">
        <a href="/teapp/oficinas" class="hover-text-primary">Oficinas</a>
      </li>
      <li>-</li>
      <li class="fw-medium text-primary">Editar</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <form method="POST" action="/teapp/oficinas/EditarACT">
            <input type="hidden" name="id_oficina" value="<?= $this->dados['id_oficina'] ?>">

            <div class="row">
              <div class="col-md-4 mb-3">
                <label class="form-label">Nome da Oficina</label>
                <input type="text" name="nome" class="form-control" 
                       value="<?= htmlspecialchars($this->dados['nome'] ?? '') ?>" required>
              </div>

              <div class="col-md-4 mb-3">
                <label class="form-label">Endereço</label>
                <input type="text" name="endereco" class="form-control" 
                       value="<?= htmlspecialchars($this->dados['endereco'] ?? '') ?>" required>
              </div>

              <div class="col-md-4 mb-3">
                <label class="form-label">Responsável</label>
                <input type="text" name="responsavel" class="form-control" 
                       value="<?= htmlspecialchars($this->dados['responsavel'] ?? '') ?>" required>
              </div>

              <div class="col-md-4 mb-3">
                <label class="form-label">WhatsApp</label>
                <input type="text" name="whatsapp" class="form-control" 
                       value="<?= htmlspecialchars($this->dados['whatsapp'] ?? '') ?>">
              </div>
            </div>

            <div class="d-flex justify-content-end gap-2 mt-4">
              <a href="/teapp/oficinas" class="btn btn-secondary">Cancelar</a>
              <button type="submit" class="btn btn-success">Salvar Alterações</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
