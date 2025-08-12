<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Cargos</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="/teapp/" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Início
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Cargos</li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-9"></div>
                        <div class="card-header d-flex align-items-center flex-wrap gap-2">
                        <a href="/teapp/cargos/adicionar" class="btn btn-primary btn-sm ms-auto d-flex align-items-center gap-1 align-self-end mt-1 text-right">
                            <iconify-icon icon="lucide:plus-circle" style="font-size: 18px;"></iconify-icon>
                            Adicionar
                        </a>
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
                                if (!empty($this->dados) && is_array($this->dados)) {
                                    foreach ($this->dados as $key) {
                                        echo '<tr>';
                                        echo '<td class="text-center">' . htmlspecialchars($key['nome']) . '</td>';
                                        echo '<td class="text-center">' . htmlspecialchars($key['descricao']) . '</td>';
                                        echo '<td class="text-center">' . mb_strtoupper(($key['ativo'] ? 'Sim' : 'Não') . '</td>', 'UTF-8');
                                        echo '<td class="text-center">
                                                <a href="/teapp/cargos/editar/' . $key['id_cargo'] . '" class="btn btn-sm btn-secondary p-3 me-1" title="Editar">
                                                    <iconify-icon icon="solar:pen-new-round-line-duotone" class="icon text-md"></iconify-icon>
                                                </a>
                                                <a href="/teapp/cargos/excluir/' . $key['id_cargo'] . '" class="btn btn-sm btn-outline-secondary p-3" title="Excluir" onclick="return confirm(\'Tem certeza que deseja desativar este cargo?\')">
                                                    <iconify-icon icon="solar:trash-bin-minimalistic-line-duotone" class="icon text-md"></iconify-icon>
                                                </a>
                                              </td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="4" class="text-center">Nenhum cargo encontrado.</td></tr>';
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
