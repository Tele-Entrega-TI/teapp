<div class="dashboard-main-body">

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Adicionar Dados Profissionais</h6>
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
      <li class="fw-medium">Adicionar</li>
    </ul>
  </div>

  <form method="post" action="/teapp/dadosprofissionais/adicionarACT">
    <div class="row gy-4">

      <div class="col-lg-4">
        <label class="form-label">Funcionário:</label>
        <select name="id_funcionario" class="form-select" required>
          <option value="">Selecione</option>
          <?php if (!empty($this->dados['funcionarios'])): ?>
            <?php foreach ($this->dados['funcionarios'] as $key): ?>
              <option value="<?= $key['id_funcionario']; ?>"><?= htmlspecialchars($key['nome']); ?></option>
            <?php endforeach; ?>
          <?php endif; ?>
        </select>
      </div>

      <div class="col-lg-4">
        <label class="form-label">Cargo:</label>
        <select name="id_cargo" class="form-select" required>
          <option value="">Selecione</option>
          <?php if (!empty($this->dados['cargos'])): ?>
            <?php foreach ($this->dados['cargos'] as $key): ?>
              <option value="<?= $key['id_cargo']; ?>"><?= htmlspecialchars($key['nome']); ?></option>
            <?php endforeach; ?>
          <?php endif; ?>
        </select>
      </div>

      <div class="col-lg-4">
        <label class="form-label">Setor:</label>
        <select name="id_setor" class="form-select" required>
          <option value="">Selecione</option>
          <?php if (!empty($this->dados['setores'])): ?>
            <?php foreach ($this->dados['setores'] as $key): ?>
              <option value="<?= $key['id_setor']; ?>"><?= htmlspecialchars($key['nome']); ?></option>
            <?php endforeach; ?>
          <?php endif; ?>
        </select>
      </div>

      <div class="col-lg-4">
        <label class="form-label">Locação:</label>
        <select name="id_locacao" class="form-select">
          <option value="">Selecione</option>
          <?php if (!empty($this->dados['locacoes'])): ?>
            <?php foreach ($this->dados['locacoes'] as $key): ?>
              <option value="<?= $key['id_locacao']; ?>"><?= htmlspecialchars($key['locacao']); ?></option>
            <?php endforeach; ?>
          <?php endif; ?>
        </select>
      </div>

      <div class="col-lg-4">
        <label class="form-label">Empresa:</label>
        <select name="id_empresa" class="form-select">
          <option value="">Selecione</option>
          <?php if (!empty($this->dados['empresas'])): ?>
            <?php foreach ($this->dados['empresas'] as $key): ?>
              <option value="<?= $key['id_empresa']; ?>"><?= htmlspecialchars($key['nome_empresa']); ?></option>
            <?php endforeach; ?>
          <?php endif; ?>
        </select>
      </div>

      <div class="col-lg-4">
        <label class="form-label">Data de Início:</label>
        <input type="date" name="data_inicio" class="form-control" required>
      </div>

      <div class="col-lg-4">
        <label class="form-label">Data de Fim:</label>
        <input type="date" name="data_fim" class="form-control">
      </div>

      <div class="col-lg-4">
        <label class="form-label">Ativo:</label>
        <select name="ativo" class="form-select" required>
          <option value="1">Sim</option>
          <option value="0">Não</option>
        </select>
      </div>

      <div class="col-lg-12 text-end">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a href="/teapp/dadosprofissionais" class="btn btn-secondary">Cancelar</a>
      </div>

    </div>
  </form>

</div>
