<div class="dashboard-main-body">

    <div class="d-flex flex-wrap align-items-center justify-content-between gap-3 mb-24">
        <h6 class="fw-semibold mb-0">Editar Veículo</h6>
        <ul class="d-flex align-items-center gap-2">
            <li class="fw-medium">
                <a href="/teapp" class="d-flex align-items-center gap-1 hover-text-primary">
                    <iconify-icon icon="solar:home-smile-angle-outline" class="icon text-lg"></iconify-icon>
                    Dashboard
                </a>
            </li>
            <li>-</li>
            <li class="fw-medium">
                <a href="/teapp/veiculos" class="hover-text-primary">Veículos</a>
            </li>
            <li>-</li>
            <li class="fw-medium text-primary">Editar</li>
        </ul>
    </div>

    <div class="row gy-4">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="/teapp/veiculos/editaract">
                        <input type="hidden" name="id_veiculo" value="<?= $this->dados['id_veiculo'] ?>">
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Placa</label>
                                <input type="text" name="placa" class="form-control" value="<?= $this->dados['placa'] ?? '' ?>" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Modelo</label>
                                <input type="text" name="modelo" class="form-control" value="<?= $this->dados['modelo'] ?? '' ?>" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Tipo</label>
                                <input type="text" name="tipo" class="form-control" value="<?= $this->dados['tipo'] ?? '' ?>" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Cor</label>
                                <input type="text" name="cor" class="form-control" value="<?= $this->dados['cor'] ?? '' ?>" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Fabricante</label>
                                <input type="text" name="fabricante" class="form-control" value="<?= $this->dados['fabricante'] ?? '' ?>" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Ano de Fabricação</label>
                                <input type="text" name="ano_fab" class="form-control" value="<?= $this->dados['ano_fab'] ?? '' ?>" required>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label class="form-label">Vencimento do Documento</label>
                                <input type="date" name="vencimento_doc" class="form-control" value="<?= $this->dados['vencimento_doc'] ?? '' ?>">
                            </div>


                            <div class="col-md-8 mb-3">
                                <label class="form-label">Titular do Veículo</label>
                                <input type="text" name="titular_veiculo" class="form-control" value="<?= $this->dados['titular_veiculo'] ?? '' ?>">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end gap-2 mt-4">
                            <a href="/teapp/veiculos" class="btn btn-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-success">Salvar Alterações</button>
                        </div>
                    </form>
                </div>
            </div><!-- card end -->
        </div>
    </div>
</div>
