@extends('layouts.admin')

@section('content')
    <div class="card mt-4 mb-4 border-light shadow">
        <div class="card-header hstack gap-2">
            <span>Lista de Empresas</span>
            <span class="ms-auto">
                <a href="{{ route('company.create') }}" class="btn btn-success btn-sm">Cadastrar</a>
            </span>
        </div>
        <div class="card-body">

            <x-alert />

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Empresa</th>
                        <th scope="col">CNPJ</th>
                        <th scope="col">Responsável</th>
                        <th scope="col" class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($companies as $company)
                        <tr>
                            <th scope="row">{{ $company->id }}</th>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td class="text-center">
                                <a href="{{ route('company.show', ['company' => $company->id]) }}"
                                    class="btn btn-primary btn-sm">Ver</a>
                                <a href="{{ route('company.edit', ['company' => $company->id]) }}"
                                    class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('company.destroy', ['company' => $company->id]) }}" method="post"
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
                        Nenhum usuário encontrado!
                    </div>
                    @endforelse
                </tbody>
            </table>

            {{ $companies->links() }}
        </div>
    </div>
@endsection
