@extends('layouts.platform.index')

@section('title', 'Configuração da conta')

@section('content')
    {{-- @dd($user) --}}
    <div>
        <div class="nav nav-tabs" id="v-pills-tab" role="tablist" aria-orientation="vertical">

            <button class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#personal-information"
                type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Informações</button>

            <button class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#address" type="button"
                role="tab" aria-controls="v-pills-profile" aria-selected="false">Endereço</button>

            <button class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#security"
                type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Segurança</button>

        </div>
        <div class="tab-content" id="v-pills-tabContent">

            <div class="tab-pane fade show active" id="personal-information" role="tabpanel"
                aria-labelledby="v-pills-home-tab" tabindex="0">
                @include('components.form-edit-personal-information.index', $user)
            </div>

            <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="v-pills-profile-tab" tabindex="0">
                Endereço</div>

            <div class="tab-pane fade" id="security" role="tabpanel" aria-labelledby="v-pills-messages-tab" tabindex="0">
                Segurança</div>

        </div>
    </div>
@endsection
