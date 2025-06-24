<div class="dashboard-main-body">

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Novo Veículo</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/operacional" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Dashboard
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium"><a href="/teapp/veiculos">Veículos</a></li>
      <li>-</li>
      <li class="fw-medium">Novo Veículo</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">

          <form action="/teapp/veiculos/adicionarACT" method="POST">

            <div class="mb-3">
              <label class="form-label">Placa</label>
              <input type="text" name="placa" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Modelo</label>
              <input type="text" name="modelo" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Tipo</label>
              <input type="text" name="tipo" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Cor</label>
              <input type="text" name="cor" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Fabricante</label>
              <input type="text" name="fabricante" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Ano de Fabricação</label>
              <input type="number" name="ano_fab" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Vencimento do Documento</label>
              <input type="date" name="vencimento_doc" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Titular do Veículo</label>
              <input type="text" name="titular_veiculo" class="form-control" required>
            </div>

            <div class="text-end">
              <button type="submit" class="btn btn-success">Salvar</button>
              <a href="/teapp/veiculos" class="btn btn-secondary">Cancelar</a>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>
