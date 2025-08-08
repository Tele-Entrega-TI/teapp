<div class="dashboard-main-body">
  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Nova Locação</h6>
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
      <li class="fw-medium">Nova Locação</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <form action="/teapp/locacoes/adicionarACT" method="POST">
            <div class="mb-3">
              <label class="form-label">Locação</label>
              <input type="text" name="locacao" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Data de Início</label>
              <input type="date" name="inicio_locacao" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Data de Fim</label>
              <input type="date" name="fim_locacao" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label">Descrição</label>
              <input type="text" name="descricao" class="form-control">
            </div>

            <div class="text-end">
              <button type="submit" class="btn btn-success">Salvar</button>
              <a href="/teapp/locacoes" class="btn btn-secondary">Cancelar</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
