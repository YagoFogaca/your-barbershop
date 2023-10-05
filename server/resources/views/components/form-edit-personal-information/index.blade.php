<form class="needs-validation" name="personal-information">
    <div class="invalid-feedback" id="invalid-update-personal-information-user">

    </div>
    <div class="mb-3 has-validation">
        <label for="owner-name-edit" class="form-label">Nome do Proprietário</label>
        <input type="text" class="form-control" id="owner-name-edit" name="owner_name_edit" placeholder="Nome completo"
            value="{{ $user['owner_name'] }}">
        <div class="invalid-feedback">
            Nome inválido.
        </div>
    </div>

    <div class="mb-3">
        <label for="company-name-edit" class="form-label">Nome da Barbearia/Salão</label>
        <input type="text" class="form-control" id="company-name-edit" name="company_name_edit"
            placeholder="Nome completo" value="{{ $user['company_name'] }}">
        <div class="invalid-feedback">
            Nome da Barbearia/Salão inválido.
        </div>
    </div>

    <div class="mb-3">
        <label for="email-edit" class="form-label">Email</label>
        <input type="email" class="form-control" id="email-edit" name="email_edit" placeholder="Seu melhor email"
            value="{{ $user['email'] }}">
        <div class="invalid-feedback">
            Email inválido.
        </div>
    </div>

    <div class="mb-3">
        <label for="telephone-edit" class="form-label">Celular</label>
        <input type="tel" class="form-control" id="telephone-edit" name="telephone_edit"
            placeholder="(XX)X XXXX-XXXX" value="{{ $user['telephone'] }}">
        <div class="invalid-feedback">
            Número de celular inválido.
        </div>
    </div>

    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-bd-primary" id="user-personal-information-edit">Editar</button>
        <button class="btn btn-bd-primary" type="button" disabled id="loading">
            <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
            <span role="status">Loading...</span>
        </button>
    </div>
</form>
