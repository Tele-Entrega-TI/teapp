<div class="dashboard-main-body">

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Permissões</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Início
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
                  <th class="text-center">Login/CPF</th>
                  <th class="text-center">Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if (!empty($this->dados['usuarios']) && is_array($this->dados['usuarios'])) {
                  foreach ($this->dados['usuarios'] as $usuario) {
                    echo '<tr>';
                    echo '<td class="text-center">' . $usuario['nome_funcionario'] . '</td>';
                    echo '<td class="text-center">' . $usuario['cpf'] . '</td>';
                    echo '<td class="text-center">';
                    echo '<a href="/teapp/permissoes/editar/' . $usuario['id_funcionario'] . '" class="btn btn-sm btn-outline-primary p-3">';
                    echo '<iconify-icon icon="solar:shield-check-line-duotone" class="icon text-md"></iconify-icon>';
                    echo ' Gerenciar';
                    echo '</a>';
                    echo '</td>';
                    echo '</tr>';
                  }
                } else {
                  echo '<tr><td colspan="3" class="text-center text-muted">Nenhum usuário encontrado.</td></tr>';
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
