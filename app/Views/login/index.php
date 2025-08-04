<div class="dashboard-main-body d-flex align-items-center justify-content-center">
  <div class="col-lg-4">
    <div class="card shadow-lg border-0">
      <div class="card-body p-5">

        <h4 class="text-center fw-semibold mb-4">Acesso ao Sistema</h4>

        <?php if (!empty($_SESSION['loginErro'])): ?>
          <div class="alert alert-danger text-center">
            <?= $_SESSION['loginErro']; unset($_SESSION['loginErro']); ?>
          </div>
        <?php endif; ?>

        <form action="/teapp/login/autenticarACT" method="POST">
          <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" class="form-control" name="cpf" id="cpf" required placeholder="Digite seu CPF" maxlength="11" inputmode="numeric">
          </div>

          <div class="mb-3 position-relative">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control pe-5" name="senha" id="senha" required placeholder="Digite sua Senha">
            <button type="button"
              class="btn btn-sm btn-link position-absolute"
              style="top: 70%; right: 10px; transform: translateY(-50%); padding: 0;"
              onclick="toggleSenha()">
              <iconify-icon icon="mdi:eye-outline" id="eyeIcon" width="20"></iconify-icon>
            </button>
          </div>

          <div class="d-grid mt-4">
            <button type="submit" class="btn btn-primary">Entrar</button>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>

<script>
  function toggleSenha() {
    const input = document.getElementById('senha');
    const icon = document.getElementById('eyeIcon');
    if (input.type === 'password') {
      input.type = 'text';
      icon.setAttribute('icon', 'mdi:eye-off-outline');
    } else {
      input.type = 'password';
      icon.setAttribute('icon', 'mdi:eye-outline');
    }
  }
</script>
