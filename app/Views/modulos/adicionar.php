<div class="dashboard-main-body">

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Novo Módulo</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/modulos" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Dashboard
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium"><a href="/teapp/modulos">Módulos</a></li>
      <li>-</li>
      <li class="fw-medium">Novo Módulo</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">

          <form action="/teapp/modulos/adicionarACT" method="POST">

            <div class="mb-3">
              <label class="form-label">Nome do Módulo</label>
              <input type="text" name="nome_modulo" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Descrição</label>
              <input type="text" name="descricao" class="form-control">
            </div>

            <div class="text-end">
              <button type="submit" class="btn btn-success">Salvar</button>
              <a href="/teapp/modulos" class="btn btn-secondary">Cancelar</a>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>
