<div class="dashboard-main-body">
  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Manutenções</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Início
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium">Manutenções</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-9"></div>
            <div class="card-header d-flex align-items-center flex-wrap gap-2">
              <a href="/teapp/manutencao/adicionar" class="btn btn-primary btn-sm ms-auto d-flex align-items-center gap-1 align-self-end mt-1 text-right">
                <iconify-icon icon="lucide:plus-circle" style="font-size: 18px;"></iconify-icon>
                Adicionar
              </a>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table vertical-striped-table mb-0">
              <thead>
                <tr>
                  <th class="text-center">Veículo</th>
                  <th class="text-center">Data</th>
                  <th class="text-center">Orçamento</th>
                  <th class="text-center">Aprovado</th>
                  <th class="text-center">Gestor</th>
                  <th class="text-center">Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (!empty($this->dados)) {
                  foreach ($this->dados as $key) {
                    echo '<tr>';
                    echo '<td class="text-center">' 
                           . ($key['placa_veiculo'] ?? '—') 
                           . ' / ' 
                           . ($key['modelo_veiculo'] ?? '—') 
                         . '</td>';
                    echo '<td class="text-center">
                            <span class="badge text-sm fw-semibold text-info-600 bg-info-100 px-20 py-9 radius-4 text-white">'
                            . (!empty($key['data'])
                                ? date("d/m/Y", strtotime($key['data']))
                                : '—')
                            . '</span>
                          </td>';
                    echo '<td class="text-center">'
                           . (!empty($key['id_orcamento'])
                               ? $key['id_orcamento']
                               : '<span class="text-muted">—</span>')
                         . '</td>';
                    echo '<td class="text-center">'
                           . ($key['aprovado'] === '1'
                               ? '<span class="text-success">'.strtoupper('Sim</span>')
                               : '<span class="text-danger">'.strtoupper('NÃo</span>'))
                         . '</td>';
                    echo '<td class="text-center">'
                           . ($key['nome_funcionario'] ?? '<span class="text-muted">—</span>')
                         . '</td>';
                    echo '<td class="text-end">
                            <form action="/teapp/manutencao/editar_act" method="post" class="d-inline">
                              <!-- ID oculto no form -->
                              <input type="hidden" name="id_manutencao" value="' . $key['id_manutencao'] . '">
                              <button type="submit" class="btn btn-sm btn-secondary p-3 me-1">
                              <iconify-icon icon="solar:pen-new-round-line-duotone" class="icon text-md"></iconify-icon>
                              </button>
                            </form>
                            <a href="/teapp/manutencao/excluir/' . $key['id_manutencao'] . '" class="btn btn-sm btn-outline-secondary p-3"
                               onclick="return confirm(\'Tem certeza que deseja excluir esta manutenção?\');">
                              <iconify-icon icon="solar:trash-bin-minimalistic-line-duotone" class="icon text-md"></iconify-icon>
                            </a>
                          </td>';
                    echo '</tr>';
                  }
                } else {
                  echo '<tr><td colspan="6" class="text-center text-muted">Nenhuma manutenção encontrada.</td></tr>';
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
