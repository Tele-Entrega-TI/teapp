<div class="dashboard-main-body">
  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Locações</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/operacional" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Dashboard
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium">Locações</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
          <h6 class="mb-0">Lista de Locações</h6>
          <a href="/teapp/locacoes/adicionar" class="btn btn-primary btn-sm">Adicionar</a>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table vertical-striped-table mb-0 text-center align-middle">
              <thead>
                <tr>
                  <th>Locação</th>
                  <th>Início</th>
                  <th>Fim</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (!empty($this->dados)) {
                  foreach ($this->dados as $key) {
                    echo '<tr>';

                    echo '<td>' . htmlspecialchars($key['locacao']) . '</td>';

                    echo '<td>';
                    if (!empty($key['inicio_locacao'])) {
                      echo '<span class="badge text-sm fw-semibold text-info-600 bg-info-100 px-20 py-9 radius-4">'
                           . date("d/m/Y", strtotime($key['inicio_locacao'])) .
                           '</span>';
                    } else {
                      echo '<span class="text-muted">---</span>';
                    }
                    echo '</td>';

                    echo '<td>';
                    if (!empty($key['fim_locacao'])) {
                      echo '<span class="badge text-sm fw-semibold text-info-600 bg-info-100 px-20 py-9 radius-4">'
                           . date("d/m/Y", strtotime($key['fim_locacao'])) .
                           '</span>';
                    } else {
                      echo '<span class="text-muted">---</span>';
                    }
                    echo '</td>';

                    echo '<td>
                            <a href="/teapp/locacoes/editar/' . $key['id_locacao'] . '" class="btn btn-info btn-sm">Editar</a>
                            <a href="/teapp/locacoes/excluir/' . $key['id_locacao'] . '" class="btn btn-danger btn-sm"
                               onclick="return confirm(\'Tem certeza que deseja excluir esta locação?\');">Excluir</a>
                          </td>';

                    echo '</tr>';
                  }
                } else {
                  echo '<tr><td colspan="4" class="text-center text-muted">Nenhuma locação encontrada.</td></tr>';
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
