<div class="dashboard-main-body">

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Empresas</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/operacional" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Dashboard
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium">Empresas</li>
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
              <a href="/teapp/empresas/adicionar" class="btn btn-primary text-end">Adicionar</a>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table vertical-striped-table mb-0">
              <thead>
                <tr>
                  <th scope="col" class="text-center">Nome Fantasia</th>
                  <th scope="col" class="text-center">CNPJ</th>
                  <th scope="col" class="text-center">Data de Abertura</th>
                  <th scope="col" class="text-center">Razão Social</th>
                  <th scope="col" class="text-center">Endereço</th>
                  <th scope="col" class="text-center">Telefone</th>
                  <th scope="col" class="text-center">Email</th>
                  <th scope="col" class="text-center">Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if (!empty($this->dados)) {
                  foreach ($this->dados as $key) {
                    echo '<tr>';
                    echo '<td class="text-center">' . $key['nome_fantasia'] . '</td>';
                    echo '<td class="text-center">' . $key['cnpj'] . '</td>';
                    echo '<td class="text-center">
                            <span class="badge text-sm fw-semibold text-info-600 bg-info-100 px-20 py-9 radius-4 text-white">'
                          . date("d/m/Y", strtotime($key['data_abertura'])) . '</span>
                          </td>';
                    echo '<td class="text-center">' . $key['nome_empresa'] . '</td>';
                    echo '<td class="text-center">' . $key['endereco'] . '</td>';
                    echo '<td class="text-center">' . $key['telefone'] . '</td>';
                    echo '<td class="text-center">' . $key['email'] . '</td>';
                    echo '<td class="text-end">
                            <a href="/teapp/empresas/editar/' . $key['id_empresa'] . '" class="btn btn-info btn-sm">Editar</a>
                            <a href="/teapp/empresas/excluir/' . $key['id_empresa'] . '" class="btn btn-danger btn-sm"
                               onclick="return confirm(\'Tem certeza que deseja excluir esta empresa?\');">Excluir</a>
                          </td>';
                    echo '</tr>';
                  }
                } else {
                  echo '<tr><td colspan="5" class="text-center text-muted">Nenhuma empresa encontrada.</td></tr>';
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
