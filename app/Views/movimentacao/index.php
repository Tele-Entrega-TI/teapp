<div class="dashboard-main-body">

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Movimentações</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/operacional" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Dashboard
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium">Movimentações</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-9"></div>
            <div class="col-lg-3 text-end">
              <a href="/teapp/movimentacao/adicionar" class="btn btn-primary">Nova Movimentação</a>
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table vertical-striped-table mb-0">
              <thead>
                <tr>
                  <th class="text-center">Veículo</th>
                  <th class="text-center">Funcionário</th>
                  <th class="text-center">Data de Entrega</th>
                  <th class="text-center">Contrato</th>
                  <th class="text-center">Situação</th>
                  <th class="text-center">Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if (!empty($this->dados['movimentacoes']) && is_array($this->dados['movimentacoes'])) {
                  foreach ($this->dados['movimentacoes'] as $key) {
                    echo '<tr>';

                    echo '<td class="text-center">
                            <h6 class="text-md mb-0 fw-normal">' . $key['placa'] . '</h6>
                            <span class="text-sm text-secondary-light fw-normal">' . $key['modelo'] . '</span>
                          </td>';

                    echo '<td class="text-center">';
                    echo !empty($key['nome_funcionario']) ? $key['nome_funcionario'] : '<span class="text-muted">—</span>';
                    echo '</td>';

                    echo '<td class="text-center">' . date('d/m/Y', strtotime($key['data_entrega'])) . '</td>';

                    echo '<td class="text-center">' . ($key['contrato_assinado'] == 1 ? 'Sim' : 'Não') . '</td>';

                    echo '<td class="text-center">';
                    echo ($key['ativo'] == 1)
                        ? '<span class="badge bg-success text-white">Ativa</span>'
                        : '<span class="badge bg-secondary text-white">Finalizada</span>';
                    echo '</td>';

                    echo '<td class="text-center">';
                    if ($key['ativo'] == 1) {
                      echo '<a href="/teapp/movimentacao/finalizar/' . $key['id_veiculo'] . '" class="btn btn-sm btn-danger">Finalizar</a>';
                    } else {
                      echo '-';
                    }
                    echo '</td>';

                    echo '</tr>';
                  }
                } else {
                  echo '<tr><td colspan="6" class="text-center">Nenhuma movimentação encontrada.</td></tr>';
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div><!-- card end -->
    </div>
  </div>
</div>
