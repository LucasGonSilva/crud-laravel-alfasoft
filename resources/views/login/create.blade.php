@extends('layouts.auth')

@section('content')
    <main class="form-signin w-100 m-auto text-center bg-light rounded">
        <img class="mb-4" src="{{ asset('images/logo.png') }}" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Novo Usuário</h1>
        <x-alert />
        <form action="{{ route('login.store-user') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-floating mb-4">
                <input type="text" name="name" class="form-control" id="inputName"
                    placeholder="Digite o nome completo" value="{{ old('name') }}">
                <label for="inputName">Nome</label>
            </div>
            <div class="form-floating mb-4">
                <input type="email" name="email" class="form-control" id="inputEmail"
                    placeholder="Digite o seu melhor e-mail" value="{{ old('email') }}">
                <label for="inputEmail">E-mail</label>
            </div>
            <div class="mb-4">
                <div class="input-group">
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="inputPassword"
                            placeholder="Password">
                        <label for="inputPassword">Senha</label>
                    </div>
                    <span class="input-group-text" role="button" onclick="togglePassword('inputPassword', this)"><i
                            class="bi bi-eye"></i></span>
                </div>
            </div>
            <div class="mb-4">
                <div class="input-group">
                    <div class="form-floating">
                        <input type="password" name="password_confirmation" class="form-control" id="password_confirmation"
                            placeholder="Password">
                        <label for="password_confirmation">Confirmar Senha</label>
                    </div>
                    <span class="input-group-text" role="button" onclick="togglePassword('password_confirmation', this)"><i
                            class="bi bi-eye"></i></span>
                </div>
            </div>
            <button class="btn btn-warning w-100 py-2 mb-4" type="submit">Cadastrar</button>
            <a href="{{ route('login') }}" class="text-decoration-none">Login</a>
            <p class="mt-3 mb-3 text-body-secondary">&copy; <?= date('Y') ?></p>
        </form>
    </main>
@endsection
