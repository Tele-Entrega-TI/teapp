<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Dados Profissionais</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="/teapp/" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Início
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Dados Profissionais</li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-9"></div>
                        <div class="col-lg-3 text-end">
                            <a href="/teapp/dadosprofissionais/adicionar" class="btn btn-primary text-end">Adicionar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table vertical-striped-table mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">Funcionário</th>
                                    <th class="text-center">Cargo / Locação</th>
                                    <th class="text-center">Setor</th>
                                    <th class="text-center">Empresa</th>
                                    <th class="text-center">Início</th>
                                    <th class="text-center">Ativo</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($this->dados) && is_array($this->dados)) {
                                    foreach ($this->dados as $key) {
                                        echo '<tr>';

                                        echo '<td class="text-center">' . htmlspecialchars($key['nome_funcionario']) . '</td>';

                                        echo '<td class="text-center">
                                                <div>' . htmlspecialchars($key['nome_cargo']) . '</div>
                                                <small class="text-muted">' . (!empty($key['nome_locacao']) ? htmlspecialchars($key['nome_locacao']) : 'Sem locação') . '</small>
                                              </td>';

                                        echo '<td class="text-center">' . htmlspecialchars($key['nome_setor']) . '</td>';

                                        echo '<td class="text-center">';
                                        echo !empty($key['nome_empresa']) ? htmlspecialchars($key['nome_empresa']) : '<span class="text-muted">—</span>';
                                        echo '</td>';

                                        echo '<td class="text-center">';
                                        if (!empty($key['data_inicio']) && $key['data_inicio'] != '0000-00-00' && $key['data_inicio'] != '0000-00-00 00:00:00') {
                                        echo '<span class="badge text-sm fw-semibold text-info-600 bg-info-100 px-20 py-9 radius-4 text-white">'
                                            . date('d/m/Y', strtotime($key['data_inicio'])) .
                                            '</span>';
                                        } else {
                                            echo '<span class="text-muted">—</span>';
                                        }

                                        echo '</td>';

                                        echo '<td class="text-center">';
                                        echo ($key['ativo'] == 1) ? '<span class="text-success">Sim</span>' : '<span class="text-danger">Não</span>';
                                        echo '</td>';

                                        echo '<td class="text-center">
                                        <a href="/teapp/dadosprofissionais/editar/' . $key['id_dado_profissional'] . '" class="btn btn-sm btn-secondary p-3 me-1">
                                            <iconify-icon icon="solar:pen-new-round-line-duotone" class="icon text-md"></iconify-icon>
                                        </a>
                                        <a href="/teapp/dadosprofissionais/excluir/' . $key['id_dado_profissional'] . '" class="btn btn-sm btn-outline-secondary p-3" onclick="return confirm(\'Tem certeza que deseja desativar?\')">
                                            <iconify-icon icon="solar:trash-bin-minimalistic-line-duotone" class="icon text-md"></iconify-icon>
                                        </a>
                                        </td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="7" class="text-center text-muted">Nenhum registro encontrado.</td></tr>';
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
