<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Setores</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="/teapp/" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Início
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Setores</li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-9"></div>
                        <div class="col-lg-3 text-end">
                            <a href="/teapp/setores/adicionar" class="btn btn-primary">Adicionar</a>
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
                                        echo '<td class="text-center">' . ($key['ativo'] ? 'Sim' : 'Não') . '</td>';
                                        echo '<td class="text-center">
                                                <a href="/teapp/setores/editar/' . $key['id_setor'] . '" class="btn btn-sm btn-info me-2">Editar</a>
                                                <a href="/teapp/setores/excluir/' . $key['id_setor'] . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Tem certeza que deseja desativar este setor?\')">Desativar</a>
                                              </td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="4" class="text-center">Nenhum setor encontrado.</td></tr>';
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
