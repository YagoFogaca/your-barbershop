<form class="needs-validation">
    <div class="invalid-feedback" id="invalid-create-user">

    </div>
    <div class="mb-3 has-validation">
        <label for="owner_name_edit" class="form-label">Nome do Proprietário</label>
        <input type="text" class="form-control" id="owner_name_edit" name="owner_name_edit" placeholder="Nome completo"
            required>
        <div class="invalid-feedback">
            Nome inválido.
        </div>
    </div>

    <div class="mb-3">
        <label for="company_name_edit" class="form-label">Nome da Barbearia/Salão</label>
        <input type="text" class="form-control" id="company_name_edit" name="company_name_edit"
            placeholder="Nome completo" required>
        <div class="invalid-feedback">
            Nome da Barbearia/Salão inválido.
        </div>
    </div>

    <div class="mb-3">
        <label for="email_edit" class="form-label">Email</label>
        <input type="email" class="form-control" id="email_edit" name="email_edit" placeholder="Seu melhor email">
        <div class="invalid-feedback">
            Email inválido.
        </div>
    </div>

    <div class="mb-3">
        <label for="telephone__edit" class="form-label">Celular</label>
        <input type="tel" class="form-control" id="telephone__edit" aria-describedby="telephone_user"
            name="telephone__edit" placeholder="(XX)X XXXX-XXXX" required>
        <div class="invalid-feedback">
            Número de celular inválido.
        </div>
    </div>

    <div class="d-grid gap-2">
        <button type="button" disabled class="btn btn-primary" id="continue__edit">Editar</button>
        <button class="btn btn-primary" type="button" disabled id="loading">
            <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
            <span role="status">Loading...</span>
        </button>
    </div>
</form>
