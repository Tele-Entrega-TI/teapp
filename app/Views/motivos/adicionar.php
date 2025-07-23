<div class="dashboard-main-body">

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Novo Motivo</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/operacional" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Dashboard
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium"><a href="/teapp/motivos">Motivos</a></li>
      <li>-</li>
      <li class="fw-medium">Novo Motivo</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">

          <form action="/teapp/motivos/adicionarACT" method="POST">

            <div class="mb-3">
              <label class="form-label">Motivo</label>
              <input type="text" name="motivo" class="form-control" required>
            </div>

              <div class="mb-3">
                <label class="form-label">Ativo</label>
                <select name="ativo" class="form-select" required>
                  <option value="">Selecione...</option>
                  <option value="1">Sim</option>
                  <option value="0">Não</option>
                </select>
              </div>
            <div class="text-end">
              <button type="submit" class="btn btn-success">Salvar</button>
              <a href="/teapp/motivos" class="btn btn-secondary">Cancelar</a>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>
