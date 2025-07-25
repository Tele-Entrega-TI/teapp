<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Ocorrências</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="/teapp/operacional" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Ocorrências</li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-9"></div>
                        <div class="col-lg-3 text-end">
                            <a href="/teapp/ocorrencias/adicionar" class="btn btn-primary text-end">Adicionar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table vertical-striped-table mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">Funcionário</th>
                                    <th class="text-center">Motivo</th>
                                    <th class="text-center">Data</th>
                                    <th class="text-center">Gravidade</th>
                                    <th class="text-center">Ação</th>

                                </tr>
                            </thead>
                            <tbody>
                               <?php 
                if (!empty($this->dados)) {
                  foreach ($this->dados as $key) {
                    echo '<tr>';

                    echo '<td class="text-center">
                            <h6 class="text-md mb-0 fw-normal">' . $key['nome'] .'</h6>
                            
                          </td>';

                    echo '<td class="text-center">
                            <h6 class="text-md mb-0 fw-normal">' . $key['motivos'] . '</h6>
                            
                          </td>';

                    echo '<td class="text-center">' . date('d/m/Y', strtotime($key['data'])) . '</td>';

                   echo '<td class="text-center">';
                        switch ($key['gravidade']) {
                            case '1':
                                echo '<span class="badge bg-success text-white">Leve</span>';
                                break;
                            case '2':
                                echo '<span class="badge bg-warning text-white">Média</span>';
                                break;
                            case '3':
                                echo '<span class="badge bg-danger text-white">Grave</span>';
                                break;
                            default:
                                echo '<span class="badge bg-secondary text-white">Desconhecido</span>';
                        }
                        echo '</td>';
                    
                    echo '<td class="text-center">
                             <a href="/teapp/ocorrencias/editar/' . ($key['id_ocorrencia']) . '" class="btn btn-info btn-sm">Editar</a>
                             <a href="/teapp/ocorrencias/excluir/' . ($key['id_ocorrencia']) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Tem certeza que deseja excluir este motivo?\');">Excluir</a>
                                        </td>';

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
