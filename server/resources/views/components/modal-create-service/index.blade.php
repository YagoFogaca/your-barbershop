<div class="modal fade" id="create-service-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="exampleModalLabel">Criar serviço</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" name="create-service">
                    <div class="invalid-feedback" id="invalid-create-service">

                    </div>
                    <div id="liveAlertPlaceholder" class="alert alert-success alert-display" role="alert">
                        <i class="bi bi-check2-circle"></i> Serviço criado com sucesso
                    </div>
                    <div class="mb-3 has-validation">
                        <label for="name_service" class="form-label">Nome</label>
                        <input type="text" class="form-control" id="name_service" name="name_service"
                            placeholder="Nome do serviço" required>
                        <div class="invalid-feedback">
                            Nome inválido.
                        </div>
                    </div>
                    <div class="mb-3 has-validation">
                        <label for="price_service" class="form-label">Preço</label>

                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="number" step="0.01" min="1" class="form-control" id="price_service"
                                name="price_service" placeholder="00,00" required>
                            <div class="invalid-feedback">
                                Preço inválido.
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-bd-primary" disabled
                            id="btn-create-service">Criar</button>
                        <button class="btn btn-bd-primary" type="button" disabled id="loading">
                            <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                            <span role="status">Loading...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
