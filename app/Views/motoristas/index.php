<div class="dashboard-main-body">

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Motoristas</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/operacional" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Dashboard
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium">Motoristas</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-9">
            </div>
            <div class="col-lg-3 text-end">
              <a href="/teapp/motoristas/adicionar" class="btn btn-primary text-end">Adicionar</a>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table vertical-striped-table mb-0">
              <thead>
                <tr>
                  <th scope="col" class="text-center">Nome</th>
                  <th scope="col" class="text-center">Validade CNH</th>
                  <th scope="col" class="text-center">Locação</th>
                  <th scope="col" class="text-center">Empresa</th>
                  <th scope="col" class="text-center">Veículo Atual</th>
                  <th scope="col" class="text-center">Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if (!empty($this->dados)) {
                  foreach ($this->dados as $key) {
                    echo '<tr>';
                    echo '<td class="text-center">' . $key['nome_motorista'] . '</td>';
                    echo '<td class="text-center">
                            <span class="badge text-sm fw-semibold text-info-600 bg-info-100 px-20 py-9 radius-4 text-white">'
                          . date("d/m/Y", strtotime($key['validade_cnh'])) . '</span>
                          </td>';
                    echo '<td class="text-center">' . ($key['empresa_registrada'] ?? '<span class="text-muted">Sem locação</span>') . '</td>';
                    echo '<td class="text-center">' . ($key['empresa_locada'] ?? '<span class="text-muted">Sem locação</span>') . '</td>'; 
                    echo '<td class="text-center">' . ($key['veiculo_atual'] ?? '<span class="text-muted">Sem veículo</span>') . '</td>';
                    echo '<td class="text-end">
                            <a href="/teapp/motoristas/editar/' . $key['id_motorista'] . '" class="btn btn-info btn-sm">Editar</a>
                            <a href="/teapp/motoristas/excluir/' . $key['id_motorista'] . '" class="btn btn-danger btn-sm"
                               onclick="return confirm(\'Tem certeza que deseja excluir este motorista?\');">Excluir</a>
                          </td>';
                    echo '</tr>';
                  }
                } else {
                  echo '<tr><td colspan="5" class="text-center text-muted">Nenhum motorista encontrado.</td></tr>';
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
