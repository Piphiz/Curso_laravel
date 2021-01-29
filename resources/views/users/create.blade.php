@extends('layout.template')
@section('main')

    <div class="row">
        <div class="col-md d-flex justify-content-between align-items-center">
            <h1>Cadastro de usuario</h1>
            <a href="{{ route('user.index') }}" class="btn btn-dark btn-unidev">Voltar para a listagem</a>
        </div>
    </div>

    @include('layout.messages')

    <form action="{{ route('user.store') }}" method="post">
        @csrf

        @include('users.partials.form')
        @include('users.partials.password')

        <div class="row">
            <div class="col-md">
                <hr>
                <button type="submit" class="btn btn-dark btn-unidev">Registrar usuario</button>
            </div>
        </div>
    </form>

@endsection
