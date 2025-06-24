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
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($this->dados) && is_array($this->dados)) {
                                    foreach ($this->dados as $key) {
                                        echo '<tr>';

                                        echo '<td class="text-center">' . date('d/m/Y', strtotime($key['data_checklist'])) . '</td>';

                                        echo '<td class="text-center">
                                                <h6 class="text-md mb-0 fw-normal">' . $key['placa'] . '</h6>
                                                <span class="text-sm text-secondary-light fw-normal">' . $key['modelo'] . '</span>
                                              </td>';

                                        echo '<td class="text-center">';
                                        if (!empty($key['nome_funcionario'])) {
                                            echo '<h6 class="text-md mb-0 fw-normal">' . $key['nome_funcionario'] . '</h6>';
                                            if (!empty($key['nome_cargo'])) {
                                                echo '<span class="text-sm text-secondary-light fw-normal">' . $key['nome_cargo'] . '</span>';
                                            }
                                        } else {
                                            echo '<span class="text-muted">Sem Funcionário</span>';
                                        }
                                        echo '</td>';

                                        $check = '<i class="bi bi-check-circle-fill text-success"></i>';
                                        $cross = '<i class="bi bi-x-circle-fill text-danger"></i>';

                                        echo '<td class="text-center">' . ($key['pneus_ok'] ? $check : $cross) . '</td>';
                                        echo '<td class="text-center">' . ($key['freios_ok'] ? $check : $cross) . '</td>';
                                        echo '<td class="text-center">' . ($key['oleo_ok'] ? $check : $cross) . '</td>';
                                        echo '<td class="text-center">' . ($key['luzes_ok'] ? $check : $cross) . '</td>';
                                        echo '<td class="text-center">' . ($key['lataria_ok'] ? $check : $cross) . '</td>';
                                        echo '<td class="text-center">' . ($key['nivel_agua_ok'] ? $check : $cross) . '</td>';
                                        echo '<td class="text-center">' . ($key['equipamentos_seguranca_ok'] ? $check : $cross) . '</td>';

                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="10" class="text-center text-muted">Nenhum checklist encontrado.</td></tr>';
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
