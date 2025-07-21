<div class="dashboard-main-body">

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Permissões</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/operacional" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Dashboard
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium">Permissões</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table class="table vertical-striped-table mb-0">
              <thead>
                <tr>
                  <th class="text-center">Funcionário</th>
                  <th class="text-center">CPF</th>
                  <th class="text-center">Cargo</th>
                  <th class="text-center">Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (!empty($this->dados['funcionarios']) && is_array($this->dados['funcionarios'])) {
                  foreach ($this->dados['funcionarios'] as $func) {
                    echo '<tr>';
                    echo '<td class="text-center">' . $func['nome'] . '</td>';
                    echo '<td class="text-center">' . $func['cpf'] . '</td>';
                    echo '<td class="text-center">' . $func['cargo'] . '</td>';
                    echo '<td class="text-center">';
                    echo '<a href="/teapp/permissoes/editar/' . $func['id_funcionario'] . '" class="btn btn-sm btn-outline-primary p-3">';
                    echo '<iconify-icon icon="solar:shield-check-line-duotone" class="icon text-md"></iconify-icon>';
                    echo ' Gerenciar';
                    echo '</a>';
                    echo '</td>';
                    echo '</tr>';
                  }
                } else {
                  echo '<tr><td colspan="4" class="text-center text-muted">Nenhum funcionário encontrado.</td></tr>';
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
