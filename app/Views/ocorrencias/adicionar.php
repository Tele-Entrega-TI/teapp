<?php var_dump($this->dados)?>
<div class="dashboard-main-body">

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Nova Ocorrência</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Início
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium"><a href="/teapp/ocorrencias">Ocorrência</a></li>
      <li>-</li>
      <li class="fw-medium">Nova Ocorrência</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">

          <form action="/teapp/ocorrencias/adicionarACT" method="POST">

            <div class="mb-3">
              <label class="form-label">Funcionário</label>
              <select name='id_funcionario' class='form-select' required> <option>Selecione o Funcionário</option> 
                <?php
                if (!empty($this->dados['funcionarios'])) {
                  foreach ($this->dados['funcionarios'] as $key) {
                    echo '<option value="' . $key['id_funcionario'] . '">' . $key['nome'] . '</option>';
                  }
                }
                ?>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Motivos</label>
              <select name='id_motivo' class='form-select' required> <option>Selecione o Motivo</option> 
                <?php
                if (!empty($this->dados['motivos'])) {
                  foreach ($this->dados['motivos'] as $key) {
                    echo '<option value="' . $key['id_motivo'] . '">' . $key['motivos'] . '</option>';
                  }
                }
                ?>
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Gravidade</label>
              <select name='gravidade' class='form-select' required>
              <option value="">Selecione a Gravidade</option> 
              <option value="1">Leve</option> 
              <option value="2">Média</option> 
              <option value="3">Grave</option> 
              </select>
            </div>

            <div class="mb-3">
              <label class="form-label">Data</label>
              <input type="date" name="data" class="form-control" required>
            </div>

            <div class="text-end">
              <button type="submit" class="btn btn-success">Salvar</button>
              <a href="/teapp/ocorrencias" class="btn btn-secondary">Cancelar</a>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>
</div>
