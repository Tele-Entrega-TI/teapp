<div class="dashboard-main-body">

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Editar Dados Profissionais</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/rh" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Dashboard
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium"><a href="/teapp/dadosprofissionais">Dados Profissionais</a></li>
      <li>-</li>
      <li class="fw-medium">Editar</li>
    </ul>
  </div>

  <form method="post" action="/teapp/dadosprofissionais/editarACT">
    <input type="hidden" name="id_dado_profissional" value="<?= $this->dados['id_dado_profissional']; ?>">

    <div class="row gy-4">

      <div class="col-lg-4">
        <label class="form-label">Funcionário:</label>
        <select name="id_funcionario" class="form-select" required>
          <option value="">Selecione</option>
          <?php if (!empty($this->dadosAux['funcionarios'])): ?>
            <?php foreach ($this->dadosAux['funcionarios'] as $key): ?>
              <option value="<?= $key['id_funcionario']; ?>" <?= ($key['id_funcionario'] == $this->dados['id_funcionario']) ? 'selected' : ''; ?>>
                <?= htmlspecialchars($key['nome']); ?>
              </option>
            <?php endforeach; ?>
          <?php endif; ?>
        </select>
      </div>

      <div class="col-lg-4">
        <label class="form-label">Cargo:</label>
        <select name="id_cargo" class="form-select" required>
          <option value="">Selecione</option>
          <?php if (!empty($this->dadosAux['cargos'])): ?>
            <?php foreach ($this->dadosAux['cargos'] as $key): ?>
              <option value="<?= $key['id_cargo']; ?>" <?= ($key['id_cargo'] == $this->dados['id_cargo']) ? 'selected' : ''; ?>>
                <?= htmlspecialchars($key['nome']); ?>
              </option>
            <?php endforeach; ?>
          <?php endif; ?>
        </select>
      </div>

      <div class="col-lg-4">
        <label class="form-label">Setor:</label>
        <select name="id_setor" class="form-select" required>
          <option value="">Selecione</option>
          <?php if (!empty($this->dadosAux['setores'])): ?>
            <?php foreach ($this->dadosAux['setores'] as $key): ?>
              <option value="<?= $key['id_setor']; ?>" <?= ($key['id_setor'] == $this->dados['id_setor']) ? 'selected' : ''; ?>>
                <?= htmlspecialchars($key['nome']); ?>
              </option>
            <?php endforeach; ?>
          <?php endif; ?>
        </select>
      </div>

      <div class="col-lg-4">
        <label class="form-label">Locação:</label>
        <select name="id_locacao" class="form-select">
          <option value="">Selecione</option>
          <?php if (!empty($this->dadosAux['locacoes'])): ?>
            <?php foreach ($this->dadosAux['locacoes'] as $key): ?>
              <option value="<?= $key['id_locacao']; ?>" <?= ($key['id_locacao'] == $this->dados['id_locacao']) ? 'selected' : ''; ?>>
                <?= htmlspecialchars($key['locacao']); ?>
              </option>
            <?php endforeach; ?>
          <?php endif; ?>
        </select>
      </div>

      <div class="col-lg-4">
        <label class="form-label">Empresa:</label>
        <select name="id_empresa" class="form-select">
          <option value="">Selecione</option>
          <?php if (!empty($this->dadosAux['empresas'])): ?>
            <?php foreach ($this->dadosAux['empresas'] as $key): ?>
              <option value="<?= $key['id_empresa']; ?>" <?= ($key['id_empresa'] == $this->dados['id_empresa']) ? 'selected' : ''; ?>>
                <?= htmlspecialchars($key['nome_empresa']); ?>
              </option>
            <?php endforeach; ?>
          <?php endif; ?>
        </select>
      </div>

      <div class="col-lg-4">
        <label class="form-label">Data de Início:</label>
        <input type="date" name="data_inicio" class="form-control"
        value="<?= (!empty($this->dados['data_inicio']) ? date('Y-m-d', strtotime($this->dados['data_inicio'])) : ''); ?>" required>
      </div>

      <div class="col-lg-4">
        <label class="form-label">Data de Fim:</label>
        <input type="date" name="data_fim" class="form-control" value="<?= $this->dados['data_fim']; ?>">
      </div>

      <div class="col-lg-4">
        <label class="form-label">Ativo:</label>
        <select name="ativo" class="form-select" required>
          <option value="1" <?= ($this->dados['ativo'] == 1) ? 'selected' : ''; ?>>Sim</option>
          <option value="0" <?= ($this->dados['ativo'] == 0) ? 'selected' : ''; ?>>Não</option>
        </select>
      </div>

      <div class="col-lg-12 text-end">
        <button type="submit" class="btn btn-primary">Salvar Alterações</button>
        <a href="/teapp/dadosprofissionais" class="btn btn-secondary">Cancelar</a>
      </div>

    </div>
  </form>

</div>
