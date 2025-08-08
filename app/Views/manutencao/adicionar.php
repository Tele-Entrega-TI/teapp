<div class="dashboard-main-body">

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Adicionar Manutenção</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Início
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium"><a href="/teapp/manutencao" class="hover-text-primary">Manutenções</a></li>
      <li>-</li>
      <li class="fw-medium text-primary">Adicionar</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <form action="/teapp/manutencao/adicionarACT" method="POST">

            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label">Orçamento</label>
                <select name="id_orcamento" class="form-control" required>
                  <option value="">Selecione</option>
                  <?php foreach ($this->dados['orcamentos'] as $o) {
                    $placa = $o['placa'] ?? 'Sem placa';
                    $modelo = $o['modelo'] ?? '';
                    $data  = !empty($o['data_cotacao']) ? date("d/m/Y", strtotime($o['data_cotacao'])) : 'Sem data';
                    echo '<option value="'.$o['id_orcamento'].'">'.$placa.' - '.$modelo.' | '.$data.'</option>';
                  } ?>
                </select>
              </div>

              <div class="col-md-6">
                <label class="form-label">Gestor Responsável</label>
                <select name="id_funcionario_gestor" class="form-control" required>
                  <option value="">Selecione</option>
                  <?php foreach ($this->dados['gestores'] as $g) {
                    echo '<option value="'.$g['id_gestor'].'">'.$g['nome'].'</option>';
                  } ?>
                </select>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-md-4">
                <label class="form-label">Data da Manutenção</label>
                <input type="date" name="data" class="form-control" required>
              </div>

              <div class="col-md-4">
                <label class="form-label">Aprovado?</label>
                <select name="aprovado" class="form-control">
                  <option value="1">Sim</option>
                  <option value="0">Não</option>
                </select>
              </div>
            </div>

            <div class="text-end">
              <button type="submit" class="btn btn-success">Salvar</button>
              <a href="/teapp/manutencao" class="btn btn-secondary">Cancelar</a>
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
