@extends('layouts.admin')

@section('content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header hstack gap-2">
            <span>Cadastrar Contato</span>
            <span class="ms-auto d-sm-flex flex-row">
                <a href="{{ route('contact.index') }}" class="btn btn-info btn-sm me-1">Listar</a>
            </span>
        </div>
        <div class="card-body">

            <x-alert />

            <form action="{{ route('contact.store') }}" method="POST" class="row g-3">
                @csrf
                @method('POST')
                <div class="col-md-6">
                    <label for="inputName" class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" id="inputName" placeholder="Nome Completo."
                        value="{{ old('name') }}">
                </div>
                <div class="col-md-6">
                    <label for="inputContato" class="form-label">Contato</label>
                    <input type="text" name="contact" class="form-control" id="inputContato"
                        placeholder="Seu contato" value="{{ old('contact') }}">
                </div>
                <div class="col-md-6">
                    <label for="inputEmail" class="form-label">E-mail</label>
                    <input type="email" name="email" class="form-control" id="inputEmail"
                        placeholder="Melhor E-mail do usuário." value="{{ old('email') }}">
                </div>
                <div class="col-md-12">
                    <button type="submit" class="btn btn-success btn-sm">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
@endsection
