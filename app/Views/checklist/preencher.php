<div class="dashboard-main-body">
    <div class="card">
        <div class="card-header">
            <h6 class="fw-semibold mb-0">Identifique seu veículo</h6>
        </div>
            <div class="card-body">

              <?php if (isset($_SESSION['placaInvalida'])): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                  Veículo não encontrado ou sem movimentação ativa.
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                </div>
                <?php unset($_SESSION['placaInvalida']); ?>
              <?php endif; ?>

              <?php if (isset($_SESSION['dbInsert'])): ?>
                <div class="alert alert-<?= $_SESSION['dbInsert'] ? 'success' : 'danger' ?> alert-dismissible fade show" role="alert">
                  <?= $_SESSION['dbInsert'] ? 'Checklist enviado com sucesso.' : 'Erro ao enviar checklist.' ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Fechar"></button>
                </div>
                <?php unset($_SESSION['dbInsert']); ?>
              <?php endif; ?>
            <form method="post" action="/teapp/checklist/preencherACT">
                <div class="mb-3">
                    <label class="form-label">Placa do Veículo</label>
                    <input type="text" name="placa" class="form-control" required placeholder="Digite a placa">
                </div>
                <button type="submit" class="btn btn-primary">Continuar</button>
            </form>
        </div>
    </div>
</div>
