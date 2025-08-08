<div class="dashboard-main-body">

  <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
    <h6 class="fw-semibold mb-0">Intercorrências</h6>
    <ul class="d-flex align-items-center gap-2">
      <li class="fw-medium">
        <a href="/teapp" class="d-flex align-items-center gap-1 hover-text-primary">
          <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
          Início
        </a>
      </li>
      <li>-</li>
      <li class="fw-medium">Intercorrências</li>
    </ul>
  </div>

  <div class="row gy-4">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-header">
          <div class="row">
            <div class="col-lg-9">
            </div>
            <div class="col-lg-3 text-end">
              <a href="/teapp/intercorrencias/adicionar" class="btn btn-primary text-end">Adicionar</a>
            </div>
          </div>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table vertical-striped-table mb-0">
              <thead>
                <tr>
                  <th scope="col" class="text-center">Funcionáiro substituído</th>
                  <th scope="col" class="text-center">Motivo</th>
                  <th scope="col" class="text-center">Data da substituição</th>
                  <th scope="col" class="text-center">Descrição</th>
                  <th scope="col" class="text-center">Gravidade</th>
                  <th scope="col" class="text-center">Custo</th>
                  <th scope="col" class="text-center">Funcionário substituto</th>
                  <th scope="col" class="text-center">Ações</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                if (!empty($this->dados)) {
                  foreach ($this->dados as $key) {
                    echo '<tr>';
                    echo '<td class="text-center">' . $key['funcionario_substituido'] . '</td>';
                    echo '<td class="text-center">' . $key['desc_motivo'] . '</td>';
                    echo '<td class="text-center">
                            <span class="badge text-sm fw-semibold text-info-600 bg-info-100 px-20 py-9 radius-4 text-white">'
                          . date("d/m/Y", strtotime($key['data_ocorrencia'])) . '</span>
                          </td>';
                    echo '<td class="text-center">' . $key['descricao'] . '</td>';
                    if($key['gravidade'] == 0){
                      echo '<td class="text-center">Leve</td>';
                    }
                    if($key['gravidade'] == 1){
                      echo '<td class="text-center">Média</td>';
                    }
                    if($key['gravidade'] == 2){
                      echo '<td class="text-center">Alta</td>';
                    }
                    if($key['gerou_custo'] == 0){
                      echo '<td class="text-center">Não</td>';
                    }
                    if($key['gerou_custo'] == 1){
                      echo '<td class="text-center">Sim</td>';
                    }
                    echo '<td class="text-center">' . $key['funcionario_substituto'] . '</td>';
                    echo '<td class="text-end">
                            <a href="/teapp/intercorrencias/editar/' . $key['id_intercorrencia'] . '" class="btn btn-info btn-sm">Editar</a>
                            <a href="/teapp/intercorrencias/excluir/' . $key['id_intercorrencia'] . '" class="btn btn-danger btn-sm"
                               onclick="return confirm(\'Tem certeza que deseja excluir esta empresa?\');">Excluir</a>
                          </td>';
                    echo '</tr>';
                  }
                } else {
                  echo '<tr><td colspan="8" class="text-center text-muted">Nenhuma Intercorrência Localizada.</td></tr>';
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
