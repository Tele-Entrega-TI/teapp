<div class="dashboard-main-body">

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Editar Motorista</h6>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <form action="/teapp/motoristas/editarACT" method="post">
            <input type="hidden" name="id_motorista" value="<?= $this->dados['id_motorista'] ?>">

            <div class="row gy-3">

              <div class="col-md-6">
                <label class="form-label">Nome</label>
                <input type="text" name="nome_motorista" class="form-control" value="<?= $this->dados['nome_motorista'] ?>" required>
              </div>

              <div class="col-md-3">
                <label class="form-label">CPF</label>
                <input type="text" name="cpf" class="form-control" value="<?= $this->dados['cpf'] ?>" required>
              </div>

              <div class="col-md-3">
                <label class="form-label">RG</label>
                <input type="text" name="rg" class="form-control" value="<?= $this->dados['rg'] ?>">
              </div>

              <div class="col-md-4">
                <label class="form-label">CNH</label>
                <input type="text" name="cnh" class="form-control" value="<?= $this->dados['cnh'] ?>" required>
              </div>

              <div class="col-md-2">
                <label class="form-label">Categoria</label>
                <input type="text" name="categoria" class="form-control" value="<?= $this->dados['categoria'] ?>">
              </div>

              <div class="col-md-3">
                <label class="form-label">Validade CNH</label>
                <input type="date" name="validade_cnh" class="form-control" value="<?= $this->dados['validade_cnh'] ?>">
              </div>

              <div class="col-md-3">
                <label class="form-label">Data de Nascimento</label>
                <input type="date" name="data_nascimento" class="form-control" value="<?= $this->dados['data_nascimento'] ?>">
              </div>

              <div class="col-md-4">
                <label class="form-label">Telefone</label>
                <input type="text" name="telefone" class="form-control" value="<?= $this->dados['telefone'] ?>">
              </div>

              <div class="col-md-6">
                <label class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" value="<?= $this->dados['email'] ?>">
              </div>

              <div class="col-12">
                <label class="form-label">Endereço</label>
                <textarea name="endereco" class="form-control" rows="3"><?= $this->dados['endereco'] ?></textarea>
              </div>

            </div>

            <div class="mt-4 d-flex justify-content-between">
              <a href="/teapp/motoristas" class="btn btn-secondary">Cancelar</a>
              <button type="submit" class="btn btn-success">Salvar Alterações</button>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
