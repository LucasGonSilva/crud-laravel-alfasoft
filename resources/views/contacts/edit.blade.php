@extends('layouts.admin')

@section('content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header hstack gap-2">
            <span>Editar Contato</span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('contact.index') }}" class="btn btn-info btn-sm me-1">Listar</a>
                <a href="{{ route('contact.show', ['contact' => $contact->id]) }}" class="btn btn-primary btn-sm me-1">Ver</a>
            </span>
        </div>
        <div class="card-body">

            <x-alert />

            <form action="{{ route('contact.update', ['contact' => $contact->id]) }}" method="POST" class="row g-3">
                @csrf
                @method('PUT')
                <div class="col-md-6">
                    <label for="inputName" class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" id="inputName" placeholder="Nome Completo."
                    value="{{ old('name', $contact->name) }}">
                </div>
                <div class="col-md-6">
                    <label for="inputContact" class="form-label">Contato</label>
                    <input type="text" name="contact" class="form-control" id="inputContact"
                        placeholder="Seu contato." value="{{ old('contact', $contact->contact) }}">
                </div>
                <div class="col-md-6">
                    <label for="inputEmail" class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" id="inputEmail"
                        placeholder="Melhor E-mail do usuário." value="{{ old('email', $contact->email) }}">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success btn-sm">Salvar Alteração</button>
                </div>
            </form>
        </div>
    </div>
@endsection
