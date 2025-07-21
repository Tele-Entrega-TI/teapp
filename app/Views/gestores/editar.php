<div class="dashboard-main-body">

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Editar Gestor</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/operacional" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Dashboard
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium"><a href="/teapp/gestores" class="hover-text-primary">Gestores</a></li>
      <li>-</li>
      <li class="fw-medium text-primary">Editar</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <form action="/teapp/gestores/editarACT" method="POST">
            <input type="hidden" name="id_gestor" value="<?= $this->dados['id_gestor'] ?>">

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" value="<?= $this->dados['nome'] ?>" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= $this->dados['email'] ?>">
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Telefone</label>
                <input type="text" name="telefone" class="form-control" value="<?= $this->dados['telefone'] ?>">
              </div>
              <div class="col-md-6">
                <label class="form-label">Empresa</label>
                <input type="text" name="empresa" class="form-control" value="<?= $this->dados['empresa'] ?>">
              </div>
            </div>

            <div class="text-end">
              <button type="submit" class="btn btn-success">Salvar Alterações</button>
              <a href="/teapp/gestores" class="btn btn-secondary">Cancelar</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
