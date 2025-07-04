<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Gestores</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="/teapp/operacional" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Gestores</li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-9"></div>
                        <div class="col-lg-3 text-end">
                            <a href="/teapp/gestores/adicionar" class="btn btn-primary text-end">Adicionar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table vertical-striped-table mb-0">
                            <thead>
                                <tr>
                                    <th scope="col" class="text-center">Nome</th>
                                    <th scope="col" class="text-center">Email</th>
                                    <th scope="col" class="text-center">Telefone</th>
                                    <th scope="col" class="text-center">Empresa</th>
                                    <th scope="col" class="text-center">Cadastro</th>
                                    <th scope="col" class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if (!empty($this->dados) && is_array($this->dados)) {
                                    foreach ($this->dados as $key) {
                                        echo '<tr>';
                                        echo '<td class="text-center">
                                                <h6 class="text-md mb-0 fw-normal">' . $key['nome'] . '</h6>
                                              </td>';
                                        echo '<td class="text-center">' . $key['email'] . '</td>';
                                        echo '<td class="text-center">' . $key['telefone'] . '</td>';
                                        echo '<td class="text-center">' . $key['empresa'] . '</td>';
                                        echo '<td class="text-center">
                                                <span class="badge text-sm fw-semibold text-info-600 bg-info-100 px-20 py-9 radius-4 text-white">'
                                                . date("d/m/Y H:i", strtotime($key['data_cadastro'])) . '</span>
                                              </td>';
                                        echo '<td class="text-center">
                                                <a href="/teapp/gestores/editar/' . $key['id_gestor'] . '" class="btn btn-sm btn-info me-2">Editar</a>
                                                <a href="/teapp/gestores/excluir/' . $key['id_gestor'] . '" class="btn btn-sm btn-danger" onclick="return confirm(\'Deseja realmente excluir este gestor?\')">Excluir</a>
                                              </td>';
                                        echo '</tr>';
                                    }
                                } else {
                                    echo '<tr><td colspan="6" class="text-center">Nenhum gestor encontrado.</td></tr>';
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
