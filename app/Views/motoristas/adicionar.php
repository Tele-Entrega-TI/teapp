<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-success text-white">
      <h4 class="mb-0">Cadastro de Motoristas</h4>
    </div>
    <div class="card-body">
      <form action="/teapp/motoristas/adicionarACT" method="post">
        <div class="row g-3">
          <div class="col-md-6">
            <label for="nome_motorista" class="form-label">Nome completo</label>
            <input type="text" name="nome_motorista" id="nome_motorista" class="form-control">
          </div>
          <div class="col-md-3">
            <label for="cpf" class="form-label">CPF</label>
            <input type="text" name="cpf" id="cpf" class="form-control" required>
          </div>
          <div class="col-md-3">
            <label for="rg" class="form-label">RG</label>
            <input type="text" name="rg" id="rg" class="form-control" required>
          </div>
          <div class="col-md-4">
            <label for="cnh" class="form-label">CNH</label>
            <input type="text" name="cnh" id="cnh" class="form-control" required>
          </div>
          <div class="col-md-2">
            <label for="categoria" class="form-label">Categoria</label>
            <input type="text" name="categoria" id="categoria" class="form-control">
          </div>
          <div class="col-md-3">
            <label for="validade_cnh" class="form-label">Validade CNH</label>
            <input type="date" name="validade_cnh" id="validade_cnh" class="form-control">
          </div>
          <div class="col-md-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
            <input type="date" name="data_nascimento" id="data_nascimento" class="form-control">
          </div>
          <div class="col-md-4">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" id="telefone" class="form-control">
          </div>
          <div class="col-md-6">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control">
          </div>
          <div class="col-12">
            <label for="endereco" class="form-label">Endereço</label>
            <textarea name="endereco" id="endereco" class="form-control" rows="3"></textarea>
          </div>
        </div>

        <div class="mt-4 d-flex justify-content-between">
          <a href="/teapp/motoristas" class="btn btn-secondary">Voltar</a>
          <button type="submit" class="btn btn-success">Salvar Motorista</button>
        </div>
      </form>
    </div>
  </div>
</div>
