<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Itens de Orçamento</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="/teapp/operacional" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">Itens</li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-lg-9"></div>
                        <div class="col-lg-3 text-end">
                            <a href="/teapp/itens/adicionar" class="btn btn-primary text-end">Adicionar</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table vertical-striped-table mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center">Item / Descrição</th>
                                    <th class="text-center">Valor (R$)</th>
                                    <th class="text-center">Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if (!empty($this->dados) && is_array($this->dados)) {
                                    foreach ($this->dados as $key) {
                                        echo '<tr>';
                                        
                                        
                                        echo '<td>
                                                <h6 class="text-md mb-0 fw-normal">'
                                                  . htmlspecialchars($key['item'], ENT_QUOTES, 'UTF-8') 
                                                . '</h6>
                                                <span class="text-sm text-secondary-light fw-normal">'
                                                  . htmlspecialchars($key['descricao'], ENT_QUOTES, 'UTF-8') 
                                                . '</span>
                                              </td>';
                                        
                                        
                                        echo '<td class="text-center">
                                                <span class="bg-success-focus text-success-main px-32 py-4 rounded-pill fw-medium text-sm">'
                                                  . number_format($key['valor'], 2, ',', '.') 
                                                . '</span>
                                              </td>';
                                        
                                    
                                        echo '<td class="text-center">
                                                <a href="/teapp/itens/editar/' . intval($key['id_item']) . '" 
                                                   class="btn btn-sm btn-info me-2">Editar</a>
                                                <a href="/teapp/itens/excluir/' . intval($key['id_item']) . '" 
                                                   onclick="return confirm(\'Deseja realmente excluir este item?\');" 
                                                   class="btn btn-sm btn-danger">Excluir</a>
                                              </td>';
                                        
                                        echo '</tr>';
                                    }
                                } else {
                                    
                                    echo '<tr>
                                            <td colspan="3" class="text-center">Nenhum item encontrado.</td>
                                          </tr>';
                                }
                                ?>                  
                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.card -->
        </div><!-- /.col-lg-12 -->
    </div><!-- /.row -->
</div><!-- /.dashboard-main-body -->
