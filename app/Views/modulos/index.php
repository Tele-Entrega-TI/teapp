<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Módulos do Sistema</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="/teapp/" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Inicio
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Módulos</li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-9"></div>
                        <div class="col-lg-3 text-end">
                            <a href="/teapp/modulos/adicionar" class="btn btn-primary text-end">Adicionar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table vertical-striped-table mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">Nome</th>
                                    <th class="text-center">Descrição</th>
                                    <th class="text-center">Ativo</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($this->dados['modulos']) && is_array($this->dados['modulos'])) {
                                    foreach ($this->dados['modulos'] as $key) {
                                        echo '<tr>';

                                        echo '<td class="text-center">' . $key['nome_modulo'] . '</td>';

                                        echo '<td class="text-center">';
                                        echo !empty($key['descricao']) ? $key['descricao'] : '<span class="text-muted">—</span>';
                                        echo '</td>';

                                        echo '<td class="text-center">';
                                        echo ($key['ativo'] == 1)
                                            ? '<span class="text-success">Sim</span>'
                                            : '<span class="text-danger">Não</span>';
                                        echo '</td>';

                                        echo '<td class="text-center">
                                            <a href="/teapp/modulos/liberar/' . $key['id_modulo'] . '" class="btn btn-sm btn-outline-success p-3 me-1" onclick="return confirm(\'Deseja liberar este módulo?\')">
                                                <iconify-icon icon="solar:shield-check-line-duotone" class="icon text-md"></iconify-icon>
                                            </a>
                                            <a href="/teapp/modulos/excluir/' . $key['id_modulo'] . '" class="btn btn-sm btn-outline-danger p-3" onclick="return confirm(\'Deseja excluir este módulo?\')">
                                                <iconify-icon icon="solar:trash-bin-minimalistic-line-duotone" class="icon text-md"></iconify-icon>
                                            </a>
                                        </td>';

                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="4" class="text-center text-muted">Nenhum módulo cadastrado.</td></tr>';
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
