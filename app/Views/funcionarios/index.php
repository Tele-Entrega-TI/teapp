<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Funcionários</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="/teapp/" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Início
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
                        <div class="card-header d-flex align-items-center flex-wrap gap-2">
                            <a href="/teapp/funcionarios/adicionar" class="btn btn-primary btn-sm ms-auto d-flex align-items-center gap-1 align-self-end mt-1 text-right">
                                <iconify-icon icon="lucide:plus-circle" style="font-size: 18px;"></iconify-icon>
                                Adicionar
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table vertical-striped-table">
                            <thead>
                                <tr>
                                    <th class="text-center">Matrícula</th>
                                    <th class="text-center">Nome</th>
                                    <th class="text-center">Apelido</th>
                                    <th class="text-center">Cpf</th>
                                    <th class="text-center">Telefone</th>
                                    <th class="text-center">Admissão</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($this->dados) && is_array($this->dados)) {
                                    foreach ($this->dados as $key) {
                                        echo '<tr>';
                                        echo '<td class="text-center">' . $key['id_funcionario'] . '</td>';
                                        echo '<td class="text-center">' . $key['nome'] . '</td>';
                                        echo '<td class="text-center">' . $key['apelido'] . '</td>';
                                        echo '<td class="text-center">' . $key['cpf'] . '</td>';
                                        echo '<td class="text-center">' . $key['telefone'] . '</td>';
                                        echo '<td class="text-center">' . date("d/m/Y", strtotime($key['admissao'])) . '</td>';
                                        echo '<td class="text-center">
                                                <a href="/teapp/funcionarios/ver/' . $key['id_funcionario'] . '" class="btn btn-sm btn-secondary p-3 me-1">
                                                    <iconify-icon icon="mdi:format-list-bulleted" class="icon text-md"></iconify-icon>
                                                </a>
                                                <a href="/teapp/funcionarios/excluir/' . $key['id_funcionario'] . '" class="btn btn-sm btn-outline-secondary p-3" onclick="return confirm(\'Tem certeza que deseja excluir?\')">
                                                    <iconify-icon icon="solar:trash-bin-minimalistic-line-duotone" class="icon text-md"></iconify-icon>
                                                </a>

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
