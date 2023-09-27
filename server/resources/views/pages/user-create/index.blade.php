{{-- Layout --}}
@extends('layouts.auth.index')

{{-- Titulo --}}
@section('title', 'Criar usuário')

{{-- Conteúdo --}}
@section('content')
    <section class="card-form">
        <article class="d-flex flex-column align-items-center mb-4">
            <p><span id="number-process">1</span>/3</p>
            <h4>Comece a agendar seus horários online em minutos.</h4>
        </article>

        <article class="form">
            <form name="create-user" class="needs-validation">
                <div class="invalid-feedback" id="invalid-create-user">

                </div>

                <div class="process-block active-process-block">
                    <div class="mb-3 has-validation">
                        <label for="owner_name" class="form-label">Nome do Proprietário</label>
                        <input type="text" class="form-control" id="owner_name" name="owner_name"
                            placeholder="Nome completo" required>
                        <div class="invalid-feedback">
                            Nome inválido.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="company_name" class="form-label">Nome da Barbearia/Salão</label>
                        <input type="text" class="form-control" id="company_name" name="company_name"
                            placeholder="Nome completo" required>
                        <div class="invalid-feedback">
                            Nome da Barbearia/Salão inválido.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Seu melhor email">
                        <div class="invalid-feedback">
                            Email inválido.
                        </div>
                    </div>
                </div>

                <div class="process-block row g-3">

                    <div class="mb-3">
                        <label for="telephone" class="form-label">Celular</label>
                        <input type="tel" class="form-control" id="telephone" aria-describedby="telephone_user"
                            name="telephone" placeholder="(XX)X XXXX-XXXX" required>
                        <div class="invalid-feedback">
                            Número de celular inválido.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="cep" class="form-label">CEP</label>
                        <input type="text" class="form-control" id="cep" aria-describedby="cep_user" name="cep"
                            placeholder="00000-000">
                        <div class="invalid-feedback">
                            Número do CEP inválido.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Endereço</label>
                        <input type="text" class="form-control" id="address" aria-describedby="address_user"
                            name="address" placeholder="Rua x">
                        <div id="address_user" class="form-text">Informe a sua Rua.</div>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="number" class="form-label">Número</label>
                        <input type="text" class="form-control" id="number" aria-describedby="number_user"
                            name="number" placeholder="000">
                        <div class="invalid-feedback">
                            Número da Barbearia/Salão.
                        </div>
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="neighborhood" class="form-label">Bairro</label>
                        <input type="text" class="form-control" id="neighborhood" aria-describedby="neighborhood_user"
                            name="neighborhood" placeholder="Bairro Barbearia/Salão">
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="city" class="form-label">Cidade</label>
                        <input type="text" class="form-control" id="city" aria-describedby="city_user"
                            name="city" placeholder="Cidade Barbearia/Salão">
                    </div>

                    <div class="mb-3 col-md-6">
                        <label for="state" class="form-label">Estado</label>
                        <input type="text" class="form-control" id="state" aria-describedby="state_user"
                            name="state" placeholder="Estado Barbearia/Salão">
                    </div>

                    <div class="mb-3">
                        <label for="complement" class="form-label">Complemento (opcional)</label>
                        <input type="text" class="form-control" id="complement" aria-describedby="complement_user"
                            name="complement" placeholder="Estado Barbearia/Salão">
                    </div>

                </div>

                <div class="process-block">
                    <div class="mb-3">
                        <label for="password" class="form-label">Senha</label>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="********">
                        <div class="invalid-feedback">
                            Senha inválido.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirme Senha</label>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation" placeholder="********">
                        <div class="invalid-feedback">
                            Senha não são iguais.
                        </div>
                    </div>

                    <div class="mb-3">
                        <div id="password_user" class="form-text">Senha deve conter 8 digitos.</div>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="button" disabled class="btn btn-primary" id="continue">Continuar</button>
                    <button class="btn btn-primary" type="button" disabled id="loading">
                        <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                        <span role="status">Loading...</span>
                    </button>
                </div>

            </form>
        </article>
    </section>
@endsection
