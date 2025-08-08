<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Veículos</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="/teapp/" class="d-flex align-items-center gap-1 hover-text-primary">
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
            <div class="row">
                <div class="col-md-9">
                    <span class="fw-medium">Filtrar Veiculos</span>
                </div>
                <div class="col-md-3 text-end">
                    
                </div>
            </div>    
                    
                    <hr>
                    <br>
                    <form method="post" class="">
                        <div class="row">
                            <div class="col-md-4">
                                <input type="text" name="placa" class="form-control" placeholder="Placa"
                                   value="<?php echo isset($_POST['placa']) ? htmlspecialchars($_POST['placa']) : ''; ?>">
                            </div>
                            <div class="col-md-4">
                                <input type="text" name="modelo" class="form-control" placeholder="Modelo"
                                   value="<?php echo isset($_POST['modelo']) ? htmlspecialchars($_POST['modelo']) : ''; ?>">
                            </div>
                            <div class="col-md-4">
                                <button type="submit" class="btn btn-primary btn-sm d-flex align-items-center justify-content-center" style="width:32px; height:32px; padding:0;">
                                        <iconify-icon icon="solar:magnifer-linear" style="font-size:18px;"></iconify-icon>
                                </button>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-*">
                                <div class="form-check form-switch d-flex align-items-center ms-1">
                                    <input class="form-check-input" type="checkbox" id="f-ativos" name="ativo" value="1"
                                   <?php echo (isset($_POST['ativo']) && $_POST['ativo'] == '1') ? 'checked' : ''; ?>>
                                    <label class="form-check-label ms-2" for="f-ativos">Somente ativos</label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <hr>

                    </form>

                    
        </div>
                <!-- Fim header -->
            <div class="card">

                <!-- Header apenas com o filtro -->
                <div class="card-header d-flex align-items-center flex-wrap gap-2">
                        <a href="/teapp/veiculos/adicionar" class="btn btn-primary btn-sm ms-auto d-flex align-items-center gap-1 align-self-end mt-1 text-right">
                    <iconify-icon icon="ph:plus-circle" style="font-size: 18px;"></iconify-icon>
                    Adicionar
                    </a>
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
                                    <th class="text-center">Vencimento do Doc.</th>
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
                                        echo !empty($key['nome_funcionario']) ? $key['nome_funcionario'] : '<span class="text-muted">—</span>';
                                        echo '</td>';

                                        echo '<td class="text-center">' . $key['ano_fab'] . '</td>';

                                        echo '<td class="text-center">';

                                        echo '<span class="badge text-sm fw-semibold text-info-600 bg-info-100 px-20 py-9 radius-4 text-white">'
                                                . date('d/m/Y', strtotime($key['vencimento_doc'])) .
                                                '</span>'; 

                                        echo '</td>';

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

                                            <a href="/teapp/veiculos/editar/' . $key['id_veiculo'] . '" class="btn btn-sm btn-secondary p-3 me-1" title="Editar">
                                                <iconify-icon icon="solar:pen-new-round-line-duotone" class="icon text-md"></iconify-icon>
                                            </a>
                                            <a href="/teapp/veiculos/excluir/' . $key['id_veiculo'] . '" class="btn btn-sm btn-outline-secondary p-3" onclick="return confirm(\'Tem certeza que deseja desativar?\')" title="Excluir">
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
