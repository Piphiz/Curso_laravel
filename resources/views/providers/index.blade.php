@extends('layout.template')
@section('main')

    @include('providers.partials.search')

    <div class="row">
        <div class="col-md d-flex justify-content-between align-items-center">
            <h1>Listagem de Fornecedores</h1>
            <a href="{{ route('provider.create') }}" class="btn btn-dark btn-unidev">Cadastrar novo</a>
        </div>
    </div>

    @include('layout.messages')

    <table class="table table-dark table-striped mt-5">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Telefone</th>
            <th scope="col">Status da Empresa</th>
            <th scope="col" width="150"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($providers as $provider)
        <tr>
            <td scope="col">{{ $provider->id }}</td>
            <td scope="col">{{ $provider->name }}</td>
            <td scope="col">{{ $provider->email }}</td>
            <td scope="col">{{ $provider->phone }}</td>
            <td scope="col">{{$provider->active ? 'Ativa' : 'Desativada'}}</td>
            <td scope="col">
                <a class= "btn btn-dark btn-sm btn-unidev" href="{{ route('provider.edit', $provider->id) }}">Editar</a>
                <a class= "btn btn-danger btn-sm" onclick="deleteInDatabase('{{ route('provider.destroy', $provider->id)}}')">Excluir</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-5">
        {{$providers->appends([
            'action' => request('action'),
            'keyword' => request('keyword'),
            'email' => request('email'),
            'phone' => request('phone'),
            'order_by' => request('order_by')
            ])->links()}}
    </div>

@endsection
