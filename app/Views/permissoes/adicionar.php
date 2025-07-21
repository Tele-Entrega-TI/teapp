<div class="dashboard-main-body">

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Nova Permissão</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Dashboard
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium"><a href="/teapp/permissoes">Permissões</a></li>
      <li>-</li>
      <li class="fw-medium">Nova Permissão</li>
    </ul>
  </div>

  <form action="/teapp/permissoes/adicionarACT" method="post">
    <div class="row gy-4">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body row gy-4">

            <div class="col-lg-6">
              <label class="form-label fw-semibold">Nome da Permissão</label>
              <input type="text" name="nome_permissao" class="form-control" required>
            </div>

            <div class="col-lg-6">
              <label class="form-label fw-semibold">Descrição</label>
              <input type="text" name="descricao" class="form-control">
            </div>

            <div class="col-lg-12 text-end">
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>

          </div>
        </div>
      </div>
    </div>
  </form>
</div>
