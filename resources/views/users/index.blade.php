@extends('layout.template')
@section('main')

    @include('users.partials.search')

    <div class="row">
        <div class="col-md d-flex justify-content-between align-items-center">
            <h1>Listagem de Usuarios</h1>
            <a href="{{ route('user.create') }}" class="btn btn-dark btn-unidev">Cadastrar novo</a>
        </div>
    </div>

    @include('layout.messages')

    <table class="table table-dark table-striped mt-5">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Email</th>
            <th scope="col">Data ver/ do email</th>
            <th scope="col">Data de criacao</th>
            <th scope="col">Data de update</th>
            <th scope="col" width="150"></th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <td scope="col">{{ $user->id }}</td>
            <td scope="col">{{ $user->name }}</td>
            <td scope="col">{{ $user->email }}</td>
            <td scope="col">@if($user->email_verified_at == null){{'Nao Verificado'}}
                            @else{{$user->email_verified_at->format('d/m/Y - H:i:s') }}@endif</td>
            <td scope="col">{{ $user->created_at->format('d/m/Y') }}</td>
            <td scope="col">{{ $user->updated_at->format('d/m/Y') }}</td>
            <td scope="col">
                <a class= "btn btn-dark btn-sm btn-unidev" href="{{ route('user.edit', $user->id) }}">Editar</a>
                <a class= "btn btn-danger btn-sm" onclick="deleteInDatabase('{{ route('user.destroy', $user->id)}}')">Excluir</a>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>

    <div class="mt-5">
        {{$users->appends([
            'action' => request('action'),
            'keyword' => request('keyword'),
            'email' => request('email'),
            'order_by' => request('order_by')
            ])->links()}}
    </div>

@endsection
