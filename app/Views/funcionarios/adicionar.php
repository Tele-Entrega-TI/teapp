<div class="dashboard-main-body">
  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Adicionar Funcionário</h6>
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
      <li class="fw-medium">Adicionar Funcionário</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs" role="tablist">
            <li class="nav-item" role="presentation">
              <a class="nav-link active" id="tab-pessoais" data-bs-toggle="tab" href="#pessoais" data-bs-target="#pessoais" role="tab" aria-controls="pessoais" aria-selected="true">Dados Pessoais</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="tab-contato" data-bs-toggle="tab" href="#contato" data-bs-target="#contato" role="tab" aria-controls="contato" aria-selected="false">Contato</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="tab-endereco" data-bs-toggle="tab" href="#endereco" data-bs-target="#endereco" role="tab" aria-controls="endereco" aria-selected="false">Endereço</a>
            </li>
            <li class="nav-item" role="presentation">
              <a class="nav-link" id="tab-documento" data-bs-toggle="tab" href="#documento" data-bs-target="#documento" role="tab" aria-controls="documento" aria-selected="false">Documentos</a>
            </li>
          </ul>
        </div>

        <form action="/teapp/funcionarios/AdicionarACT" method="post" >
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane fade show active" id="pessoais" role="tabpanel" aria-labelledby="tab-pessoais">
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <h6 class="fw-bold border-bottom pb-2 mb-3">Dados Pessoais</h6>
                    <div><strong>Nome Completo:</strong> <input type="text" name="nome" class="form-control" required></div>
                    <div><strong>Apelido:</strong> <input type="text" name="apelido" class="form-control" required></div>
                    <div>
                      <strong>Sexo:</strong>
                      <select name="sexo" class="form-control" required>
                        <option value="">Selecione</option>
                        <option value="M">Masculino</option>
                        <option value="F">Feminino</option>
                      </select>
                    </div>
                    <div><strong>Data de Nascimento:</strong> <input type="date" name="data_nascimento" class="form-control" required></div>
                    <div><strong>Nome da Mãe:</strong> <input type="text" name="nome_mae" class="form-control"></div>
                    <div><strong>Nome do Pai:</strong> <input type="text" name="nome_pai" class="form-control"></div>
                    <div><strong>Nome da Esposa(o):</strong> <input type="text" name="nome_esposa" class="form-control"></div>
                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="contato" role="tabpanel" aria-labelledby="tab-contato">
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <h6 class="fw-bold border-bottom pb-2 mb-3">Contato</h6>
                    <div><strong>E-mail:</strong> <input type="E-mail" name="email" class="form-control" required></div>
                    <div><strong>Telefone:</strong> <input type="text" name="telefone" class="form-control" required></div>
                    <div><strong>Nome do Contato Emergência:</strong> <input type="text" name="nome_emergencia" class="form-control" required></div>
                    <div><strong>Número do Contato Emergência:</strong> <input type="text" name="telefone_emergencia" class="form-control" required></div>
                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="endereco" role="tabpanel" aria-labelledby="tab-endereco">
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <h6 class="fw-bold border-bottom pb-2 mb-3">Endereço</h6>
                    <div><strong>Rua:</strong> <input type="text" name="rua" class="form-control" required></div>
                    <div><strong>Número:</strong> <input type="text" name="numero_casa" class="form-control" required></div>
                    <div><strong>Complemento:</strong> <input type="text" name="complemento" class="form-control" required></div>
                    <div><strong>CEP:</strong> <input type="text" name="cep" class="form-control" required></div>
                    <div><strong>Bairro:</strong> <input type="text" name="bairro" class="form-control" required></div>
                    <div><strong>Cidade:</strong> <input type="text" name="cidade" class="form-control" required></div>
                    <div>
                      <strong>UF:</strong>
                      <select name="uf" class="form-control" required>
                        <option value="">Selecione</option>
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
                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="documento" role="tabpanel" aria-labelledby="tab-documento">
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <h6 class="fw-bold border-bottom pb-2 mb-3">Dados Profissionais</h6>
                    <div><strong>RG:</strong> <input type="text" name="rg" class="form-control" required></div>
                    <div><strong>CPF:</strong> <input type="text" name="cpf" class="form-control" required></div>
                    <div><strong>Orgão Emissor:</strong> <input type="text" name="emissor" class="form-control" required></div>
                    <div><strong>CNH:</strong> <input type="text" name="cnh" class="form-control" required></div>
                    <div><strong>CTPS:</strong> <input type="text" name="ctps" class="form-control" required></div>
                    <div><strong>PIS:</strong> <input type="text" name="pis" class="form-control" required></div>
                    <div><strong>Data de Admissão:</strong> <input type="date" name="admissao" class="form-control" required></div>
                  </div>
                </div>
                <div class="text-end">
                  <button type="submit" class="btn btn-success">Salvar</button>
                  <a href="/teapp/funcionarios" class="btn btn-secondary">Cancelar</a>
                </div>
              </div>

            </div>
          </div>
        </form>

      </div>
    </div>
  </div>
</div>
