@extends('layout.template')
@section('main')
<h1>Listagem de Usuarios</h1>

<table class="table table-dark table-striped mt-5">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Data ver/ do email</th>
        <th scope="col">Token</th>
        <th scope="col">Data de criacao</th>
        <th scope="col">Data de update</th>
        <th scope="col"></th>
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
        <td scope="col">{{ $user->remember_token }}</td>
        <td scope="col">{{ $user->created_at->format('d/m/Y') }}</td>
        <td scope="col">{{ $user->updated_at->format('d/m/Y') }}</td>
        <td scope="col"></td>
    </tr>
    @endforeach
    </tbody>
</table>

<div class="mt-5">
    {{$users->links()}}
</div>

@endsection
