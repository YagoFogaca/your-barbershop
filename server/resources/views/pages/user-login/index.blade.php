@extends('layouts.auth.index')

@section('title', 'YB - Login')

@section('content')
    <section class="card-form">
        <article class="d-flex flex-column align-items-center mb-4">
            <h4>Faça login para acessar a plataforma.</h4>
        </article>

        <article class="form">
            <form name="login-user" class="needs-validation">
                <div class="invalid-feedback" id="invalid-create-user">

                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email_login"
                        placeholder="Seu melhor email" required>
                    <div class="invalid-feedback">
                        Email inválido.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Senha</label>
                    <input type="password" class="form-control" id="password" name="password_login" placeholder="********"
                        required>
                    <div class="invalid-feedback">
                        Senha inválido.
                    </div>
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="remember">
                    <label class="form-check-label" for="remember" name='remember'>Lembrar de mim</label>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary" id="login">login</button>
                    <button class="btn btn-primary" type="button" disabled id="loading">
                        <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                        <span role="status">Carregando...</span>
                    </button>
                </div>

            </form>
        </article>
    </section>
@endsection
