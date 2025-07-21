<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Veículos</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="/teapp/operacional" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Veículos</li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-9"></div>
                        <div class="col-lg-3 text-end">
                            <a href="/teapp/veiculos/adicionar" class="btn btn-primary text-end">Adicionar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table vertical-striped-table mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">Placa</th>
                                    <th class="text-center">Modelo</th>
                                    <th class="text-center">Tipo</th>
                                    <th class="text-center">Cor</th>
                                    <th class="text-center">Funcionário</th>
                                    <th class="text-center">Ano</th>
                                    <th class="text-center">Último Checklist</th>
                                    <th class="text-center">Ativo</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($this->dados) && is_array($this->dados)) {
                                    foreach ($this->dados as $key) {
                                        echo '<tr>';

                                        echo '<td class="text-center">' . $key['placa'] . '</td>';

                                        echo '<td class="text-center">
                                                <div>' . $key['modelo'] . '</div>
                                                <small class="text-muted">' . $key['fabricante'] . '</small>
                                              </td>';

                                        echo '<td class="text-center">' . $key['tipo'] . '</td>';
                                        echo '<td class="text-center">' . $key['cor'] . '</td>';

                                        echo '<td class="text-center">';
                                        echo !empty($key['titular_veiculo']) ? $key['titular_veiculo'] : '<span class="text-muted">—</span>';
                                        echo '</td>';

                                        echo '<td class="text-center">' . $key['ano_fab'] . '</td>';

                                        echo '<td class="text-center">';
                                        if (!empty($key['data_ultimo_checklist'])) {
                                            echo '<div>' . date('d/m/Y', strtotime($key['data_ultimo_checklist'])) . '</div>';
                                            echo '<small class="' . ($key['ultimo_checklist_aprovado'] ? 'text-success' : 'text-danger') . '">';
                                            echo $key['ultimo_checklist_aprovado'] ? 'Aprovado' : 'Reprovado';
                                            echo '</small>';
                                        } else {
                                            echo '<span class="text-muted">—</span>';
                                        }
                                        echo '</td>';

                                        echo '<td class="text-center">';
                                        echo ($key['ativo'] == 1)
                                            ? '<span class="text-success">Sim</span>'
                                            : '<span class="text-danger">Não</span>';
                                        echo '</td>';

                                        echo '<td class="text-center">
                                            <a href="/teapp/veiculos/editar/' . $key['id_veiculo'] . '" class="btn btn-sm btn-secondary p-3 me-1">
                                                <iconify-icon icon="solar:pen-new-round-line-duotone" class="icon text-md"></iconify-icon>
                                            </a>
                                            <a href="/teapp/veiculos/excluir/' . $key['id_veiculo'] . '" class="btn btn-sm btn-outline-secondary p-3" onclick="return confirm(\'Tem certeza que deseja desativar?\')">
                                                <iconify-icon icon="solar:trash-bin-minimalistic-line-duotone" class="icon text-md"></iconify-icon>
                                            </a>
                                        </td>';

                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="9" class="text-center text-muted">Nenhum veículo cadastrado.</td></tr>';
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
