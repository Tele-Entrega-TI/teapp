<div class="dashboard-main-body">
  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Oficinas</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Início
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium">Oficinas</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-9"></div>
            <div class="card-header d-flex align-items-center flex-wrap gap-2">
              <a href="/teapp/oficinas/Adicionar" class="btn btn-primary btn-sm ms-auto d-flex align-items-center gap-1 align-self-end mt-1 text-right">
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
                  <th class="text-center">Endereço</th>
                  <th class="text-center">Responsável</th>
                  <th class="text-center">WhatsApp</th>
                  <th class="text-center">Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php if (!empty($this->dados)): ?>
                  <?php foreach ($this->dados as $key): ?>
                    <tr>
                      <td class="text-center"><?= htmlspecialchars($key['nome']); ?></td>
                      <td class="text-center">
                        <?= !empty($key['endereco']) 
                            ? htmlspecialchars($key['endereco']) 
                            : '<span class="text-muted">—</span>'; ?>
                      </td>
                      <td class="text-center">
                        <?= !empty($key['responsavel']) 
                            ? htmlspecialchars($key['responsavel']) 
                            : '<span class="text-muted">—</span>'; ?>
                      </td>
                      <td class="text-center">
                        <?= !empty($key['whatsapp']) 
                            ? htmlspecialchars($key['whatsapp']) 
                            : '<span class="text-muted">—</span>'; ?>
                      </td>
                      <td class="text-end">
                        
                        <a href="/teapp/oficinas/Editar/<?= $key['id_oficina']; ?>" 
                           class="btn btn-sm btn-secondary p-3 me-1" title="Editar">
                          <iconify-icon icon="solar:pen-new-round-line-duotone" class="icon text-md"></iconify-icon>
                        </a>

                        
                        <a href="/teapp/oficinas/Excluir/<?= $key['id_oficina']; ?>" 
                           class="btn btn-sm btn-outline-secondary p-3" title="Excluir"
                           onclick="return confirm('Tem certeza que deseja excluir esta oficina?');">
                          <iconify-icon icon="solar:trash-bin-minimalistic-line-duotone" class="icon text-md"></iconify-icon>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach; ?>
                <?php else: ?>
                  <tr>
                    <td colspan="5" class="text-center text-muted">Nenhuma oficina encontrada.</td>
                  </tr>
                <?php endif; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div><!-- card end -->
    </div>
  </div>
</div>
