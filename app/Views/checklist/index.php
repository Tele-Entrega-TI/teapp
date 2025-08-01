<div class="dashboard-main-body">

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Checklists de Veículos</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/operacional" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Dashboard
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium">Checklists</li>
    </ul>
  </div>

  <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-9"></div>
                        <div class="col-lg-3 text-end">
                            <a href="/teapp/checklist/adicionar" class="btn btn-primary text-end">Adicionar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table vertical-striped-table mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">Motorista</th>
                                    <th class="text-center">Número do veículo</th>
                                    <th class="text-center">Observação</th>
                                    <th class="text-center">Data do checklist</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($this->dados['checklists']) && is_array($this->dados['checklists'])) {
                                    foreach ($this->dados['checklists'] as $key) {
                                        echo '<tr>';
                                        echo '<td class="text-center">' . $key['assinatura_motorista'] . '</td>';
                                        echo '<td class="text-center">' . $key['id_veiculo'] . '</td>';
                                        echo '<td class="text-center">' . $key['observacoes'] . '</td>';
                                        echo '<td class="text-center">' . $key['data_checklist'] . '</td>';
                                        echo '<td class="text-center">
                                                <a href="/teapp/checklist/ver/' . $key['id_checklist'] . '" class="btn btn-sm btn-info me-2">Detalhar</a>
                                                <a href="/teapp/checklist/excluir/' . $key['id_checklist'] . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Tem certeza que deseja excluir?\')">Excluir</a>

                                              </td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="9" class="text-center">Nenhum funcionário encontrado.</td></tr>';
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






<!-- Caso precise  voltar a index para o estado inicial. -->
<!-- <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-9"></div>
            <div class="col-lg-3 text-end">
              <a href="/teapp/checklist/adicionar" class="btn btn-primary text-end">Adicionar</a>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table vertical-striped-table mb-0">
              <thead>
                <tr>
                  <th class="text-center">Data</th>
                  <th class="text-center">Veículo</th>
                  <th class="text-center">Funcionário</th>
                  <th class="text-center">Pneus</th>
                  <th class="text-center">Freios</th>
                  <th class="text-center">Óleo</th>
                  <th class="text-center">Luzes</th>
                  <th class="text-center">Lataria</th>
                  <th class="text-center">Água</th>
                  <th class="text-center">Segurança</th>
                  <th class="text-center">Status</th>
                </tr>
              </thead>
              <tbody>
                <?php
                /*if (!empty($this->dados['checklists']) && is_array($this->dados['checklists'])) {
                  $check = '<i class="bi bi-check-circle-fill text-success"></i>';
                  $cross = '<i class="bi bi-x-circle-fill text-danger"></i>';

                  $qualidade = function ($valor) use ($check, $cross) {
                    return (strtolower($valor) === 'ruim') ? $cross : $check;
                  };

                  foreach ($this->dados['checklists'] as $key) {
                    echo '<tr>';

                    echo '<td class="text-center">' . date("d/m/Y", strtotime($key['data_checklist'])) . '</td>';

                    echo '<td class="text-center">
                            <div>' . $key['placa'] . '</div>
                            <small class="text-muted">' . $key['modelo'] . '</small>
                          </td>';

                    echo '<td class="text-center">';
                    echo $key['nome_funcionario'];
                    if (!empty($key['nome_cargo'])) {
                      echo '<br><small class="text-muted">' . $key['nome_cargo'] . '</small>';
                    }
                    echo '</td>';

                    echo '<td class="text-center">' . $qualidade($key['pneus_qualidade']) . '</td>';
                    echo '<td class="text-center">' . $qualidade($key['freios_qualidade']) . '</td>';
                    echo '<td class="text-center">' . $qualidade($key['oleo_qualidade']) . '</td>';
                    echo '<td class="text-center">' . $qualidade($key['luzes_qualidade']) . '</td>';
                    echo '<td class="text-center">' . $qualidade($key['lataria_qualidade']) . '</td>';
                    echo '<td class="text-center">' . $qualidade($key['nivel_agua_qualidade']) . '</td>';
                    echo '<td class="text-center">' . $qualidade($key['equipamentos_seguranca_qualidade']) . '</td>';

                    $status = $this->dados['model']->esta_aprovado($key['id_checklist']);
                    echo '<td class="text-center">';
                    if ($status === true) {
                      echo '<span class="badge bg-success">Aprovado</span>';
                    } elseif ($status === false) {
                      echo '<span class="badge bg-danger">Reprovado</span>';
                    } else {
                      echo '<span class="badge bg-secondary">N/A</span>';
                    }
                    echo '</td>';

                    echo '</tr>';
                  }
                } else {
                  echo '<tr><td colspan="11" class="text-center text-muted">Nenhum checklist cadastrado.</td></tr>';
                }*/
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>card end -->
    <!-- </div>
  </div> -->
