<div class="dashboard-main-body">
  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Editar Empresa</h6>
  </div>
  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <form action="/teapp/empresas/editarACT" method="post">
            <input type="hidden" name="id_empresa" value="<?= $this->dados['id_empresa'] ?>">
            <div class="row g-3">
          <div class="col-md-9">
            <label for="nome_fantasia" class="form-label">Nome Fantasia</label>
            <input type="text" name="nome_fantasia" id="nome_fantasia" class="form-control" value="<?= $this->dados['nome_fantasia'] ?>" required>
          </div>
          <div class="col-md-3">
            <label for="cnpj" class="form-label">CNPJ</label>
            <input type="text" name="cnpj" id="cnpj" class="form-control" value="<?= $this->dados['cnpj'] ?>" required>
          </div>
          <div class="col-md-9">
            <label for="razao_social" class="form-label">Razão Social</label>
            <input type="text" name="razao_social" id="razao_social" class="form-control" value="<?= $this->dados['nome_empresa'] ?>" required>
          </div>
          <div class="col-md-3">
            <label for="data_abertura" class="form-label">Data de Abertura</label>
            <input type="date" name="data_abertura" id="data_abertura" class="form-control" value="<?= $this->dados['data_abertura'] ?>" required>
          </div>
          <div class="col-6">
            <label for="endereco" class="form-label">Endereco</label>
            <input type="text" name="endereco" id="endereco" class="form-control" value="<?= $this->dados['endereco'] ?>" required>
          </div>
          <div class="col-6">
            <label for="cep" class="form-label">CEP</label>
            <input type="text" name="cep" id="cep" class="form-control" value="<?= $this->dados['cep'] ?>" required>
          </div>
          <div class="col-md-6">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" id="telefone" class="form-control" value="<?= $this->dados['telefone'] ?>" required>
          </div>
          <div class="col-md-6">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control"  value="<?= $this->dados['email'] ?>">
          </div>
        </div>
        <div class="mt-4 d-flex justify-content-between">
          <a href="/teapp/empresas" class="btn btn-secondary">Voltar</a>
          <button type="submit" class="btn btn-success">Salvar Alterações</button>
        </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
