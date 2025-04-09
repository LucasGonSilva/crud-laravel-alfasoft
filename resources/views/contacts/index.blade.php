@extends('layouts.admin')

@section('content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header hstack gap-2">
            <span>Lista de Contatos</span>
            <span class="ms-auto">
                <a href="{{ route('contact.create') }}" class="btn btn-success btn-sm">Cadastrar</a>
            </span>
        </div>
        <div class="card-body">

            <x-alert />

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nome</th>
                        <th scope="col">E-mail</th>
                        <th scope="col" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $contact)
                        <tr>
                            <th scope="row">{{ $contact->id }}</th>
                            <td>{{ $contact->name }}</td>
                            <td>{{ $contact->email }}</td>
                            <td class="text-center">
                                <a href="{{ route('contact.show', ['contact' => $contact->id]) }}"
                                    class="btn btn-primary btn-sm">Ver</a>
                                <a href="{{ route('contact.edit', ['contact' => $contact->id]) }}"
                                    class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('contact.destroy', ['contact' => $contact->id]) }}" method="post"
                                    class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        onclick="return confirm('Tem certeza que deseja excluir este registro?')"
                                        class="btn btn-danger btn-sm">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                    <div class="alert alert-danger">
                        Nenhum contato encontrado!
                    </div>
                    @endforelse
                </tbody>
            </table>

            {{ $contacts->links() }}

        </div>
    </div>
@endsection
