@extends('layouts.platform.index')

@section('title', 'Serviços')

@section('content')
    <article class="header-infos d-flex justify-content-between align-items-center">
        <h4>Serviços</h4>
        <button class="btn btn-bd-primary" id="create-service" data-bs-toggle="modal"
            data-bs-target="#create-service-modal">Criar</button>
    </article>

    <section class="container-services">

        <table>

            <thead>
                <tr>
                    <th class="width">Nome</th>
                    <th class="width">Preço</th>
                    <th class="active">Ativo</th>
                </tr>
            </thead>

            <tbody id="display-services">

                @foreach ($services as $service)
                    <tr id="line-service-{{ $service['id'] }}">
                        <td class="width" id="line-service-name">{{ $service['name'] }}</td>
                        <td class="width" id="line-service-price">R$ {{ $service['price'] }}</td>
                        <td class="active" id="line-service-status">
                            {{ $service['status'] === 'active' ? 'Ativo' : 'Desativado' }}</td>
                        <td class="config">
                            <button type="button" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><button class="dropdown-item" data-bs-toggle="modal"
                                        data-bs-target="#edit-service-modal" id="edit-{{ $service['id'] }}">Editar</button>
                                </li>
                                <li><button class="dropdown-item" id="{{ $service['id'] }}"
                                        name="delete-service">Apagar</button></li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>

    </section>
    @include('components.modal-create-service.index')
    @include('components.toast.index')
    @include('components.modal-edit-service.index')
@endsection
