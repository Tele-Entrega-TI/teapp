<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning text-white">
            <h4 class="mb-0">Editar Intercorrência</h4>
        </div>
        <div class="card-body">
            <form action="/teapp/intercorrencias/editaract" method="post">
                <input type="hidden" name="id_intercorrencia" value="<?= $this->dados['ret']['id_intercorrencia'] ?>">
                <div class="row g-3">
                    <div class="col-md-9">
                        <label for="id_funcionario" class="form-label">Funcionário substituído</label>
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
                    <div class="col-md-3">
                        <label for="id_motivo" class="form-label">Motivo</label>
                        <select name="id_motivo" class="form-select" required>
                            <option value="">Selecione...</option>
                            <?php
                            if (!empty($this->dados['motivos'])) {
                                foreach ($this->dados['motivos'] as $func) {
                                    echo '<option value="' . $func['id_motivo'] . '">' . $func['desc_motivo'] . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-md-9">
                        <label for="id_sub" class="form-label">Funcionário substituto</label>
                        <select name="id_sub" class="form-select" required>
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
                    <div class="col-md-3">
                        <label for="data_ocorrencia" class="form-label">Data da intercorrência</label>
                        <input type="date" name="data_ocorrencia" id="data_ocorrencia" class="form-control"
                            value="<?php echo $this->dados['ret']['data_ocorrencia']; ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label for="descricao" class="form-label">Descrição</label>
                        <input type="text" name="descricao" id="descricao" class="form-control"
                            value="<?php echo $this->dados['ret']['descricao']; ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label for="gravidade" class="form-label">Gravidade</label>
                        <select name="gravidade" class="form-select" required>
                            <option value="">Selecione...</option>
                            <option value="1">Leve</option>
                            <option value="2">Médio</option>
                            <option value="3">Grave</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="gerou_custo" class="form-label">Custo</label>
                        <select name="gerou_custo" class="form-select" required>
                            <option value="">Selecione...</option>
                            <option value="0">Não</option>
                            <option value="1">Sim</option>
                        </select>
                    </div>
                </div>

                <div class="mt-5 d-flex justify-content-between">
                    <a href="/teapp/intercorrencias" class="btn btn-secondary">Voltar</a>
                    <button type="submit" class="btn btn-success">Confirmar</button>
                </div>
            </form>
        </div>
    </div>
</div>