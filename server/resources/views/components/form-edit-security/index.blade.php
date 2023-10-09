<form class="needs-validation row g-3" name="user-security">
    <div class="invalid-feedback" id="invalid-update-security-user">

    </div>
    <div id="liveAlertPlaceholder" class="alert alert-success alert-display alert-security" role="alert">
        <i class="bi bi-check2-circle"></i> Senha atualizada com sucesso
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Senha</label>
        <input type="password" class="form-control" id="password" name="password_edit" placeholder="********" required>
        <div class="invalid-feedback">
            Senha inválido.
        </div>
    </div>

    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirme Senha</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation_edit"
            placeholder="********" required>
        <div class="invalid-feedback">
            Senha não são iguais.
        </div>
    </div>

    <div class="mb-3">
        <div id="password_user" class="form-text">Senha deve conter 8 digitos.</div>
    </div>

    <div>
        <input type="hidden" value="{{ $user['id'] }}" name="user_id">
    </div>

    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-bd-primary" id="user-security-edit">Editar</button>
        <button class="btn btn-bd-primary" type="button" disabled id="loading-security">
            <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
            <span role="status">Loading...</span>
        </button>
    </div>
</form>
