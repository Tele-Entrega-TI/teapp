<div class="dashboard-main-body">
  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Orçamentos</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/operacional" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Dashboard
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium">Orçamentos</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-9"></div>
            <div class="col-lg-3 text-end">
              <a href="/teapp/orcamento/Adicionar" class="btn btn-primary">Adicionar</a>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table vertical-striped-table mb-0">
              <thead>
                <tr>
                  <th class="text-center">Oficina</th>
                  <th class="text-center">Veículo</th>
                  <th class="text-center">Data Cotação</th>
                  <th class="text-center">Data Aprovação</th>
                  <th class="text-center">Data Conclusão</th>
                  <th class="text-center">Aprovado</th>
                  <th class="text-center">Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (!empty($this->dados)) {
                  foreach ($this->dados as $key) {
                    echo '<tr>';

                   
                    echo '<td class="text-center">'
                         . ($key['nome_oficina'] ?? '<span class="text-muted">—</span>')
                         . '</td>';

                    
                    echo '<td>
                            <h6 class="text-md mb-0 fw-normal">'
                              . ($key['modelo_veiculo'] ?? '—')
                              . '</h6>
                            <span class="text-sm text-secondary-light fw-normal">'
                              . ($key['placa_veiculo']  ?? '—')
                              . '</span>
                          </td>';

                    
                    echo '<td class="text-center">'
                          . (!empty($key['data_cotacao'])
                            ? '<span class="badge text-sm fw-semibold text-warning-600 bg-warning-100 px-20 py-9 radius-4">'
                                  . date("d/m/Y", strtotime($key['data_cotacao']))
                                  . '</span>'
                              : '<span class="text-muted">—</span>')
                            . '</td>';

                    
                    echo '<td class="text-center">'
                         . (!empty($key['data_aprovacao'])
                             ? '<span class="badge text-sm fw-semibold text-success-600 bg-success-100 px-20 py-9 radius-4 text-white">'
                                 . date("d/m/Y", strtotime($key['data_aprovacao']))
                                 . '</span>'
                             : '<span class="text-muted">—</span>')
                         . '</td>';

                      
                    echo '<td class="text-center">'
                          . (!empty($key['data_conclusao'])
                              ? '<span class="badge text-sm fw-semibold text-info-600 bg-info-100 px-20 py-9 radius-4">'
                                  . date("d/m/Y", strtotime($key['data_conclusao']))
                                  . '</span>'
                              : '<span class="text-muted">—</span>')
                          . '</td>';


                    
                    echo '<td class="text-center">'
                         . ($key['status_aprovado'] === '1'
                             ? '<span class="text-success">Sim</span>'
                             : '<span class="text-danger">Não</span>')
                         . '</td>';

                    
                    echo '<td class="text-end">
                            <a href="/teapp/orcamento/Editar/' . $key['id_orcamento'] . '" class="btn btn-info btn-sm">
                              Editar
                            </a>
                            <a href="/teapp/orcamento/Excluir/' . $key['id_orcamento'] . '" class="btn btn-danger btn-sm"
                               onclick="return confirm(\'Tem certeza que deseja excluir este orçamento?\');">
                              Excluir
                            </a>
                          </td>';

                    echo '</tr>';
                  }
                } else {
                  echo '<tr><td colspan="7" class="text-center text-muted">Nenhum orçamento encontrado.</td></tr>';
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
