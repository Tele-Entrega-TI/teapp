<div class="dashboard-main-body">

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Login</h6>
  </div>

  <div class="row gy-4">
    <div class="col-lg-4 mx-auto">
      <div class="card">
        <div class="card-body">

          <?php if (!empty($_SESSION['loginErro'])): ?>
            <div class="alert alert-danger text-center">
              <?= $_SESSION['loginErro']; unset($_SESSION['loginErro']); ?>
            </div>
          <?php endif; ?>

          <form action="/teapp/login/autenticarACT" method="POST">
            <div class="mb-3">
              <label for="cpf" class="form-label">CPF</label>
              <input type="text" class="form-control" name="cpf" id="cpf" required>
            </div>

            <div class="mb-3">
              <label for="senha" class="form-label">Senha</label>
              <input type="password" class="form-control" name="senha" id="senha" required>
            </div>

            <div class="d-grid">
              <button type="submit" class="btn btn-primary">Entrar</button>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
