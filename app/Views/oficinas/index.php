<div class="dashboard-main-body">
  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Oficinas</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp/operacional" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Dashboard
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
            <div class="col-lg-3 text-end">
              <a href="/teapp/oficinas/Adicionar" class="btn btn-primary">Adicionar</a>
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
                           class="btn btn-info btn-sm">
                          Editar
                        </a>

                        
                        <a href="/teapp/oficinas/Excluir/<?= $key['id_oficina']; ?>" 
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Tem certeza que deseja excluir esta oficina?');">
                          Excluir
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
