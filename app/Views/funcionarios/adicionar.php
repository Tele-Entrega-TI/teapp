<div class="dashboard-main-body">

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Novo Funcionário</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Início
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium"><a href="/teapp/funcionarios">Funcionários</a></li>
      <li>-</li>
      <li class="fw-medium">Novo Funcionário</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">

          <form action="/teapp/funcionarios/adicionaract" method="POST">

            <div class="mb-3">
              <label class="form-label">Nome Completo</label>
              <input type="text" name="nome" class="form-control" required>
            </div>
            
            <div class="mb-3">
              <label class="form-label">Apelido</label>
              <input type="text" name="apelido" class="form-control">
            </div>
            
            <div class="mb-3">
              <label class="form-label">Sexo</label>
              <select name="sexo" class="form-control" required>
                <option value="">Selecione</option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">CPF</label>
              <input type="text" name="cpf" class="form-control" required>
            </div>

            <div class="mb-3">
              <label class="form-label">RG</label>
              <input type="text" name="rg" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label">Nome da Mãe</label>
              <input type="text" name="nome_mae" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label">Nome do Pai</label>
              <input type="text" name="nome_pai" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label">Data de Nascimento</label>
              <input type="date" name="data_nascimento" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label">E-mail</label>
              <input type="email" name="email" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label">Telefone</label>
              <input type="text" name="telefone" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label">Cargo</label>
              <input type="text" name="cargo" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label">Endereço</label>
              <input type="text" name="endereco" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label">Habilitação</label>
              <input type="text" name="habilitacao" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label">CTPS</label>
              <input type="text" name="ctps" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label">Órgão Emissor</label>
              <input type="text" name="org_emissor" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label">PIS</label>
              <input type="text" name="pis" class="form-control">
            </div>

            <div class="mb-3">
              <label class="form-label">Data de Admissão</label>
              <input type="date" name="data_admissao" class="form-control">
            </div>

            <div class="text-end">
              <button type="submit" class="btn btn-success">Salvar</button>
              <a href="/teapp/funcionarios" class="btn btn-secondary">Cancelar</a>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>
