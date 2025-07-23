<div class="dashboard-main-body ps-md-4 ps-lg-5 pe-3">
  <div class="row mt-3">
    <div class="col-12 col-md-6 col-lg-5">
      <h6 class="fw-semibold mb-3">Painel Operacional</h6>

      <div class="accordion accordion-flush" id="accordionOperacional">

        <!-- Veículos -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-veiculos">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseVeiculos">
              <i class="ri-truck-line me-2 text-primary"></i> Veículos
            </button>
          </h2>
          <div id="collapseVeiculos" class="accordion-collapse collapse">
            <div class="accordion-body ps-4">
              <ul class="list-unstyled mb-0">
                <li>
                  <a href="/teapp/veiculos" class="d-flex align-items-center gap-2 py-1 text-dark fw-medium text-decoration-none">
                    <iconify-icon icon="ri:arrow-right-line" class="text-primary"></iconify-icon> Cadastro de Veículos
                  </a>
                </li>
                <li>
                  <a href="/teapp/movimentacao" class="d-flex align-items-center gap-2 py-1 text-dark fw-medium text-decoration-none">
                    <iconify-icon icon="ri:arrow-right-line" class="text-primary"></iconify-icon> Movimentação
                  </a>
                </li>
                <li>
                  <a href="/teapp/checklist" class="d-flex align-items-center gap-2 py-1 text-dark fw-medium text-decoration-none">
                    <iconify-icon icon="ri:arrow-right-line" class="text-primary"></iconify-icon> Checklists
                  </a>
                </li>
                <li>
                  <a href="/teapp/manutencao" class="d-flex align-items-center gap-2 py-1 text-dark fw-medium text-decoration-none">
                    <iconify-icon icon="ri:arrow-right-line" class="text-primary"></iconify-icon> Manutenção
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Pessoas -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-pessoas">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePessoas">
              <i class="ri-user-line me-2 text-primary"></i> Pessoas
            </button>
          </h2>
          <div id="collapsePessoas" class="accordion-collapse collapse">
            <div class="accordion-body ps-4">
              <ul class="list-unstyled mb-0">
                <li>
                  <a href="/teapp/motoristas" class="d-flex align-items-center gap-2 py-1 text-dark fw-medium text-decoration-none">
                    <iconify-icon icon="ri:arrow-right-line" class="text-primary"></iconify-icon> Motoristas
                  </a>
                </li>
                <li>
                  <a href="/teapp/substitutos" class="d-flex align-items-center gap-2 py-1 text-dark fw-medium text-decoration-none">
                    <iconify-icon icon="ri:arrow-right-line" class="text-primary"></iconify-icon> Substituições
                  </a>
                </li>
                <li>
                  <a href="/teapp/gestores" class="d-flex align-items-center gap-2 py-1 text-dark fw-medium text-decoration-none">
                    <iconify-icon icon="ri:arrow-right-line" class="text-primary"></iconify-icon> Gestores
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Orçamentos -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-orcamentos">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOrcamentos">
              <i class="ri-money-dollar-circle-line me-2 text-primary"></i> Orçamentos
            </button>
          </h2>
          <div id="collapseOrcamentos" class="accordion-collapse collapse">
            <div class="accordion-body ps-4">
              <ul class="list-unstyled mb-0">
                <li>
                  <a href="/teapp/orcamento" class="d-flex align-items-center gap-2 py-1 text-dark fw-medium text-decoration-none">
                    <iconify-icon icon="ri:arrow-right-line" class="text-primary"></iconify-icon> Orçamentos
                  </a>
                </li>
                <li>
                  <a href="/teapp/itens" class="d-flex align-items-center gap-2 py-1 text-dark fw-medium text-decoration-none">
                    <iconify-icon icon="ri:arrow-right-line" class="text-primary"></iconify-icon> Itens
                  </a>
                </li>
                <li>
                  <a href="/teapp/oficinas" class="d-flex align-items-center gap-2 py-1 text-dark fw-medium text-decoration-none">
                    <iconify-icon icon="ri:arrow-right-line" class="text-primary"></iconify-icon> Oficinas
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <!-- Clientes -->
        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-clientes">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseClientes">
              <i class="ri-building-line me-2 text-primary"></i> Clientes
            </button>
          </h2>
          <div id="collapseClientes" class="accordion-collapse collapse">
            <div class="accordion-body ps-4">
              <ul class="list-unstyled mb-0">
                <li>
                  <a href="/teapp/locacoes" class="d-flex align-items-center gap-2 py-1 text-dark fw-medium text-decoration-none">
                    <iconify-icon icon="ri:arrow-right-line" class="text-primary"></iconify-icon> Locações
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div>

      </div> <!-- /accordion -->
    </div>
  </div>
</div>

<!-- Hover em vez de clique -->
<script>
  document.querySelectorAll('.accordion-item').forEach(item => {
    const collapse = item.querySelector('.accordion-collapse');
    item.addEventListener('mouseenter', () => {
      if (!collapse.classList.contains('show')) {
        new bootstrap.Collapse(collapse, { toggle: true });
      }
    });
    item.addEventListener('mouseleave', () => {
      if (collapse.classList.contains('show')) {
        new bootstrap.Collapse(collapse, { toggle: true });
      }
    });
  });
</script>
