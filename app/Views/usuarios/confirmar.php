<div class="dashboard-main-body">

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Confirmação de Acesso</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Início
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium">Confirmação</li>
    </ul>
  </div>

  <form action="/teapp/usuarios/confirmarACT" method="post">
    <div class="row gy-4">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body row gy-4">

            <div class="col-lg-6">
              <label class="form-label fw-semibold">CPF</label>
              <input type="text" name="cpf" class="form-control" maxlength="14" required placeholder="Digite seu CPF">
            </div>

            <div class="col-lg-6">
              <label class="form-label fw-semibold">Nova Senha</label>
              <input type="password" name="senha" class="form-control" required>
            </div>

            <div class="col-lg-6">
              <label class="form-label fw-semibold">Confirmar Senha</label>
              <input type="password" name="confirmar_senha" class="form-control" required>
            </div>

            <div class="col-lg-12 text-end">
              <button type="submit" class="btn btn-primary">Confirmar Cadastro</button>
            </div>

          </div>
        </div>
      </div>
    </div>
  </form>

</div>
