<div class="dashboard-main-body">
  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Adicionar Funcionário</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/operacional" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Dashboard
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

        <form action="/teapp/funcionarios/EditarAct" method="post" >
          <div class="card-body">
            <div class="tab-content">
              <div class="tab-pane fade show active" id="pessoais" role="tabpanel" aria-labelledby="tab-pessoais">
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <h6 class="fw-bold border-bottom pb-2 mb-3">Dados Pessoais</h6>
                    <input type="hidden" name="id_funcionario" value="<?= (int)$this->dados['id_funcionario']; ?>">
                    <div><strong>Nome Completo:</strong> <input type="text" name="nome" class="form-control" value="<?php echo $this->dados['nome']; ?>" required></div>
                    <div><strong>Apelido:</strong> <input type="text" name="apelido" class="form-control" value="<?php echo $this->dados['apelido']; ?>" required></div>
                    <div>
                      <strong>Sexo:</strong>
                      <select name="sexo" class="form-control" value='<?php echo $this->dados['sexo']; ?>'required>
                        <option value="Masculino">Masculino</option>
                        <option value="Feminino">Feminino</option>
                      </select>
                    </div>
                    <div><strong>Data de Nascimento:</strong> <input type="date" name="nascimento" class="form-control" value="<?php echo $this->dados['nascimento']; ?>" required></div>
                    <div><strong>Nome da Mãe:</strong> <input type="text" name="nome_mae" class="form-control" value="<?php echo $this->dados['nome_mae']; ?>"></div>
                    <div><strong>Nome do Pai:</strong> <input type="text" name="nome_pai" class="form-control" value="<?php echo $this->dados['nome_pai']; ?>"></div>
                    <div><strong>Nome da Esposa(o):</strong> <input type="text" name="nome_esposa" class="form-control" value="<?php echo $this->dados['nome_esposa']; ?>"></div>
                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="contato" role="tabpanel" aria-labelledby="tab-contato">
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <h6 class="fw-bold border-bottom pb-2 mb-3">Contato</h6>
                    <div><strong>E-mail:</strong> <input type="E-mail" name="email" class="form-control" value="<?php echo $this->dados['email']; ?>" required></div>
                    <div><strong>Telefone:</strong> <input type="text" name="telefone" class="form-control" value="<?php echo $this->dados['telefone']; ?>" required></div>
                    <div><strong>Nome do Contato Emergência:</strong> <input type="text" name="nome_emergencia" class="form-control" value="<?php echo $this->dados['nome_emergencia']; ?>"required></div>
                    <div><strong>Número do Contato Emergência:</strong> <input type="text" name="telefone_emergencia" class="form-control" value="<?php echo $this->dados['telefone_emergencia']; ?>" required></div>
                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="endereco" role="tabpanel" aria-labelledby="tab-endereco">
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <h6 class="fw-bold border-bottom pb-2 mb-3">Endereço</h6>
                    <div><strong>Rua:</strong> <input type="text" name="rua" class="form-control" value="<?php echo $this->dados['rua']; ?>" required></div>
                    <div><strong>Número:</strong> <input type="text" name="numero_casa" class="form-control" value="<?php echo $this->dados['numero_casa']; ?>" required></div>
                    <div><strong>Complemento:</strong> <input type="text" name="complemento" class="form-control" value="<?php echo $this->dados['complemento']; ?>"></div>
                    <div><strong>CEP:</strong> <input type="text" name="cep" class="form-control" value="<?php echo $this->dados['cep']; ?>" required></div>
                    <div><strong>Bairro:</strong> <input type="text" name="bairro" class="form-control"value="<?php echo $this->dados['bairro']; ?>" required></div>
                    <div><strong>Cidade:</strong> <input type="text" name="cidade" class="form-control"value="<?php echo $this->dados['cidade']; ?>" required></div>
                    <div>
                      <strong>UF:</strong>
                      <select name="uf" class="form-control" required>
                      <option value="">Selecione</option>
                      <option value="AC" <?php if ($this->dados['uf'] == 'AC') echo 'selected'; ?>>Acre (AC)</option>
                      <option value="AL" <?php if ($this->dados['uf'] == 'AL') echo 'selected'; ?>>Alagoas (AL)</option>
                      <option value="AP" <?php if ($this->dados['uf'] == 'AP') echo 'selected'; ?>>Amapá (AP)</option>
                      <option value="AM" <?php if ($this->dados['uf'] == 'AM') echo 'selected'; ?>>Amazonas (AM)</option>
                      <option value="BA" <?php if ($this->dados['uf'] == 'BA') echo 'selected'; ?>>Bahia (BA)</option>
                      <option value="CE" <?php if ($this->dados['uf'] == 'CE') echo 'selected'; ?>>Ceará (CE)</option>
                      <option value="DF" <?php if ($this->dados['uf'] == 'DF') echo 'selected'; ?>>Distrito Federal (DF)</option>
                      <option value="ES" <?php if ($this->dados['uf'] == 'ES') echo 'selected'; ?>>Espírito Santo (ES)</option>
                      <option value="GO" <?php if ($this->dados['uf'] == 'GO') echo 'selected'; ?>>Goiás (GO)</option>
                      <option value="MA" <?php if ($this->dados['uf'] == 'MA') echo 'selected'; ?>>Maranhão (MA)</option>
                      <option value="MT" <?php if ($this->dados['uf'] == 'MT') echo 'selected'; ?>>Mato Grosso (MT)</option>
                      <option value="MS" <?php if ($this->dados['uf'] == 'MS') echo 'selected'; ?>>Mato Grosso do Sul (MS)</option>
                      <option value="MG" <?php if ($this->dados['uf'] == 'MG') echo 'selected'; ?>>Minas Gerais (MG)</option>
                      <option value="PA" <?php if ($this->dados['uf'] == 'PA') echo 'selected'; ?>>Pará (PA)</option>
                      <option value="PB" <?php if ($this->dados['uf'] == 'PB') echo 'selected'; ?>>Paraíba (PB)</option>
                      <option value="PR" <?php if ($this->dados['uf'] == 'PR') echo 'selected'; ?>>Paraná (PR)</option>
                      <option value="PE" <?php if ($this->dados['uf'] == 'PE') echo 'selected'; ?>>Pernambuco (PE)</option>
                      <option value="PI" <?php if ($this->dados['uf'] == 'PI') echo 'selected'; ?>>Piauí (PI)</option>
                      <option value="RJ" <?php if ($this->dados['uf'] == 'RJ') echo 'selected'; ?>>Rio de Janeiro (RJ)</option>
                      <option value="RN" <?php if ($this->dados['uf'] == 'RN') echo 'selected'; ?>>Rio Grande do Norte (RN)</option>
                      <option value="RS" <?php if ($this->dados['uf'] == 'RS') echo 'selected'; ?>>Rio Grande do Sul (RS)</option>
                      <option value="RO" <?php if ($this->dados['uf'] == 'RO') echo 'selected'; ?>>Rondônia (RO)</option>
                      <option value="RR" <?php if ($this->dados['uf'] == 'RR') echo 'selected'; ?>>Roraima (RR)</option>
                      <option value="SC" <?php if ($this->dados['uf'] == 'SC') echo 'selected'; ?>>Santa Catarina (SC)</option>
                      <option value="SP" <?php if ($this->dados['uf'] == 'SP') echo 'selected'; ?>>São Paulo (SP)</option>
                      <option value="SE" <?php if ($this->dados['uf'] == 'SE') echo 'selected'; ?>>Sergipe (SE)</option>
                      <option value="TO" <?php if ($this->dados['uf'] == 'TO') echo 'selected'; ?>>Tocantins (TO)</option>
                    </select>

                    </div>
                  </div>
                </div>
              </div>

              <div class="tab-pane fade" id="documento" role="tabpanel" aria-labelledby="tab-documento">
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <h6 class="fw-bold border-bottom pb-2 mb-3">Dados Profissionais</h6>
                    <div><strong>RG:</strong> <input type="text" name="rg" class="form-control" value="<?php echo $this->dados['rg']; ?>" required></div>
                    <div><strong>CPF:</strong> <input type="text" name="cpf" class="form-control" value="<?php echo $this->dados['cpf']; ?>"required></div>
                    <div><strong>Orgão Emissor:</strong> <input type="text" name="org_emissor" class="form-control" value="<?php echo $this->dados['org_emissor']; ?>" required></div>
                    <div><strong>CNH:</strong> <input type="text" name="cnh" class="form-control" value="<?php echo $this->dados['cnh']; ?>" required></div>
                    <div><strong>CTPS:</strong> <input type="text" name="ctps" class="form-control" value="<?php echo $this->dados['ctps']; ?>" required></div>
                    <div><strong>PIS:</strong> <input type="text" name="pis" class="form-control" value="<?php echo $this->dados['pis']; ?>" required></div>
                    <div><strong>Data de Admissão:</strong> <input type="date" name="admissao" class="form-control" value="<?php echo $this->dados['admissao']; ?>" required></div>
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
