<form class="needs-validation row g-3" name="user-address">
    <div class="invalid-feedback" id="invalid-update-address-user">

    </div>
    <div id="liveAlertPlaceholder" class="alert alert-success alert-display alert-address" role="alert">
        <i class="bi bi-check2-circle"></i> Endereço atualizado com sucesso
    </div>

    <div class="mb-3 col-md-6">
        <label for="cep" class="form-label">CEP</label>
        <input type="text" class="form-control" id="cep" aria-describedby="cep_user" name="cep"
            placeholder="00000-000" required>
        <div class="invalid-feedback">
            Número do CEP inválido.
        </div>
    </div>

    <div class="mb-3 col-md-6">
        <label for="address" class="form-label">Endereço</label>
        <input type="text" class="form-control" id="address" aria-describedby="address_user" name="address"
            placeholder="Rua x" required>
    </div>

    <div class="mb-3 col-md-6">
        <label for="number" class="form-label">Número</label>
        <input type="text" class="form-control" id="number" aria-describedby="number_user" name="number"
            placeholder="000" required>
        <div class="invalid-feedback">
            Número da Barbearia/Salão.
        </div>
    </div>

    <div class="mb-3 col-md-6">
        <label for="complement" class="form-label">Complemento (opcional)</label>
        <input type="text" class="form-control" id="complement" aria-describedby="complement_user" name="complement"
            placeholder="Complemento Barbearia/Salão">
    </div>

    <div class="mb-3 col-md-4">
        <label for="neighborhood" class="form-label">Bairro</label>
        <input type="text" class="form-control" id="neighborhood" aria-describedby="neighborhood_user"
            name="neighborhood" readonly disabled>
    </div>

    <div class="mb-3 col-md-4">
        <label for="city" class="form-label">Cidade</label>
        <input type="text" class="form-control" id="city" aria-describedby="city_user" name="city" readonly
            disabled>
    </div>

    <div class="mb-3 col-md-4">
        <label for="state" class="form-label">Estado</label>
        <input type="text" class="form-control" id="state" aria-describedby="state_user" name="state" readonly
            disabled>
    </div>

    <div>
        <input type="hidden" value="{{ $user['id'] }}" name="user_id">
    </div>

    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-bd-primary" id="user-address-edit">Editar</button>
        <button class="btn btn-bd-primary" type="button" disabled id="loading-address">
            <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
            <span role="status">Loading...</span>
        </button>
    </div>
</form>
