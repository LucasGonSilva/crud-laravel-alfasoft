@extends('layouts.auth')

@section('content')
    <main class="form-signin w-100 m-auto text-center bg-light rounded">
        <img class="mb-4" src="{{ asset('images/logo.png') }}" alt="" width="80" height="65">
        <h1 class="h3 mb-3 fw-normal">Área Restrita</h1>
        <x-alert />
        <form action="{{ route('login.process') }}" method="POST">
            @csrf
            @method('POST')
            <div class="form-floating mb-4">
                <input type="email" name="email" class="form-control" id="inputEmail"
                    placeholder="Digite o e-mail de usuário" value="{{ old('email') }}" autocomplete="off">
                <label for="inputEmail">E-mail de Usuário</label>
            </div>
            <div class="mb-4">
                <div class="input-group">
                    <div class="form-floating">
                        <input type="password" name="password" class="form-control" id="inputPassword"
                            placeholder="Password" autocomplete="off">
                        <label for="inputPassword">Senha</label>
                    </div>
                    <span class="input-group-text" role="button" onclick="togglePassword('inputPassword', this)"><i
                            class="bi bi-eye"></i></span>
                </div>
            </div>
            <button class="btn btn-warning w-100 py-2 mb-4" type="submit">Acessar</button>
            <a href="{{ route('login.create-user') }}" class="text-decoration-none">Cadastrar</a>
            <p class="mt-3 mb-3 text-body-secondary">&copy; <?= date('Y') ?></p>
        </form>
    </main>
@endsection
