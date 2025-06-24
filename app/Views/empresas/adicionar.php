<div class="container mt-5">
  <div class="card shadow">
    <div class="card-header bg-success text-white">
      <h4 class="mb-0">Cadastro de Empresas</h4>
    </div>
    <div class="card-body">
      <form action="/teapp/empresas/adicionarACT" method="post">
        <div class="row g-3">
          <div class="col-md-9">
            <label for="nome_fantasia" class="form-label">Nome Fantasia</label>
            <input type="text" name="nome_fantasia" id="nome_fantasia" class="form-control" required>
          </div>
          <div class="col-md-3">
            <label for="cnpj" class="form-label">CNPJ</label>
            <input type="text" name="cnpj" id="cnpj" class="form-control" required>
          </div>
          <div class="col-md-9">
            <label for="razao_social" class="form-label">Razão Social</label>
            <input type="text" name="razao_social" id="razao_social" class="form-control" required>
          </div>
          <!-- <div class="col-md-3">
            <label for="rg" class="form-label">RG</label>
            <input type="text" name="rg" id="rg" class="form-control">
          </div> -->
          <!-- <div class="col-md-4">
            <label for="cnh" class="form-label">CNH</label>
            <input type="text" name="cnh" id="cnh" class="form-control" required>
          </div> -->
          <!-- <div class="col-md-2">
            <label for="categoria" class="form-label">Categoria</label>
            <input type="text" name="categoria" id="categoria" class="form-control">
          </div> -->
          <div class="col-md-3">
            <label for="data_abertura" class="form-label">Data de Abertura</label>
            <input type="date" name="data_abertura" id="data_abertura" class="form-control" required>
          </div>
          <div class="col-3">
            <label for="logradouro" class="form-label">Logradouro (Rua)</label>
            <input type="text" name="logradouro" id="logradouro" class="form-control" required>
          </div>
          <div class="col-3">
            <label for="numero" class="form-label">Número</label>
            <input type="text" name="numero" id="numero" class="form-control" required>
          </div>
          <div class="col-3">
            <label for="complemento" class="form-label">Complemento</label>
            <input type="text" name="complemento" id="complemento" class="form-control">
          </div>
          <div class="col-3">
            <label for="cep" class="form-label">CEP</label>
            <input type="text" name="cep" id="cep" class="form-control" required>
          </div>
          <div class="col-4">
            <label for="bairro" class="form-label">Bairro</label>
            <input type="text" name="bairro" id="bairro" class="form-control" required>
          </div>
          <div class="col-4">
            <label for="cidade" class="form-label">Cidade</label>
            <input type="text" name="cidade" id="cidade" class="form-control" required>
          </div>
          <div class="col-4">
            <label for="uf" class="form-label">Estado (UF)</label>
            <select name="uf" id="uf" class="form-control" >
                <option selected disabled>Selecione um estado</option>
                <option value="AC">Acre (AC)</option>
                <option value="AL">Alagoas (AL)</option>
                <option value="AP">Amapá (AP)</option>
                <option value="AM">Amazonas (AM)</option>
                <option value="BA">Bahia (BA)</option>
                <option value="CE">Ceará (CE)</option>
                <option value="DF">Distrito Federal (DF)</option>
                <option value="ES">Espírito Santo (ES)</option>
                <option value="GO">Goiás (GO)</option>
                <option value="MA">Maranhão (MA)</option>
                <option value="MT">Mato Grosso (MT)</option>
                <option value="MS">Mato Grosso do Sul (MS)</option>
                <option value="MG">Minas Gerais (MG)</option>
                <option value="PA">Pará (PA)</option>
                <option value="PB">Paraíba (PB)</option>
                <option value="PR">Paraná (PR)</option>
                <option value="PE">Pernambuco (PE)</option>
                <option value="PI">Piauí (PI)</option>
                <option value="RJ">Rio de Janeiro (RJ)</option>
                <option value="RN">Rio Grande do Norte (RN)</option>
                <option value="RS">Rio Grande do Sul (RS)</option>
                <option value="RO">Rondônia (RO)</option>
                <option value="RR">Roraima (RR)</option>
                <option value="SC">Santa Catarina (SC)</option>
                <option value="SP">São Paulo (SP)</option>
                <option value="SE">Sergipe (SE)</option>
                <option value="TO">Tocantins (TO)</option>
            </select>
          </div>
          <!-- <div class="col-md-3">
            <label for="data_nascimento" class="form-label">Data de Nascimento</label>
            <input type="date" name="data_nascimento" id="data_nascimento" class="form-control">
          </div> -->
          <div class="col-md-6">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" name="telefone" id="telefone" class="form-control" required>
          </div>
          <div class="col-md-6">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" name="email" id="email" class="form-control">
          </div>
        </div>

        <div class="mt-4 d-flex justify-content-between">
          <a href="/teapp/empresas" class="btn btn-secondary">Voltar</a>
          <button type="submit" class="btn btn-success">Cadastrar Empresa</button>
        </div>
      </form>
    </div>
  </div>
</div>
