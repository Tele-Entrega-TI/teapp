<div class="dashboard-main-body">

	<div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
		<h6 class ="fw-semibold mb-0">Novo Usuário</h6>
		<ul class="d-flex align-items-center gap-2">
			<li class ="fw-medium">
				<a href="/teapp/usuarios" class="d-flex align-items-center gap-1 hover-text-primary">
					<iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>					
				</a>
			</li>
		<li>-</li>
		<li class="fw-medium"><a href="/teapp/usuarios">Usuários</a></li>
      <li>-</li>
      <li class="fw-medium">Novo Usuário</li>
    </ul>
  </div>

  <form action="/teapp/usuarios/adicionarACT" method="post">
    <div class="row gy-4">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body row gy-4">

            <div class="col-lg-6">
              <label class="form-label fw-semibold">Funcionário</label>
              <select name="id_funcionario" class="form-select" required>
                <option value="">Selecione...</option>
                <?php
                if (!empty($this->dados['funcionarios'])) {
                  foreach ($this->dados['funcionarios'] as $func) {
                    echo '<option value="' . $func['id_funcionario'] . '" data-cpf="' . $func['cpf'] . '">' . $func['nome'] . '</option>';
                  }
                }
                ?>
              </select>
            </div>

            <div class="col-lg-6">
              <label class="form-label fw-semibold">CPF (Login)</label>
              <input type="text" name="cpf" class="form-control" maxlength="14" required placeholder="Somente números">
            </div>
            </div>
            <div class="col-lg-12 text-end">
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>

          </div>
        </div>
      </div>
    </div>
  </form>
    <script>
    document.querySelector('select[name="id_funcionario"]').addEventListener('change', function () {
      const selectedOption = this.options[this.selectedIndex];
      const cpf = selectedOption.getAttribute('data-cpf');

      if (cpf) {
        document.querySelector('input[name="cpf"]').value = cpf;
      } else {
        document.querySelector('input[name="cpf"]').value = '';
      }
    });
  </script>
</div>						