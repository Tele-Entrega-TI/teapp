<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Funcionários</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="/teapp/operacional" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Funcionários</li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-9"></div>
                        <div class="col-lg-3 text-end">
                            <a href="/teapp/funcionarios/adicionar" class="btn btn-primary text-end">Adicionar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table vertical-striped-table mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">Nome</th>
                                    <th class="text-center">Apelido</th>
                                    <th class="text-center">Cargo</th>
                                    <th class="text-center">Telefone</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($this->dados) && is_array($this->dados)) {
                                    foreach ($this->dados as $key) {
                                        echo '<tr>';
                                        echo '<td class="text-center">' . $key['nome'] . '</td>';
                                        echo '<td class="text-center">' . $key['apelido'] . '</td>';
                                        echo '<td class="text-center">' . $key['cargo'] . '</td>';
                                        echo '<td class="text-center">' . $key['telefone'] . '</td>';
                                        echo '<td class="text-center">
                                                <a href="/teapp/funcionarios/ver/' . $key['id_funcionario'] . '" class="btn btn-sm btn-info me-2">Detalhar</a>
                                                <a href="/teapp/funcionarios/excluir/' . $key['id_funcionario'] . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Tem certeza que deseja excluir?\')">Excluir</a>

                                              </td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="9" class="text-center">Nenhum funcionário encontrado.</td></tr>';
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
