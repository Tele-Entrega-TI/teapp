<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Checklists</h6>
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
                            <!-- opcional: botão de filtro, exportar, etc -->
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
                                    <th class="text-center">Condutor</th>
                                    <th class="text-center">Aprovado</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($this->dados) && is_array($this->dados)) {
                                    foreach ($this->dados as $key) {
                                        echo '<tr>';

                                        echo '<td class="text-center">' . date('d/m/Y', strtotime($key['data_checklist'])) . '</td>';

                                        echo '<td class="text-center">
                                                <div class="fw-semibold">' . $key['placa'] . '</div>
                                                <div class="text-muted small">' . $key['modelo'] . '</div>
                                              </td>';

                                        echo '<td class="text-center">' . $key['nome_funcionario'] . '</td>';

                                        echo '<td class="text-center">';
                                        echo ($key['aprovado'] == 1)
                                            ? '<span class="text-success">Sim</span>'
                                            : '<span class="text-danger">Não</span>';
                                        echo '</td>';

                                        echo '<td class="text-center">
                                                <a href="/teapp/checklisthistorico/visualizar/' . $key['id_checklist'] . '" class="btn btn-sm btn-secondary p-3">
                                                    <iconify-icon icon="solar:eye-line-duotone" class="icon text-md"></iconify-icon>
                                                </a>
                                              </td>';

                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="5" class="text-center text-muted">Nenhum checklist encontrado.</td></tr>';
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
