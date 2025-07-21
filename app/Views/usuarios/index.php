<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Usuários</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="/teapp/" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Usuários</li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-9"></div>
                        <div class="col-lg-3 text-end">
                            <a href="/teapp/usuarios/adicionar" class="btn btn-primary text-end">Adicionar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table vertical-striped-table mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">Funcionário</th>
                                    <th class="text-center">CPF</th>
                                    <th class="text-center">Permissão</th>
                                    <th class="text-center">Ativo</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($this->dados) && is_array($this->dados)) {
                                    foreach ($this->dados as $key) {
                                        echo '<tr>';

                                        echo '<td class="text-center">' . $key['nome_funcionario'] . '</td>';
                                        echo '<td class="text-center">' . $key['cpf'] . '</td>';
                                        echo '<td class="text-center">' . $key['nome_permissao'] . '</td>';

                                        echo '<td class="text-center">';
                                        echo ($key['ativo'] == 1)
                                            ? '<span class="text-success">Sim</span>'
                                            : '<span class="text-danger">Não</span>';
                                        echo '</td>';

                                        echo '<td class="text-center">
                                            <a href="/teapp/usuarios/excluir/' . $key['id_usuario'] . '" class="btn btn-sm btn-outline-secondary p-3" onclick="return confirm(\'Tem certeza que deseja desativar este usuário?\')">
                                                <iconify-icon icon="solar:trash-bin-minimalistic-line-duotone" class="icon text-md"></iconify-icon>
                                            </a>
                                        </td>';

                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="6" class="text-center text-muted">Nenhum usuário cadastrado.</td></tr>';
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
