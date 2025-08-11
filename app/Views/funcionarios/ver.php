<div class="dashboard-main-body">
  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Detalhes do Funcionário</h6>
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
      <li class="fw-medium">Detalhes do Funcionário</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <ul class="nav nav-tabs card-header-tabs" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="tab-pessoais" data-bs-toggle="tab" href="#pessoais" role="tab">Dados Pessoais</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="tab-contato" data-bs-toggle="tab" href="#contato" role="tab">Contato</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="tab-documentos" data-bs-toggle="tab" href="#documentos" role="tab">Documentos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="tab-profissionais" data-bs-toggle="tab" href="#profissionais" role="tab">Dados Profissionais</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <?php if (!empty($this->dados)) { $f = $this->dados; ?>
            <div class="tab-content">
              <div class="tab-pane fade show active" id="pessoais" role="tabpanel">
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <h6 class="fw-bold border-bottom pb-2 mb-3">Dados Pessoais</h6>
                    <div><strong>Nome Completo:</strong> <?= $f['nome']; ?></div>
                    <div><strong>Apelido:</strong> <?= $f['apelido']; ?></div>
                    <div><strong>Sexo:</strong> <?= $f['sexo']; ?></div>
                    <div><strong>Data de Nascimento:</strong> <?= !empty($f['nascimento']) ? date("d/m/Y", strtotime($f['nascimento'])) : ''; ?></div>
                    <div><strong>Nome da Mãe:</strong> <?= !empty($f['nome_mae']) ? $f['nome_mae'] : '—'; ?></div>
                    <div><strong>Nome do Pai:</strong> <?= !empty($f['nome_pai']) ? $f['nome_pai'] : '—'; ?></div>
                    <div><strong>Nome da(o) Esposa(o):</strong> <?= !empty($f['nome_esposa']) ? $f['nome_esposa'] : '—'; ?></div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="contato" role="tabpanel">
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <h6 class="fw-bold border-bottom pb-2 mb-3">Contato</h6>
                    <div><strong>E-mail:</strong> <?= $f['email']; ?></div>
                    <div><strong>Telefone:</strong> <?= $f['telefone']; ?></div>
                    <div><strong>Nome da Pessoa de Emergência:</strong> <?= $f['nome_emergencia']; ?></div>
                    <div><strong>Número da Contato de Emergência:</strong> <?= $f['telefone_emergencia']; ?></div>
                    <div><strong>Rua:</strong> <?= $f['rua']; ?></div>
                    <div><strong>Número da Casa:</strong> <?= $f['numero_casa']; ?></div>
                    <div><strong>Complemento:</strong> <?= $f['complemento']; ?></div>
                    <div><strong>Cep:</strong> <?= $f['cep']; ?></div>
                    <div><strong>Bairro:</strong> <?= $f['bairro']; ?></div>
                    <div><strong>Cidade:</strong> <?= $f['cidade']; ?></div>
                    <div><strong>UF:</strong> <?= $f['uf']; ?></div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="documentos" role="tabpanel">
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <h6 class="fw-bold border-bottom pb-2 mb-3">Documentos</h6>
                    <div><strong>CPF:</strong> <?= $f['cpf']; ?></div>
                    <div><strong>RG:</strong> <?= $f['rg']; ?></div>
                    <div><strong>Órgão Emissor:</strong> <?= $f['org_emissor']; ?></div>
                    <div><strong>CTPS:</strong> <?= $f['ctps']; ?></div>
                    <div><strong>PIS:</strong> <?= $f['pis']; ?></div>
                    <div><strong>Habilitação:</strong> <?= $f['cnh']; ?></div>
                    <div><strong>Data de Admissão:</strong> <?= !empty($f['admissao']) ? date("d/m/Y", strtotime($f['admissao'])) : ''; ?></div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="profissionais" role="tabpanel">
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <h6 class="fw-bold border-bottom pb-2 mb-3">Dados Profissionais</h6>
                    <div><strong>Cargo:</strong> <?= $f['nome_cargo']; ?></div>
                    <div><strong>Matrícula:</strong> <?= $f['id_funcionario']; ?></div>
                    <div><strong>Data de Admissão:</strong> <?= !empty($f['data_admissao']) ? date("d/m/Y", strtotime($f['data_admissao'])) : ''; ?></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="text-end mt-4">
              <a href="/teapp/funcionarios" class="btn btn-secondary">Voltar</a>
              <a href="/teapp/funcionarios/editar/<?= $f['id_funcionario']; ?>" class="btn btn-primary">Editar</a>
            </div>
          <?php } else { ?>
            <div class="alert alert-warning">Funcionário não encontrado.</div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
