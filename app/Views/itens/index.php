<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Itens de Orçamento</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="/teapp/" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Início
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
                        <div class="card-header d-flex align-items-center flex-wrap gap-2">
                            <a href="/teapp/itens/adicionar" class="btn btn-primary btn-sm ms-auto d-flex align-items-center gap-1 align-self-end mt-1 text-right">
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
                                                <span class="badge text-sm fw-semibold text-success-600 bg-success-100 px-20 py-9 radius-4 text-white">'
                                                  . number_format($key['valor'], 2, ',', '.') 
                                                . '</span>
                                              </td>';
                                        
                                    
                                        echo '<td class="text-center">
                                                <a href="/teapp/itens/editar/' . intval($key['id_item']) . '" 
                                                   class="btn btn-sm btn-secondary p-3 me-1" title="Editar">
                                                        <iconify-icon icon="solar:pen-new-round-line-duotone" class="icon text-md"></iconify-icon>
                                                   </a>
                                                <a href="/teapp/itens/excluir/' . intval($key['id_item']) . '" 
                                                   onclick="return confirm(\'Deseja realmente excluir este item?\');" 
                                                   class="btn btn-sm btn-outline-secondary p-3" title="Excluir">
                                                        <iconify-icon icon="solar:trash-bin-minimalistic-line-duotone" class="icon text-md"></iconify-icon>
                                                   </a>
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
